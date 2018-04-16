/* Theme Name:iDea - Clean & Powerful Bootstrap Theme
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Author e-mail:htmlcoder.me@gmail.com
 * Version:1.0.0
 * Created:October 2014
 * License URI:http://wrapbootstrap.com
 * File Description: Place here your custom scripts
 */


function tabLocUrl(obj){
    var href = $(obj).attr('data-href');
    window.location.href = href;
}

function initSecuritySetModal(obj){
    var label = $(obj).attr('data-label');
    var id = $(obj).attr('data-target');
    var coin_id = $(obj).attr('data-coin-id');
    var account_id = $(obj).attr('data-account-id');
    //$(id).find('#setModalLabel > span').text(label);
    $(id).find(id + 'Label > span').text(label);
    $(id).find('.control-label > span').text(label);
    $(id).find("input[name='coin_id']").val(coin_id);
    $(id).find("input[name='account_id']").val(account_id);

    var has_info = $(obj).prev().attr('data-info');
    if(has_info == '1'){
        $(obj).prev().find("span").each(function(){
            var cls = $(this).attr('class');
            var txt = $(this).text();
            $(id).find("input[name='" + cls + "']").val(txt);
        });
    }else{
        $(id).find("input[type='text']").val('');
    }
}

function updateAccountStatus(obj, account_id, coin_id){
    var url = $(obj).attr('data-url');
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    $.post(url, {'account_id':account_id, 'coin_id':coin_id, '_csrf-frontend':csrfToken}, function(data){
        //console.log(result);
        data = JSON.parse(data);
        alert(data.message);
        window.location.reload();
    });
}

/*//更改或者重新加载验证码
function changeVerifyCode(obj) {
//项目URL
    var url = $(obj).attr('data-url');
    $.ajax({
        //使用ajax请求site/captcha方法，加上refresh参数，接口返回json数据
        url: url+"&refresh=true",
        dataType: 'json',
        cache: false,
        success: function (data) {
            //将验证码图片中的图片地址更换
            $(obj).attr('src', data['url']);
        }
    });
}*/



function handleValidation(id, rules, messages) {
    if(!$.find("#" + id)){
        return;
    }
    // for more info visit the official plugin documentation:
    // http://docs.jquery.com/Plugins/Validation
    var form1 = $('#' + id);
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);
    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "", // validate all fields including form hidden input
        messages: messages,
        /*{
         payment: {
         maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
         minlength: jQuery.validator.format("At least {0} items must be selected")
         }
         'checkboxes1[]': {
         required: 'Please check some options',
         minlength: jQuery.validator.format("At least {0} items must be selected"),
         },
         'checkboxes2[]': {
         required: 'Please check some options',
         minlength: jQuery.validator.format("At least {0} items must be selected"),
         }
         },*/
        rules: rules,

        invalidHandler: function(event, validator) { //display error alert on form submit
            success1.hide();
            error1.show();
            App.scrollTo(error1, -200);
        },

        errorPlacement: function(error, element) {
            if (element.is(':checkbox')) {
                error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
            } else if (element.is(':radio')) {
                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
            } else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },

        highlight: function(element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function(element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function(label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function(form) {
            success1.show();
            error1.hide();
            var saveUrl = form1.attr('data-save');
            var recUrl = form1.attr('data-rec');
            console.log(saveUrl);
            console.log(recUrl);
            var options = {
                url:saveUrl,
                type:"post",
                success: function (data) {
                    if(data) {
                        data = JSON.parse(data);
                        bootbox.alert({
                            size: "small",
                            title: '操作提示',
                            message:data.message,
                            callback: function(){
                                window.location.href=recUrl;
                            }
                        });
                    }else{
                        //$("#submitbtn").removeAttr("disabled");
                    }
                }
            };
            $("#" + id).ajaxSubmit(options);
        }
    });
}


