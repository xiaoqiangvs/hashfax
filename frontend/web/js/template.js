/* Theme Name:iDea - Clean & Powerful Bootstrap Theme
 * Author:HtmlCoder
 * Author URI:http://www.htmlcoder.me
 * Author e-mail:htmlcoder.me@gmail.com
 * Version:1.0.0
 * Created:October 2014
 * License URI:http://wrapbootstrap.com
 * File Description: Initializations of plugins 
 */

//检测手机号是否正确
jQuery.validator.addMethod("isMobile", function(value, element) {
    var length = value.length;
    var regPhone = /^[1][3,4,5,7,8][0-9]$/;
    return this.optional(element) || ( length == 11 && regPhone.test( value ) );
}, "请正确填写您的手机号码");

//检测手机号或邮箱
jQuery.validator.addMethod("isMobileOrEmail", function(value, element) {
    var length = value.length;
    var regPhone = /^[1][3,4,5,7,8][0-9]$/;
    var regEmail = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    return this.optional(element) || ( length == 11 && regPhone.test( value ) ) || regEmail.test( value );
}, "请正确填写您的手机号码或者邮箱");

(function($){
	$(document).ready(function(){
        //复制
        var clipboard = new Clipboard('.copy-btn');
        clipboard.on('success', function(e) {
            console.log(e);
            alert("复制成功！");
        });
        clipboard.on('error', function(e) {
            console.log(e);
            alert("复制失败！请手动复制");
        });

        var formId, url, rules, messages;
        //验证登录表单
		if($("#memberLogForm").length > 0){
            memberLogFormFunc();
		}

        //验证注册表单
        if($("#memberRegForm").length > 0) {
            memberRegFormFunc();
        }

        //验证忘记密码表单
        if($("#forgotPasswdForm").length > 0) {
            forgotPasswdFormFunc();
        }

        //修改密码
        if($("#modLoginForm").length > 0) {
            modLoginFormFunc();
        }

        //修改安全密码
        if($("#modSerPasswdForm").length > 0) {
            modSerPasswdFormFunc();
        }

        //找回安全密码
        if($("#findSecurityForm").length > 0){
            findSecurityFormFunc();
        }

        //绑定修改手机
        if($("#bindPhoneForm").length > 0){
            bindPhoneFormFunc();
        }

        //绑定邮箱
        if($("#bindEmailForm").length > 0){
            bindEmailFormFunc();
        }

        //添加/编辑资金账号函数
        if($("#accountForm").length > 0){
            accountFormFunc();
        }

        //添加/编辑银行账号函数
        if($("#cnyForm").length > 0){
            cnyFormFunc();
        }

        //提现函数
        if($("#withdrawcashForm").length > 0){
            withdrawcashFormFunc();
        }

        //验证登录表单函数
        function memberLogFormFunc (){
            var rules = {
                account:{
                    minlength: 2,
                    required: true
                },
                password:{
                    minlength: 6,
                    required: true
                }
            };
            var messages = {
                account:{
                    minlength: '手机/邮箱至少2个字符。',
                    required: '手机/邮箱为必填项。'
                },
                password:{
                    minlength: '密码至少6个字符。',
                    required: '密码为必填项。'
                }
            };
            var url = $("#memberLogForm").attr('data-url');

            // 验证
            validateFunc('memberLogForm', rules, messages, url);
        }

        //验证注册表单函数
        function memberRegFormFunc(){
            var formId = "memberRegForm"
            var rules = {
                account: {
                    minlength: 2,
                    required: true,
                    isMobileOrEmail: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                repassword: {
                    minlength: 6,
                    required: true,
                    equalTo: ".password"
                },
                captchaReg: {
                    required: true
                },
                autoCaptcha: {
                    required: true
                }
            };
            var messages = {
                account: {
                    minlength: '手机/邮箱至少2个字符。',
                    required: '手机/邮箱为必填项。'
                },
                password: {
                    minlength: '密码至少6个字符。',
                    required: '密码为必填项。'
                },
                repassword: {
                    minlength: '重复密码至少6个字符。',
                    required: '重复密码为必填项。',
                    equalTo: "两次密码输入不一致。"
                },
                captchaReg: {
                    required: '验证码为必填项'
                },
                autoCaptcha: {
                    required: '动态验证码为必填项'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            $("#" + formId).find(".password").keyup(function () {
                strongPassword(formId, this);
            });

            refreshCode('#reg-captcha-img');

            $('#reg-captcha-img').click(function (event) {
                event.preventDefault();  //阻止默认行为
                event.stopPropagation(); //该方法将停止事件的传播，阻止它被分派到其他 Document 节点

                refreshCode(this);
            });

            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //验证忘记密码表单函数
        function forgotPasswdFormFunc(){
            var formId = 'forgotPasswdForm';
            var rules = {
                account: {
                    minlength: 2,
                    required: true,
                    isMobileOrEmail: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                repassword: {
                    minlength: 6,
                    required: true,
                    equalTo: ".forgotpassword"
                },
                captchaForgot: {
                    required: true
                },
                autoCaptcha: {
                    required: true
                }
            };
            var messages = {
                account: {
                    minlength: '手机/邮箱至少2个字符。',
                    required: '手机/邮箱为必填项。'
                },
                password: {
                    minlength: '密码至少6个字符。',
                    required: '密码为必填项。'
                },
                repassword: {
                    minlength: '重复密码至少6个字符。',
                    required: '重复密码为必填项。',
                    equalTo: "两次密码输入不一致。"
                },
                captchaForgot: {
                    required: '验证码为必填项'
                },
                autoCaptcha: {
                    required: '动态验证码为必填项'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            $("#" + formId).find(".forgotpassword").keyup(function () {
                strongPassword(formId, this);
            });

            refreshCode('#forgot-captcha-img');

            $('#forgot-captcha-img').click(function (event) {
                event.preventDefault();  //阻止默认行为
                event.stopPropagation(); //该方法将停止事件的传播，阻止它被分派到其他 Document 节点

                refreshCode(this);
            });

            // 发送动态验证码
            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //修改密码函数
        function modLoginFormFunc(){
            var formId = 'modLoginForm';
            var rules = {
                opassword: {
                    minlength: 6,
                    required: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                repassword: {
                    minlength: 6,
                    required: true,
                    equalTo: ".password"
                },
                captchaReg: {
                    required: true
                },
                autoCaptcha: {
                    required: true
                }
            };
            var messages = {
                opassword: {
                    minlength: '密码至少6个字符。',
                    required: '密码为必填项。'
                },
                password: {
                    minlength: '密码至少6个字符。',
                    required: '密码为必填项。'
                },
                repassword: {
                    minlength: '重复密码至少6个字符。',
                    required: '重复密码为必填项。',
                    equalTo: "两次密码输入不一致。"
                },
                captchaReg: {
                    required: '验证码为必填项'
                },
                autoCaptcha: {
                    required: '动态验证码为必填项'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            $("#" + formId).find(".password").keyup(function () {
                strongPassword(formId, this);
            });

            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //修改安全密码函数
        function modSerPasswdFormFunc(){
            var formId = 'modSerPasswdForm';
            var rules = {
                opassword: {
                    minlength: 6,
                    required: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                repassword: {
                    minlength: 6,
                    required: true,
                    equalTo: ".serpassword"
                },
                autoCaptcha: {
                    required: true
                }
            };
            var messages = {
                opassword: {
                    minlength: '密码至少6个字符。',
                    required: '密码为必填项。'
                },
                password: {
                    minlength: '密码至少6个字符。',
                    required: '密码为必填项。'
                },
                repassword: {
                    minlength: '重复密码至少6个字符。',
                    required: '重复密码为必填项。',
                    equalTo: "两次密码输入不一致。"
                },
                autoCaptcha: {
                    required: '动态验证码为必填项'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            $("#" + formId).find(".serpassword").keyup(function () {
                strongPassword(formId, this);
            });

            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //找回安全密码函数
        function findSecurityFormFunc(){
            var formId = 'findSecurityForm';
            var rules = {
                password: {
                    minlength: 6,
                    required: true
                },
                captchaSersec: {
                    required: true
                },
                security_password: {
                    minlength: 6,
                    required: true
                },
                repassword: {
                    minlength: 6,
                    required: true,
                    equalTo: ".nsecpassword"
                },
                autoCaptcha: {
                    required: true
                }
            };
            var messages = {
                password: {
                    minlength: '密码至少6个字符。',
                    required: '密码为必填项。'
                },
                captchaSersec: {
                    required: '图像验证码为必填项。'
                },
                security_password: {
                    minlength: '密码至少6个字符。',
                    required: '密码为必填项。'
                },
                repassword: {
                    minlength: '重复密码至少6个字符。',
                    required: '重复密码为必填项。',
                    equalTo: "两次密码输入不一致。"
                },
                autoCaptcha: {
                    required: '动态验证码为必填项'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            refreshCode('#sersec-captcha-img');

            $('#sersec-captcha-img').click(function (event) {
                event.preventDefault();  //阻止默认行为
                event.stopPropagation(); //该方法将停止事件的传播，阻止它被分派到其他 Document 节点

                refreshCode(this);
            });

            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //绑定手机函数
        function bindPhoneFormFunc(){
            var formId = 'bindPhoneForm';
            var rules = {
                cust_phone: {
                    digits: true,
                    required: true
                },
                phoneCaptcha: {
                    required: true
                },
                emailCaptcha: {
                    required: true
                },
                security_password: {
                    minlength: 6,
                    required: true
                }
            };
            var messages = {
                cust_phone: {
                    digits: '手机号码格式错误。',
                    required: '手机号码为必填项。'
                },
                phoneCaptcha: {
                    required: '手机验证码为必填项。'
                },
                emailCaptcha: {
                    required: '动态验证码为必填项'
                },
                security_password: {
                    required: '安全密码为必填项。'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //绑定邮箱函数
        function bindEmailFormFunc(){
            var formId = 'bindEmailForm';
            var rules = {
                cust_email: {
                    email: true,
                    required: true
                },
                autoCaptcha: {
                    required: true
                },
                security_password: {
                    required: true
                }
            };
            var messages = {
                cust_email: {
                    email: '电子邮箱格式错误。',
                    required: '电子邮箱为必填项。'
                },
                autoCaptcha: {
                    required: '动态验证码为必填项'
                },
                security_password: {
                    required: '安全密码为必填项。'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //添加/编辑资金账号函数
        function accountFormFunc(){
            var formId = 'accountForm';
            var rules = {
                account: {
                    required: true
                },
                account_desp: {
                    required: true
                },
                autoCaptcha: {
                    required: true
                },
                security_password: {
                    required: true
                }
            };
            var messages = {
                account: {
                    required: '地址为必填项。'
                },
                account_desp: {
                    required: '地址备注为必填项。'
                },
                autoCaptcha: {
                    required: '动态验证码为必填项'
                },
                security_password: {
                    required: '安全密码为必填项。'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //添加/编辑银行账号
        function cnyFormFunc(){
            var formId = 'cnyForm';
            var rules = {
                bank_account: {
                    required: true
                },
                bank_name: {
                    required: true
                },
                bank_pro_city: {
                    required: true
                },
                bank_child: {
                    required: true
                },
                bank_no: {
                    required: true
                },
                security_password: {
                    required: true
                }
            };
            var messages = {
                bank_account: {
                    required: '开户名为必填项。'
                },
                bank_name: {
                    required: '开户银行为必填项。'
                },
                bank_pro_city: {
                    required: '开户银行省/市为必填项。'
                },
                bank_child: {
                    required: '开户支行名称为必填项。'
                },
                bank_no: {
                    required: '银行卡号为必填项。'
                },
                security_password: {
                    required: '安全密码为必填项。'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //提现函数
        function withdrawcashFormFunc(){
            var formId = 'withdrawcashForm';
            var rules = {
                account_id: {
                    required: true
                },
                amount: {
                    required: true
                },
                security_password: {
                    required: true
                },
                autoCaptcha: {
                    required: true
                }
            };
            var messages = {
                account_id: {
                    required: '提现地址/卡号为必填项。'
                },
                amount: {
                    required: '提现金额为必填项。'
                },
                security_password: {
                    required: '安全密码为必填项。'
                },
                autoCaptcha: {
                    required: '动态验证码为必填项。'
                }
            };
            var url = $("#" + formId).attr('data-url');

            validateFunc(formId, rules, messages, url);

            $("#" + formId).find(".autoCaptchaBtn").click(function(){
                sendAutoCaptcha(formId, this);
            });
        }

        //验证表单
        function validateFunc(id , rules, messages, url){
            $("#" + id).validate({
                rules: rules,
                messages: messages,
                errorClass: "error",
                success: 'valid',
                unhighlight: function(element, errorClass, validClass) {
                    $(element).tooltip('destroy').removeClass(errorClass);
                },
                errorPlacement: function (error, element) {
                    if ($(element).next("div").hasClass("tooltip")) {
                        $(element).attr("data-original-title", $(error).text()).tooltip("show");
                    } else {
                        $(element).attr("title",
                            $(error).text()).tooltip("show");
                    }
                },
                submitHandler: function (form) {
                	var rurl = $("#" + id).attr('save-url');
                	var fromurl = document.URL;
                	var string = fromurl.indexOf('goods');
                    var options = {
                        url:url,
                        type:"post",
                        success: function (data) {
                            if(data) {
                                console.log(data);
                                data = JSON.parse(data);
                                if(data.code == '200'){
                                    if(rurl){
                                        if(string == -1){
                                            window.location.href = rurl;
                                        }else{
                                            window.location.href = fromurl;
                                        }
                                    }else{
                                        window.location.reload();
                                    }
                                }else{
                                    alert(data.message);
                                }
                            }else{
                                alert('提交失败');
                                //$("#submitbtn").removeAttr("disabled");
                            }
                        }
                    };
                    $(form).ajaxSubmit(options);
                }
            });
		}

		// 验证码刷新
        function refreshCode(obj) {
            var url = $(obj).attr('data-api');

            if (url) {
                $.ajax({
                    url: url + '?refresh',
                    dataType: 'json',
                    type: 'get',
                    success: function(data) {
                        $(obj).attr('src', data.url);
                    }
                });
            }
        }

        // 密码强度验证
		function strongPassword(formId, obj){
            /*
			 1. 如果输入的密码位数少于6位，那么就判定为弱。
			 2. 如果输入的密码只由数字、小写字母、大写字母或其它特殊符号当中的一种组成，则判定为弱。
			 3. 如果密码由数字、小写字母、大写字母或其它特殊符号当中的两种组成，则判定为中。
			 4. 如果密码由数字、小写字母、大写字母或其它特殊符号当中的三种以上组成，则判定为强。
             */
            var pwd = $(obj).val();
            var m=0;
            var Modes=0;
            for(var i=0; i<pwd.length; i++){
                var charType=0;
                var t=pwd.charCodeAt(i);
                if(t>=48 && t <=57){charType=1;}
                else if(t>=65 && t <=90){charType=2;}
                else if(t>=97 && t <=122){charType=4;}
                else{charType=4;}
                Modes |= charType;
            }
            for(i=0;i<4;i++){
                if(Modes & 1){m++;}
                Modes>>>=1;
            }
            if(pwd.length<=6){m=1;}
            if(pwd.length<=0){m=0;}

            $("#" + formId).find("div.progress-bar").eq(0).removeClass('progress-bar-success');
            $("#" + formId).find("div.progress-bar").eq(1).removeClass('progress-bar-info');
            $("#" + formId).find("div.progress-bar").eq(2).removeClass('progress-bar-warning');
            $("#" + formId).find("div.progress-bar").eq(3).removeClass('progress-bar-danger');
            $("#" + formId).find("div.progress-bar").removeClass('progress-bar-gray');
            switch(m){
				case 1:
                    $("#" + formId).find("div.progress-bar").eq(0).addClass('progress-bar-success');
                    $("#" + formId).find("div.progress-bar").eq(1).addClass('progress-bar-info');
                    $("#" + formId).find("div.progress-bar").eq(2).addClass('progress-bar-gray');
                    $("#" + formId).find("div.progress-bar").eq(3).addClass('progress-bar-gray');
					break;
				case 2:
                    $("#" + formId).find("div.progress-bar").eq(0).addClass('progress-bar-success');
                    $("#" + formId).find("div.progress-bar").eq(1).addClass('progress-bar-info');
                    $("#" + formId).find("div.progress-bar").eq(2).addClass('progress-bar-warning');
                    $("#" + formId).find("div.progress-bar").eq(3).addClass('progress-bar-gray');
					break;
				case 3:
                    $("#" + formId).find("div.progress-bar").eq(0).addClass('progress-bar-success');
                    $("#" + formId).find("div.progress-bar").eq(1).addClass('progress-bar-info');
                    $("#" + formId).find("div.progress-bar").eq(2).addClass('progress-bar-warning');
                    $("#" + formId).find("div.progress-bar").eq(3).addClass('progress-bar-danger');
					break;
				default:
                    $("#" + formId).find("div.progress-bar").addClass('progress-bar-gray');
					break;
			}
            return true;
		}

		var timeID;
		// 忘记密码或注册时，发送动态验证码
		function sendAutoCaptcha(formId, obj){
			var size = $(obj).find("span").size();
			if(size > 0){
				return;
			}
			var flag = $(obj).attr('data-flag');
			var data = {};
            var account = '';
            //console.log(formId);
            //console.log(flag);
            //console.log($("#" + formId).find("input[name='account']").val());
			if(flag == 'reg' || flag == 'forgot'){  // 未登录状态
                account = $("#" + formId).find("input[name='account']").val();
            }
            var phone = '';
			if(flag == 'phone'){
			    phone = $("#" + formId).find('input[name="cust_phone"]').val();
            }
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
			var url = $(obj).attr('data-url');
            //if (url) {
                $.post(url, {'account':account, 'phone':phone, '_csrf-frontend':csrfToken, 'f': flag}, function(data){
                    //console.log(result);
                    console.log(data);
                    data = JSON.parse(data);
                    alert(data.message);
                });
            //}
			$(obj).html("重新发送<span data-val='10'>(10)</span>");
            timeID =setInterval(function(){myTimer(obj)},1000);
		}

		// 计时
		function myTimer(obj){
			var val = $(obj).find("span").attr('data-val');
			val = parseInt(val, 10) - 1;
			if(val <= -1){
				$(obj).html("动态验证码");
				clearInterval(timeID);
				return;
			}
			$(obj).find("span").attr('data-val', val);
            $(obj).find("span").text('(' + val + ')');
		}

        //Show dropdown on hover only for desktop devices
		//-----------------------------------------------
		var delay=0, setTimeoutConst;
		if (Modernizr.mq('only all and (min-width: 768px)') && !Modernizr.touch) {
			$('.main-navigation .navbar-nav>li.dropdown, .main-navigation li.dropdown>ul>li.dropdown').hover(
			function(){
				var $this = $(this);
				setTimeoutConst = setTimeout(function(){
					$this.addClass('open').slideDown();
					$this.find('.dropdown-toggle').addClass('disabled');
				}, delay);

			},	function(){ 
				clearTimeout(setTimeoutConst );
				$(this).removeClass('open');
				$(this).find('.dropdown-toggle').removeClass('disabled');
			});
		};

		//Show dropdown on click only for mobile devices
		//-----------------------------------------------
		if (Modernizr.mq('only all and (max-width: 767px)') || Modernizr.touch) {
			$('.main-navigation [data-toggle=dropdown], .header-top [data-toggle=dropdown]').on('click', function(event) {
			// Avoid following the href location when clicking
			event.preventDefault(); 
			// Avoid having the menu to close when clicking
			event.stopPropagation(); 
			// close all the siblings
			$(this).parent().siblings().removeClass('open');
			// close all the submenus of siblings
			$(this).parent().siblings().find('[data-toggle=dropdown]').parent().removeClass('open');
			// opening the one you clicked on
			$(this).parent().toggleClass('open');
			});
		};

		//Main slider
		//-----------------------------------------------

		//Revolution Slider
		if ($(".slider-banner-container").length>0) {
			
			$(".tp-bannertimer").show();

			$('.slider-banner-container .slider-banner').show().revolution({
				delay:10000,
				startwidth:1140,
				startheight:520,
				
				navigationArrows:"solo",
				
				navigationStyle: "round",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,

				fullWidth:"on",

				spinner:"spinner0",
				
				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",
				
				autoHeight:"off",						
				forceFullWidth:"off",						
										
				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,						
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,
				
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.slider-banner-container .slider-banner-2').show().revolution({
				delay:10000,
				startwidth:1140,
				startheight:520,
				
				navigationArrows:"solo",
				
				navigationStyle: "preview4",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,

				fullWidth:"on",

				spinner:"spinner0",
				
				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",
				
				autoHeight:"off",						
				forceFullWidth:"off",						
										
				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,						
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,
				
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.slider-banner-container .slider-banner-3').show().revolution({
				delay:10000,
				startwidth:1140,
				startheight:520,
				dottedOverlay: "twoxtwo",

				parallax:"mouse",
				parallaxBgFreeze:"on",
				parallaxLevels:[3,2,1],
				
				navigationArrows:"solo",
				
				navigationStyle: "preview5",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,

				fullWidth:"on",

				spinner:"spinner0",
				
				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",
				
				autoHeight:"off",						
				forceFullWidth:"off",						
										
				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,						
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,
				
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

			$('.slider-banner-container .slider-banner-fullscreen').show().revolution({
				delay:10000,
				startwidth:1140,
				startheight:520,
				fullWidth:"off",
				fullScreen:"on",
				fullScreenOffsetContainer: "",
				fullScreenOffset: "82px",

				navigationArrows:"solo",
				
				navigationStyle: "preview4",
				navigationHAlign:"center",
				navigationVAlign:"bottom",
				navigationHOffset:0,
				navigationVOffset:20,

				soloArrowLeftHalign:"left",
				soloArrowLeftValign:"center",
				soloArrowLeftHOffset:20,
				soloArrowLeftVOffset:0,

				soloArrowRightHalign:"right",
				soloArrowRightValign:"center",
				soloArrowRightHOffset:20,
				soloArrowRightVOffset:0,

				spinner:"spinner4",
				
				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				onHoverStop: "off",

				shuffle:"off",
				hideTimerBar:"on",

				autoHeight:"off",						
				forceFullWidth:"off",						
										
				hideThumbsOnMobile:"off",
				hideNavDelayOnMobile:1500,						
				hideBulletsOnMobile:"off",
				hideArrowsOnMobile:"off",
				hideThumbsUnderResolution:0,
				
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				startWithSlide:0
			});

		};

		//Owl carousel
		//-----------------------------------------------
		if ($('.owl-carousel').length>0) {
			$(".owl-carousel.carousel").owlCarousel({
				items: 4,
				pagination: false,
				navigation: true,
				navigationText: false
			});
			$(".owl-carousel.carousel-autoplay").owlCarousel({
				items: 4,
				autoPlay: 5000,
				pagination: false,
				navigation: true,
				navigationText: false
			});
			$(".owl-carousel.clients").owlCarousel({
				items: 4,
				autoPlay: true,
				pagination: false,
				itemsDesktopSmall: [992,5],
				itemsTablet: [768,4],
				itemsMobile: [479,3]
			});
			$(".owl-carousel.content-slider").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: false,
				navigationText: false,
				pagination: false
			});
			$(".owl-carousel.content-slider-with-controls").owlCarousel({
				singleItem: true,
				autoPlay: false,
				navigation: true,
				navigationText: false,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-controls-autoplay").owlCarousel({
				singleItem: true,
				autoPlay: 5000,
				navigation: true,
				navigationText: false,
				pagination: true
			});
			$(".owl-carousel.content-slider-with-controls-bottom").owlCarousel({
				singleItem: true,
				autoPlay: false,
				navigation: true,
				navigationText: false,
				pagination: true
			});
		};

		// Animations
		//-----------------------------------------------
		if (($("[data-animation-effect]").length>0) && !Modernizr.touch) {
			$("[data-animation-effect]").each(function() {
				var $this = $(this),
				animationEffect = $this.attr("data-animation-effect");
				if(Modernizr.mq('only all and (min-width: 768px)') && Modernizr.csstransitions) {
					$this.appear(function() {
						var delay = ($this.attr("data-effect-delay") ? $this.attr("data-effect-delay") : 1);
						if(delay > 1) $this.css("effect-delay", delay + "ms");
						setTimeout(function() {
							$this.addClass('animated object-visible ' + animationEffect);
						}, delay);
					}, {accX: 0, accY: -130});
				} else {
					$this.addClass('object-visible');
				}
			});
		};

		// Stats Count To
		//-----------------------------------------------
		if ($(".stats [data-to]").length>0) {
			$(".stats [data-to]").each(function() {
				var $this = $(this),
				offset = $this.offset().top;
				if($(window).scrollTop() > (offset - 800) && !($this.hasClass('counting'))) {
					$this.addClass('counting');
					$this.countTo();
				};
				$(window).scroll(function() {
					if($(window).scrollTop() > (offset - 800) && !($this.hasClass('counting'))) {
						$this.addClass('counting');
						$this.countTo();
					}
				});
			});
		};

		// Isotope filters
		//-----------------------------------------------
		if ($('.isotope-container').length>0 || $('.masonry-grid').length>0 || $('.masonry-grid-fitrows').length>0) {
			
			$(window).load(function() {
				$('.masonry-grid').isotope({
					itemSelector: '.masonry-grid-item',
					layoutMode: 'masonry'
				});
				$('.masonry-grid-fitrows').isotope({
					itemSelector: '.masonry-grid-item',
					layoutMode: 'fitRows'
				});
				$('.isotope-container').fadeIn();
				var $container = $('.isotope-container').isotope({
					itemSelector: '.isotope-item',
					layoutMode: 'masonry',
					transitionDuration: '0.6s',
					filter: "*"
				});
				// filter items on button click
				$('.filters').on( 'click', 'ul.nav li a', function() {
					var filterValue = $(this).attr('data-filter');
					$(".filters").find("li.active").removeClass("active");
					$(this).parent().addClass("active");
					$container.isotope({ filter: filterValue });
					return false;
				});
			});
		};

		//hc-tabs
		//-----------------------------------------------
		if ($('.hc-tabs').length>0) {
			$(window).load(function() {
				var currentTab = $(".hc-tabs .nav.nav-tabs li.active a").attr("href"),
				tabsImageAnimation = $(".hc-tabs-top").find("[data-tab='" + currentTab + "']").attr("data-tab-animation-effect");
				$(".hc-tabs-top").find("[data-tab='" + currentTab + "']").addClass("current-img show " + tabsImageAnimation + " animated");
				
				$('.hc-tabs .nav.nav-tabs li a').on('click', function(event) {
					var currentTab = $(this).attr("href"),
					tabsImageAnimation = $(".hc-tabs-top").find("[data-tab='" + currentTab + "']").attr("data-tab-animation-effect");
					$(".current-img").removeClass("current-img show " + tabsImageAnimation + " animated");
					$(".hc-tabs-top").find("[data-tab='" + currentTab + "']").addClass("current-img show " + tabsImageAnimation + " animated");
				});
			});

		}

		// Animated Progress Bars
		//-----------------------------------------------
		if ($("[data-animate-width]").length>0) {
			$("[data-animate-width]").each(function() {
				var $this = $(this);
				$this.appear(function() {
					$this.animate({
						width: $this.attr("data-animate-width")
					}, 800 );
				}, {accX: 0, accY: -100});
			});
		};

		// Animated Progress Bars
		//-----------------------------------------------
		if ($(".knob").length>0) {
			$(".knob").knob();
		}

		// Magnific popup
		//-----------------------------------------------
		if (($(".popup-img").length > 0) || ($(".popup-iframe").length > 0) || ($(".popup-img-single").length > 0)) { 		
			$(".popup-img").magnificPopup({
				type:"image",
				gallery: {
					enabled: true,
				}
			});
			$(".popup-img-single").magnificPopup({
				type:"image",
				gallery: {
					enabled: false,
				}
			});
			$('.popup-iframe').magnificPopup({
				disableOn: 700,
				type: 'iframe',
				preloader: false,
				fixedContentPos: false
			});
		};		

		// Fixed header
		//-----------------------------------------------
		var	headerTopHeight = $(".header-top").outerHeight(),
		headerHeight = $("header.header.fixed").outerHeight();
		$(window).scroll(function() {
			if (($(".header.fixed").length > 0)) { 
				if(($(this).scrollTop() > headerTopHeight+headerHeight) && ($(window).width() > 767)) {
					$("body").addClass("fixed-header-on");
					$(".header.fixed").addClass('animated object-visible fadeInDown');
					if ($(".banner:not(.header-top)").length>0) {
						$(".banner").css("marginTop", (headerHeight)+"px");
					} else if ($(".page-intro").length>0) {
						$(".page-intro").css("marginTop", (headerHeight)+"px");
					} else if ($(".page-top").length>0) {
						$(".page-top").css("marginTop", (headerHeight)+"px");
					} else {
						$("section.main-container").css("marginTop", (headerHeight)+"px");
					}
				} else {
					$("body").removeClass("fixed-header-on");
					$("section.main-container").css("marginTop", (0)+"px");
					$(".banner").css("marginTop", (0)+"px");
					$(".page-intro").css("marginTop", (0)+"px");
					$(".page-top").css("marginTop", (0)+"px");
					$(".header.fixed").removeClass('animated object-visible fadeInDown');
				}
			};
		});

		// Sharrre plugin
		//-----------------------------------------------
		if ($('#share').length>0) {
			$('#share').sharrre({
				share: {
					twitter: true,
					facebook: true,
					googlePlus: true
				},
				template: '<ul class="social-links clearfix"><li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li><li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li><li class="googleplus"><a href="#"><i class="fa fa-google-plus"></i></a></li></ul>',
				enableHover: false,
				enableTracking: true,
				render: function(api, options){
					$(api.element).on('click', '.twitter a', function() {
						api.openPopup('twitter');
					});
					$(api.element).on('click', '.facebook a', function() {
						api.openPopup('facebook');
					});
					$(api.element).on('click', '.googleplus a', function() {
						api.openPopup('googlePlus');
					});
				}
			});
		};

		// Contact forms validation
		//-----------------------------------------------		
		if($("#contact-form").length>0) {
			$("#contact-form").validate({
				submitHandler: function(form) {

					var submitButton = $(this.submitButton);
					submitButton.button("loading");

					$.ajax({
						type: "POST",
						url: "php/contact-form.php",
						data: {
							"name": $("#contact-form #name").val(),
							"email": $("#contact-form #email").val(),
							"subject": $("#contact-form #subject").val(),
							"message": $("#contact-form #message").val()
						},
						dataType: "json",
						success: function (data) {
							if (data.response == "success") {

								$("#contactSuccess").removeClass("hidden");
								$("#contactError").addClass("hidden");

								// Reset Form
								$("#contact-form .form-control")
									.val("")
									.blur()
									.parent()
									.removeClass("has-success")
									.removeClass("has-error")
									.find("label")
									.removeClass("hide")
									.parent()
									.find("span.error")
									.remove();

								if(($("#contactSuccess").position().top - 80) < $(window).scrollTop()){
									$("html, body").animate({
										 scrollTop: $("#contactSuccess").offset().top - 80
									}, 300);
								}

							} else {

								$("#contactError").removeClass("hidden");
								$("#contactSuccess").addClass("hidden");

								if(($("#contactError").position().top - 80) < $(window).scrollTop()){
									$("html, body").animate({
										 scrollTop: $("#contactError").offset().top - 80
									}, 300);
								}

							}
						},
						complete: function () {
							submitButton.button("reset");
						}
					});
				},				
				// debug: true,
				errorPlacement: function(error, element) {
					error.insertBefore( element );
				},
				onkeyup: false,
				onclick: false,
				rules: {
					name: {
						required: true,
						minlength: 2
					},
					email: {
						required: true,
						email: true
					},
					subject: {
						required: true
					},
					message: {
						required: true,
						minlength: 10
					}
				},
				messages: {
					name: {
						required: "Please specify your name",
						minlength: "Your name must be longer than 2 characters"
					},
					email: {
						required: "We need your email address to contact you",
						email: "Please enter a valid email address e.g. name@domain.com"
					},
					subject: {
						required: "Please enter a subject"
					},
					message: {
						required: "Please enter a message",
						minlength: "Your message must be longer than 10 characters"
					}					
				},
				errorElement: "span",
				highlight: function (element) {
					$(element).parent().removeClass("has-success").addClass("has-error");
					$(element).siblings("label").addClass("hide"); 
				},
				success: function (element) {
					$(element).parent().removeClass("has-error").addClass("has-success");
					$(element).siblings("label").removeClass("hide"); 
				}
			});
		};

		if($("#footer-form").length>0) {
			$("#footer-form").validate({
				submitHandler: function(form) {

					var submitButton = $(this.submitButton);
					submitButton.button("loading");

					$.ajax({
						type: "POST",
						url: "php/contact-form.php",
						data: {
							"name": $("#footer-form #name2").val(),
							"email": $("#footer-form #email2").val(),
							"subject": "Message from contact form",
							"message": $("#footer-form #message2").val()
						},
						dataType: "json",
						success: function (data) {
							if (data.response == "success") {

								$("#contactSuccess2").removeClass("hidden");
								$("#contactError2").addClass("hidden");

								// Reset Form
								$("#footer-form .form-control")
									.val("")
									.blur()
									.parent()
									.removeClass("has-success")
									.removeClass("has-error")
									.find("label")
									.removeClass("hide")
									.parent()
									.find("span.error")
									.remove();

								if(($("#contactSuccess2").position().top - 80) < $(window).scrollTop()){
									$("html, body").animate({
										 scrollTop: $("#contactSuccess2").offset().top - 80
									}, 300);
								}

							} else {

								$("#contactError2").removeClass("hidden");
								$("#contactSuccess2").addClass("hidden");

								if(($("#contactError2").position().top - 80) < $(window).scrollTop()){
									$("html, body").animate({
										 scrollTop: $("#contactError2").offset().top - 80
									}, 300);
								}

							}
						},
						complete: function () {
							submitButton.button("reset");
						}
					});
				},				
				// debug: true,
				errorPlacement: function(error, element) {
					error.insertAfter( element );
				},
				onkeyup: false,
				onclick: false,
				rules: {
					name2: {
						required: true,
						minlength: 2
					},
					email2: {
						required: true,
						email: true
					},
					message2: {
						required: true,
						minlength: 10
					}
				},
				messages: {
					name2: {
						required: "Please specify your name",
						minlength: "Your name must be longer than 2 characters"
					},
					email2: {
						required: "We need your email address to contact you",
						email: "Please enter a valid email address e.g. name@domain.com"
					},
					message2: {
						required: "Please enter a message",
						minlength: "Your message must be longer than 10 characters"
					}
				},
				errorElement: "span",
				highlight: function (element) {
					$(element).parent().removeClass("has-success").addClass("has-error");
					$(element).siblings("label").addClass("hide"); 
				},
				success: function (element) {
					$(element).parent().removeClass("has-error").addClass("has-success");
					$(element).siblings("label").removeClass("hide"); 
				}
			});
		};

		if($("#sidebar-form").length>0) {

			$("#sidebar-form").validate({
				submitHandler: function(form) {

					var submitButton = $(this.submitButton);
					submitButton.button("loading");

					$.ajax({
						type: "POST",
						url: "php/contact-form.php",
						data: {
							"name": $("#sidebar-form #name3").val(),
							"email": $("#sidebar-form #email3").val(),
							"subject": "Message from FAQ page",
							"category": $("#sidebar-form #category").val(),
							"message": $("#sidebar-form #message3").val()
						},
						dataType: "json",
						success: function (data) {
							if (data.response == "success") {

								$("#contactSuccess3").removeClass("hidden");
								$("#contactError3").addClass("hidden");

								// Reset Form
								$("#sidebar-form .form-control")
									.val("")
									.blur()
									.parent()
									.removeClass("has-success")
									.removeClass("has-error")
									.find("label")
									.removeClass("hide")
									.parent()
									.find("span.error")
									.remove();

								if(($("#contactSuccess3").position().top - 80) < $(window).scrollTop()){
									$("html, body").animate({
										 scrollTop: $("#contactSuccess3").offset().top - 80
									}, 300);
								}

							} else {

								$("#contactError3").removeClass("hidden");
								$("#contactSuccess3").addClass("hidden");

								if(($("#contactError3").position().top - 80) < $(window).scrollTop()){
									$("html, body").animate({
										 scrollTop: $("#contactError3").offset().top - 80
									}, 300);
								}

							}
						},
						complete: function () {
							submitButton.button("reset");
						}
					});
				},				
				// debug: true,
				errorPlacement: function(error, element) {
					error.insertAfter( element );
				},
				onkeyup: false,
				onclick: false,
				rules: {
					name3: {
						required: true,
						minlength: 2
					},
					email3: {
						required: true,
						email: true
					},
					message3: {
						required: true,
						minlength: 10
					}
				},
				messages: {
					name3: {
						required: "Please specify your name",
						minlength: "Your name must be longer than 2 characters"
					},
					email3: {
						required: "We need your email address to contact you",
						email: "Please enter a valid email address e.g. name@domain.com"
					},
					message3: {
						required: "Please enter a message",
						minlength: "Your message must be longer than 10 characters"
					}					
				},
				errorElement: "span",
				highlight: function (element) {
					$(element).parent().removeClass("has-success").addClass("has-error");
				},
				success: function (element) {
					$(element).parent().removeClass("has-error").addClass("has-success");
				}
			});

		};

		// Affix plugin
		//-----------------------------------------------
		if ($("#affix").length>0) {
			$(window).load(function() {

				var affixBottom = $(".footer").outerHeight(true) + $(".subfooter").outerHeight(true) + $(".blogpost footer").outerHeight(true),
				affixTop = $("#affix").offset().top;
				
				if ($(".comments").length>0) {
					affixBottom = affixBottom + $(".comments").outerHeight(true);
				}

				if ($(".comments-form").length>0) {
					affixBottom = affixBottom + $(".comments-form").outerHeight(true);
				}

				if ($(".footer-top").length>0) {
					affixBottom = affixBottom + $(".footer-top").outerHeight(true);
				}

				if ($(".header.fixed").length>0) {
					$("#affix").affix({
				        offset: {
				          top: affixTop-150,
				          bottom: affixBottom+100
				        }
				    });
				} else {
					$("#affix").affix({
				        offset: {
				          top: affixTop-35,
				          bottom: affixBottom+100
				        }
				    });
				}

			});
		}
		if ($(".affix-menu").length>0) {
			setTimeout(function () {
				var $sideBar = $('.sidebar')

				$sideBar.affix({
					offset: {
						top: function () {
							var offsetTop      = $sideBar.offset().top
							return (this.top = offsetTop - 65)
						},
						bottom: function () {
							var affixBottom = $(".footer").outerHeight(true) + $(".subfooter").outerHeight(true)
							if ($(".footer-top").length>0) {
								affixBottom = affixBottom + $(".footer-top").outerHeight(true)
							}						
							return (this.bottom = affixBottom+50)
						}
					}
				})
			}, 100)
		}

		//Smooth Scroll
		//-----------------------------------------------
		if ($(".smooth-scroll").length>0) {
			if($(".header.fixed").length>0) {
				$('.smooth-scroll a[href*=#]:not([href=#]), a[href*=#]:not([href=#]).smooth-scroll').click(function() {
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							$('html,body').animate({
								scrollTop: target.offset().top-65
							}, 1000);
							return false;
						}
					}
				});
			} else {
				$('.smooth-scroll a[href*=#]:not([href=#]), a[href*=#]:not([href=#]).smooth-scroll').click(function() {
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							$('html,body').animate({
								scrollTop: target.offset().top
							}, 1000);
							return false;
						}
					}
				});
			}
		}

		//Scroll Spy
		//-----------------------------------------------
		if($(".scrollspy").length>0) {
			$("body").addClass("scroll-spy");
			if($(".fixed.header").length>0) {
				$('body').scrollspy({ 
					target: '.scrollspy',
					offset: 85
				});
			} else {
				$('body').scrollspy({ 
					target: '.scrollspy',
					offset: 20
				});
			}
		}

		//Scroll totop
		//-----------------------------------------------
		$(window).scroll(function() {
			if($(this).scrollTop() != 0) {
				$(".scrollToTop").fadeIn();	
			} else {
				$(".scrollToTop").fadeOut();
			}
		});
		
		$(".scrollToTop").click(function() {
			$("body,html").animate({scrollTop:0},800);
		});
		
		//Modal
		//-----------------------------------------------
		if($(".modal").length>0) {
			$(".modal").each(function() {
				$(".modal").prependTo( "body" );
			});
		}
		
		// Pricing tables popovers
		//-----------------------------------------------
		if ($(".pricing-tables").length>0) {
			$(".plan .pt-popover").popover({
				trigger: 'hover'
			});
		};

		// Parallax section
		//-----------------------------------------------
		if (($(".parallax").length>0)  && !Modernizr.touch ){
			$(".parallax").parallax("50%", 0.2, false);
		};

		// Remove Button
		//-----------------------------------------------
		$(".btn-remove").click(function() {
			$(this).closest(".remove-data").remove();
		});

		// Shipping Checkbox
		//-----------------------------------------------
		if ($("#shipping-info-check").is(':checked')) {
			$("#shipping-information").hide();
		}
		$("#shipping-info-check").change(function(){
			if ($(this).is(':checked')) {
				$("#shipping-information").slideToggle();
			} else {
				$("#shipping-information").slideToggle();
			}
		});

	}); // End document ready

})(this.jQuery);