<?php
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');;
    $form = $this->beginWidget('ActiveForm', array('id' => 'ad_form', 'htmlOptions' => array('enctype' => 'multipart/form-data')));
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
        <?php echo $form->labelEx($model, 'position'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'position',$model->getAdPosition(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'position'); ?>
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
        <?php echo $form->labelEx($model, 'href'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'href'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'href'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'category'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'category',$model->getAdCategory(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'category'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'status'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'status',$model->getAdStatus(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'status'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'type'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'type',$model->getAdType(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'type'); ?>
    </div>
</div>

<input type="hidden" id="ad_id" name="Ad[id]" value="<?php echo $model->isNewRecord ? 0 : $model->id; ?>" />

<div class="actions">
    <input type="submit" value="提交" />
</div>

<?php $this->endWidget(); ?>