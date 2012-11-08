$.extend({
    /**
     * 是否整数
     */
    isInt: function(s){
        return (/^-?\d+$/).test(s);
    },
    /**
     * 是否正整数 包括第一位是0
     */
    isPint: function(s){
        return (/^\d+$/).test(s);
    },
    
    /**
     * 是否正整数 1 . 2 . 3 ...
     */
    isRPint: function(s){
        return (/^[1-9]\d*$/).test(s);
    },

    /**
     * 是否大于零的整数
     */
    isGint: function(s){
        return (/^\d+$/).test(s) ? ((/^0+$/).test(s)? false : true) : false;
    },

    /**
     * 是否浮点数
     */
    isFloat: function(s){
        return (/^(-?\d+)(\.\d+)?$/).test(s);
    },

    /**
     * 是否非负浮点数
     */
    isPfloat: function(s){
        return (/^\d+(\.\d+)?$/).test(s);
    },

    /**
     * 检查帐号或密码的合法性
     * 账号由4-12位英文字母、数字、下划线组成，且第一位不能是下划线
     */
    isUP: function(s){
        return (/^[a-zA-Z0-9]+[a-zA-Z0-9_]{3,11}$/).test(s);
    },

    /**
     * 检查密码的合法性 4-12
     */
    isPWD: function(s){
        return (/^[^\u4e00-\u9fa5]{4,16}$/).test(s);
    },

    /**
     * 检查日期的合法性
     * ins : input array
     * start: start index
     * msg: alter masseger if wrong
     * return array[时间戳, eg:1999-2-6 12:9:8, eg:1999-02-06 12:09:08]
     */
    isValidDate: function(ins, start, msg) {
        start = start || 0;
        for(var i=start; i<6; i++){
            if(!$.isPint(ins[i].value)){//判断是否整数
                $.alert(msg);
                ins[i].select();
                return false;
            }
        }
        var t = [parseInt(ins[start].value, 10), parseInt(ins[start + 1].value, 10)-1, parseInt(ins[start + 2].value, 10), parseInt(ins[start + 3].value, 10), parseInt(ins[start + 4].value, 10), 0];
        var fd = new Date(t[0], t[1], t[2], t[3], t[4], t[5]);
        if(fd.getFullYear() !== t[0] || fd.getMonth() !== t[1] || fd.getDate() !== t[2] || fd.getHours() !== t[3] || fd.getMinutes() !== t[4]){
            $.alert(msg);
            if(t[0]<1970){
                ins[start].select();//year
            }else if(t[1]>11){
                ins[start + 1].select();//mouth
            }else if(t[3]>23){
                ins[start + 3].select();//hour
            }else if(t[4]>59){
                ins[start + 4].select();//minute
            }else{
                ins[start + 2].select();//day
            }
            return false;
        }
        return [fd, t[0]+'-'+(t[1]+1)+'-'+t[2]+' '+t[3]+':'+t[4]+':0', ins[start].value+'-'+ins[start + 1].value+'-'+ins[start + 2].value+' '+ins[start + 3].value+':'+ins[start + 4].value+':00'];
    },

    /**
     * 验证传入的form元素的合法性，根据最后确定的边界值调整
     * 使用此方法，需要在元素里面加属性 valid, 另外请确定你的valid值在msgs和switch里面
     */
    validateEm: function(em){
        var type = $(em).attr('valid');
        em.value = $.trim(em.value);
        var val = em.value;
        var re = true;
        var msgback = function(){
            var msg = {
                'name':     '名称由1-16位字符组成',
                'account':  '账号由4-12位英文字母、数字、下划线组成，且第一位不能是下划线',
                'password': '密码由4-16位字符组成',
                'epassword':'密码由4-16位字符组成',
                'hour':     '小时为24时制小时格式',
                'minute':   '分钟为24时制分钟格式',
                'days':     '日期不正确！'
            };
            $.alert(msg[type]);
            $.selectEm(em);
        };
        
        switch(type){
            case 'name':
                em.value = val.replace(/\s{2,}/g," ");
                re = (/.{1,16}/).test(em.value);
            break;
            case 'account':
                re = (/^[a-zA-Z0-9]+[a-zA-Z0-9_]{3,11}$/).test(val);
            break;
            case 'password':
                re = (/^[^\u4e00-\u9fa5]{4,16}$/).test(val);
            break;
            case 'epassword':
                re = (/^[^\u4e00-\u9fa5]{4,16}$/).test(val) || val == '';
            break;
            case 'hour':
                var hour = parseInt(val,10);
                re = !(!(/^\d(\d)?$/).test(val) || hour > 23 || hour < 0);
            break;
            case 'minute':
                var minute = parseInt(val,10);
                re = !(!(/^\d(\d)?$/).test(val) || minute > 59 || minute < 0);
            break;
            case 'days':
                val = $.trim(val);
                re = (0<val && val<= ($.getDaysOfMon()));
            break;

            default:
            break;
        }
        if(!re){msgback();}
        
        return re;
    },
    
    /**
     * 验证一个form里面的元素，只验证带有valid属性的元素
     */
    validateForm: function(form){
        ems = form.elements;
        for(var i = 0; i < ems.length; i++){
            if($(ems[i]).attr('valid') && !$.validateEm(ems[i])){
                return false;
            }
        }
        return true;
    },
 
    /**
     * 得到某月的天数。默认当前月
     */
    getDaysOfMon:function(date){
        var dt = '';
        if(date){
            dt = new Date(date); //得到当前时间
        }else{
            dt = new Date(); //得到当前时间
        }
        dt = new Date(dt.getFullYear(), dt.getMonth() + 1, 0); //得到本月最后一天
        return(dt.getDate()); // 本月最后一天即为本月的天数
    },
    
    /**
     * 产生一个min到max之间的随机数，都为正整数
     */
    getRound:function(min,max){
        return Math.round(Math.random()*1000)%(max-min) + min;
    },
    
    
    /**
     * autoClose
     */
    autoClose:function(msg){
        var diag = new Dialog();
        diag.AutoClose = 3;
        diag.URL = "javascript:void(document.write(\'" + msg + "\'))";
        diag.show();
    },
    
    /**
     * urlDialog
     */
    urlDialog:function(url, title, width, height){
        var diag = new Dialog();
        diag.Width = parseInt(width);
        diag.Height = parseInt(height);
        diag.Title = title;
        diag.URL = url;
        diag.show();
    }

});

