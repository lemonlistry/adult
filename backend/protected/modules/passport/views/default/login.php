<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo Yii::app()->name; ?></title>
<link href="<?php echo Yii::app()->request->baseUrl;?>/source/css/passport/login.css?v=<?php echo Yii::app()->params['version']; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/source/js/jquery.min.js?v=<?php echo Yii::app()->params['version']; ?>"></script>
</head>
<body>
<div class="login">
    <div class="title"><img src="<?php echo Yii::app()->request->baseUrl;?>/source/images/passport/login_title.gif" /></div>
    <div class="main">
        <form action="<?php echo $this->createUrl('/passport');?>" method="post" id="login_form">
        <table class="login_table">
            <tr>
                <td>用户名:</td>
                <td><input type="text" name="User[username]" id="username" size="32" class="username"/></td>
            </tr>
            <tr><td></td><td></td></tr>
            <tr><td></td><td></td></tr>
            <tr>
                <td>密&nbsp;&nbsp;码: </td>
                <td><input type="password" name="User[password]" id="password" size="32" class="password" /></td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: left; padding-top: 32px;">
                    <input type="image" src="<?php echo Yii::app()->request->baseUrl;?>/source/images/passport/login.gif" name="submit" id="submit"/>
                    <input type="image" src="<?php echo Yii::app()->request->baseUrl;?>/source/images/passport/cancel.gif" name="cancel" id="cancel"/>
                </td>
            </tr>
        </table>
        <input type="hidden" name="login" id="login" />
        </form>
    </div>
</div>
</body>
</html>
