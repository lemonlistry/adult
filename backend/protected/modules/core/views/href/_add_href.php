<?php
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');
    $form = $this->beginWidget('ActiveForm', array('id' => 'href_form', 'htmlOptions' => array('enctype' => 'multipart/form-data')));
?>

<div class="clearfix">
    <div class="cell">
		<?php echo $form->labelEx($model, 'title'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'title'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'title'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'target'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'target'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'target'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'position'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'position',$model->getHrefPosition(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'position'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'status'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'status',$model->getHrefStatus(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'status'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'path'); ?>
        <div class="item">
            <div class="main">
                <?php echo Html5::activeFileField($model, 'path'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'path'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'type'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'type',$model->getHrefType(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'type'); ?>
    </div>
</div>

<input type="hidden" id="href_id" name="Href[id]" value="<?php echo $model->isNewRecord ? 0 : $model->id; ?>" />

<div class="actions">
    <input type="submit" value="提交" />
</div>

<?php $this->endWidget(); ?>