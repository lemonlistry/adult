<?php
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');;
    $form = $this->beginWidget('ActiveForm', array('id' => 'information_form'));
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
        <?php echo $form->labelEx($model, 'status'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'status',$model->getInformationStatus(), array('class' => 'medium')); ?>
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
                <?php echo $form->dropDownList($model, 'type',$model->getInformationType(), array('class' => 'medium')); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'type'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
		<?php echo $form->labelEx($model, 'content'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->textArea($model, 'content'); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'content'); ?>
    </div>
</div>

<input type="hidden" id="information_id" name="Information[id]" value="<?php echo $model->isNewRecord ? 0 : $model->id; ?>" />


<div class="actions" style="height:20px;float:left;">
    <input type="submit" value="提交" />
</div>

<?php
    $this->widget('ext.ueditor.Ueditor',
            array(
                'getId'=>'Information_content',
                'UEDITOR_HOME_URL'=>"/",
                'options'=>'
                            wordCount:false,
                            elementPathEnabled:false,
                            ',
            ));
    //UEDITOR_HOME_URL: "' . Yii::app()->baseUrl .'/ueditor/",  imagePath: "' . Yii::app()->request->baseUrl . '/upload/information/",
?>

<?php $this->endWidget(); ?>