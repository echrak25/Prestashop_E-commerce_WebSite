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

namespace WizardAI\RequestHandler\Bulks;

if (!defined('_PS_VERSION_')) {
    exit;
}

use WizardAI\Interfaces\RequestHandlerInterface;
use WizardAI\WizardJob;

class FailedTaskRequestHandler implements RequestHandlerInterface
{
    public function execute()
    {
        // Get the URL of the image
        $task = json_decode(\Tools::getValue('task'), true);
        WizardJob::markAsFailed($task['id_job']);
        $this->logError(\Tools::getValue('message'));
    }

    public function logError($var)
    {
        // generate file txt into storages
        $targetPath = _PS_MODULE_DIR_ . 'wizardai/storages/task/';
        // name of the day + hour + second + '-' + random number
        $name = 'error-' . date('Y-m-d-H-i-s') . '-' . rand(0, 1000) . '.txt';
        $filePath = $targetPath . $name;
        $file = fopen($filePath, 'w');
        fwrite($file, json_encode($var));
        fclose($file);
    }
}
