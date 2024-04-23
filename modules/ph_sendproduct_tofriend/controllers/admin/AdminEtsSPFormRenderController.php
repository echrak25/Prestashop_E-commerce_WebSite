<?php
/**
  * Copyright ETS Software Technology Co., Ltd
 *
 * NOTICE OF LICENSE
 *
 * This file is not open source! Each license that you purchased is only available for 1 website only.
 * If you want to use this file on more websites (or projects), you need to purchase additional licenses.
 * You are not allowed to redistribute, resell, lease, license, sub-license or offer our resources to any third party.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future.
 *
 * @author ETS Software Technology Co., Ltd
 * @copyright  ETS Software Technology Co., Ltd
 * @license    Valid for 1 website (or project) for each purchase of license
 */

class AdminEtsSPFormRenderController extends ModuleAdminController {

    public $controllerName;
    public function renderOptions()
    {
        if (!$this->fields_options) {
            return '';
        }
        $fields_form = array(
            'form' => array(
                'legend' => array(
                    'title' => isset($this->fields_options['title']) ? $this->fields_options['title'] : '',
                    'icon' => 'icon-AdminAdmin'
                ),
                'input' => array(),
                'submit' => array(
                    'id' => 'save_config',
                    'title' => $this->l('Save'),
                ),
                'reset' => array(
                    'id' => 'reset_config',
                    'icon' => 'process-icon-refresh',
                    'class' => 'btn btn-default pull-left',
                    'title' => $this->l('Reset'),
                ),

    ),
        );

        if (isset($this->fields_options['buttons']) && $this->fields_options['buttons']) {
            $fields_form['form']['buttons'] = $this->fields_options['submit'];
        }
        if (isset($this->fields_options['fields']) && count($this->fields_options['fields']) > 0) {
            foreach ($this->fields_options['fields'] as $key => $config) {
                $fields = $config;
                $fields['name'] = $key;
                $fields['values'] = isset($config['values']) ? $config['values'] : ($config['type'] == 'switch' ? array(
                    array(
                        'id' => 'active_on',
                        'value' => 1,
                        'label' => $this->l('Yes')
                    ),
                    array(
                        'id' => 'active_off',
                        'value' => 0,
                        'label' => $this->l('No')
                    )
                ) : false);
                if ($config['type'] == 'select' && !empty($fields['multiple']) && stripos($fields['name'], '[]') === false)
                    $fields['name'] .= '[]';
                $fields_form['form']['input'][] = $fields;
            }
        }

        $language = new Language((int)Configuration::get('PS_LANG_DEFAULT'));

        // Helper Form.
        $helper = new HelperForm();
        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->default_form_language = $language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
        $helper->module = $this->module;
        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitOptions' . $this->table;
        $helper->currentIndex = self::$currentIndex;
        $helper->token = Tools::getAdminTokenLite($this->controller_name);
        $helper->override_folder = '/';

        $helper->tpl_vars = array(
            'base_url' => $this->context->shop->getBaseURL(),
            'language' => array(
                'id_lang' => $language->id,
                'iso_code' => $language->iso_code
            ),
            'fields_value' => $this->getConfigFieldsValue($helper->submit_action),
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );
        $helper->tpl_vars = array_merge($helper->tpl_vars, $this->tpl_option_vars);
        return $helper->generateForm(array($fields_form));
    }

    protected function getConfigFieldsValue($submit_action)
    {
        $fields = array();
        if (isset($this->fields_options['fields'])
            && ($configs = $this->fields_options['fields'])
            && is_array($configs)
            && count($configs) > 0
        ) {

            $languages = Language::getLanguages(false);
            if (trim($submit_action) !== '' && Tools::isSubmit($submit_action)) {
                foreach ($configs as $key => $config) {
                    if (isset($config['lang']) && $config['lang']) {
                        foreach ($languages as $l) {
                            $fields[$key][$l['id_lang']] = Tools::getValue($key . '_' . $l['id_lang'], isset($config['default']) ? $config['default'] : '');
                        }
                    } elseif ($config['type'] == 'select' && isset($config['multiple']) && $config['multiple']) {
                        $fields[$key . ($config['type'] == 'select' ? '[]' : '')] = Tools::getValue($key, array());
                    } elseif ($config['type'] == 'checkbox') {
                        $fields[$key] = Tools::getValue($key, array());
                    } elseif ($config['type'] == 'file')
                        $fields[$key] = $this->getFields($key, !empty($config['global']) ? 1 : 0);
                    else
                        $fields[$key] = Tools::getValue($key, isset($config['default']) ? $config['default'] : '');
                }
            } else {
                foreach ($configs as $key => $config) {
                    $global = !empty($config['global']) ? 1 : 0;
                    if (isset($config['lang']) && $config['lang']) {
                        foreach ($languages as $l) {
                            $fields[$key][$l['id_lang']] = $this->getFields($key, $global, $l['id_lang']);
                        }
                    } elseif ($config['type'] == 'select' && isset($config['multiple']) && $config['multiple']) {
                        $fields[$key . ($config['type'] == 'select' ? '[]' : '')] = ($result = $this->getFields($key, $global)) != '' ? explode(',', $result) : array();
                    } elseif ($config['type'] == 'checkbox') {
                        $fields[$key] = ($result = $this->getFields($key, $global)) != '' ? explode(',', $result) : array();
                    } else
                        $fields[$key] = $this->getFields($key, $global);
                }
            }
        }

        return $fields;
    }

