<?php 
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');
    $form = $this->beginWidget('ActiveForm', array('id' => 'user_form'));
?>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'role_id'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'role_id', $role_list); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'role_id'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
         <?php echo $form->labelEx($model, 'username'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'username'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'username'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'password'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'password'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'password'); ?>
    </div>
</div>

<input type="hidden" id="user_id" name="User[id]" value="<?php echo $model->isNewRecord ? 0 : $model->id; ?>" />

<div class="actions">
    <input type="submit" value="提交" />
</div>

<?php $this->endWidget(); ?>

