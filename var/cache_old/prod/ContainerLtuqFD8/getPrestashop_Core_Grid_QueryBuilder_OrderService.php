<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.core.grid.query_builder.order' shared service.

return $this->services['prestashop.core.grid.query_builder.order'] = new \PrestaShop\PrestaShop\Core\Grid\Query\OrderQueryBuilder(($this->services['doctrine.dbal.default_connection'] ?? $this->getDoctrine_Dbal_DefaultConnectionService()), 'ps_', ($this->services['prestashop.core.query.doctrine_search_criteria_applicator'] ?? ($this->services['prestashop.core.query.doctrine_search_criteria_applicator'] = new \PrestaShop\PrestaShop\Core\Grid\Query\DoctrineSearchCriteriaApplicator())), ($this->services['prestashop.adapter.legacy.context'] ?? $this->getPrestashop_Adapter_Legacy_ContextService())->getContext()->language->id, ($this->services['prestashop.adapter.shop.context'] ?? ($this->services['prestashop.adapter.shop.context'] = new \PrestaShop\PrestaShop\Adapter\Shop\Context()))->getContextListShopID($this->getParameter("multishop.settings.share_orders")));
