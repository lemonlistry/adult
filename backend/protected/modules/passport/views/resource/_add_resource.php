<?php 
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');;
    $form = $this->beginWidget('ActiveForm', array('id' => 'resource_form'));
?>


<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'name'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'name'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'name'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'tag'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'tag'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'tag'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'desc'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'desc'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'desc'); ?>
    </div>
</div>



<input type="hidden" id="resource_id" name="Resource[id]" value="<?php echo $model->isNewRecord ? 0 : $model->id; ?>" />

<div class="actions">
    <input type="submit" value="提交" />
</div>

<?php $this->endWidget(); ?>
