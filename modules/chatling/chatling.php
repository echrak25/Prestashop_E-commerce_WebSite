<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class Chatling extends Module
{
    public function __construct()
    {
        $this->name = 'chatling';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Chatling';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Chatling');
        $this->description = $this->l('Add your Chatling chatbot to PrestaShop.');
    }

    public function install()
    {
        return parent::install() && $this->registerHook('header');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookHeader()
    {
        return '<script async data-id="6853857253" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>';
    }
}