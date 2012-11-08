<?php
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');;
    $form = $this->beginWidget('ActiveForm', array('id' => 'logistics_form', 'htmlOptions' => array('enctype' => 'multipart/form-data')));
?>

<div class="clearfix">
    <div class="cell">
		<?php echo $form->labelEx($model, 'order_id'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'order_id', array('value' => $order_no, 'readonly' => true)); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'order_id'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'express_name'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'express_name',$model->getLogisticsExpressName(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'express_name'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'express_number'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'express_number'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'express_number'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'note'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textField($model, 'note'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'note'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'send_time'); ?>
        <div class="item">
            <div class="main">
                <?php echo Html5::timeField('Logistics[send_time]'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'send_time'); ?>
    </div>
</div>

<input type="hidden" id="Logistics_id" name="Logistics[id]" value="<?php echo $model->isNewRecord ? 0 : $model->id; ?>" />

<div class="actions">
    <input type="submit" value="提交" />
</div>

<?php $this->endWidget(); ?>