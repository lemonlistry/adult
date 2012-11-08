<?php
/**
 * Built-in client script packages.
 *
 * Please see {@link CClientScript::packages} for explanation of the structure
 * of the returned array.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
return array(
    'jquery' => array(
        'js' => array(YII_DEBUG ? 'js/jquery.js' : 'js/jquery.min.js'),
    ),
    'jquery.ui' => array(
        'js' => array('js/jquery-ui.min.js', 'js/jquery-ui-timepicker-addon.js'),
        'css' => array('css/jui/jquery.ui.all.css'),
        'depends' => array('jquery'),
    ),
    'platform' => array(
        'js' => array('js/zDrag.js', 'js/zDialog.js', 'js/common.js', 'js/zzbegin.js'),
        'css' => array('css/global.css'),
    ),
    'cookie' => array(
        'js' => array('js/jquery.cookie.js'),
        'depends' => array('jquery'),
    ),
    'treeview' => array(
        'js' => array('js/jquery.treeview.js', 'js/jquery.treeview.edit.js', 'js/jquery.treeview.async.js'),
        'css' => array('css/itree/itree.css'),
        'depends' => array('jquery', 'cookie'),
    ),
);
