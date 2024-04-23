<?php
/**
 * 2013 - 2024 Payplug SAS.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0).
 * It is available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to contact@payplug.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PayPlug module to newer
 * versions in the future.
 *
 * @author    Payplug SAS
 * @copyright 2013 - 2024 Payplug SAS
 * @license   https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 *  International Registered Trademark & Property of Payplug SAS
 */

namespace PayPlug\src\repositories;

if (!defined('_PS_VERSION_')) {
    exit;
}

use PayPlug\src\application\adapter\OrderStateAdapter;
use PayPlug\src\application\dependencies\BaseClass;

class OrderStateRepository extends BaseClass
{
    /** @var object */
    protected $constant;

    /** @var object */
    private $configuration;

    /** @var object */
    private $dependencies;

    /** @var object */
    private $language;

    private $log;

    /** @var object */
    private $order_state_adapter;

    /** @var object */
    private $query;

    /** @var object */
    private $tools;

    /** @var object */
    private $validate;

    public function __construct(
        $configuration,
        $constant,
        $dependencies,
        $language,
        $order_state_adapter,
        $query,
        $tools,
        $validate,
        $myLogPhp
    ) {
        $this->configuration = $configuration;
        $this->constant = $constant;
        $this->dependencies = $dependencies;
        $this->language = $language;
        $this->order_state_adapter = $order_state_adapter;
        $this->query = $query;
        $this->tools = $tools;
        $this->validate = $validate;
        $this->log = $myLogPhp;
    }

    public function add($name, $state = [], $sandbox = true)
    {
        if (!is_array($state)
            || empty($state)) {
            return false;
        }

        $this->log->info('Creating new order state: ' . $name);
        $order_state = $this->order_state_adapter->get();
        $order_state->logable = $state['logable'];
        $order_state->send_email = $state['send_email'];
        $order_state->paid = $state['paid'];
        $order_state->module_name = $this->dependencies->name;
        $order_state->hidden = $state['hidden'];
        $order_state->delivery = $state['delivery'];
        $order_state->invoice = $state['invoice'];
        $order_state->color = $state['color'];

        $tag = $sandbox ? ' [TEST]' : ' [PayPlug]';
        $languages = $this->language->getLanguages(false);
        foreach ($languages as $lang) {
            $order_state->template[$lang['id_lang']] = $state['template'];
            if (in_array($lang['iso_code'], ['en', 'au', 'ca', 'ie', 'gb', 'uk', 'us'], true)) {
                $order_state->name[$lang['id_lang']] = $state['name']['en'] . $tag;
            } elseif (in_array($lang['iso_code'], ['fr', 'be', 'lu', 'ch'], true)) {
                $order_state->name[$lang['id_lang']] = $state['name']['fr'] . $tag;
            } elseif (in_array($lang['iso_code'], ['es', 'ar', 'cl', 'co', 'mx', 'py', 'uy', 've'], true)) {
                $order_state->name[$lang['id_lang']] = $state['name']['es'] . $tag;
            } elseif (in_array($lang['iso_code'], ['it', 'sm', 'va'], true)) {
                $order_state->name[$lang['id_lang']] = $state['name']['it'] . $tag;
            } else {
                $order_state->name[$lang['id_lang']] = $state['name']['en'] . $tag;
            }
        }

        if ($order_state->add()) {
            $source = $this->constant->get('_PS_MODULE_DIR_') . $this->name . '/views/img/os/' . $name . '.gif';
            $destination = $this->constant->get('_PS_ROOT_DIR_') . '/img/os/' . $order_state->id . '.gif';
            @copy($source, $destination);
            $this->log->info('State created with id: ' . $order_state->id);

            return $order_state->id;
        }

        return false;
    }

