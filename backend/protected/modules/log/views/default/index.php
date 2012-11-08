<div id="page_body">
<div id="page_title">
    <?php
        $this->widget('zii.widgets.CBreadcrumbs', array('links' => array(
                '系统管理',
                $title,
                )));
    ?>
</div>

<div class="main-box">
    <div class="main-body">
        <div class="main-container">
            <?php
                $form = $this->beginWidget('ActiveForm', array('id' => 'userlook', 'method' => 'get', 'action' => $this->createUrl('/log/default')));
            ?>
            <header>
                <div class="right">
                    <label>开始时间:</label>
                    <?php
                        echo Html5::timeField('begintime', $begintime);
                    ?>
                    <label>结束时间:</label>
                    <?php
                        echo Html5::timeField('endtime', $endtime);
                    ?>
                    <label>用户:</label>
                    <input type="text" id="operator" name="operator" value="<?php echo $operator;?>" />
                    <input type="submit" value='查询' />
                </div>
            </header>
            <?php $this->endWidget(); ?>
            <div class="main-content">
                <div class="grid-view">
                    <table>
                        <thead>
                            <tr>
                                <th class="span4">序号</th>
                                <th class="span6">模块</th>
                                <th class="span8">记录</th>
                                <th class="span6">操作者</th>
                                <th class="span6">创建时间</th>
                                <th class="span6">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (count($list)) {
                                    foreach ($list as $k => $v) {
                            ?>
                                        <tr>
                                            <td><?php echo $k + 1; ?></td>
                                            <td><?php echo $v->module; ?></td>
                                            <td><?php echo $v->msg; ?></td>
                                            <td><?php echo $v->operator; ?></td>
                                            <td><?php echo date("Y-m-d H:i:s", $v->create_time); ?></td>
                                            <td>
                                               <?php
                                                    echo Html5::link('查看', array('/log/default/look', 'id' => $v['id']), array('class' => 'js-dialog-link', 'data-width' => 900));
                                                ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                ?>
                                    <tr>
                                        <td colspan="6"> <div class="pager"><?php $this->widget('CLinkPager', array('pages'=>$pages));?> </div></td>
                                    </tr>
                            <?php
                                } else {
                            ?>
                                    <tr>
                                        <td colspan="10">暂无数据!</td>
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