<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'form.type.product.options' shared service.

return $this->services['form.type.product.options'] = new \PrestaShopBundle\Form\Admin\Product\ProductOptions(($this->services['translator'] ?? $this->getTranslatorService()), ($this->services['prestashop.adapter.legacy.context'] ?? $this->getPrestashop_Adapter_Legacy_ContextService()), ($this->services['prestashop.adapter.data_provider.supplier'] ?? ($this->services['prestashop.adapter.data_provider.supplier'] = new \PrestaShop\PrestaShop\Adapter\Supplier\SupplierDataProvider())), ($this->services['prestashop.adapter.data_provider.attachment'] ?? ($this->services['prestashop.adapter.data_provider.attachment'] = new \PrestaShop\PrestaShop\Adapter\Product\AttachmentDataProvider())), ($this->services['prestashop.router'] ?? $this->load('getPrestashop_RouterService.php')));