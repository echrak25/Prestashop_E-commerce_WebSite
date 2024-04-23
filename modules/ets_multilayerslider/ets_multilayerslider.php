<?php
/**
* 2007-2017 ETS-Soft
*  @author    ETS-Soft <etssoft.jsc@gmail.com>
*  @copyright 2007-2017 ETS-Soft
*  @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  @version  Release: $Revision$
*  International Registered Trademark & Property of ETS-Soft
*/

if (!defined('_PS_VERSION_'))
	exit;
if(!class_exists('ybc_themeconfig') && @file_exists(dirname(__FILE__).'/../ybc_themeconfig/ybc_themeconfig.php'))
    require_once(dirname(__FILE__).'/../ybc_themeconfig/ybc_themeconfig.php');
require_once(dirname(__FILE__).'/classes/MLS_Obj.php');
require_once(dirname(__FILE__).'/classes/MLS_Slide.php');
require_once(dirname(__FILE__).'/classes/MLS_Layer.php');
require_once(dirname(__FILE__).'/classes/MLS_Config.php');
class Ets_multilayerslider extends Module
{    
    private $_html;   
    public $alerts;
    public static $slides; 
    public static $layers;
    public static $blocks;
    public static $trans;    
    public static $configs;
    public $is17 = false;
    public $googlefonts = array();
    public function __construct()
	{
		$this->name = 'ets_multilayerslider';
		$this->tab = 'front_office_features';
		$this->version = '1.0.1';
		$this->author = 'YBC-Theme';
		$this->need_instance = 0;
        $this->module_key = '8e65fd095f1c6401c164005e976f7675';
		$this->secure_key = Tools::encrypt($this->name);        
		$this->bootstrap = true;
		parent::__construct();        
        $this->displayName = $this->l('Multi-layer slider PRO');
		$this->description = $this->l('Visual drag and drop home page slideshow builder');
		$this->ps_versions_compliancy = array('min' => '1.6.0.0', 'max' => _PS_VERSION_);
        $this->translates();   
        $this->registerHook('displayMLSConfigs');
        if(version_compare(_PS_VERSION_, '1.7', '>='))
            $this->is17 = true;
        $this->googlefonts[] = array(
            'id_option' => '',
            'name' => $this->l('THEME DEFAULT FONT'),
        );
        if($fonts = json_decode(Tools::file_get_contents(dirname(__FILE__).'/data/google-font-list.json'),true))
        {
            foreach($fonts as $font)
            {
                $temp = array(
                    'id_option' => $font['family'],
                    'name' => $font['family'],
                );
                $this->googlefonts[] = $temp;
            }
        }
        $this->googlefonts = json_decode(Tools::file_get_contents(dirname(__FILE__).'/data/google-fonts.json'),true);
        if(!$this->googlefonts)
        {
            $this->googlefonts = array(
                array(
                    'id_option' => '',
                    'name' => $this->l('THEME DEFAULT FONT'),
                ),
                array(
                    'id_option' => 'Arial',
                    'name' => 'Arial',
                ),
                array(
                    'id_option' => 'Times new roman',
                    'name' => 'Times new roman',
                ),
            );
        }
        $animation_in= array(
            array(
                'id_option' => 'bounce', 
                'name' => $this->l('Bounce')
            ),
            array(
                'id_option' => 'flash', 
                'name' => $this->l('Flash')
            ),
            array(
                'id_option' => 'pulse', 
                'name' => $this->l('Pulse')
            ),
            array(
                'id_option' => 'rubberBand', 
                'name' => $this->l('RubberBand')
            ),
            array(
                'id_option' => 'shake', 
                'name' => $this->l('Shake')
            ),
            array(
                'id_option' => 'swing', 
                'name' => $this->l('Swing')
            ),
            array(
                'id_option' => 'tada', 
                'name' => $this->l('Tada')
            ),
            array(
                'id_option' => 'wobble', 
                'name' => $this->l('Wobble')
            ),
            array(
                'id_option' => 'jello', 
                'name' => $this->l('Jello')
            ),
            array(
                'id_option' => 'bounceIn', 
                'name' => $this->l('Bounce in')
            ),
            array(
                'id_option' => 'bounceInDown', 
                'name' => $this->l('Bounce in down')
            ),
            array(
                'id_option' => 'bounceInLeft', 
                'name' => $this->l('Bounce in left')
            ),
            array(
                'id_option' => 'bounceInRight', 
                'name' => $this->l('Bounce in right')
            ),
            array(
                'id_option' => 'bounceInUp', 
                'name' => $this->l('Bounce in up')
            ),
            array(
                'id_option' => 'fadeIn', 
                'name' => $this->l('Fade in')
            ),
            array(
                'id_option' => 'fadeInDown', 
                'name' => $this->l('Fade in Down')
            ),
            array(
                'id_option' => 'fadeInDownBig', 
                'name' => $this->l('Fade in down big')
            ),
            array(
                'id_option' => 'fadeInLeft', 
                'name' => $this->l('Fade in left')
            ),
            array(
                'id_option' => 'fadeInLeftBig', 
                'name' => $this->l('Fade in left big')
            ),
            array(
                'id_option' => 'fadeInRight', 
                'name' => $this->l('Fade in right')
            ),
            array(
                'id_option' => 'fadeInRightBig', 
                'name' => $this->l('Fade in right big')
            ),
            array(
                'id_option' => 'fadeInUp', 
                'name' => $this->l('Fade in up')
            ),
            array(
                'id_option' => 'fadeInUpBig', 
                'name' => $this->l('Fade in up big')
            ),
            array(
                'id_option' => 'flip', 
                'name' => $this->l('Flip')
            ),
            array(
                'id_option' => 'flipInX', 
                'name' => $this->l('Flip in X')
            ),
            array(
                'id_option' => 'flipInY', 
                'name' => $this->l('Flip in Y')
            ),
            array(
                'id_option' => 'lightSpeedIn', 
                'name' => $this->l('Light speed in')
            ),
            array(
                'id_option' => 'rotateIn', 
                'name' => $this->l('Rotate in')
            ),
            array(
                'id_option' => 'rotateInDownLeft', 
                'name' => $this->l('Rotate in down left')
            ),
            array(
                'id_option' => 'rotateInDownRight', 
                'name' => $this->l('Rotate in down right')
            ),
            array(
                'id_option' => 'rotateInUpLeft', 
                'name' => $this->l('Rotate in up left')
            ),
            array(
                'id_option' => 'rotateInUpRight', 
                'name' => $this->l('Rotate in up right')
            ),
            
            array(
                'id_option' => 'rotateZoomIn', 
                'name' => $this->l('Rotate Zoom In')
            ),
            array(
                'id_option' => 'rotateYInLeft', 
                'name' => $this->l('Rotate In Left')
            ),
            array(
                'id_option' => 'rotateXInRight', 
                'name' => $this->l('Rotate In Right')
            ),
            array(
                'id_option' => 'rotateXInTop', 
                'name' => $this->l('Rotate X In top')
            ),
            array(
                'id_option' => 'rotateZInLeft', 
                'name' => $this->l('Rotate Z In Left')
            ),
            array(
                'id_option' => 'rotateZInRight', 
                'name' => $this->l('Rotate Z In right')
            ),
            array(
                'id_option' => 'zoomInFlipVert', 
                'name' => $this->l('Zoom In Flip Vert')
            ),
            array(
                'id_option' => 'zoomInFlipHoriz', 
                'name' => $this->l('Zoom In Flip Horiz')
            ),
            
            array(
                'id_option' => 'slideInUp', 
                'name' => $this->l('Slide in up')
            ),
            array(
                'id_option' => 'slideInDown', 
                'name' => $this->l('Slide in down')
            ),
            array(
                'id_option' => 'slideInLeft', 
                'name' => $this->l('Slide in left')
            ),
            array(
                'id_option' => 'slideInRight', 
                'name' => $this->l('Slide in right')
            ),
            array(
                'id_option' => 'slideInCrossRightBottom', 
                'name' => $this->l('Slide in cross right bottom')
            ),
            array(
                'id_option' => 'slideInCrossRightTop', 
                'name' => $this->l('Slide in cross right top')
            ),
            array(
                'id_option' => 'slideInCrossLeftBottom', 
                'name' => $this->l('Slide in cross left bottom')
            ),
            array(
                'id_option' => 'slideInCrossLeftTop', 
                'name' => $this->l('Slide in cross left top')
            ),
            array(
                'id_option' => 'zoomIn', 
                'name' => $this->l('Zoom in')
            ),
            array(
                'id_option' => 'zoomInDown', 
                'name' => $this->l('Zoom in down')
            ),
            array(
                'id_option' => 'zoomInLeft', 
                'name' => $this->l('Zoom in left')
            ),
            array(
                'id_option' => 'zoomInRight', 
                'name' => $this->l('Zoom in right')
            ),
            array(
                'id_option' => 'zoomInUp', 
                'name' => $this->l('Zoom in up')
            ),
            array(
                'id_option' => 'hinge', 
                'name' => $this->l('Hinge')
            ),
            array(
                'id_option' => 'rollIn', 
                'name' => $this->l('RollIn')
            ),
        );
        $animation_out= array(
            array(
                'id_option' => 'bounce', 
                'name' => $this->l('Bounce')
            ),
            array(
                'id_option' => 'flash', 
                'name' => $this->l('Flash')
            ),
            array(
                'id_option' => 'pulse', 
                'name' => $this->l('Pulse')
            ),
            array(
                'id_option' => 'rubberBand', 
                'name' => $this->l('RubberBand')
            ),
            array(
                'id_option' => 'shake', 
                'name' => $this->l('Shake')
            ),
            array(
                'id_option' => 'swing', 
                'name' => $this->l('Swing')
            ),
            array(
                'id_option' => 'tada', 
                'name' => $this->l('Tada')
            ),
            array(
                'id_option' => 'wobble', 
                'name' => $this->l('Wobble')
            ),
            array(
                'id_option' => 'jello', 
                'name' => $this->l('Jello')
            ),
            array(
                'id_option' => 'bounceOut', 
                'name' => $this->l('Bounce out')
            ),
            array(
                'id_option' => 'bounceOutDown', 
                'name' => $this->l('Bounce out down')
            ),
            array(
                'id_option' => 'bounceOutLeft', 
                'name' => $this->l('Bounce out left')
            ),
            array(
                'id_option' => 'bounceOutRight', 
                'name' => $this->l('Bounce out right')
            ),
            array(
                'id_option' => 'bounceOutUp', 
                'name' => $this->l('Bounce out up')
            ),
            array(
                'id_option' => 'fadeOut', 
                'name' => $this->l('Fade out')
            ),
            array(
                'id_option' => 'fadeOutDown', 
                'name' => $this->l('Fade out Down')
            ),
            array(
                'id_option' => 'fadeOutDownBig', 
                'name' => $this->l('Fade out down big')
            ),
            array(
                'id_option' => 'fadeOutLeft', 
                'name' => $this->l('Fade out left')
            ),
            array(
                'id_option' => 'fadeOutLeftBig', 
                'name' => $this->l('Fade out left big')
            ),
            array(
                'id_option' => 'fadeOutRight', 
                'name' => $this->l('Fade out right')
            ),
            array(
                'id_option' => 'fadeOutRightBig', 
                'name' => $this->l('Fade out right big')
            ),
            array(
                'id_option' => 'fadeOutUp', 
                'name' => $this->l('Fade out up')
            ),
            array(
                'id_option' => 'fadeOutUpBig', 
                'name' => $this->l('Fade out up big')
            ),
            array(
                'id_option' => 'flip', 
                'name' => $this->l('Flip')
            ),
            array(
                'id_option' => 'flipOutX', 
                'name' => $this->l('Flip out X')
            ),
            array(
                'id_option' => 'flipOutY', 
                'name' => $this->l('Flip out Y')
            ),
            array(
                'id_option' => 'lightSpeedOut', 
                'name' => $this->l('Light speed out')
            ),
            array(
                'id_option' => 'rotateOut', 
                'name' => $this->l('Rotate out')
            ),
            array(
                'id_option' => 'rotateOutDownLeft', 
                'name' => $this->l('Rotate out down left')
            ),
            array(
                'id_option' => 'rotateOutDownRight', 
                'name' => $this->l('Rotate out down right')
            ),
            array(
                'id_option' => 'rotateOutUpLeft', 
                'name' => $this->l('Rotate out up left')
            ),
            array(
                'id_option' => 'rotateOutUpRight', 
                'name' => $this->l('Rotate out up right')
            ),
            array(
                'id_option' => 'rotateZoomOut', 
                'name' => $this->l('Rotate Zoom Out')
            ),
            array(
                'id_option' => 'rotateYOutLeft', 
                'name' => $this->l('Rotate OutLeft')
            ),
            array(
                'id_option' => 'rotateXOutRight', 
                'name' => $this->l('Rotate Out Right')
            ),
            array(
                'id_option' => 'rotateXOutTop', 
                'name' => $this->l('Rotate X Out top')
            ),
            array(
                'id_option' => 'rotateXOutBottom', 
                'name' => $this->l('Rotate X Out Bottom')
            ),
            array(
                'id_option' => 'rotateZOutLeft', 
                'name' => $this->l('Rotate Z Out Left')
            ),
            array(
                'id_option' => 'rotateZOutRight', 
                'name' => $this->l('Rotate Z Out right')
            ),
            array(
                'id_option' => 'zoomOutFlipVert', 
                'name' => $this->l('Zoom Out Flip Vert')
            ),
            array(
                'id_option' => 'zoomOutFlipHoriz', 
                'name' => $this->l('Zoom Out Flip Horiz')
            ),
            array(
                'id_option' => 'slideOutUp', 
                'name' => $this->l('Slide out up')
            ),
            array(
                'id_option' => 'slideOutDown', 
                'name' => $this->l('Slide out down')
            ),
            array(
                'id_option' => 'slideOutLeft', 
                'name' => $this->l('Slide out left')
            ),
            array(
                'id_option' => 'slideOutRight', 
                'name' => $this->l('Slide out right')
            ),
            array(
                'id_option' => 'slideOutCrossRightBottom', 
                'name' => $this->l('Slide out cross right bottom')
            ),
            array(
                'id_option' => 'slideOutCrossRightTop', 
                'name' => $this->l('Slide out cross right top')
            ),
            array(
                'id_option' => 'slideOutCrossLeftBottom', 
                'name' => $this->l('Slide out cross left bottom')
            ),
            array(
                'id_option' => 'slideOutCrossLeftTop', 
                'name' => $this->l('Slide out cross left top')
            ),
            array(
                'id_option' => 'zoomOut', 
                'name' => $this->l('Zoom out')
            ),
            array(
                'id_option' => 'zoomOutDown', 
                'name' => $this->l('Zoom out down')
            ),
            
            array(
                'id_option' => 'zoomOutLeft', 
                'name' => $this->l('Zoom out left')
            ),
            array(
                'id_option' => 'zoomOutRight', 
                'name' => $this->l('Zoom out right')
            ),
            array(
                'id_option' => 'zoomOutUp', 
                'name' => $this->l('Zoom out up')
            ),
            array(
                'id_option' => 'hinge', 
                'name' => $this->l('Hinge')
            ),
            array(
                'id_option' => 'rollOut', 
                'name' => $this->l('Roll out')
            ),
            
        );
        $slide_animation_in = array(
            array(
                'id_option' => 'fadeIn', 
                'name' => $this->l('Fade in')
            ),
            array(
                'id_option' => 'fadeInDown', 
                'name' => $this->l('Fade in Down')
            ),
            array(
                'id_option' => 'fadeInDownBig', 
                'name' => $this->l('Fade in down big')
            ),
            array(
                'id_option' => 'fadeInLeft', 
                'name' => $this->l('Fade in left')
            ),
            array(
                'id_option' => 'fadeInLeftBig', 
                'name' => $this->l('Fade in left big')
            ),
            array(
                'id_option' => 'fadeInRight', 
                'name' => $this->l('Fade in right')
            ),
            array(
                'id_option' => 'fadeInRightBig', 
                'name' => $this->l('Fade in right big')
            ),
            array(
                'id_option' => 'fadeInUp', 
                'name' => $this->l('Fade in up')
            ),
            array(
                'id_option' => 'fadeInUpBig', 
                'name' => $this->l('Fade in up big')
            ),
            array(
                'id_option' => 'flipInX', 
                'name' => $this->l('Flip in X')
            ),
            array(
                'id_option' => 'flipInY', 
                'name' => $this->l('Flip in Y')
            ),
            array(
                'id_option' => 'lightSpeedIn', 
                'name' => $this->l('Light speed in')
            ),
            array(
                'id_option' => 'rotateIn', 
                'name' => $this->l('Rotate in')
            ),
            array(
                'id_option' => 'rotateInDownLeft', 
                'name' => $this->l('Rotate in down left')
            ),
            array(
                'id_option' => 'rotateInDownRight', 
                'name' => $this->l('Rotate in down right')
            ),
            array(
                'id_option' => 'rotateInUpLeft', 
                'name' => $this->l('Rotate in up left')
            ),
            array(
                'id_option' => 'rotateInUpRight', 
                'name' => $this->l('Rotate in up right')
            ),
            
            array(
                'id_option' => 'rotateZoomIn', 
                'name' => $this->l('Rotate Zoom In')
            ),
            array(
                'id_option' => 'rotateYInLeft', 
                'name' => $this->l('Rotate In Left')
            ),
            array(
                'id_option' => 'rotateXInRight', 
                'name' => $this->l('Rotate In Right')
            ),
            array(
                'id_option' => 'rotateXInTop', 
                'name' => $this->l('Rotate X In top')
            ),
            array(
                'id_option' => 'rotateZInLeft', 
                'name' => $this->l('Rotate Z In Left')
            ),
            array(
                'id_option' => 'rotateZInRight', 
                'name' => $this->l('Rotate Z In right')
            ),
            array(
                'id_option' => 'zoomInFlipVert', 
                'name' => $this->l('Zoom In Flip Vert')
            ),
            array(
                'id_option' => 'zoomInFlipHoriz', 
                'name' => $this->l('Zoom In Flip Horiz')
            ),
            
            array(
                'id_option' => 'slideInUp', 
                'name' => $this->l('Slide in up')
            ),
            array(
                'id_option' => 'slideInDown', 
                'name' => $this->l('Slide in down')
            ),
            array(
                'id_option' => 'slideInLeft', 
                'name' => $this->l('Slide in left')
            ),
            array(
                'id_option' => 'slideInRight', 
                'name' => $this->l('Slide in right')
            ),
            array(
                'id_option' => 'slideInCrossRightBottom', 
                'name' => $this->l('Slide in cross right bottom')
            ),
            array(
                'id_option' => 'slideInCrossRightTop', 
                'name' => $this->l('Slide in cross right top')
            ),
            array(
                'id_option' => 'slideInCrossLeftBottom', 
                'name' => $this->l('Slide in cross left bottom')
            ),
            array(
                'id_option' => 'slideInCrossLeftTop', 
                'name' => $this->l('Slide in cross left top')
            ),
            array(
                'id_option' => 'zoomIn', 
                'name' => $this->l('Zoom in')
            ),
            array(
                'id_option' => 'zoomInDown', 
                'name' => $this->l('Zoom in down')
            ),
            array(
                'id_option' => 'zoomInLeft', 
                'name' => $this->l('Zoom in left')
            ),
            array(
                'id_option' => 'zoomInRight', 
                'name' => $this->l('Zoom in right')
            ),
            array(
                'id_option' => 'zoomInUp', 
                'name' => $this->l('Zoom in up')
            ),
            array(
                'id_option' => 'rollIn', 
                'name' => $this->l('Roll in')
            ),
        );
        
        $slide_animation_out = array(
            array(
                'id_option' => 'fadeOut', 
                'name' => $this->l('Fade out')
            ),
            array(
                'id_option' => 'fadeOutDown', 
                'name' => $this->l('Fade out Down')
            ),
            array(
                'id_option' => 'fadeOutDownBig', 
                'name' => $this->l('Fade out down big')
            ),
            array(
                'id_option' => 'fadeOutLeft', 
                'name' => $this->l('Fade out left')
            ),
            array(
                'id_option' => 'fadeOutLeftBig', 
                'name' => $this->l('Fade out left big')
            ),
            array(
                'id_option' => 'fadeOutRight', 
                'name' => $this->l('Fade out right')
            ),
            array(
                'id_option' => 'fadeOutRightBig', 
                'name' => $this->l('Fade out right big')
            ),
            array(
                'id_option' => 'fadeOutUp', 
                'name' => $this->l('Fade out up')
            ),
            array(
                'id_option' => 'fadeOutUpBig', 
                'name' => $this->l('Fade out up big')
            ),
            array(
                'id_option' => 'flipOutX', 
                'name' => $this->l('Flip out X')
            ),
            array(
                'id_option' => 'flipOutY', 
                'name' => $this->l('Flip out Y')
            ),
            array(
                'id_option' => 'lightSpeedOut', 
                'name' => $this->l('Light speed out')
            ),
            array(
                'id_option' => 'rotateOut', 
                'name' => $this->l('Rotate out')
            ),
            array(
                'id_option' => 'rotateOutDownLeft', 
                'name' => $this->l('Rotate out down left')
            ),
            array(
                'id_option' => 'rotateOutDownRight', 
                'name' => $this->l('Rotate out down right')
            ),
            array(
                'id_option' => 'rotateOutUpLeft', 
                'name' => $this->l('Rotate out up left')
            ),
            array(
                'id_option' => 'rotateOutUpRight', 
                'name' => $this->l('Rotate out up right')
            ),
            array(
                'id_option' => 'rotateZoomOut', 
                'name' => $this->l('Rotate Zoom Out')
            ),
            array(
                'id_option' => 'rotateYOutLeft', 
                'name' => $this->l('Rotate OutLeft')
            ),
            array(
                'id_option' => 'rotateXOutRight', 
                'name' => $this->l('Rotate Out Right')
            ),
            array(
                'id_option' => 'rotateXOutTop', 
                'name' => $this->l('Rotate X Out top')
            ),
            array(
                'id_option' => 'rotateXOutBottom', 
                'name' => $this->l('Rotate X Out Bottom')
            ),
            array(
                'id_option' => 'rotateZOutLeft', 
                'name' => $this->l('Rotate Z Out Left')
            ),
            array(
                'id_option' => 'rotateZOutRight', 
                'name' => $this->l('Rotate Z Out right')
            ),
            array(
                'id_option' => 'zoomOutFlipVert', 
                'name' => $this->l('Zoom Out Flip Vert')
            ),
            array(
                'id_option' => 'zoomOutFlipHoriz', 
                'name' => $this->l('Zoom Out Flip Horiz')
            ),
            array(
                'id_option' => 'slideOutUp', 
                'name' => $this->l('Slide out up')
            ),
            array(
                'id_option' => 'slideOutDown', 
                'name' => $this->l('Slide out down')
            ),
            array(
                'id_option' => 'slideOutLeft', 
                'name' => $this->l('Slide out left')
            ),
            array(
                'id_option' => 'slideOutRight', 
                'name' => $this->l('Slide out right')
            ),
            array(
                'id_option' => 'slideOutCrossRightBottom', 
                'name' => $this->l('Slide out cross right bottom')
            ),
            array(
                'id_option' => 'slideOutCrossRightTop', 
                'name' => $this->l('Slide out cross right top')
            ),
            array(
                'id_option' => 'slideOutCrossLeftBottom', 
                'name' => $this->l('Slide out cross left bottom')
            ),
            array(
                'id_option' => 'slideOutCrossLeftTop', 
                'name' => $this->l('Slide out cross left top')
            ),
            array(
                'id_option' => 'zoomOut', 
                'name' => $this->l('Zoom out')
            ),
            array(
                'id_option' => 'zoomOutDown', 
                'name' => $this->l('Zoom out down')
            ),
            
            array(
                'id_option' => 'zoomOutLeft', 
                'name' => $this->l('Zoom out left')
            ),
            array(
                'id_option' => 'zoomOutRight', 
                'name' => $this->l('Zoom out right')
            ),
            array(
                'id_option' => 'zoomOutUp', 
                'name' => $this->l('Zoom out up')
            ),
            array(
                'id_option' => 'rollOut', 
                'name' => $this->l('Roll out')
            ),
        
        );
        self::$slides = array(
            'form' => array(
				'legend' => array(
					'title' => (int)Tools::getValue('itemId') ? $this->l('Edit slide') : $this->l('Add slide'),				
				),
				'input' => array(),
                'submit' => array(
					'title' => $this->l('Save'),
				),
                'name' => 'slide',
                'connect_to' => 'layer',
            ),
            'configs' => array(
                'title' => array(
                    'label' => $this->l('Title'),
                    'type' => 'text',                    
                    'required' => true,      
                    'lang' => true,                    
                ),
                'image' => array(
                    'label' => $this->l('Background image'),
                    'type' => 'file',                                         
                ),
                'repeat_x' => array(
                    'label' => $this->l('Repeat X'),
                    'type' => 'radio',                
                    'default' => 0, 
                    'values' => array(
                        array(
                            'label' => $this->l('Yes'),
                            'id' => 'repeat_x_1',
                            'value' => 1,
                        ),
                        array(
                            'label' => $this->l('No'),
                            'id' => 'repeat_x_0',
                            'value' => 0,
                        )
                    ),                  
                ), 
                'repeat_y' => array(
                    'label' => $this->l('Repeat Y'),
                    'type' => 'radio',                
                    'default' => 0, 
                    'values' => array(
                        array(
                            'label' => $this->l('Yes'),
                            'id' => 'repeat_y_1',
                            'value' => 1,
                        ),
                        array(
                            'label' => $this->l('No'),
                            'id' => 'repeat_y_0',
                            'value' => 0,
                        )
                    ),                  
                ), 
                'backgroud_color' => array(
                    'label' => $this->l('Backgroud color'),
                    'type' => 'color',  
                    'validate' => 'isColor',
                    'default' => '#222222',                                    
                ),
                'animation_in' => array(
                    'label' => $this->l('Animation in'),
                    'type' => 'select', 
                    'class' => 'ybc_slide_animation',
					'options' => array(
            			 'query' => $slide_animation_in,                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),
                    'desc' => $this->l('Transition effect when the slide move into the slider area'),
                    'default' => 'fadeIn',                                     
                ),
                'animation_out' => array(
                    'label' => $this->l('Animation out'),
                    'type' => 'select',
                    'class' => 'ybc_slide_animation',
					'options' => array(
            			 'query' => $slide_animation_out,                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),   
                    'desc' => $this->l('Transition effect when the slide move out of the slider area'),
                    'default' => 'fadeOut',                                   
                ),
                'custom_class' => array(
                    'label' => $this->l('Custom CSS class'),
                    'type' => 'text',                          
                ), 
                'sort_order' => array(
                    'label' => $this->l('Sort order'),
                    'type' => 'sort_order', 
                    'required' => true,   
                    'default' => 1,     
                    'order_group' => false,                          
                ), 
                'enabled' => array(
                    'label' => $this->l('Enabled'),
                    'type' => 'switch',                
                    'default' => 1, 
                    'values' => array(
                        array(
                            'label' => $this->l('Yes'),
                            'id' => 'slide_enabled_1',
                            'value' => 1,
                        ),
                        array(
                            'label' => $this->l('No'),
                            'id' => 'slide_enabled_0',
                            'value' => 0,
                        )
                    ),                  
                ),  
            ),            
        );
        self::$layers = array(
            'form' => array(
    			'legend' => array(
    				'title' => (int)Tools::getValue('itemId') ? $this->l('Edit layer') : $this->l('Add layer'),				
    			),
    			'input' => array(),
                'submit' => array(
    				'title' => $this->l('Save'),
    			),
                'name' => 'layer',
                'parent' => 'slide',
            ),
            'configs' => array(
                'layer_type' => array(
    				'type' => 'select',
    				'label' => $this->l('Layer type'),
    				'name' => 'layer_type',  
    				'options' => array(
            			 'query' => array(                            
                            array(
                                'id_option' =>'text',
                                'name'=>$this->l('Text/HTML'),
                            ),
                            array(
                                'id_option' =>'text_background',
                                'name'=>$this->l('Text with background'),
                            ),
                            array(
                                'id_option' =>'button',
                                'name'=>$this->l('Button'),
                            ),
                            array(
                                'id_option' =>'link',
                                'name'=>$this->l('Link'),
                            ),
                            array(
                                'id_option' =>'image',
                                'name'=>$this->l('Image'),
                            ),
                         ),                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),
                    'default' => 'text',                
    			),
                'image' =>array(
                    'type' => 'file',
                    'label' => $this->l('Image'),
                    'hide_delete' => true,
                ),
                'content_layer'=>array(
                    'type'=>'textarea',
                    'label'=>$this->l('Text content'),
                    'lang'=>true
                ),
                'width' => array(
                    'label' => $this->l('Image width'),
                    'type' => 'text',                                  
                    'suffix' => 'px',  
                    'validate' => 'isUnsignedInt',
                    'desc' => $this->l('Leave blank to use default image width'),              
                ),
                'height' => array(
                    'label' => $this->l('Image height'),
                    'type' => 'text',                           
                    'suffix' => 'px',  
                    'validate' => 'isUnsignedInt',
                    'desc' => $this->l('Leave blank to use default image height'),              
                ),
                'link'=>array(
                    'type'=>'text',
                    'label'=>$this->l('Link'),
                    'lang'=>true,
                ),
                'font_family' => array(
                    'label' => $this->l('Font family'),
                    'type' => 'select', 
					'options' => array(
            			 'query' => $this->googlefonts,                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),   
                    'desc' => $this->l('Use default font of your theme or select a Google font from the list'),                                                  
                ),                
                'font_size' => array(
                    'label' => $this->l('Font size'),
                    'type' => 'text',  
                    'default' => 30,              
                    'suffix' => 'px',  
                    'validate' => 'isFloat',              
                ),
                'font_weight' => array(
                        'label' => $this->l('Font weight'),
                        'type' => 'radio',                
                        'default' => 'normal', 
                        'values' => array(
                            array(
                                'label' => $this->l('Normal'),
                                'id' => 'font_weight_1',
                                'value' => 'normal',
                            ),
                            array(
                                'label' => $this->l('Bold'),
                                'id' => 'font_weight_0',
                                'value' => 'bold',
                                )
                            ),
                ), 
                'text_transform' => array(
                        'label' => $this->l('Text transform'),
                        'type' => 'radio',                
                        'default' => 'none', 
                        'values' => array(
                            array(
                                'label' => $this->l('None'),
                                'id' => 'text_transform_1',
                                'value' => 'none',
                            ),
                            array(
                                'label' => $this->l('Uppercase'),
                                'id' => 'text_transform_0',
                                'value' => 'uppercase',                                
                            ),
                            array(
                                'label' => $this->l('Lowercase'),
                                'id' => 'text_transform_2',
                                'value' => 'lowercase',
                            ),
                        ),
                ),
                'text_decoration' => array(
                        'label' => $this->l('Text decoration'),
                        'type' => 'radio',                
                        'default' => 'none', 
                        'values' => array(
                            array(
                                'label' => $this->l('None'),
                                'id' => 'text_decoration_1',
                                'value' => 'none',
                            ),
                            array(
                                'label' => $this->l('Underline'),
                                'id' => 'text_decoration_2',
                                'value' => 'underline',                                
                            ),
                            array(
                                'label' => $this->l('Overline'),
                                'id' => 'text_decoration_3',
                                'value' => 'overline',
                            ),
                            array(
                                'label' => $this->l('Line-through'),
                                'id' => 'text_decoration_4',
                                'value' => 'line-through',
                            ),
                        ),
                ),  
                'custom_class' => array(
                    'label' => $this->l('Custom CSS class'),
                    'type' => 'text',                               
                ), 
                'text_color' => array(
                    'label' => $this->l('Text color'),
                    'type' => 'color',
                    'validate' => 'isColor', 
                    'default' => '#222222',                               
                ),
                'background_color' => array(
                    'label' => $this->l('Background color'),
                    'type' => 'color',
                    'validate' => 'isColor', 
                    'default' => '#F3F3F3',                               
                ),   
                'padding' => array(
                    'label' => $this->l('Padding'),
                    'type' => 'text',  
                    'default' => '5px 10px',                     
                    'desc' => $this->l('Standard CSS padding value format. Eg: 5px 10px 15px 20px,10px 5px, 5px...'),             
                ), 
                'box_radius' => array(
                    'label' => $this->l('Box radius'),
                    'type' => 'text',  
                    'default' => 20,              
                    'suffix' => 'px',  
                    'validate' => 'isUnsignedInt',              
                ),             
                'background_opacity' => array(
                    'label' => $this->l('Background opacity'),
                    'type' => 'text',
                    'validate' => 'isUnsignedFloat', 
                    'default' => 1,  
                    'desc' => $this->l('From 0-1, Eg: 0.5, 0.8, 1...'),                             
                ),                        
                'id_slide' => array(
                    'label' => $this->l('Slide'),
                    'type' => 'hidden',     
                    'default' => ($id_slide = (int)Tools::isSubmit('id_slide')) && $id_slide > 0 ? $id_slide : '',
                    'required' => true,
                    'validate' => 'isUnsignedInt',   
                ), 
                'top' => array(
                    'label' => $this->l('Top').($this->multiLayoutExist() ? ' ('.$this->l('LTR').')' :  ''),
                    'type' => 'text',
                    'suffix' => 'px',       
                    'default' => 50, 
                    'required' => true,
                    'validate' => 'isFloat',
                    'desc' => $this->multiLayoutExist() ? $this->l('The distance to slide top edge on LTR layout') : $this->l('The distance to slide top edge'),                        
                ),
                'left' => array(
                    'label' => $this->l('Left').($this->multiLayoutExist() ? ' ('.$this->l('LTR').')' :  ''),
                    'type' => 'text',     
                    'suffix' => 'px',    
                    'default' => 50,   
                    'required' => true, 
                    'validate' => 'isFloat',
                    'desc' => $this->multiLayoutExist() ? $this->l('The distance to slide left edge on LTR layout') : $this->l('The distance to slide left edge'),                     
                ),
                'top_right' =>array(
                    'label'=>$this->l('Top (RTL)'),
                    'type' => 'text',
                    'suffix' => 'px',
                    'default' => 50,
                    'required' => true, 
                    'validate' => 'isFloat',
                    'desc' => $this->l('The distance to slide top edge on RTL layout'),    
                ),
                'right' =>array(
                    'label'=>$this->l('Right (RTL)'),
                    'type' => 'text',
                    'suffix' => 'px',
                    'validate' => 'isFloat',
                    'default' => 50,  
                    'required' => true,
                    'desc' => $this->l('The distance to slide right edge on RTL layout'),    
                ), 
                'animation_in' => array(
                    'label' => $this->l('Animation in'),
                    'type' => 'select', 
                    'class' => 'ybc_slide_animation',
					'options' => array(
            			 'query' => $animation_in,                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),
                    'desc' => $this->l('Transition effect when the layer moves in its slide'),  
                    'default' => 'fadeIn',                                   
                ), 
                'start_delay' => array(
                    'label' => $this->l('Delay in'),
                    'type' => 'text',
                    'suffix' => 'ms', 
                    'validate' => 'isUnsignedInt',
                    'required' => true,  
                    'default' => 0,  
                    'desc' => $this->l('The delay time for the layer to start moving in its slide'),                           
                ), 
                'move_in' => array(
                    'label' => $this->l('Move in'),
                    'type' => 'text',
                    'suffix' => 'ms', 
                    'validate' => 'isUnsignedInt',
                    'required' => true,  
                    'default' => 1000,  
                    'desc' => $this->l('The duration for the layer to move in its slide'),                           
                ),
                'animation_out' => array(
                    'label' => $this->l('Animation out'),
                    'type' => 'select',
                    'class' => 'ybc_slide_animation',
					'options' => array(
            			 'query' => $animation_out,                             
                         'id' => 'id_option',
            			 'name' => 'name'  
                    ),     
                    'desc' => $this->l('Transition effect when the layer moves out of its slide'),   
                    'default' => 'fadeOut',                              
                ),
                'stand_duration' => array(
                    'label' => $this->l('Delay out'),
                    'type' => 'text',
                    'suffix' => 'ms', 
                    'validate' => 'isUnsignedInt',
                    'required' => true,  
                    'default' => 0,  
                    'desc' => $this->l('The delay time for the layer to start moving out of its slide'),                           
                ), 
                'move_out' => array(
                    'label' => $this->l('Move out'),
                    'type' => 'text',
                    'suffix' => 'ms', 
                    'validate' => 'isUnsignedInt',
                    'required' => true,  
                    'default' => 500,  
                    'desc' => $this->l('The duration for the layer to move out of its slide'),                           
                ),                                                             
                'sort_order' => array(
                    'label' => $this->l('Sort order'),
                    'type' => 'sort_order', 
                    'required' => true,   
                    'default' => 1,   
                    'order_group' => 'id_slide',                              
                ),      
            ),
        );
        self::$configs = array(
            'form' => array(
				'legend' => array(
					'title' => $this->l('Configuration'),
                    'icon' => 'icon-AdminAdmin'				
				),
				'input' => array(),
                'submit' => array(
					'title' => $this->l('Save'),
				),
                'name' => 'config'
            ),
            'configs' => array(
                    'ETS_MLS_SLIDER_TYPE' => array(
        				'type' => 'select',
        				'label' => $this->l('Slider type'),
        				'name' => 'ETS_MLS_HOOK_TO',  
        				'options' => array(
                			 'query' => array(
                                array(
                                    'id_option' =>'auto',
                                    'name'=>$this->l('Auto size'),
                                ),                          
                                array(
                                    'id_option' =>'boxed',
                                    'name'=>$this->l('Boxed'),
                                ),
                                array(
                                    'id_option' =>'full',
                                    'name'=>$this->l('Full width'),
                                ),
                             ),                             
                             'id' => 'id_option',
                			 'name' => 'name'  
                        ),
                        'default' => 'auto',
                      ),
                     'ETS_MLS_HOOK_TO' => array(
        				'type' => 'select',
        				'label' => $this->l('Hook to'),
        				'name' => 'ETS_MLS_HOOK_TO',  
        				'options' => array(
                			 'query' => array(
                                array(
                                    'id_option' =>'default',
                                    'name'=>$this->l('Default hook'),
                                ),                          
                                array(
                                    'id_option' =>'customhook',
                                    'name'=>$this->l('Custom hook'),
                                ),
                             ),                             
                             'id' => 'id_option',
                			 'name' => 'name'  
                        ),
                        'default' => 'default', 
                        'desc' => $this->l('Put {hook h=\'displayMLS\'} on your template tpl file where you want the slider displays'),               
			         ),
                    'ETS_MLS_SLIDER_BACKGROUND' => array(
						'type' => 'color',
						'label' => $this->l('Slider background color'),
                        'default'=> '#ffffff',
                        'validate' => 'isColor',						                       
					),
                    'ETS_MLS_SLIDER_BUTTON_COLOR' => array(
						'type' => 'color',
						'label' => $this->l('Slider buttons color'),
                        'default'=> '#ec4249',
                        'validate' => 'isColor',						                       
					),
                    'ETS_MLS_WIDTH_SLIDE' => array(
						'type' => 'text',
						'label' => $this->l('Slide width'),
                        'default'=> 1170,
                        'suffix' => 'px',
                        'required' => true,	
                        'validate' => 'isUnsignedInt',						                       
					),
                    'ETS_MLS_HEIGHT_SLIDE' => array(
						'type' => 'text',
						'label' => $this->l('Slide height'),
                        'default'=> 450,
                        'suffix' => 'px',
                        'required' => true,
                        'validate' => 'isUnsignedInt',							                      
					),                    
                    'ETS_MLS_MOVE_IN' => array(
						'type' => 'text',
						'label' => $this->l('Move in'),
                        'default'=> 1000,
                        'suffix' => 'ms',
                        'required' => true,	
                        'validate' => 'isUnsignedInt',	
                        'desc' => $this->l('Time for a slide to move in the slider'),				                      
					), 
                    'ETS_MLS_MOVE_OUT' => array(
						'type' => 'text',
						'label' => $this->l('Move out'),
                        'default'=> 500,
                        'suffix' => 'ms',
                        'required' => true,	
                        'validate' => 'isUnsignedInt',
                        'desc' => $this->l('Time for a slide to move out of the slider'),						                      
					), 
                    'ETS_MLS_STAND_DURATION' => array(
						'type' => 'text',
						'label' => $this->l('Stand duration'),
                        'default'=> 5000,
                        'suffix' => 'ms',
                        'validate' => 'isUnsignedInt',
                        'required' => true,	
                        'desc' => $this->l('Stand duration of a slide on the slider.'),						                      
					), 
                    'ETS_MLS_AUTO_PLAY' => array(
                        'label' => $this->l('Auto play'),
                        'type' => 'switch',                
                        'default' => 1, 
                        'values' => array(
                            array(
                                'label' => $this->l('Yes'),
                                'id' => 'slide_enabled_1',
                                'value' => 1,
                            ),
                            array(
                                'label' => $this->l('No'),
                                'id' => 'slide_enabled_0',
                                'value' => 0,
                                )
                            ),
                    ), 
                    'ETS_MLS_ENABLE_RUNNING_BAR' => array(
                        'label' => $this->l('Enable running status bar'),
                        'type' => 'switch',                
                        'default' => 1, 
                        'values' => array(
                            array(
                                'label' => $this->l('Yes'),
                                'id' => 'slide_enabled_1',
                                'value' => 1,
                            ),
                            array(
                                'label' => $this->l('No'),
                                'id' => 'slide_enabled_0',
                                'value' => 0,
                                )
                            ),
                    ),
                    'ETS_MLS_PAUSE_ON_HOVER' => array(
                        'label' => $this->l('Pause when hover'),
                        'type' => 'switch',                
                        'default' => 1, 
                        'values' => array(
                            array(
                                'label' => $this->l('Yes'),
                                'id' => 'slide_enabled_1',
                                'value' => 1,
                            ),
                            array(
                                'label' => $this->l('No'),
                                'id' => 'slide_enabled_0',
                                'value' => 0,
                                )
                            ),
                    ),
                    'ETS_MLS_LOOP' => array(
                        'label' => $this->l('Loop'),
                        'type' => 'switch',                
                        'default' => 1, 
                        'values' => array(
                            array(
                                'label' => $this->l('Yes'),
                                'id' => 'slide_enabled_1',
                                'value' => 1,
                            ),
                            array(
                                'label' => $this->l('No'),
                                'id' => 'slide_enabled_0',
                                'value' => 0,
                                )
                            ),
                    ),
                    'ETS_MLS_ENABLE_LOADING_ICON' => array(
                        'label' => $this->l('Display loading icon'),
                        'type' => 'switch',                
                        'default' => 1, 
                        'values' => array(
                            array(
                                'label' => $this->l('Yes'),
                                'id' => 'slide_enabled_1',
                                'value' => 1,
                            ),
                            array(
                                'label' => $this->l('No'),
                                'id' => 'slide_enabled_0',
                                'value' => 0,
                                )
                            ),
                    ),
                    'ETS_MLS_ENABLE_NEXT_PREV' => array(
                        'label' => $this->l('Enable "Next"/"Prev" button'),
                        'type' => 'switch',                
                        'default' => 1, 
                        'values' => array(
                            array(
                                'label' => $this->l('Yes'),
                                'id' => 'slide_enabled_1',
                                'value' => 1,
                            ),
                            array(
                                'label' => $this->l('No'),
                                'id' => 'slide_enabled_0',
                                'value' => 0,
                                )
                            ),
                    ),
                    'ETS_MLS_ENABLE_PAGINATION' => array(
                        'label' => $this->l('Enable slider pagination buttons'),
                        'type' => 'switch',                
                        'default' => 0, 
                        'values' => array(
                            array(
                                'label' => $this->l('Yes'),
                                'id' => 'slide_enabled_1',
                                'value' => 1,
                            ),
                            array(
                                'label' => $this->l('No'),
                                'id' => 'slide_enabled_0',
                                'value' => 0,
                            )
                        ),  
                    ), 
                    'ETS_MLS_CUSTOM_CSS' => array(
						'type' => 'textarea',
						'label' => $this->l('Custom CSS'), 	
                        'desc' => $this->l('Custom color codes available').': [bg_color], [button_color]',				                      
					), 
            ),
        ); 
        if(!$this->multiLayoutExist())
        {
            unset(self::$layers['configs']['top_right']);
            unset(self::$layers['configs']['right']);
        }
    }
    public function installDb()
    {
        $dbExecuted =  
            Db::getInstance()->execute("
                CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ets_mls_slide` ( 
                `id_slide` INT(11) NOT NULL AUTO_INCREMENT ,
                `image` TEXT NOT NULL , 
                `repeat_x` INT(1) NOT NULL , 
                `repeat_y` INT(1) NOT NULL , 
                `sort_order` INT(11) NOT NULL , 
                `backgroud_color` VARCHAR(222) NOT NULL , 
                `custom_class` VARCHAR(100) DEFAULT NULL,
                `enabled` INT(1) NOT NULL , 
                `animation_in` VARCHAR(222) NOT NULL , 
                `animation_out` VARCHAR(222) NOT NULL , 
                PRIMARY KEY (`id_slide`)) ENGINE = InnoDB
            ")
            &&Db::getInstance()->execute("
                CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ets_mls_slide_lang` (
                  `id_slide` int(11) NOT NULL,
                  `id_lang` int(11) NOT NULL,
                  `title` varchar(500) NOT NULL
                )
            ")
            &&Db::getInstance()->execute("
                CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ets_mls_layer` ( 
                `id_layer` INT(11) NOT NULL AUTO_INCREMENT , 
                `id_slide` INT(11) NOT NULL , 
                `layer_type` VARCHAR(40) NOT NULL , 
                `font_size` FLOAT(10,2) NOT NULL ,
                `text_color` VARCHAR(40) NOT NULL,
                `custom_class` VARCHAR(150) NOT NULL, 
                `background_color` VARCHAR(40) NOT NULL,                
                `background_opacity` FLOAT(10,2) NOT NULL ,
                `font_family` VARCHAR(100) NOT NULL,
                `font_weight` VARCHAR(100) NOT NULL,
                `text_decoration` VARCHAR(100) NOT NULL,
                `text_transform` VARCHAR(100) NOT NULL,
                `padding` VARCHAR(100) NOT NULL, 
                `box_radius` INT(11) DEFAULT NULL,
                `top` FLOAT(10,2) NOT NULL , 
                `left` FLOAT(10,2) NOT NULL , 
                `right` FLOAT(10,2) NOT NULL,
                `top_right` FLOAT(10,2) NOT NULL,
                `animation_in` VARCHAR(100) NOT NULL, 
                `animation_out` VARCHAR(100) NOT NULL,                
                `width` VARCHAR(100) DEFAULT NULL,
                `height` VARCHAR(100) DEFAULT NULL,
                `sort_order` INT(11),
                `move_in` INT(11) NOT NULL , 
                `move_out` INT(11) NOT NULL ,
                `stand_duration` INT(11) NOT NULL ,
                `start_delay` INT(11) NOT NULL ,
                `image` varchar(222) not null,
                PRIMARY KEY (`id_layer`)) ENGINE = InnoDB
            ")
            &&Db::getInstance()->execute("
                CREATE TABLE IF NOT EXISTS `"._DB_PREFIX_."ets_mls_layer_lang` (
                  `id_layer` int(11) NOT NULL,
                  `id_lang` int(11) NOT NULL,
                  `content_layer` text NOT NULL,
                  `link` text
                )
            ");
            if($dbExecuted && @file_exists(dirname(__FILE__).'/data/init.data.zip') && is_readable(dirname(__FILE__).'/data/init.data.zip'))
            {
                $this->processImport(dirname(__FILE__).'/data/init.data.zip',true,false,true);
            }
            return $dbExecuted;
    }
    /**
	 * @see Module::install()
	 */
    public function install()
	{
        self::clearAllCache();
        self::clearUploadedImages();
        $config = new MLS_Config();
        $config->installConfigs();
        if($css = Configuration::get('ETS_MLS_CUSTOM_CSS'))
        {
            @file_put_contents(dirname(__FILE__).'/views/css/custom.cache.css',$css);
        }
        elseif(@file_exists(dirname(__FILE__).'/views/css/custom.cache.css'))
            @unlink(dirname(__FILE__).'/views/css/custom.cache.css');
        return parent::install()
	        && $this->registerHook('displayHeader')
	        && $this->registerHook('displayTopColumn')
	        && $this->registerHook('displayHome')
	        && $this->registerHook('displayBackOfficeHeader')
	        && $this->registerHook('displayMLSSlider')
	        && $this->registerHook('displayMLSSlide')
	        && $this->registerHook('displayMLSLayer')
	        && $this->registerHook('displayMLSLayerSort')
	        && $this->registerHook('displayMLSSlideInner')
	        && $this->registerHook('displayMLSConfigs')
	        && $this->registerHook('displayMLS')
        && $this->installDb();
    }
    /**
	 * @see Module::uninstall()
	 */
	public function uninstall()
	{
        self::clearAllCache();
        self::clearUploadedImages();
        return parent::uninstall() && $this->uninstallDb();
    }    
    public function getContent()
	{
	   $this->proccessPost();
       $this->requestForm();
       $this->context->controller->addJqueryUI('ui.sortable');
       $this->context->controller->addJqueryUI('ui.draggable');   
       $this->_html .= $this->displayAdminJs();	      
       $this->_html .= $this->renderForm(); 
       return $this->_html.$this->displayIframe();
    }
    public function displayIframe()
    {
        switch($this->context->language->iso_code) {
          case 'en':
            $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
            break;
          case 'it':
            $url = 'https://cdn.prestahero.com/it/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
            break;
          case 'fr':
            $url = 'https://cdn.prestahero.com/fr/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
            break;
          case 'es':
            $url = 'https://cdn.prestahero.com/es/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
            break;
          default:
            $url = 'https://cdn.prestahero.com/prestahero-product-feed?utm_source=feed_'.$this->name.'&utm_medium=iframe';
        }
        $this->smarty->assign(
            array(
                'url_iframe' => $url
            )
        );
        return $this->display(__FILE__,'iframe.tpl');
    }
    public function renderForm()
    {
        $slide = new MLS_Slide();
        $layer = new MLS_Layer();
        $config = new MLS_Config();
        $this->smarty->assign(array(
            'slideForm' =>$slide->renderForm(),
            'layerForm'=> $layer->renderForm(),
            'configForm' => $config->renderForm(),
            'url_base_img' => $this->_path.'views/img/upload/',
            'mmBaseAdminUrl' => $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name,          
            'layoutDirection' => $this->layoutDirection(),
            'mls_layout' => $this->context->language->is_rtl ? 'rtl' : 'ltr',
            'id_lang' => $this->context->language->id,
            'multiLayoutExist' => $this->multiLayoutExist()?true:false,  
            'mls_configs' => $this->getSliderConfigs(),  
            'width_slider' => Configuration::get('ETS_MLS_WIDTH_SLIDE') ? Configuration::get('ETS_MLS_WIDTH_SLIDE'): 1170,
            'height_slider' => Configuration::get('ETS_MLS_HEIGHT_SLIDE') ? Configuration::get('ETS_MLS_HEIGHT_SLIDE'):500,        
        ));        
        return $this->display(__FILE__,'admin-form.tpl');
    } 
    public function baseAdminUrl()
    {
        return $this->context->link->getAdminLink('AdminModules', true).'&configure='.$this->name;
    }
    public function proccessPost()
    {
        $this->alerts = array();
        $time = time();        
        if(Tools::isSubmit('mls_form_submitted') && ($mmObj = Tools::getValue('mls_object')) && in_array($mmObj,array('MLS_Slide','MLS_Layer')))
        {
            $obj = ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0 ? new $mmObj($itemId) : new $mmObj();
            $this->alerts = $obj->saveData(); 
            $vals = $obj->getFieldVals();     
            $processResult = array(
                'alert' => $this->displayAlerts($time),
                'itemId' => (int)$obj->id,
                'title' => property_exists($obj,'title') && isset($obj->title[(int)$this->context->language->id]) ? $obj->title[(int)$this->context->language->id] : false,
                'images' => $obj->id && property_exists($obj,'image') && $obj->image ? array(array(
                    'name' => 'image',
                    'url' => $this->_path.'views/img/upload/'.$obj->image,
                )) : false,
                'itemKey' => 'id_'.$obj->fields['form']['name'],
                'time' => $time,
                'mls_object' => $mmObj, 
                'vals' => $vals,
                'success' => isset($this->alerts['success']) && $this->alerts['success'],
            );
            if($mmObj == 'MLS_Layer' && (int)$obj->id)
            {
                $layer = $this->getLayers(false,(int)$obj->id);
                $processResult['sortLayerHtml'] = $this->hookDisplayMLSLayerSort(array('layer' => $layer));
                $processResult['layerHtmlLTR'] = $this->hookDisplayMLSLayer(array('layer' => $layer,'layout' => 'ltr'));
                $processResult['layerHtmlRTL'] = $this->hookDisplayMLSLayer(array('layer' => $layer,'layout' => 'rtl'));
                $processResult['font'] = $layer['font_family'] && $layer['font_family']!='Times new roman' && $layer['font_family']!='Arial' ? 'https://fonts.googleapis.com/css?family='.urlencode($layer['font_family']) : false;   
            }
            if($mmObj == 'MLS_Slide' && (int)$obj->id)
            {
                $slide = $this->getSlides(false,$obj->id);
                $processResult['slideHtml'] = $this->hookDisplayMLSSlide(array('slide' => $slide));
                $processResult['slideHtmlLTR'] = $this->hookDisplayMLSSlide(array('slide' => $slide,'layout' => 'ltr'));
                $processResult['slideHtmlRTL'] = $this->hookDisplayMLSSlide(array('slide' => $slide,'layout' => 'rtl')); 
            }                    
            die(json_encode($processResult));      
        }
        if(($image = Tools::getValue('deleteimage')) && ($mmObj = Tools::getValue('mls_object')) && in_array($mmObj,array('MLS_Slide','MLS_Layer')) && ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0)
        {
            $obj = new $mmObj($itemId);
            $this->alerts = $obj->clearImage('image');
            unset($image);
            die(json_encode(array(
                'alert' => $this->displayAlerts($time),
                'itemId' => (int)$obj->id,  
                'itemKey' => 'image',              
                'time' => $time,
                'mls_object' => $mmObj,
                'success' => isset($this->alerts['success']) && $this->alerts['success'],
            ))); 
        }
        if(($image = Tools::getValue('deleteobject')) && ($mmObj = Tools::getValue('mls_object')) && in_array($mmObj,array('MLS_Slide','MLS_Layer')) && ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0)
        {
            $obj = new $mmObj($itemId);
            $this->alerts = $obj->deleteObj();
            die(json_encode(array(
                'alert' => $this->displayAlerts($time),                           
                'time' => $time,
                'itemId' => $itemId,
                'success' => isset($this->alerts['success']) && $this->alerts['success'],
                'successMsg' => isset($this->alerts['success']) && $this->alerts['success'] ? $this->l('Item deleted') : false,
                'mls_object' => $mmObj,
            ))); 
        }
        if(Tools::isSubmit('duplicatedbject') && ($mmObj = Tools::getValue('mls_object')) && in_array($mmObj,array('MLS_Slide','MLS_Layer')) && ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0)
        {
            $obj = new $mmObj($itemId);  
            $newObj = $obj->duplicateItem(); 
            $result = array(
                'alert' => $this->displayAlerts($time),                           
                'time' => $time,
                'itemId' => $itemId,
                'newItemId' => $newObj->id ? $newObj->id : 0,                
                'success' => $newObj ? $this->l('Item duplicated') : false,
            );      
            if($mmObj=='MLS_Slide')
            {
                $result['html'] = $newObj->id ? $this->hookDisplayMLSSlide(array('slide' => $this->getSlides(false,$newObj->id),'layout'=>in_array(Tools::getValue('layout'),array('rtl','ltr')) ? Tools::getValue('layout') : 'ltr')) : '';
            } 
            if($mmObj=='MLS_Layer')
            {
                $result['layerHtml'] = $newObj->id ? $this->hookDisplayMLSLayer(array('layer' => $this->getLayers(false,$newObj->id),'layout'=>in_array(Tools::getValue('layout'),array('rtl','ltr')) ? Tools::getValue('layout') : 'ltr')) : '';
                $result['layerSortHtml'] = $newObj->id ? $this->hookDisplayMLSLayerSort(array('layer' => $this->getLayers(false,$newObj->id))) : '';
                $result['id_slide'] = $newObj->id_slide;
            }   
            die(json_encode($result)); 
        }
        if(Tools::isSubmit('mls_config_submitted'))
        {
            $config = new MLS_Config();
            
            $this->alerts = $config->saveData();
            if(isset($this->alerts['success']))
            {
                if(trim(Tools::getValue('ETS_MLS_CUSTOM_CSS')))
                {
                    @file_put_contents(dirname(__FILE__).'/views/css/custom.cache.css',str_replace(array('[bg_color]','[button_color]'),array(Configuration::get('ETS_MLS_SLIDER_BACKGROUND'),Configuration::get('ETS_MLS_SLIDER_BUTTON_COLOR')),trim(Tools::getValue('ETS_MLS_CUSTOM_CSS'))));
                }
                elseif(@file_exists(dirname(__FILE__).'/views/css/custom.cache.css'))
                    @unlink(dirname(__FILE__).'/views/css/custom.cache.css');                    
            }        
            die(json_encode(array(
                'alert' => $this->displayAlerts($time),                           
                'time' => $time, 
                'layout_direction' => $this->layoutDirection(),               
                'success' => isset($this->alerts['success']) && $this->alerts['success'],
                'configs' => $this->getSliderConfigs(true),
                'slider_width' => Configuration::get('ETS_MLS_WIDTH_SLIDE'),
                'slider_height' => Configuration::get('ETS_MLS_HEIGHT_SLIDE'),
                'slider_type' => Tools::strtolower(Configuration::get('ETS_MLS_SLIDER_TYPE')),
            ))); 
        }
        if(Tools::isSubmit('updateOrder'))
        {
            $itemId = (int)Tools::getValue('itemId');
            $objName = 'MLS_'.Tools::ucfirst(Tools::strtolower(trim(Tools::getValue('obj'))));
            $parentId = (int)Tools::getValue('parentId');
            $parentObjName = 'MLS_'.Tools::ucfirst(Tools::strtolower(trim(Tools::getValue('parentObj'))));
            $previousId = (int)Tools::getValue('previousId');  
            $layout = Tools::getValue('layout') =='rtl' ? 'rtl' : 'ltr';  
            $processResult = array();
            if(in_array($objName,array('MLS_Slide','MLS_Layer')) && $itemId > 0)
            {
                $obj = new $objName($itemId);
                $orderUpdated = $obj->updateOrder($previousId,$parentId);
                if($objName == 'MLS_Layer' && $parentId && $parentObjName=='MLS_Slide')
                {
                    $processResult['slideHtml'] = $this->hookDisplayMLSSlideInner(array('slide' => $this->getSlides(false,$parentId),'layout' => $layout));
                    $processResult['id_slide'] = $parentId;
                }
            }
            $processResult['success'] = isset($orderUpdated) && $orderUpdated;            
            die(json_encode($processResult));
        }
        if(Tools::isSubmit('updatePositionLayer'))
        {
            $itemId = (int)Tools::getValue('itemId');
            $objName = trim(Tools::getValue('obj'));
            if($objName=='MLS_Layer' && $itemId > 0)
            {
                if(Tools::getValue('layout')=='ltr')
                    $sql = 'UPDATE '._DB_PREFIX_.'ets_mls_layer SET `top`='.(float)Tools::getValue('data_top').', `left`='.(float)Tools::getValue('data_left').' WHERE id_layer='.(int)$itemId;
                else
                   $sql = 'UPDATE '._DB_PREFIX_.'ets_mls_layer SET `top_right`='.(float)Tools::getValue('data_top').', `right`='.(float)Tools::getValue('data_right').' WHERE id_layer='.(int)$itemId;
                die(json_encode(array(
                    'success' => Db::getInstance()->execute($sql),
                )));
            }            
        }        
        if(Tools::getValue('updateLayout'))
        {
            $layout = Tools::getValue('layout') == 'rtl' ? 'rtl' : 'ltr';
            die(json_encode(array(
                'html' => $this->hookDisplayMLSSlider(array('layout' => $layout)),
                'currentSlideId' => (int)Tools::getValue('currentSlideId'),
                'success' => true,
                'layout' => $layout,
            )));
        }
        if(Tools::getValue('loadSlider'))
        {
            die(json_encode(array(
                'html' => $this->displaySlideFrontend(array('layout' => Tools::getValue('layout') == 'rtl' ? 'rtl' : 'ltr','backend_load' => true)),                
                'success' => true,
            )));
        }
        if(Tools::getValue('exportSlider'))
        {
            $this->generateArchive();
            die;
        }
        if(Tools::getValue('importslider'))
        {
            $errors = $this->processImport();   
            die(json_encode(array(
                'success' => !$errors ? $this->l('Slider was successfully imported. This page will be reloaded in 3 seconds') : false, 
                'error' => $errors ? implode('; ',$errors) : false,
            )));         
        }
    }
    public function processImport($zipfile = false,$clearData = false,$theme_default_items = array(),$initData = false)
    {
        $errors = array();
        if(!$zipfile)
        {
            $savePath = dirname(__FILE__).'/cache/';
            if(@file_exists($savePath.'mls_slider.data.zip'))
                @unlink($savePath.'mls_slider.data.zip');
            $uploader = new Uploader('sliderdata');
            $uploader->setCheckFileSize(false);
            $uploader->setAcceptTypes(array('zip'));        
            $uploader->setSavePath($savePath);
            $file = $uploader->process('mls_slider.data.zip'); 
            if ($file[0]['error'] === 0) {
                if (!Tools::ZipTest($savePath.'mls_slider.data.zip')) 
                    $errors[] = $this->l('Zip file seems to be broken');
            } else {
                $errors[] = $file[0]['error'];
            }
            $extractUrl = $savePath.'mls_slider.data.zip';
        }
        else      
            $extractUrl = $zipfile;
        if(!@file_exists($extractUrl))
            $errors[] = $this->l('Zip file doesn\'t exist');
        if(!$errors)
        {
            $zip = new ZipArchive();
            if($zip->open($extractUrl) === true)
            {
                if ($zip->locateName('Slider-Info.xml') === false)
                {
                    $errors[] = $this->l('Slider-Info.xml doesn\'t exist');                    
                    if($extractUrl && !$zipfile)
                    {
                        @unlink($extractUrl);                        
                    }                      
                }
            }
            else
                $errors[] = $this->l('Cannot open zip file. It might be broken or damaged');
        } 
        if(!$errors)
        {
            if((Tools::isSubmit('importoverride') || $clearData) && $zip->locateName('Data.xml') !== false)
            {
                Db::getInstance()->execute("DELETE FROM "._DB_PREFIX_."ets_mls_layer_lang");
                Db::getInstance()->execute("DELETE FROM "._DB_PREFIX_."ets_mls_layer");
                Db::getInstance()->execute("DELETE FROM "._DB_PREFIX_."ets_mls_slide_lang");
                Db::getInstance()->execute("DELETE FROM "._DB_PREFIX_."ets_mls_slide");
                self::clearUploadedImages();
            }
            if(!Tools::ZipExtract($extractUrl, dirname(__FILE__).'/views/'))
                $errors[] = $this->l('Cannot extract zip data');
            if(!@file_exists(dirname(__FILE__).'/views/Data.xml') && !@file_exists(dirname(__FILE__).'/views/Config.xml'))
                $errors[] = $this->l('Neither Data.xml nor Config.xml exist');
        } 
        if(!@file_exists(dirname(__FILE__).'/views/Slider-Info.xml'))  
            $errors[] = $this->l('Slider-Info.xml doesn\'t exist in "views/" folder');    
        if(!$errors)
        {            
            if(@file_exists(dirname(__FILE__).'/views/Data.xml'))
            {                
                if($theme_default_items)
                {
                    $this->importXmlTbl(@simplexml_load_file(dirname(__FILE__).'/views/Data.xml'),$theme_default_items);
                }   
                elseif($initData)
                {
                    $info = @simplexml_load_file(dirname(__FILE__).'/views/Slider-Info.xml');
                    $this->importXmlTbl(@simplexml_load_file(dirname(__FILE__).'/views/Data.xml'),$info && isset($info['theme_default_items']) && $info['theme_default_items'] ? explode(',',(string)$info['theme_default_items']) : false);
                }
                else
                    $this->importXmlTbl(@simplexml_load_file(dirname(__FILE__).'/views/Data.xml'));
                @unlink(dirname(__FILE__).'/views/Data.xml');
            } 
            if(@file_exists(dirname(__FILE__).'/views/Config.xml'))
            {
                $this->importXmlConfig(@simplexml_load_file(dirname(__FILE__).'/views/Config.xml'));
                @unlink(dirname(__FILE__).'/views/Config.xml');
            } 
            if(@file_exists(dirname(__FILE__).'/views/Slider-Info.xml'))
                @unlink(dirname(__FILE__).'/views/Slider-Info.xml');               
        }
        return $errors;        
    }
    private function importXmlConfig($xml)
    {
        if(!$xml)
            return false;
        $languages = Language::getLanguages(false);          
        foreach(self::$configs['configs'] as $key => $config)
        {
            if(property_exists($xml,$key))
            {
                if(isset($config['lang']) && $config['lang'])
                {
                    $temp = array();
                    foreach($languages as $lang)
                    {
                        $node = $xml->$key;
                        $temp[$lang['id_lang']] = isset($node['configValue']) ? (string)$node['configValue'] : (isset($config['default']) ? $config['default'] : '');
                    }
                    Configuration::updateValue($key,$temp);
                }
                else
                {
                    $node = $xml->$key;
                    Configuration::updateValue($key,isset($node['configValue']) ? (string)$node['configValue'] : (isset($config['default']) ? $config['default'] : ''));
                }                   
            }
        }        
        if(isset($xml->ETS_MLS_CUSTOM_CSS) && ($node = $xml->ETS_MLS_CUSTOM_CSS) && isset($node['configValue']) && trim((string)$node['configValue']))
            @file_put_contents(dirname(__FILE__).'/views/css/custom.cache.css',str_replace(array('[bg_color]','[button_color]'),array(Configuration::get('ETS_MLS_SLIDER_BACKGROUND'),Configuration::get('ETS_MLS_SLIDER_BUTTON_COLOR')),trim((string)$node['configValue'])));
        elseif(@file_exists(dirname(__FILE__).'/views/css/custom.cache.css'))
            @unlink(dirname(__FILE__).'/views/css/custom.cache.css');
    }
    private function importXmlTbl($xml,$activeIds = array())
    {
        if(!$xml)
            return false;
        $id_slide = 0;
        if($xml && property_exists($xml,'slide') && $xml->slide)
        {
            foreach($xml->children() as $slide)
            {                
                if(($attr = $slide->attributes()) && ($id_slide = $this->addObj('slide',$attr,$activeIds)))
                {
                    if($slide->layers->children())
                    {
                        foreach($slide->layers->children() as $layer)
                        {                            
                            if($attr2 = $layer->attributes())
                            {                                
                                $attr2->id_slide = $id_slide;                                
                                $this->addObj('layer',$attr2);
                            }
                        }
                    }                
                }                
            }
        }
    }    
    private function addObj($obj, $data,$activeIds = array())
    {
        $realOjbect = ($obj == 'slide' ? new MLS_Slide() : new MLS_Layer());
        $languages = Language::getLanguages(false);
        $attrs = ($obj == 'slide' ? self::$slides : self::$layers);        
        foreach($attrs['configs'] as $key => $val)
        {
            if(isset($val['lang']) && $val['lang'])
            {
                $temp = array();
                foreach($languages as $lang)
                {                    
                    $temp[$lang['id_lang']] = isset($data[$key]) ? (string)$data[$key] : (isset($val['default']) ? $val['default'] : '');                    
                }
                $realOjbect->$key = $temp;
            }
            else
            {
                if($data[$key])
                    $realOjbect->$key = (string)$data[$key];
                elseif(isset($val['default']))
                    $realOjbect->$key = $val['default'];
                else
                    $realOjbect->$key = '';
            }
        }        
        if($activeIds && isset($data['id_slide']) && !in_array($data['id_slide'],$activeIds))
            $realOjbect->enabled = 0;
        if($realOjbect->add())
            return $realOjbect->id;                        
        return false;
    }
    private function archiveThisFile($obj, $file, $server_path, $archive_path, $greyOutImage = false)
    {
        if (is_dir($server_path.$file)) {
            $dir = scandir($server_path.$file);
            foreach ($dir as $row) {
                if ($row[0] != '.') {
                    $this->archiveThisFile($obj, $row, $server_path.$file.'/', $archive_path.$file.'/', $greyOutImage);
                }
            }
        } 
        elseif($greyOutImage && is_file($server_path.$file) && ($extension = pathinfo($server_path.$file, PATHINFO_EXTENSION)) && ($extension=='png' || $extension=='jpg'))
        {
            $tempDir = dirname(__FILE__).'/data/temp/';
            $greyImage = $tempDir.$file;
            $this->greyOutImage($server_path.$file,$tempDir);        
            if(file_exists($greyImage))
            {
                $obj->addFile($greyImage, $archive_path.$file);
            }            
        }
        else $obj->addFile($server_path.$file, $archive_path.$file);
    } 
    public function greyOutImage($src,$descDir)
    {
        if(!file_exists($src) || !is_dir($descDir))
            return;
        $name = basename($src);
        $extension = pathinfo($src, PATHINFO_EXTENSION);
        if(file_exists($descDir.$name))
            @unlink($descDir.$name);
        if($extension == 'png' || $extension=='jpg')
        {
            $img = ($extension=='jpg' ? imagecreatefromjpeg($src) : imagecreatefrompng($src)); 
            $grey = imagecolorallocate($img, 235, 235, 235);
            $width = imagesx($img);
            $height = imagesy($img);
            imagefilledrectangle($img, 0, 0, $width, $height, $grey);
            
            //Add sizing text
            $font = dirname(__FILE__).'/views/fonts/Montserrat-Bold.ttf';
            $font_size = 30;
            $angle = 45;
            $text = $width.' X '.$height;
            $text_box = imagettfbbox($font_size,$angle,$font,$text);
            $text_width = $text_box[2]-$text_box[0];
            $text_height = $text_box[7]-$text_box[1];
            $grey = imagecolorallocate($img, 160, 160, 160);
            // Calculate coordinates of the text
            $x = ($width/2) - ($text_width/2)-30;
            $y = ($height/2) - ($text_height/2);
            
            // Add some shadow to the text
            imagettftext($img, $font_size, 0, $x, $y, $grey, $font, $text);            
            
            if($extension=='jpg')
                imagejpeg($img, $descDir.$name);
            else
                imagepng($img, $descDir.$name);
        }
        else
            @copy($src,$descDir.$name);
    }   
    public function renderConfigXml()
    {        
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!-- Copyright ETS-Soft --><config></config>');            
        if($configs = $this->getSliderConfigs())
        {
            foreach($configs as $key => $val)
            {
                $config = $xml->addChild($key);
                $config->addAttribute('configValue',Configuration::get($key, isset($val['lang']) && $val['lang'] ? (int)Configuration::get('PS_LANG_DEFAULT') : null));   
            }            
        }
        return $xml->asXML();
    }
    public function renderSliderDataXml()
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!-- Copyright ETS-Soft --><slides></slides>');            
        
        if($slides = $this->getSlides(false,false,(int)Configuration::get('PS_LANG_DEFAULT')))
        {
            foreach($slides as $slide)
            {                
                $slideNode = $xml->addChild('slide');
                $slideNode->addAttribute('obj','MLS_Slide');
                $layersNode = $slideNode->addChild('layers');                 
                if(isset($slide['layers']) && $slide['layers'])
                {
                    foreach($slide['layers'] as $layer)
                    {
                            $layerNode = $layersNode->addChild('layer');
                            $layerNode->addAttribute('obj','MLS_Layer');
                            foreach($layer as $key=>$val)
                            {
                                if($key!='id_layer')
                                    $layerNode->addAttribute($key,$val);
                            }
                    }
                }
                foreach($slide as $field => $val)
                {                    
                    $slideNode->addAttribute($field,$val);                   
                    
                }                   
            }            
        }
        return $xml->asXML();
    }
    public function renderInfoXml()
    {        
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!-- Copyright ETS-Soft --><info></info>'); 
        $xml->addAttribute('export_time',date('l jS \of F Y h:i:s A'));
        $xml->addAttribute('export_source',$this->context->link->getPageLink('index', Configuration::get('PS_SSL_ENABLED')));
        $xml->addAttribute('module_version',$this->version); 
        if(class_exists('ybc_themeconfig') && ($tc = new Ybc_themeconfig()) && $tc->devMode)
        {
            $defaultLayout = isset($tc->configs['YBC_TC_LAYOUT']['default']) ? $tc->configs['YBC_TC_LAYOUT']['default'] : false;                  
            $xml->addAttribute('theme_default_items',$defaultLayout ? implode(',',$tc->getLayoutConfiguredField('slides',$defaultLayout)) : '');
        }       
        return $xml->asXML();
    }
    public function generateArchive($savePath = false,$greyOutImage = false)
    {
        $zip = new ZipArchive();
        $cacheDir = dirname(__FILE__).'/cache/';
        $zip_file_name = 'mls_slider_'.date('dmYHis').'.zip';
        if ($zip->open($cacheDir.$zip_file_name, ZipArchive::OVERWRITE | ZipArchive::CREATE) === true) {
            if (!$zip->addFromString('Slider-Info.xml', $this->renderInfoXml())) {
                $this->errors[] = $this->l('Cannot create Menu-Info.xml');
            }
            if (!$zip->addFromString('Config.xml', $this->renderConfigXml())) {
                $this->errors[] = $this->l('Cannot create config xml file.');
            }
            if (!$zip->addFromString('Data.xml', $this->renderSliderDataXml())) {
                $this->errors[] = $this->l('Cannot create data xml file.');
            }
            $this->archiveThisFile($zip,'upload', dirname(__FILE__).'/views/img/', 'img/',$greyOutImage);
            $zip->close();

            if (!is_file($cacheDir.$zip_file_name)) {
                $this->errors[] = $this->l(sprintf('Could not create %1s', _PS_CACHE_DIR_.$zip_file_name));
            }
            if($greyOutImage && ($files = glob(dirname(__FILE__).'/data/temp/*')))
            {
                foreach($files as $file)
                    if(@file_exists($file) && strpos($file,'index.php')===false)
                        @unlink($file);
            }
            if (!$this->errors) {
                if($savePath)
                {
                    if(@file_exists($savePath) && is_file($savePath))
                        @unlink($savePath);
                    $copied = @copy($cacheDir.$zip_file_name,$savePath);
                    @unlink($cacheDir.$zip_file_name);
                    return $copied;
                }
                
                if (ob_get_length() > 0) {
                    ob_end_clean();
                }

                ob_start();
                header('Pragma: public');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Cache-Control: public');
                header('Content-Description: File Transfer');
                header('Content-type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.$zip_file_name.'"');
                header('Content-Transfer-Encoding: binary');
                ob_end_flush();
                readfile($cacheDir.$zip_file_name);
                @unlink($cacheDir.$zip_file_name);
                exit;
            }
        }
        {
            if($savePath)
                return false;
            echo $this->l('An error occurred during the archive generation');
            die;
        }
    }
    public function requestForm()
    {
        if(Tools::isSubmit('request_form') && ($mmObj = Tools::getValue('mls_object')) && in_array($mmObj,array('MLS_Slide','MLS_Layer')))
        {
            $obj = ($itemId = (int)Tools::getValue('itemId')) && $itemId > 0 ? new $mmObj($itemId) : new $mmObj();
            die(json_encode(array(
                'form' => $obj->renderForm(),
                'itemId' => $itemId,
            )));
        }
    }
    public function displayAdminJs()
    {
        $this->smarty->assign(array(
            'js_dir_path' => $this->_path.'views/js/',
        ));
        return $this->display(__FILE__,'admin-js.tpl');
    }
    public function displayAlerts($time)
    {
        $this->smarty->assign(array(
            'alerts' => $this->alerts,
            'time' => $time,
        ));
        return $this->display(__FILE__,'admin-alerts.tpl');
    }
    private function renderOrderString($ids)
    {
        $argIds = explode(',',$ids);
        $str = '';
        if($argIds)
        {            
            foreach($argIds as $id)
            {                
                $str .= ' p.id_product='.(int)$id.' DESC,';
            }
        }
        return trim($str,',');
    }
    public function hookDisplayHeader()
    {
        $this->addGoogleFonts(true);
        $this->context->controller->addCSS($this->_path.'views/css/multilayerslider.css');
        if(@file_exists(dirname(__FILE__).'/views/css/custom.cache.css'))
            $this->context->controller->addCSS($this->_path.'views/css/custom.cache.css');
        $this->context->controller->addCSS($this->_path.'views/css/animate.css');
        if($this->is17){
                $this->context->controller->addCSS($this->_path.'views/css/fix17.css');
        }
        $this->context->controller->addJS($this->_path.'views/js/mls_slider.pack.js');
        $this->context->controller->addJS($this->_path.'views/js/multilayerslider.js');        
        
    }
    public function hookDisplayBackOfficeHeader()
    {
        $configure = Tools::getValue('configure');
        $controller = Tools::getValue('controller');
        if(!($controller =='AdminModules' && $configure == $this->name))
            return '';
        $this->addGoogleFonts();
        $this->context->controller->addCSS($this->_path.'views/css/multilayerslider-admin.css');
        $this->context->controller->addCSS($this->_path.'views/css/animate.css');
        $this->context->controller->addCSS($this->_path.'views/css/mlsslider.pack.backend.css');
        if($this->is17){
                $this->context->controller->addCSS($this->_path.'views/css/fix17_bo.css');
        }
    }
    public function addGoogleFonts($frontend = false)
    {
        if($fonts = Db::getInstance()->executeS("SELECT DISTINCT font_family FROM "._DB_PREFIX_."ets_mls_layer"))
        { 
            $ik = 0;
            foreach($fonts as $font)
            {
                if($font['font_family'] && $font['font_family']!='Times new roman' && $font['font_family']!='Arial')
                {
                    $ik++;
                    if($this->is17 && $frontend)
                        $this->addCss17('https://fonts.googleapis.com/css?family='.urlencode($font['font_family']),'mls_gfont_'.$ik,false);
                    else
                        $this->context->controller->addCSS('https://fonts.googleapis.com/css?family='.urlencode($font['font_family']));   
                }                
            }
        }
    }
    public function addCss17($cssFile,$id = false,$local = true)
    {
        $this->context->controller->registerStylesheet($id ? $id : '', $cssFile, array('media' => 'all', 'priority' => 150,'server' => $local ? 'local' : 'remote'));
    }
    public function strToIds($str)
    {
        $ids = array();
        if($str && ($arg = explode(',',$str)))
        {
            foreach($arg as $id)
                if(!in_array((int)$id, $ids))
                    $ids[] = (int)$id;
        }
        return $ids;
    }    
    public static function clearAllCache()
    {
        if(@file_exists(dirname(__FILE__).'/views/css/custom.cache.css'))
            @unlink(dirname(__FILE__).'/views/css/custom.cache.css');
        if($files = glob(dirname(__FILE__).'/cache/*'))
        {
            foreach($files as $file)
                if(@file_exists($file) && strpos($file,'index.php')===false)
                    @unlink($file);
        }
    }   
    public static function clearUploadedImages()
    {
        if(@file_exists(dirname(__FILE__).'/views/img/upload/') && ($files = glob(dirname(__FILE__).'/views/img/upload/*')))
        {
            foreach($files as $file)
                if(@file_exists($file) && strpos($file,'index.php')===false)
                    @unlink($file);
        }
    } 
    public function translates()
    {
        self::$trans = array(
            'required_text' => $this->l('is required'),
            'data_saved' => $this->l('Saved'),
            'unkown_error' => $this->l('Unknown error happens'),
            'object_empty' => $this->l('Object is empty'),
            'field_not_valid' => $this->l('Field is not valid'),  
            'file_too_large' => $this->l('Upload file cannot be large than 100MB'),   
            'file_existed' => $this->l('File name already exists. Try to rename the file and upload again'),
            'can_not_upload' => $this->l('Cannot upload file'), 
            'upload_error_occurred' => $this->l('An error occurred during the image upload process.'),   
            'image_deleted' => $this->l('Image deleted'),     
            'item_deleted' => $this->l('Item deleted'),
            'cannot_delete' => $this->l('Cannot delete the item due to an unknown technical problem'),
            'invalid_text' => $this->l('is invalid'),
            
            'content_required_text' => $this->l('Text content is required'),
            'link_required_text' => $this->l('Link is required'),
            'image_required_text' => $this->l('Image is required'),
            'layer_type_not_valid' => $this->l('Layer type is not valid'),    
        );
    }    
    public function modulePath()
    {
        return $this->_path;
    }
    public function layoutDirection()
    {        
        return $this->context->language->is_rtl ? 'ets-dir-rtl' : 'ets-dir-ltr';   
    }    
    public function uninstallDb()
    {
        return
            Db::getInstance()->execute("DROP TABLE IF EXISTS "._DB_PREFIX_."ets_mls_slide")
            &&Db::getInstance()->execute("DROP TABLE IF EXISTS "._DB_PREFIX_."ets_mls_slide_lang")
            && Db::getInstance()->execute("DROP TABLE IF EXISTS "._DB_PREFIX_."ets_mls_layer")
            && Db::getInstance()->execute("DROP TABLE IF EXISTS "._DB_PREFIX_."ets_mls_layer_lang");
    }
    public function getSlides($active=false,$id_slide = false,$id_lang = false)
    {
        $where = '';
        if(class_exists('ybc_themeconfig') && isset($this->context->controller->controller_type) && $this->context->controller->controller_type=='front')
        {
            $tc = new Ybc_themeconfig();
            if($tc->devMode && ($ids = $tc->getLayoutConfiguredField('slides')))
            {
                $where = ' AND s.id_slide IN('.implode(',',$ids).') ';
            }            
        }
        $slides = Db::getInstance()->executeS('
            select s.*,sl.title 
            FROM '._DB_PREFIX_.'ets_mls_slide s 
            LEFT JOIN '._DB_PREFIX_.'ets_mls_slide_lang sl on (s.id_slide =sl.id_slide and sl.id_lang='.($id_lang ? (int)$id_lang : (int)$this->context->language->id).')
            WHERE 1 '.($active ? ' AND s.enabled=1' : '').($id_slide ? ' AND s.id_slide='.(int)$id_slide : '').$where.' 
            ORDER BY s.sort_order');
        if($slides)
            foreach($slides as &$slide)
            {                
                if($slide['image'])
                    $slide['link_img'] =$this->_path.'views/img/upload/'.$slide['image'];
                else
                    $slide['link_img']='';                
                $slide['layers'] = $this->getLayers($slide['id_slide']);
                $slide['max_layer_in'] = $this->maxLayerIn($slide['id_slide']);
                $slide['max_layer_out'] = $this->maxLayerOut($slide['id_slide']);
            }             
        if($id_slide && $slides)
            return $slides[0];
        return $slides;
    }
    public function maxLayerIn($id_slide)
    {
        return (int)Db::getInstance()->getValue("SELECT max(move_in+start_delay) FROM "._DB_PREFIX_."ets_mls_layer WHERE id_slide=".(int)$id_slide);
    }
    public function maxLayerOut($id_slide)
    {
        return (int)Db::getInstance()->getValue("SELECT max(move_out+stand_duration) FROM "._DB_PREFIX_."ets_mls_layer WHERE id_slide=".(int)$id_slide);
    }
    public function maxSlideTime()
    {        
        return (int)Db::getInstance()->getValue("SELECT max(l.move_in+l.start_delay) FROM "._DB_PREFIX_."ets_mls_layer l JOIN "._DB_PREFIX_."ets_mls_slide s ON l.id_slide=s.id_slide WHERE s.enabled=1")
                + (int)Db::getInstance()->getValue("SELECT max(l.move_out+l.stand_duration) FROM "._DB_PREFIX_."ets_mls_layer l JOIN "._DB_PREFIX_."ets_mls_slide s ON l.id_slide=s.id_slide WHERE s.enabled=1");
    }
    public function getLayers($id_slide = false, $id_layer = false)
    {
        $layers = Db::getInstance()->executeS('
            SELECT l.*,ll.content_layer,ll.link 
            FROM '._DB_PREFIX_.'ets_mls_layer l 
            LEFT JOIN '._DB_PREFIX_.'ets_mls_layer_lang ll ON (l.id_layer=ll.id_layer and ll.id_lang='.(int)$this->context->language->id.') 
            WHERE 1 '.($id_slide ? ' AND l.id_slide='.(int)$id_slide : '').($id_layer ? ' AND l.id_layer='.(int)$id_layer : '').' 
            ORDER BY l.sort_order'
        );
        if($layers)
        foreach($layers as &$layer)
        {
            $layer['link_image'] = $this->_path.'views/img/upload/'.$layer['image'];
        }
        if($id_layer && $layers)
            return $layers[0];
        return $layers;
    }
    public function multiLayoutExist()
    {
        return Db::getInstance()->getRow("SELECT id_lang FROM "._DB_PREFIX_."lang WHERE is_rtl=0 AND active=1") && Db::getInstance()->getRow("SELECT id_lang FROM "._DB_PREFIX_."lang WHERE is_rtl=1 AND active=1");
    }
    public function hex2rgb($hex,$opacity = false) {
       if(!Validate::isColor($hex))
            return $hex;
       $hex = str_replace("#", "", $hex);    
       if(Tools::strlen($hex) == 3) {
          $r = hexdec(Tools::substr($hex,0,1).Tools::substr($hex,0,1));
          $g = hexdec(Tools::substr($hex,1,1).Tools::substr($hex,1,1));
          $b = hexdec(Tools::substr($hex,2,1).Tools::substr($hex,2,1));
       } else {
          $r = hexdec(Tools::substr($hex,0,2));
          $g = hexdec(Tools::substr($hex,2,2));
          $b = hexdec(Tools::substr($hex,4,2));
       }
       return 'rgba('.$r.','.$g.','.$b.($opacity ? ','.$opacity : '').')';
    }
    public function getPositionLayer(){
        
        $layers = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'ets_mls_layer');
        die(json_encode($layers));
    }
    public function getSliderConfigs($forJs = false)
    {
        $configs = array();
        foreach(self::$configs['configs'] as $key => $val)
        {
            if($forJs)
                $configKey = 'data-'.Tools::strtolower(str_replace('_','-',str_replace('ETS_MLS_','',$key)));
            else
                $configKey = $key;
            $configs[$configKey] = Tools::strtolower(Configuration::get($key,isset($val['lang']) && $val['lang'] ? $this->context->language->id : null));
        }
        return $configs;
    }  
    public function displaySlideFrontend($params)
    {
        if (!isset($params['backend_load']) && (!isset($this->context->controller->php_self) || $this->context->controller->php_self != 'index'))
			return;
		$this->smarty->assign(
            array(
                'mls_slides' => $this->getSlides(true),
                'mls_img_base_dir' => $this->_path.'views/img/',
                'mls_layout' => isset($params['layout']) && in_array($params['layout'],array('rtl','ltr')) ? $params['layout'] : ($this->context->language->is_rtl && $this->multiLayoutExist() ? 'rtl' : 'ltr'),
                'mls_multilayout' => $this->multiLayoutExist() ? true : false,
                'mls_width' => Configuration::get('ETS_MLS_WIDTH_SLIDE') ? Configuration::get('ETS_MLS_WIDTH_SLIDE') : 1170,
                'mls_height' => Configuration::get('ETS_MLS_HEIGHT_SLIDE') ? Configuration::get('ETS_MLS_HEIGHT_SLIDE') : 500,
                'mls_configs' => $this->getSliderConfigs(),
                'mls_max_slide_time' => $this->maxSlideTime()+(int)Configuration::get('ETS_MLS_MOVE_IN')+(int)Configuration::get('ETS_MLS_MOVE_OUT'),
                'mls_backend_load' => isset($params['backend_load']),
            )
        );	
		return $this->display(__FILE__, 'multilayerslider.tpl');
    }  
	public function hookDisplayTopColumn($params)
	{
        if(!$this->is17 && Configuration::get('ETS_MLS_HOOK_TO')!='customhook')
            return $this->displaySlideFrontend($params);
	}
	public function hookDisplayHome($params)
	{	   
		if($this->is17 && Configuration::get('ETS_MLS_HOOK_TO')!='customhook')
            return $this->displaySlideFrontend($params);
	}
    public function hookDisplayMLS($params)
	{	   
		if(Configuration::get('ETS_MLS_HOOK_TO')=='customhook')
            return $this->displaySlideFrontend($params);
	}
    public function hookDisplayMLSSlider($params)
    {        
        $this->smarty->assign(array(
            'slides' => $this->getSlides(),
            'mls_layout' => isset($params['layout']) ? $params['layout'] : 'ltr',            
        ));        
        return $this->display(__FILE__,'item-slider.tpl');
    }    
    public function hookDisplayMLSSlide($params)
    {       
        
        $this->smarty->assign(array(
            'slide' => isset($params['slide']) ? $params['slide'] : false,
            'mls_layout' => isset($params['layout']) ? $params['layout'] : 'ltr',            
        ));
        return $this->display(__FILE__,'item-slide.tpl');
    } 
    public function hookDisplayMLSSlideInner($params)
    {
        $this->smarty->assign(array(
            'slide' => isset($params['slide']) ? $params['slide'] : false,
            'mls_layout' => isset($params['layout']) ? $params['layout'] : 'ltr',
            'sliderWidth' => Configuration::get('ETS_MLS_WIDTH_SLIDE') ? Configuration::get('ETS_MLS_WIDTH_SLIDE'): 1170,
            'sliderHeight' => Configuration::get('ETS_MLS_HEIGHT_SLIDE') ? Configuration::get('ETS_MLS_HEIGHT_SLIDE'):500,
        ));
        return $this->display(__FILE__,'item-slide-inner.tpl');
    }
    public function hookDisplayMLSLayer($params)
    {        
        if(isset($params['layer']['layer_type']) && $params['layer']['layer_type']=='text_background' && isset($params['layer']['background_opacity']) && (float)$params['layer']['background_opacity']<1)
        {
            $params['layer']['background_color'] = $this->hex2rgb($params['layer']['background_color'],$params['layer']['background_opacity']);   
        }        
        $this->smarty->assign(array(
            'layer' => isset($params['layer']) ? $params['layer'] : false,
            'mls_layout' => isset($params['layout']) ? $params['layout'] : 'ltr',
            'mls_multilayout' => $this->multiLayoutExist() ? true : false,
        ));
        return $this->display(__FILE__,'item-layer.tpl');
    }
    public function hookDisplayMLSLayerSort($params)
    {
        $this->smarty->assign(array(
            'layer' => isset($params['layer']) ? $params['layer'] : false,
        ));
        return $this->display(__FILE__,'item-layer-sort.tpl');
    }
    public function hookDisplayMLSConfigs()
    {
        $configStr = '';
        if($configs = $this->getSliderConfigs())
        {
            foreach($configs as $key => $val)
            {
                if($key!='ETS_MLS_CUSTOM_CSS')
                {
                    $configStr .= 'data-'.Tools::strtolower(str_replace('_','-',str_replace('ETS_MLS_','',$key))).'="'.Tools::strtolower($val).'" ';
                }
            }
        }  
        return $configStr;  
    }
}