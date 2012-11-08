<style type="text/css">

</style>
<div id="page_body">
<div id="page_title">
    <?php
        require_once dirname(__FILE__) . '/_menu.php';
    ?>
</div>

<div class="main-box">
    <div class="main-body">
        <aside class="span5">
            <div class="portlet">
                <header>
                    <strong><a href="<?php echo $this->createUrl('/core/category/index'); ?>">所有分类</a></strong>
                </header>
                <div class="tree-content">
                    <?php
                        $this->widget('CTreeView',array('persist'=>'cookie','animated'=>'fast','url' => array('ajaxCategoryTree'),'htmlOptions'=>array('id'=>'category_tree')));
                    ?>
                </div>
            </div>
        </aside>
        <div class="main-container prepend5">
            <?php
                $form = $this->beginWidget('ActiveForm', array('id' => 'category_form', 'method' => 'get', 'action' => $this->createUrl('/core/default')));
            ?>
            <header>
                <div class="right">
                    <?php
                        echo Html5::link('添加分类', array('/core/category/addcategory'), array('class' => 'js-dialog-link', 'data-width' => 600, 'data-height' => 350));
                    ?>
                </div>
            </header>
            <?php $this->endWidget(); ?>
            <div class="main-content">
                <div class="grid-view">
                    <table>
                        <thead>
                            <tr>
                                <th width="120px;">序号</th>
                                <th width="120px;">名称</th>
                                <th width="120px;">父类</th>
                                <th width="120px;">描述</th>
                                <th width="120px;">排序</th>
                                <th width="120px;">创建时间</th>
                                <th class="span5">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (count($list)) {
                                    foreach ($list as $k => $v) {
                            ?>
                                        <tr>
                                            <td><?php echo $k + 1; ?></td>
                                            <td><?php echo $v->name; ?></td>
                                            <td><?php echo Util::getCategoryAttribute($v->parent_id); ?></td>
                                            <td><?php echo $v->desc; ?></td>
                                            <td><?php echo $v->sort; ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $v->create_time); ?></td>
                                            <td>
                                                <?php
                                                    echo Html5::link('编辑', array('/core/category/updatecategory', 'id' => $v->id), array('class' => 'js-dialog-link', 'data-width' => 600, 'data-height' => 400));
                                                    echo '&nbsp;' . Html5::link('删除', array('/core/category/deletecategory', 'id' => $v->id), array('class' => 'js-confirm-link', 'data-title' => "您确定要删除当前分类吗, 删除分类同时会删除当前分类下的所有子分类?"));
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                ?>
                            <?php
                                } else {
                            ?>
                                    <tr>
                                        <td colspan="7">暂无数据!</td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    jQuery(function($) {
        $('a[data-target]').live('click', function(e){
            var url = $(this).data('target');
            $.getJSON(url, function(data){
                var str = '';
                $.each(data, function(i,item){
                    str += '<tr><td>' + (parseInt(i) + 1) + '</td><td>' + item.name + '</td><td>' + item.parent_name + '</td><td>' + item.desc + '</td><td>' + item.sort + '</td><td>' + item.create_time + '</td><td><a class="js-dialog-link" data-width="600" data-height="400" href="' + item.update_url + '">编辑</a>&nbsp;<a class="js-confirm-link" data-title="您确定要删除当前分类吗, 删除分类同时会删除当前分类下的所有子分类?" href="' + item.delete_url + '">删除</a></td></tr>';
                });
                $('tbody').html(str);
            });
        });

        $('#category_tree li a').live('click',function(){
            $('#category_tree').find('.menu-selected').removeClass('menu-selected');
            $('#category_tree').find('.menu-selected-me').removeClass('menu-selected-me');
            $(this).parents('li').addClass('menu-selected').find(this).parent('span').parent('li').addClass('menu-selected-me');
        });

    });
</script>