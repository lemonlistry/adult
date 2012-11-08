<div id="page_body">
<div id="page_title">
    <?php
        require_once dirname(__FILE__) . '/_menu.php';
    ?>
</div>

<div class="main-box">
    <div class="main-body">
        <aside class="span5">
            <?php
                $this->widget('zii.widgets.CMenu', array('items' => $menu, 'activeCssClass' => 'selected',
                    'htmlOptions' => array('class' => 'left-menu',)));
            ?>
        </aside>
        <div class="main-container prepend5">
            <?php
                $form = $this->beginWidget('ActiveForm', array('id' => 'brand_form', 'method' => 'get', 'action' => $this->createUrl('/core/default')));
            ?>
            <header>
                <div class="right">
                    <?php echo Html5::link('添加品牌', array('/core/brand/addbrand'), array('class' => 'js-dialog-link', 'data-width' => 750, 'data-height' => 450)); ?>
                </div>
            </header>
            <?php $this->endWidget(); ?>
            <div class="main-content">
                <div class="grid-view">
                    <table>
                        <thead>
                            <tr>
                                <th width="80px;">序号</th>
                                <th width="120px;">品牌名称</th>
                                <th width="180px;">品牌logo</th>
                                <th width="300px;">描述</th>
                                <th width="180px;">排序</th>
                                <th width="130px;">是否推荐</th>
                                <th width="140px;">创建时间</th>
                                <th class="span2">操作</th>
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
                                            <td><?php echo $v->logo; ?></td>
                                            <td><?php echo $v->desc; ?></td>
                                            <td><?php echo $v->sort; ?></td>
                                            <td><?php echo Brand::model()->getBrandRecommend($v->recommend); ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $v->create_time); ?></td>
                                            <td>
                                                <?php
                                                    echo Html5::link('编辑', array('/core/brand/updatebrand', 'id' => $v->id), array('class' => 'js-dialog-link', 'data-width' => 600, 'data-height' => 400));
                                                    echo '&nbsp;' . Html5::link('删除', array('/core/brand/deletebrand', 'id' => $v->id), array('class' => 'js-confirm-link', 'data-title' => "您确定要删除当前品牌吗？"));
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
                                        <td colspan="22">暂无数据!</td>
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