    protected function getFields($key, $global = false, $idLang = null)
    {
        return $global ? Configuration::getGlobalValue($key, $idLang) : Configuration::get($key, $idLang);
    }

    protected function setFields($key, $global, $values, $html = false)
    {
        return $global ? Configuration::updateGlobalValue($key, $values, $html) : Configuration::updateValue($key, $values, $html);
    }

    public function validateRules($class_name = null)
    {
        parent::validateRules($class_name);

        if (!count($this->errors)
            && $this->fields_form
            && isset($this->fields_form['input'])
            && is_array($this->fields_form['input'])
            && count($this->fields_form['input']) > 0
        ) {
            $this->validateFields($this->fields_form['input']);
        }
    }

    public function validateFields($configs, $id_object = 0, $id_lang_default = 0)
    {
        if (is_array($configs)
            && count($configs) > 0
        ) {
            if ($id_lang_default <= 0) {
                $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
            }
            foreach ($configs as $key => $config) {
                if (isset($config['lang']) && $config['lang']) {
                    if (isset($config['required']) && $config['required'] && $config['type'] != 'switch' && trim(Tools::getValue($key . '_' . $id_lang_default)) == '') {
                        $this->errors[] = $config['label'] . ' ' . $this->l('is required');
                    }
                } elseif (isset($config['type'])) {
                    $field_value = Tools::getValue($key);
                    if (isset($config['regex']) && $config['regex'] && trim($field_value) !== '') {
                        foreach ($config['regex'] as $regex) {
                            if (isset($regex['bool'])
                                && isset($regex['pattern'])
                                && trim($regex['pattern']) !== ''
                            ) {
                                if ($regex['bool'] && !preg_match($regex['pattern'], trim($field_value)) || !$regex['bool'] && preg_match($regex['pattern'], trim($field_value))) {
                                    $this->errors[] = $config['label'] . ' ' . (isset($regex['error']) ? $regex['error'] : $this->l('invalid'));
                                }
                            }
                        }
                    } elseif (isset($config['required']) && $config['required'] && $config['type'] != 'switch' && trim($field_value) == '') {
                        $this->errors[] = $config['label'] . ' ' . $this->l('is required');
                    } elseif (isset($config['validate']) && trim($config['validate']) !== ''
                        &&
                        (
                            !is_array($field_value) && trim($field_value) !== '' ||
                            is_array($field_value) && count($field_value) > 0
                        )
                    ) {
                        $validate = trim($config['validate']);
                        if (method_exists('Validate', $validate)) {
                            $flag = false;
                            if (isset($config['split']) && $config['split']) {
                                $values = explode($config['split'], $field_value);
                                if (count($values)) {
                                    foreach ($values as $value) {
                                        if (!Validate::$validate(trim($value))) {
                                            $flag = true;
                                            break;
                                        }
                                    }
                                }
                            } else
                                $flag = !Validate::$validate(trim($field_value));
                            if ($flag)
                                $this->errors[] = $config['label'] . ' ' . $this->l('is invalid');
                        }
                    } elseif ($config['type'] == 'color'){
                        if (!Validate::isColor(Tools::getValue($key))){
                            $this->errors[]  = $config['label'] . ' ' .$this->l('Invalid color input value.');
                        }
                    }
                }
            }
        }
    }

    protected function processUpdateOptions()
    {
        if (!$this->fields_options ||
            !isset($this->fields_options['fields']) ||
            !$this->fields_options['fields']
        ) {
            return false;
        }

        $configs = $this->fields_options['fields'];
        $languages = Language::getLanguages(false);
        $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');

        $this->validateFields($configs, 0, $id_lang_default);

        if (!$this->errors) {
            foreach ($configs as $key => $config) {
                $global = isset($config['global']) && $config['global'] ? 1 : 0;
                if (isset($config['lang']) && $config['lang']) {
                    $values = array();
                    foreach ($languages as $lang) {
                        if ($config['type'] == 'switch')
                            $values[$lang['id_lang']] = (int)trim(Tools::getValue($key . '_' . $lang['id_lang'])) ? 1 : 0;
                        else
                            $values[$lang['id_lang']] = trim(Tools::getValue($key . '_' . $lang['id_lang'])) ? trim(Tools::getValue($key . '_' . $lang['id_lang'])) : trim(Tools::getValue($key . '_' . $id_lang_default));
                    }
                    $this->setFields($key, $global, $values, true);
                } else {
                    if ($config['type'] == 'switch') {
                        $this->setFields($key, $global, (int)trim(Tools::getValue($key)) ? 1 : 0);
                    } elseif ($config['type'] == 'checkbox' || $config['type'] == 'select' && isset($config['multiple']) && $config['multiple']) {
                        $this->setFields($key, $global, implode(',', Tools::getValue($key, array())), true);
                    } else {
                        $this->setFields($key, $global, trim(Tools::getValue($key)), true);
                    }
                }
            }
        }

        $this->display = 'list';
        if (empty($this->errors)) {
            Tools::redirectAdmin($this->context->link->getAdminLink($this->controllerName) . '&conf=6');
        }
    }
}