<?php
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');;
    $form = $this->beginWidget('ActiveForm', array('id' => 'brand_form', 'htmlOptions' => array('enctype' => 'multipart/form-data')));
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
        <?php echo $form->labelEx($model, 'logo'); ?>
        <div class="item">
            <div class="main">
                <?php echo Html5::activeFileField($model, 'logo'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'logo'); ?>
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

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'sort'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'sort'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'sort'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'recommend'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'recommend', $model->getBrandRecommend(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'recommend'); ?>
    </div>
</div>

<input type="hidden" id="brand_id" name="Brand[id]" value="<?php echo $model->isNewRecord ? 0 : $model->id; ?>" />

<div class="actions">
    <input type="submit" value="提交" />
</div>

<?php $this->endWidget(); ?>