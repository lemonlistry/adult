<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>爱感觉</title>
    <link href="/frontend/source/css/global.css" type="text/css" rel="stylesheet" />
    <link href="/frontend/source/css/list.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div id="contain">
        <div id="header">
            <div id="topheader"><a href="#">登陆</a>&nbsp;|&nbsp;<a href="#">注册</a>&nbsp;|&nbsp;<a href="#">购物车</a> <span>0</span>&nbsp;|&nbsp;<a href="#">帮助</a>
            </div>
            <div class="clearfloat"></div>
            <div id="logo"><img src="/frontend/source/images/logo.jpg" /></div>
            <div id="menu">
            <ul>
                <li><a href="#">大号 <span>Big</span></a></li>
                <li><a href="#">中号 <span>Medium</span></a></li>
                <li><a href="#">小号 <span>Small</span></a></li>
                <li><a href="#">情趣 <span>Delight</span></a></li>
                <div class="clearfloat"></div>
            </ul>
            </div>
        </div>
        <?php echo $content; ?>
        <div id="footer">
            <b>品牌合作：</b>邮箱：<a href="mailto:iganjue@163.com">iganjue@163.com</a>&nbsp;&nbsp;
            <b>客服中心：</b><a href="#"><img src="/frontend/source/images/qq.jpg" /></a>（在线时间9：00~18：00）
            <br /><br />Copyright &copy; 2011-<?php echo date('Y'); ?> 爱感觉版权所有&nbsp;&nbsp;
            <a href="#">关于我们</a> | <a href="#">联系方式</a>
        </div>
    </div>
</body>
</html>