<?php
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');;
    $form = $this->beginWidget('ActiveForm', array('id' => 'category_form', 'htmlOptions' => array('enctype' => 'multipart/form-data')));
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
        <?php echo $form->labelEx($model, 'level'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'level', $model->getCategoryLevel(), array('class' => 'medium', 'disabled' => !$model->isNewRecord)); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'level'); ?>
    </div>
</div>

<div class="clearfix">
    <div class="cell">
        <?php echo $form->labelEx($model, 'parent_id'); ?>
        <div class="item">
            <div class="main">
                <?php echo $form->dropDownList($model, 'parent_id', array(0 => '无上级分类'), array('class' => 'medium', 'disabled' => !$model->isNewRecord)); ?>
            </div>
        </div>
        <?php echo $form->error($model, 'parent_id'); ?>
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

<input type="hidden" id="category_id" name="Category[id]" value="<?php echo $model->isNewRecord ? 0 : $model->id; ?>" />

<div class="actions">
    <input type="submit" value="提交" />
</div>

<?php $this->endWidget(); ?>
<script>
jQuery(function($) {
    $('#category_form').submit(function(){
        var parent_id = $('#Category_parent_id').val();
        console.log(parent_id);
        if(null == parent_id){
            Dialog.alert('请选择父类');
            return false;
        }else{
            return true;
        }
    });
    $('select[name="Category[level]"]').bind('change' , function(){
        $.getJSON("<?php echo Yii::app()->createUrl('/core/category/getcategorybylevel/level'); ?>" + '/' + this.value, function(data){
            var str = '';
            $.each(data, function(i,item){
                str += '<option value="' + item.id + '">' + item.name + '</option>'
            });
            $("#Category_parent_id").html(str);
        });
    });
});
</script>