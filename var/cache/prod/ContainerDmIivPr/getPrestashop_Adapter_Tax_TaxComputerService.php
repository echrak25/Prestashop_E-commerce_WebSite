<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.adapter.tax.tax_computer' shared service.

return $this->services['prestashop.adapter.tax.tax_computer'] = new \PrestaShop\PrestaShop\Adapter\Tax\TaxComputer(($this->services['prestashop.adapter.tax_rules_group.repository.tax_rules_group_repository'] ?? $this->load('getPrestashop_Adapter_TaxRulesGroup_Repository_TaxRulesGroupRepositoryService.php')));
