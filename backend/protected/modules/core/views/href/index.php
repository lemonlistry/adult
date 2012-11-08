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
                $form = $this->beginWidget('ActiveForm', array('id' => 'href_form', 'method' => 'get', 'action' => $this->createUrl('/core/default/index')));
            ?>
            <header>
                <div class="right">
                    <?php echo Html5::link('添加友情链接', array('/core/href/addhref'), array('class' => 'js-dialog-link', 'data-width' => 750, 'data-height' => 350)); ?>
                </div>
            </header>
            <?php $this->endWidget(); ?>
            <div class="main-content">
                <div class="grid-view">
                    <table>
                        <thead>
                            <tr>
                                <th width="40px;">序号</th>
                                <th width="120px;">名称</th>
                                <th width="120px;">链接地址</th>
                                <th width="80px;">位置</th>
                                <th width="320px;">图片</th>
                                <th width="60px;">类型</th>
                                <th width="60px;">状态</th>
                                <th width="120px;">创建时间</th>
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
                                            <td><?php echo $v->title; ?></td>
                                            <td><?php echo $v->target; ?></td>
                                            <td><?php echo Href::model()->getHrefPosition($v->position); ?></td>
                                            <td><?php echo $v->path; ?></td>
                                            <td><?php echo Href::model()->getHrefType($v->type); ?></td>
                                            <td><?php echo Href::model()->getHrefStatus($v->status); ?></td>
                                            <td><?php echo date('Y-m-d H:i:s', $v->create_time); ?></td>
                                            <td>
                                                    <?php
                                                    echo Html5::link('编辑', array('/core/href/updatehref', 'id' => $v->id), array('class' => 'js-dialog-link', 'data-width' => 600, 'data-height' => 600));
                                                    echo '&nbsp;' . Html5::link('删除', array('/core/href/deletehref', 'id' => $v->id), array('class' => 'js-confirm-link', 'data-title' => "您确定要删除当前友情链接吗？"));
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