    public function create($name = false, $state = [], $sandbox = true, $force = false)
    {
        if (!is_string($name)
            || !$name
            || !is_array($state)
            || empty($state)) {
            return false;
        }

        $key_config = 'order_state_' . $name . ($sandbox ? '_test' : '');
        $id_order_state = $this->configuration->getValue($key_config);

        // Get order state id with given configuration key
        if (!$id_order_state && !$sandbox && isset($state['cfg']) && $state['cfg']) {
            $id_order_state = $this->dependencies->getPlugin()->getConfiguration()->get($state['cfg']);
            if ($id_order_state) {
                // Valide order state
                $os = $this->order_state_adapter->get((int) $id_order_state);
                if ($this->validate->validate('isLoadedObject', $os) && (!isset($os->deleted) || !$os->deleted)) {
                    return $this->configuration->set($key_config, (int) $os->id);
                }
            }
        }

        // Get order state id with given template
        if (!$id_order_state && !$sandbox && isset($state['template']) && $state['template']) {
            $id_order_state = $this->dependencies
                ->getPlugin()
                ->getOrderStateRepository()
                ->getOrderStateByTemplate($state['template']);
        }

        // Get order state id with given name
        if (!$id_order_state && isset($state['name']) && $state['name']) {
            $id_order_state = $this->dependencies
                ->getPlugin()
                ->getOrderStateRepository()
                ->getByName($state['name'], $sandbox);
        }

        // Create order state if no id order state found
        if (!$id_order_state || $force) {
            $id_order_state = $this->add($name, $state, $sandbox);
        }

        // Check if order state is valid
        $order_state = $this->order_state_adapter->get((int) $id_order_state);
        if (!$this->validate->validate('isLoadedObject', $order_state)
            || (isset($order_state->deleted) && $order_state->deleted)) {
            $id_order_state = $this->add($name, $state, $sandbox);
        }

        return $this->configuration->set($key_config, (int) $id_order_state);
    }

    public function getConfigKey($name = false, $sandbox = false)
    {
        if (!is_string($name)
            || !$name) {
            return false;
        }

        return $this->dependencies->concatenateModuleNameTo('ORDER_STATE_')
                    . $this->tools->tool('strtoupper', $name)
                    . ($sandbox ? '_TEST' : '');
    }

    public function isUsedByOrders($module_name = '')
    {
        $ids = [];

        if (!is_string($module_name) || !$module_name) {
            return $ids;
        }

        $order_states = [];
        $module_orders = $this->dependencies
            ->getPlugin()
            ->getOrderRepository()
            ->getByModule($module_name);

        if (empty($module_orders)) {
            return $ids;
        }

        foreach ($module_orders as $module_order) {
            array_push($order_states, (int) $module_order['current_state']);
        }

        return array_unique($order_states);
    }

    public function removeIdsUnusedByPayPlug()
    {
        $deleted = true;
        $payplug_os_id_list = $this->dependencies
            ->getPlugin()
            ->getOrderStateRepository()
            ->getIdsByModuleName($this->dependencies->name);
        $used_order_os_id_list = $this->isUsedByOrders($this->dependencies->name);
        $used_os_id_list = $this->dependencies
            ->getPlugin()
            ->getOrderStateRepository()
            ->getIdsUsedByPayPlug();
        foreach ($payplug_os_id_list as $payplug_os_id) {
            if (!in_array($payplug_os_id, $used_os_id_list) && !in_array($payplug_os_id, $used_order_os_id_list)) {
                $os = new OrderStateAdapter($payplug_os_id);
                $deleted = $deleted && $os->softDelete();
            }
        }

        return $deleted;
    }

    public function saveType($id_order_state = false, $type = '')
    {
        if (!$id_order_state || !is_int($id_order_state)) {
            return false;
        }

        if (!$type || !is_string($type)) {
            return false;
        }

        $exists = $this->dependencies
            ->getPlugin()
            ->getPayplugOrderStateRepository()
            ->getTypeByIdOrderState($id_order_state);

        if ($exists) {
            return $this->dependencies
                ->getPlugin()
                ->getPayplugOrderStateRepository()
                ->updateByOderState($id_order_state, $type);
        }

        return $this->dependencies
            ->getPlugin()
            ->getPayplugOrderStateRepository()
            ->setOrderState($id_order_state, $type);
    }
}
