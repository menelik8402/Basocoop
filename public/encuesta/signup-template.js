var emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,10})$/;
var brPhoneMask = '(99) 9999[9]-9999';
var brPhoneRegExp = /^\(\d{2}\) \d{4,5}\-\d{4}?$/;
var brPhoneError = 'Por favor, forneça um número de telefone válido.';
var esPhoneMask = '99[9]-99[9]-999[9]';
var esPhoneRegExp = /^\d{2,3}\-\d{2,3}\-\d{3,4}?$/;
var esPhoneError = 'Por favor, proporcione un número de teléfono válido.';
var ptPhoneMask = '99-999-9999';
var ptPhoneRegExp = /^\d{2}\-\d{3}\-\d{4}?$/;
var ptPhoneError = 'Por favor, forneça um número de telefone válido.';
var mxPhoneMask = '(999) 9999999';
var mxPhoneRegExp = /^\(\d{3}\) \d{7}?$/;
var mxPhoneError = 'Por favor, proporcione un número de teléfono válido.';
var clPhoneMask = '(9) 9999-9999';
var clPhoneRegExp = /^\(\d{1}\) \d{4}\-\d{4}?$/;
var clPhoneError = 'Por favor, proporcione un número de teléfono válido.';
var arPhoneMask = '(99) 9999-9999';
var arPhoneRegExp = /^\(\d{2}\) \d{4}\-\d{4}?$/;
var arPhoneError = 'Por favor, proporcione un número de teléfono válido.';
// Close modal on Esc
$(document).on('keyup',function(e) {
	var key = e.which || e.keyCode;
	if (key == 27) {
		$.fancybox.close();
	}
});
// Set cursor position before @
function setCursorPosition(input,selectionStart){
	var selectionEnd = selectionStart;
	if (input.createTextRange){
		var range = input.createTextRange();
		range.collapse(true);
		range.moveEnd('character',selectionEnd);
		range.moveStart('character',selectionStart);
		range.select();
	} else {
		if (input.setSelectionRange) {
			setTimeout(function(){try{input.setSelectionRange(selectionStart,selectionEnd);}catch(e){}},10);
		}
	}
}
// Required phone
function requiredPhone(form) {
	if (form.hasClass('phone-br')) { // BR
		var phoneReq = true;
		jQuery.validator.addMethod('phoneFormat',function (value,element) {
			return this.optional(element) || brPhoneRegExp.test(value);
		},brPhoneError);
	} else if (form.hasClass('phone-es')) { // ES
		var phoneReq = true;
		jQuery.validator.addMethod('phoneFormat',function (value,element) {
			return this.optional(element) || esPhoneRegExp.test(value);
		},esPhoneError);
	} else if (form.hasClass('phone-pt')) { // PT
		var phoneReq = true;
		jQuery.validator.addMethod('phoneFormat',function (value,element) {
			return this.optional(element) || ptPhoneRegExp.test(value);
		},ptPhoneError);
	} else if (form.hasClass('phone-mx')) { // MX
		var phoneReq = true;
		jQuery.validator.addMethod('phoneFormat',function (value,element) {
			return this.optional(element) || mxPhoneRegExp.test(value);
		},mxPhoneError);
	} else if (form.hasClass('phone-cl')) { // CL
		var phoneReq = true;
		jQuery.validator.addMethod('phoneFormat',function (value,element) {
			return this.optional(element) || clPhoneRegExp.test(value);
		},clPhoneError);
	} else if (form.hasClass('phone-ar')) { // AR
		var phoneReq = true;
		jQuery.validator.addMethod('phoneFormat',function (value,element) {
			return this.optional(element) || arPhoneRegExp.test(value);
		},clPhoneError);
	} else {
		var phoneReq = false;
	}
	return phoneReq;
}
/* Reg form */
popupSignup = function(){
	$('a.register').on('click', function(e){
		var template = $(this).data('t');
		var referrer = $(this).data('r');
		e.preventDefault();
		
		$.fancybox.open({
			href: '/'+lang.code+'/dialog-registration',
			type: 'ajax',
			margin: 0,
			helpers : {
				overlay : {
					css : {
						'background' : 'rgba(0,0,0,0.85)'
					}
				}
			},
			'afterShow': function () {
				var form = $('.signform');
				var input = document.getElementById('reg_email');
				if (emailRegExp.test(form.find('input[name=reg_email]').val()) == false) {
					form.find('input[name=reg_email]').focus();
				} else {
					form.find('input[name=reg_passwd]').focus();
				}
				
				
				$( '.js-float-label-wrapper' ).FloatLabel();
				if (bowser.tablet != true && bowser.mobile != true) {
					if ($('.signform.phone-br,.signform.phone-es,.signform.phone-pt,.signform.phone-mx,.signform.phone-cl,.signform.phone-ar').length) {
						$('.signform input[name=reg_email]').attr('value','@');
						$('.signform input[name=reg_email]').focus();
						setCursorPosition(input,0);
					} else {
						$('.signform input[name=reg_name]').focus();
					}
				}
				if ($('.signform.phone-br').length) { // BR
					$('.signform.phone-br input[name=reg_phone]').inputmask({
						mask: brPhoneMask,
						showMaskOnHover: false
					});
				}
				if ($('.signform.phone-es').length) { // ES
					$('.signform.phone-es input[name=reg_phone]').inputmask({
						mask: esPhoneMask,
						showMaskOnHover: false
					});
				}
				if ($('.signform.phone-pt').length) { // PT
					$('.signform.phone-pt input[name=reg_phone]').inputmask({
						mask: ptPhoneMask,
						showMaskOnHover: false
					});
				}
				if ($('.signform.phone-mx').length) { // MX
					$('.signform.phone-mx input[name=reg_phone]').inputmask({
						mask: mxPhoneMask,
						showMaskOnHover: false
					});
				}
				if ($('.signform.phone-cl').length) { // CL
					$('.signform.phone-cl input[name=reg_phone]').inputmask({
						mask: clPhoneMask,
						showMaskOnHover: false
					});
				}
				if ($('.signform.phone-ar').length) { // AR
					$('.signform.phone-ar input[name=reg_phone]').inputmask({
						mask: arPhoneMask,
						showMaskOnHover: false
					});
				}
				if (template) {
					$('[name=template]').val(template);
				}
				if (referrer) {
					$('[name=referring_page]').val(referrer);
				}
				$('[name=signup_page]').val(location.href);
				$('.signform').validate({
					rules: {
						'reg_email': {
							required: true,
							email: true,
							remote: '/login-free'
						},
						'reg_passwd': {
							required: true,
							minlength: 8
						},
						'reg_phone': {
							required: requiredPhone(form),
							phoneFormat: requiredPhone(form)
						}
					},
					highlight: function(element,errorClass,validClass) {
						$(element).parent().addClass(errorClass).removeClass(validClass);
					},
					unhighlight: function(element,errorClass,validClass) {
						$(element).parent().removeClass(errorClass).addClass(validClass);
					},
					messages: {reg_email:{remote:lang.login_taken}}
				});
				$('.signform input[name=reg_email]').on('focus',function(){
					if (!$(this).val()) {
						$(this).attr('value','@');
						var input = document.getElementById('reg_email');
						setCursorPosition(input,0);
					}
				});
				$('.signform input[name=reg_email]').on('click',function(){
					if ($(this).val() == '@') {
						var input = document.getElementById('reg_email');
						setCursorPosition(input,0);
					}
				});
				$('.signform .form-button a').click(function(){
					var $form = $(this).parents('form');
					var $button = $(this);
					if ($('.signform').valid()) {
						$button.addClass('spinner');
						setTimeout (function(){
							$form.submit();
						},500);
					}
				});
				$('.signform input').on('keydown',function(e) {
					var key = e.which || e.keyCode;
					if (key == 13) {
						var $form = $(this).parents('form');
						var $button = $(this).parent().parent().find('.form-button a');
						if ($('.signform').valid()) {
							$button.addClass('spinner');
							setTimeout (function(){
								$form.submit();
							},500);
						}
					}
				});
			}
		});
	});
}
