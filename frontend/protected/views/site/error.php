<?php
$this->pageTitle = Yii::app()->name . ' - 错误';
?>
<div class="prepend1 append1" style="margin-top: 20px;">
    <h2>错误 <?php echo $code; ?></h2>

    <div class="error">
        <?php echo $message; ?>
    </div>
</div>
