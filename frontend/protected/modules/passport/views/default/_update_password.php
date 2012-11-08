<?php 
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');;
    $form = $this->beginWidget('ActiveForm', array('id' => 'password_form'));
?>

<div class="clearfix">
    <div class="cell">
        <label for="old_password" class="required">原密码 <span class="required">*</span></label>
        <div class="item">
            <div class="main">
                <input value="" name="old_password" id="old_password" type="password" maxlength="32">
            </div>
        </div>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <label for="new_password" class="required">新密码 <span class="required">*</span></label>
        <div class="item">
            <div class="main">
                <input value="" name="new_password" id="new_password" type="password" maxlength="32">
            </div>
        </div>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <label for="confirm_password" class="required">确认新密码 <span class="required">*</span></label>
        <div class="item">
            <div class="main">
                <input value="" name="confirm_password" id="confirm_password" type="password" maxlength="32">
            </div>
        </div>
    </div>
</div>


<div class="actions">
    <input type="submit" value="提交" id="save" name="save"/>
</div>

<?php $this->endWidget(); ?>

<script>
    jQuery(function($) {
        $("#password_form").submit(function(){
            var old_password = $.trim($("#old_password").val());
            if(old_password == ''){
                Dialog.alert('请输入原密码');
                return false;
            }
            var new_password = $.trim($("#new_password").val());
            if(new_password == ''){
                Dialog.alert('请输入新密码');
                return false;
            }
            var confirm_password = $.trim($("#confirm_password").val());
            if(confirm_password == ''){
                Dialog.alert('请输入确认密码');
                return false;
            }
            if(confirm_password != new_password){
                Dialog.alert('两次输入的密码不一致,请重新输入');
                return false;
            }
            $.getJSON(this.action, {old_password: old_password, new_password: new_password, confirm_password: confirm_password}, function(data){
                $("#save").prop('disabled', true);
                if(data.flag == 1){
                    parent.location.href = parent.location.href;
                }else{
                    Dialog.alert(data.msg);
                    $("#save").prop('disabled', false);
                }
            });
            return false;
        });
    });
</script>
