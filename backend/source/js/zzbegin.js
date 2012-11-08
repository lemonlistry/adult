function ajaxRequest() {
    $.ajax({
        type: "POST",
        dataType: 'JSON',
        url: this.href || this.dataset.href,
        data: {
            ajax:1
        },
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
            console.warn(arguments);
            Dialog.alert('请求的地址错误');
        }
    });
}

$(document).ready(function(){
    
    /**
     * js-dialog-link
     * js-dialog-close
     * AJAX弹出层
     * eg:
        <a data-title="{title}" data-id="{id}">...</a>
        * title     可选,指定弹出层标题, 默认取链接的textContent;
        * id        指定id，用来获取弹出层对象，然后操作它
                    $('#id').dialog('close');
     */
    // use delegate, it's more efficient
    $(document).delegate('.js-dialog-link', 'click',function(){
        var data = this.dataset;
        var title = data.title || this.textContent;
        var url = this.href || data.href;
        var width = data.width || 600;
        var height = data.height || 300;
        $.urlDialog(url, title, width, height);
        return false;
    })
    // AJAX确认
    .delegate('.js-confirm-link', 'click', function(){
        if(confirm(this.dataset.title || this.textContent)) {
            ajaxRequest.call(this);
        }
        return false;
    })
    // AJAX直接调用
    .delegate('.js-ajax-link', 'click', function(){
        ajaxRequest.call(this);
        return false;
    });
    
    //初始化时间插件
    $("input[type='time']").datetimepicker({
        dateFormat: 'yy-mm-dd',
        showSecond: false, //显示秒
        timeFormat: 'hh:mm:ss'
    });
    
    $("form").submit(function(e){
        $(this).find("button[type='submit']").prop('disabled',true);
    });
});

