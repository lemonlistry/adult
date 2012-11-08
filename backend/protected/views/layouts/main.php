<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="zh-CN" />
    <title><?php echo Yii::app()->name; ?></title>
    <?php
        Yii::app()->clientScript->registerCoreScript('jquery.ui');
        Yii::app()->clientScript->registerCoreScript('platform');
    ?>
</head>
<body style="min-width: 1000px; background:#F9FCFF">
    <header id="page_header">
        <div class="logo-panel"><a class="logo" href="/"><?php echo Yii::app()->name; ?></a></div>
        <div id="welcome">  欢迎您，<?php echo Yii::app()->user->name; ?>！<?php echo Html5::link('更改密码', array('/passport/default/updatepassword'), array('class' => 'js-dialog-link')); ?> &nbsp; <a href="<?php echo $this->createUrl('/passport/default/logout'); ?>">退出</a></div>
        <nav class="menu">
            <ul>
                <?php
                    foreach ($this->menu as $k => $v) {
                        $index_arr = explode('/', $k);
                        $index = 'r=' . $index_arr[1];
                ?>
                        <li class="<?php echo strpos(Yii::app()->request->url, $index) === false ? '' : 'active'; ?>"><a href="<?php echo $this->createUrl($k); ?>"><?php echo $v; ?></a></li>
                <?php
                    }
                ?>
            </ul>
        </nav>
    </header>

    <div id="page_main">
        <div id="page_nav">
            <?php
                if(isset($this->navMenu)) {
                    $this->widget('zii.widgets.CMenu', array('items' => $this->navMenu,'activateParents'=>true,
                        'encodeLabel'=>false,'activeCssClass'=>'selected'));
                }
            ?>
        </div>
        <?php echo $content; ?>
    </div>

    <footer id="page_footer">
        Copyright &copy; 2011-<?php echo date('Y'); ?> By i . All Rights Reserved.<br/>
        <p>版本：<?php echo Yii::app()->params['version']; ?> &nbsp;&nbsp; 执行时间：<?php echo printf("%.2f", Yii::getLogger()->getExecutionTime()); ?>秒 </p>
    </footer>

</body>
</html>