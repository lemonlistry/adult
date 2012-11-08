<?php
    Yii::app()->clientScript->registerCoreScript('jquery.ui');
    Yii::app()->clientScript->registerCoreScript('platform');
    $form = $this->beginWidget('ActiveForm', array('id' => 'log_form'));
?>
<style type="text/css">
     table{font-size:2px;}
</style>
<table border=1>
    <tr>
       <td>level</td>
       <td><?php echo $model['level']; ?></td>
    </tr>
    <tr>
       <td>url</td>
       <td><?php echo $model['request_url']; ?></td>
    </tr>
    <tr>
       <td>type</td>
       <td><?php echo $model['request_type']; ?></td>
    </tr>
    <tr>
       <td>browse</td>
       <td><?php echo $model['browse']; ?></td>
    </tr>
    <tr>
       <td>client_ip</td>
       <td><?php echo $model['client_ip']; ?></td>
    </tr>
    <tr>
       <td>file_name</td>
       <td><?php echo $model['file_name']; ?></td>
    </tr>
    <tr>
       <td>line_number</td>
       <td><?php echo $model['line_number']; ?></td>
    </tr>
    <tr>
       <td>msg</td>
       <td><?php echo $model['msg']; ?></td>
    </tr>
    <tr>
       <td>param</td>
       <td><?php echo $model['param']; ?></td>
    </tr>
    <tr>
       <td>operator</td>
       <td><?php echo $model['operator']; ?></td>
    </tr>
    <tr>
       <td>create_time</td>
       <td><?php echo  date('Y-m-d G:i:s', $model['create_time']); ?></td>
    </tr>
 </table>
<?php $this->endWidget(); ?>

