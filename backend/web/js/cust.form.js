/** * Created by xxx on 2018/1/24. */var handleValidation2 = function(id) {    // for more info visit the official plugin documentation:    // http://docs.jquery.com/Plugins/Validation    var form1 = $('#' + id);    var error1 = $('.alert-danger', form1);    var success1 = $('.alert-success', form1);    form1.validate({        errorElement: 'span', //default input error message container        errorClass: 'help-block help-block-error', // default input error message class        focusInvalid: false, // do not focus the last invalid input        ignore: "", // validate all fields including form hidden input        messages: arguments[1] ? arguments[1] : messages,        /*{         payment: {         maxlength: jQuery.validator.format("Max {0} items allowed for selection"),         minlength: jQuery.validator.format("At least {0} items must be selected")         }         'checkboxes1[]': {         required: 'Please check some options',         minlength: jQuery.validator.format("At least {0} items must be selected"),         },         'checkboxes2[]': {         required: 'Please check some options',         minlength: jQuery.validator.format("At least {0} items must be selected"),         }         },*/        rules: arguments[2] ? arguments[2] : rules,        invalidHandler: function(event, validator) { //display error alert on form submit            success1.hide();            error1.show();            App.scrollTo(error1, -200);        },        errorPlacement: function(error, element) {            if (element.is(':checkbox')) {                error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));            } else if (element.is(':radio')) {                error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));            } else {                error.insertAfter(element); // for other inputs, just perform default behavior            }        },        highlight: function(element) { // hightlight error inputs            $(element)                .closest('.form-group').addClass('has-error'); // set error class to the control group        },        unhighlight: function(element) { // revert the change done by hightlight            $(element)                .closest('.form-group').removeClass('has-error'); // set error class to the control group        },        success: function(label) {            label                .closest('.form-group').removeClass('has-error'); // set success class to the control group        },        submitHandler: function(form) {            success1.show();            error1.hide();            var saveUrl = form1.attr('data-save');            var recUrl = form1.attr('data-rec');            console.log(saveUrl);            console.log(recUrl);            var options = {                url:saveUrl,                type:"post",                success: function (data) {                    if(data) {                        data = JSON.parse(data);                        bootbox.alert({                            size: "small",                            title: '操作提示',                            message:data.message,                            callback: function(){                                window.location.href=recUrl;                            }                        });                    }else{                        //$("#submitbtn").removeAttr("disabled");                    }                }            };            $("#" + id).ajaxSubmit(options);        }    });}// 添加function insertFormBody(id){    $("#" + id).find(".form-body").remove();    $("#" + id).prepend($(".form-body-tpl").html());    $(".date-picker").datepicker();    $("#" + id).find(".select2-multiple").select2();}// 编辑function editForm(obj, id){    $("#" + id).find(".form-body").remove();    $("#" + id).prepend($(".form-body-tpl").html());    var jsonData = $(obj).prev().text();    jsonData = eval('(' + jsonData + ')');    //alert($("#saveForm [name='role_id']").val());    for(var key in jsonData){        //item = json[key];        if(key.indexOf(':') == -1){            $("input[name='" + key + "']").val(jsonData[key]);        }else{            var sp = key.split(':');            if(sp[1] == 'img'){                if(jsonData[key] != ''){                    $("#" + sp[2]).attr('src', jsonData[key]);                }            }else if(sp[1] == 'textarea'){                $("textarea[name='" + sp[0] + "']").val(jsonData[key]);            }else if(sp[1] == 'select'){                $("select[name='" + sp[0] + "']").find("option[value='" + jsonData[key] + "']").attr("selected",true);            }else if(sp[1] == 'selectMulti'){                var spVal = jsonData[key].split(',');                for(var i =0; i<spVal.length; i++){                    $("select[name='" + sp[0] + "[]']").find("option[value='" + spVal[i] + "']").attr("selected",true);                }            }else if(sp[1] == 'radio'){                $(":radio[name='" + sp[0] + "'][value='" + jsonData[key] + "']").prop("checked", "checked");            }else if(sp[1] == 'checkbox'){                $(":checkbox[name='" + sp[0] + "'][value='" + jsonData[key] + "']").prop("checked", "checked");            }        }    }    $(".date-picker").datepicker();    $("#" + id).find(".select2-multiple").select2();}//商品上下架function setFlag(status, url, rec_url){    var id_array=new Array();    $('input[name=id]:checked').each(function () {        id_array.push($(this).val());    });    if(id_array.length == 0){        bootbox.alert({            size: "small",            title: '操作提示',            message:'请选择商品信息！',        });        return false;    }    var message='';    if(status == 1 ){        message ='是否下架该商品';    }else{        message ='是否上架该商品';    }    var url = url;    //console.log(id_array);    bootbox.confirm({        size: "small",        title: '操作提示',        message:message,        callback: function (result) {            if (result) {//确认的时候ajax                $.post(url, {'id':id_array,'flag':status},function (data) {                    /*if(data.code == 1){                        window.location.href= data.data;                        return false;                    }*/                    bootbox.alert({                        size: "small",                        title: '操作提示',                        message:data.message,                        callback: function(){                            window.location.href = rec_url;                        }                    });                }, 'json');            }        }    });}// 添加充值记录function addRechargeForm(obj, id){    var cust_id = $(obj).attr('data-cust-id');    var account_id = $(obj).attr('data-account-id');    var account = $(obj).attr('data-account');    var coin_type = $(obj).attr('data-coin-type');    var coin_id = $(obj).attr('data-coin-id');    $("#" + id).find('span.account').text(account);    $("#" + id).find('span.coin_type').text(coin_type);    $("#" + id).find('input[name="account_id"]').val(account_id);    $("#" + id).find('input[name="cust_id"]').val(cust_id);    $("#" + id).find('input[name="coin_id"]').val(coin_id);}