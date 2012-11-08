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
        <aside class="span5">
            <?php
            $this->widget('zii.widgets.CMenu', array('items' => $role_menu, 'activeCssClass' => 'selected',
                'htmlOptions' => array('class' => 'left-menu',)));
            ?>
        </aside>
        <div class="main-container prepend5">
            <header>
                <div class="right"></div>
            </header>
            <div class="main-content">
                <div class="main-title">
                    <strong>当前所选角色：<?php echo $current_role['name']; ?></strong>
                </div>
                <form action ="<?php echo Yii::app()->createUrl('/passport/prime/updateprime') ?>" id="prime_form" method="post">
                    <div class="info-header align-justify">已授权限</div>
                    <div class="quick-container">
                        <div>
                            <?php 
                                if(count($resource_list)){
                                    foreach ($resource_list as $k => $v) {
                            ?>
                                        <label title="<?php echo $v->desc; ?>">
                            <?php 
                                            echo Html5::checkbox("Resource[{$v->id}]", in_array($v->id, $prime) || $current_role['id'] == 1);
                                            echo $v->name;
                            ?>
                                        </label>
                            <?php 
                                        echo ++$k % 8 == 0 ? '<br/>' : '';
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="info-header align-justify">已授权限人员</div>
                    <div class="quick-container">
                        <div>
                            <?php 
                                if(count($checked_user)){
                                    foreach ($checked_user as $v) {
                            ?>
                                        <label>
                            <?php 
                                            echo $v->username;
                            ?>
                                        </label>
                            <?php 
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <input type="hidden" value="<?php echo $current_role['id']; ?>" id="role_id" name="role_id" />
                    <div class="actions">
                        <button type="submit" class="hightlight ajax-submit" <?php echo $current_role['id'] == 1 ? 'disabled' : ''; ?> >保存授权</button> <button type="reset">重置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    jQuery(function($) {
        $("#prime_form").submit(function(){
            $.ajax({
                type: "POST",
                dataType: 'JSON',
                url: this.action,
                data : $(this).serialize(),
                success: function(json){
                    if(json.status==1) {
                        if(json.location) {
                            location.href = json.location;
                        } else {
                            location.reload();
                        }
                    } else {
                        Dialog.alert(json.msg);
                    }
                },
                error: function(xhr, status, err) {
                    Dialog.alert('请求的地址错误');
                }
            });
            return false;
        });
    });
</script>