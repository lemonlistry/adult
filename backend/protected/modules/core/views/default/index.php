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
                $form = $this->beginWidget('ActiveForm', array('id' => 'item_form', 'method' => 'get', 'action' => $this->createUrl('/core/default')));
            ?>
            <header>
                <div class="right">
                </div>
            </header>
            <?php $this->endWidget(); ?>
            <div class="main-content">
                <div class="grid-view">
                    <table>
                        <thead>
                            <tr>
                                <th width="40px;">序号</th>
                                <th width="120px;">产品编号</th>
                                <th width="150px;">产品名称</th>
                                <th width="50px;">积分</th>
                                <th width="40px;">市场价</th>
                                <th width="60px;">一级分类</th>
                                <th width="60px;">二级分类</th>
                                <th width="60px;">三级分类</th>
                                <th width="60px;">所属品牌</th>
                                <th width="40px;">分享</th>
                                <th width="40px;">浏览</th>
                                <th width="40px;">成交</th>
                                <th width="40px;">收藏</th>
                                <th width="60px;">是否上架</th>
                                <th width="60px;">是否删除</th>
                                <th width="60px;">是否免邮</th>
                                <th width="80px;">产品描述</th>
                                <th width="120px;">创建时间</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (count($list)) {
                                    foreach ($list as $k => $v) {
                                        $server = Util::getServerAttribute($k);
                            ?>
                                        <tr>
                                            <td><?php echo isset($server->sname) ? $server->sname : '' ; ?></td>
                                            <td><?php echo isset($server->create_time) ? substr($server->create_time, 0, 10) : ''; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo isset($v["login_num"]) ? $v["login_num"] : 0 ; ?></td>
                                            <td><?php echo isset($v["register_num"]) ? $v["register_num"] : 0; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo isset($v["register_day_num"]) ? $v["register_day_num"] : 0; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo ''; ?></td>
                                            <td><?php echo isset($server->create_time) ? (ceil((time() - strtotime($server->create_time)) / (3600*24))) : 0; ?></td>
                                            <td></td>
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