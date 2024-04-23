<?php
/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

namespace WizardAI\Traits;

if (!defined('_PS_VERSION_')) {
    exit;
}

trait TabManagerTrait
{
    /**
     * Ajoute un onglet à la liste des sous-onglets d'un onglet parent donné.
     *
     * @param string $parentClassName le nom de la classe de l'onglet parent
     * @param string $name le nom de l'onglet
     * @param string $getter Le paramètre de l'onglet présent dans l'url
     */
    protected function addTab($parentClassName, $name, $getter)
    {
        $id_lang = $this->context->language->id;
        $link = $this->context->link;
        $tabs = &$this->context->smarty->tpl_vars['tabs']->value;

        $parentTab = &$this->findTabByClassName($tabs, $parentClassName);

        if ($parentTab) {
            $tab = \Tab::getTab($id_lang, $parentTab['id_tab']);
            $tab['name'] = $this->l($name);
            $tab['current'] = ($getter == \Tools::getValue('tab'));
            $tab['href'] = $link->getAdminLink($parentClassName) . '&tab=' . $getter;

            $parentTab['sub_tabs'][] = $tab;
        }
    }

    /**
     * Recherche un onglet par son nom de classe.
     *
     * @param array &$tabs La liste des onglets
     * @param string $className le nom de la classe de l'onglet à trouver
     *
     * @return array|null L'onglet trouvé ou null si non trouvé
     */
    private function &findTabByClassName(&$tabs, $className)
    {
        foreach ($tabs as &$tab) {
            if ($className == $tab['class_name']) {
                return $tab;
            }
            if (isset($tab['sub_tabs'])) {
                $found = &$this->findTabByClassName($tab['sub_tabs'], $className);
                if ($found) {
                    return $found;
                }
            }
        }

        $null = null;  // Pour éviter un warning lors de la référence à null

        return $null;
    }
}
