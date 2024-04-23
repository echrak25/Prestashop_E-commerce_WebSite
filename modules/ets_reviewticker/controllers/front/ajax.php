<?php
/**
* 2007-2017 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2017 PrestaShop SA
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  @version  Release: $Revision$
*  International Registered Trademark & Property of PrestaShop SA
*/

class Ets_reviewtickerAjaxModuleFrontController extends ModuleFrontController
{
    /**
    * @see FrontController::initContent()
    */
    public function initContent()
    {
        if(Tools::isSubmit('end_alert_life_time') && (int)Tools::getValue('end_alert_life_time'))
        {
            if((int)Configuration::get('ETS_RT_CLOSE_PERMANAL') && (int)Configuration::get('ETS_RT_TIME_IN') > 0 && ($startTime = (time()-60*(int)Configuration::get('ETS_RT_TIME_IN'))) > 0)
            {
                $this->context->cookie->ets_rt_start = $startTime;
                $this->context->cookie->write();
                die(json_encode(array(
                    'success' => $this->module->l('Alert life time ended','ajax'),
                )));
            }
            else
            {
                die(json_encode(array(
                    'success' => $this->module->l('Alert life is disabled. Alert will show all the time','ajax'),
                )));
            }
        }
        $excludedIds = (int)Configuration::get('ETS_RT_REMEMEBER') && ($strIds = trim(Tools::getValue('excludedIds'),',')) ? array_unique(array_map('intval',explode(',',$strIds))) : false;
        
        die(json_encode(
            array(
                'html' => $this->module->displayAlert($excludedIds,(int)Tools::getValue('id_product') > 0 ? (int)Tools::getValue('id_product') : 0),
                'success' => true,                
            )
        ));
    }
}