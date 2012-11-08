<?php
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');;
    $form = $this->beginWidget('ActiveForm', array('id' => 'resource_bind_form'));
?>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'resource_id'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'resource_id', $resource_list); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'resource_id'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'path'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'path'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'path'); ?>
    </div>
</div>



<input type="hidden" id="resource_relate_id" name="Path[id]" value="<?php echo $model->isNewRecord ? 0 : $model->id; ?>" />

<div class="actions">
    <input type="submit" value="提交" />
</div>

<?php $this->endWidget(); ?>
