<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UnifyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        //Web Fonts
        '//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin',
        //CSS Global Compulsory
        'unify/css/bootstrap/css/bootstrap.min.css',
        'unify/css/style.css',
        //CSS Header and Footer
        'unify/css/headers/header-default.css',
        'unify/css/footers/footer-v1.css',
        //CSS Implementing Plugins
        'unify/css/animate.css',
        'unify/css/line-icons/line-icons.css',
        'unify/css/font-awesome/css/font-awesome.min.css',
        'unify/css/scrollbar/css/jquery.mCustomScrollbar.css',
        'unify/css/sky-forms-pro/skyforms/css/sky-forms.css',
        'unify/css/sky-forms-pro/skyforms/custom/custom-sky-forms.css',
        //CSS Page Style
        'unify/css/pages/profile.css',
        //CSS Customization
        'unify/css/custom.css',
        //'http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css',
        'unify/css/morris/morris.css',
        'unify/css/morris/example.css',
    ];
    public $js = [
        //'unify/js/jquery/jquery.min.js',
        'unify/js/jquery/jquery-migrate.min.js',
        'unify/js/bootstrap/js/bootstrap.min.js',
        //JS Implementing Plugins
        'unify/js/back-to-top.js',
        'unify/js/smoothScroll.js',
        'unify/js/counter/waypoints.min.js',
        'unify/js/counter/jquery.counterup.min.js',
        'unify/js/sky-form-pro/js/jquery-ui.min.js',
        'unify/js/scrollbar/js/jquery.mCustomScrollbar.concat.min.js',
        //JS Customization
        'unify/js/custom.js',
        //JS Page Level
        'unify/js/app.js',
        'unify/js/datepicker.js',
        // morris chart
        'http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js',
        'http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js',
        'unify/js/morris/morris.js',
        'unify/js/morris/example.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
