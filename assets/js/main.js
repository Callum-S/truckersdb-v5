$('[data-toggle="tooltip"]').tooltip();
$('a[target="_blank"]').tooltip({
    title: 'This link opens in a new tab.'
});

$('#loginErr').hide();
$('#regErr').hide();
$('#forgotAlert').hide();
$('#loginSpinner').hide();
$('#regLoading').hide();
$('#forgotSpinner').hide();

$('#password-checker ul li').css('list-style-image','url("./assets/img/pc-red.png")');
$('#password-checker #pc-meter-level *').hide();

$('.dropdown-menu').click(function(e){
	e.stopPropagation();
});

var unstuck = false;
setInterval(function(){
	if($('.login-dropdown').hasClass('show')){
		$('nav.navbar').addClass('unstick');
		$(window).trigger('scrollToTop');
		unstuck = true;
	} else{
		$('nav.navbar').removeClass('unstick');
		unstuck = false;
	}
}, 200);

$(window).on('scrollToTop', function(e){
	if($('nav.navbar').css('position') == 'static' && unstuck == false){
		$(window).scrollTop(0);
	}
});


$('#regUserName').change(function(e){
	$('#regUserName').val($('#regUserName').val().replace(/\s/g, ''));
	if($('#regUserName').val().length > 0){
		$('#regUserName').css('border-color', 'green');
		$('#regUserName').attr('valid', 'true');
	} else if($('#regUserName').val().length == 0){
		$('#regUserName').css('border-color', '#ced4da');
		$('#regUserName').attr('valid', 'false');
	} else{
		$('#regUserName').css('border-color', 'red');
		$('#regUserName').attr('valid', 'false');
	}
});

$('#regDisplayName').change(function(e){
	if($('#regDisplayName').val().length > 0){
		$('#regDisplayName').css('border-color', 'green');
		$('#regDisplayName').attr('valid', 'true');
	} else{
		$('#regDisplayName').css('border-color', '#ced4da');
		$('#regDisplayName').attr('valid', 'true');
	}
});

$('#regEmailAddress').change(function(e){
	var emailRegEx = /^((([!#$%&'*+\-\/=?^_`{|}~\w])|([!#$%&'*+\-\/=?^_`{|}~\w][!#$%&'*+\-\/=?^_`{|}~\.\w]{0,}[!#$%&'*+\-\/=?^_`{|}~\w]))[@]\w+([-.]\w+)*\.\w+([-.]\w+)*)$/;
	if(emailRegEx.test($('#regEmailAddress').val())){
		$('#regEmailAddress').css('border-color', 'green');
		$('#regEmailAddress').attr('valid', 'true');
	} else if($('#regEmailAddress').val() == ''){
		$('#regEmailAddress').css('border-color', '#ced4da');
		$('#regEmailAddress').attr('valid', 'false');
	} else{
		$('#regEmailAddress').css('border-color', 'red');
		$('#regEmailAddress').attr('valid', 'false');
	}
});

$('#regEmailConfirm').change(function(e){
	var emailRegEx = /^((([!#$%&'*+\-\/=?^_`{|}~\w])|([!#$%&'*+\-\/=?^_`{|}~\w][!#$%&'*+\-\/=?^_`{|}~\.\w]{0,}[!#$%&'*+\-\/=?^_`{|}~\w]))[@]\w+([-.]\w+)*\.\w+([-.]\w+)*)$/;
	if(emailRegEx.test($('#regEmailConfirm').val()) && $('#regEmailConfirm').val() == $('#regEmailAddress').val()){
		$('#regEmailConfirm').css('border-color', 'green');
		$('#regEmailConfirm').attr('valid', 'true');
	} else if($('#regEmailConfirm').val() == ''){
		$('#regEmailConfirm').css('border-color', '#ced4da');
		$('#regEmailConfirm').attr('valid', 'false');
	} else{
		$('#regEmailConfirm').css('border-color', 'red');
		$('#regEmailConfirm').attr('valid', 'false');
	}
});

$('#regPassword').keyup(function(e){
	var pass = $('#regPassword').val();
	CheckPass(pass);
});

$('#regPasswordConfirm').change(function(e){
	if($('#regPasswordConfirm').val() == $('#regPassword').val() && $('#regPasswordConfirm').val() != ''){
		$('#regPasswordConfirm').css('border-color', 'green');
		$('#regPasswordConfirm').attr('valid', 'true');
	} else if($('#regPasswordConfirm').val() == ''){
		$('#regPasswordConfirm').css('border-color', '#ced4da');
		$('#regPasswordConfirm').attr('valid', 'false');
	} else{
		$('#regPasswordConfirm').css('border-color', 'red');
		$('#regPasswordConfirm').attr('valid', 'false');
	}
});

$('#regBirth').change(function(e){
	var dates = $('#regBirth').val().split("-");
	var month = dates[1];
	var year = dates[0];
	
	var now = new Date();
	var nowM = now.getMonth() + 1;
	var nowY = now.getFullYear();
	
	if($('#regBirth').val() == ''){
		$('#regBirth').css('border-color', '#ced4da');
		$('#regBirth').attr('valid', 'false');
	} else if(year > (nowY - 13)){
		$('#regBirth').css('border-color', 'red');
		$('#regBirth').attr('valid', 'false');
	} else if(year == (nowY - 13) && month < nowM){
		$('#regBirth').css('border-color', 'red');
		$('#regBirth').attr('valid', 'false');
	} else{
		$('#regBirth').css('border-color', 'green');
		$('#regBirth').attr('valid', 'true');
	}
});

$('#agreeTerms').change(function(e){
	var valid = $('#agreeTerms').is(':checked');
	if(!valid){
		$(this).closest('.form-check').find('label').css('color', 'red');
		$(this).closest('.form-check').find('label').css('font-weight', 'bold');
	} else{
		$(this).closest('.form-check').find('label').css('color', '#000');
		$(this).closest('.form-check').find('label').css('font-weight', 'normal');
	}
	$('#agreeTerms').attr('valid', valid);
});



$('#loginBtn').click(function(e){
	e.preventDefault();
	$('#loginBtn').attr("disabled", true);
	$('#loginSpinner').show();
	var loginUser = $('#loginUser').val();
	var loginPass = $('#loginPass').val();
	$.ajax({
		url: 'https://api.truckersdb.net/v3/user/userAuth.php',
		type: 'POST',
		cache: false,
		data: {
			loginUser: loginUser,
			loginPass: loginPass
		},
		success: function(res){
			if(res.status == 1){
				var userID = res.response.userID;
				var lang = res.response.lang;
				var perms = res.response.perms;
				$.ajax({
					url: 'login.php',
					type: 'POST',
					cache: false,
					data: {
						userID: userID,
						lang: lang,
						perms: perms,
						companyID: res.response.companyID
					},
					success: function(res){
						if(res.status == 1){
							$('#loginBtn').attr("disabled", false);
							$('#loginErr').html('').fadeOut();
							location.reload();
						} else{
							$('#loginSpinner').hide();
							$('#loginBtn').attr("disabled", false);
							$('#loginErr').html('Error: ' + res.error).fadeIn();
							setTimeout(function(){
								$('#loginErr').fadeOut();
							}, 2000);
						}
					}
				});
			} else{
				$('#loginSpinner').hide();
				$('#loginBtn').attr("disabled", false);
				$('#loginErr').html('Error: ' + res.error).fadeIn();
				setTimeout(function(){
					$('#loginErr').fadeOut();
				}, 2000);
			}
		}
	});
});

$('#regSubmit').click(function(e){
	e.preventDefault();
	$('#regSubmit').attr("disabled", true);
	$('#regLoading').show();
	if(ValidateRegForm() && $('#agreeTerms').is(':checked')){
		var userName = $('#regUserName').val();
		var displayName = $('#regDisplayName').val();
		var emailAddress = $('#regEmailAddress').val();
		var password = $('#regPassword').val();
		
		$.ajax({
			url: 'https://api.truckersdb.net/v3/user/registerUser.php',
			type: 'POST',
			cache: false,
			data: {
				userName: userName,
				displayName: displayName,
				emailAddress: emailAddress,
				password: password
			},
			success: function(res){
				if(res.status == 1){
					$('#regSubmit').attr("disabled", false);
					window.location.replace('registration-finish.php');
				} else{
					$('#regLoading').hide();
					$('#regSubmit').attr("disabled", false);
					alert('An error occured: ' + res.error);
				}
			}
		});
	} else{
		$('#regLoading').hide();
		$('#regSubmit').attr("disabled", false);
		$('#regErr').fadeIn();
		setTimeout(function(){
			$('#regErr').fadeOut();
		}, 2000);
	}
});

$('#forgotSubmit').click(function(e){
	e.preventDefault();
	$('#forgotSubmit').attr("disabled", true);
	$('#forgotSpinner').show();
	
	var emailRegEx = /^((([!#$%&'*+\-\/=?^_`{|}~\w])|([!#$%&'*+\-\/=?^_`{|}~\w][!#$%&'*+\-\/=?^_`{|}~\.\w]{0,}[!#$%&'*+\-\/=?^_`{|}~\w]))[@]\w+([-.]\w+)*\.\w+([-.]\w+)*)$/;
	if(emailRegEx.test($('#forgotEmail').val())){
		var emailAddress = $('#forgotEmail').val();
		$('#forgotEmail').val('');
		$.ajax({
			url: 'https://api.truckersdb.net/v3/user/sendResetLink.php',
			type: 'POST',
			cache: false,
			data: {
				emailAddress: emailAddress
			},
			success: function(res){
				$('#forgotSpinner').hide();
				$('#forgotSubmit').attr("disabled", false);
				if(res.status == 1){
					$('#forgotAlert').removeClass('alert-danger').addClass('alert-success').html(res.response.message).fadeIn();
					setTimeout(function(){
						$('#forgotAlert').fadeOut();
					}, 2000);
				} else{
					$('#forgotAlert').removeClass('alert-success').addClass('alert-danger').html('<strong>Error:</strong> ' + res.error).fadeIn();
					setTimeout(function(){
						$('#forgotAlert').fadeOut();
					}, 2000);
				}
			}
		});
	} else{
		$('#forgotSpinner').hide();
		$('#forgotSubmit').attr("disabled", false);
		$('#forgotAlert').removeClass('alert-success').addClass('alert-danger').html('<strong>Error:</strong> Email address is invalid!').fadeIn();
		setTimeout(function(){
			$('#forgotAlert').fadeOut();
		}, 2000);
	}
});

function CheckPass(password){
	var lc = /[a-z]/;
	var uc = /[A-Z]/;
	var no = /[0-9]/;
	
	var score = 0;
	
	if(lc.test(password)){
		$('#password-checker #pc-lower').css('list-style-image','url("./assets/img/pc-green.png")');
		score++;
	} else{
		$('#password-checker #pc-lower').css('list-style-image','url("./assets/img/pc-red.png")');
	}
	if(uc.test(password)){
		$('#password-checker #pc-upper').css('list-style-image','url("./assets/img/pc-green.png")');
		score++;
	} else{
		$('#password-checker #pc-upper').css('list-style-image','url("./assets/img/pc-red.png")');
	}
	if(no.test(password)){
		$('#password-checker #pc-num').css('list-style-image','url("./assets/img/pc-green.png")');
		score++;
	} else{
		$('#password-checker #pc-num').css('list-style-image','url("./assets/img/pc-red.png")');
	}
	if(password.length >= 8 && password.length < 12){
		$('#password-checker #pc-chars').css('list-style-image','url("./assets/img/pc-green.png")');
		score++;
	} else if(password.length >= 12){
		$('#password-checker #pc-chars').css('list-style-image','url("./assets/img/pc-green.png")');
		score += 2;
	} else{
		$('#password-checker #pc-chars').css('list-style-image','url("./assets/img/pc-red.png")');
		score = 0;
	}
	
	if(score == 0){
		$('#password-checker #pc-meter-level div').hide();
		$('#password-checker #pc-meter #pc-meter-strength').css('color', '#000').html('None');
		$('#regPassword').attr('valid', 'false');
		if(password.length == 0){
			$('#regPassword').css('border-color', '#ced4da');
		} else{
			$('#regPassword').css('border-color', 'red');
		}
	} else if(score > 0 && score <= 2){
		$('#password-checker #pc-meter-level div').hide();
		$('#password-checker #pc-level-low').show();
		$('#password-checker #pc-meter #pc-meter-strength').css('color', 'red').html('Weak');
		$('#regPassword').attr('valid', 'true');
		$('#regPassword').css('border-color', 'green');
	} else if(score > 2 && score <= 4){
		$('#password-checker #pc-meter-level div').hide();
		$('#password-checker #pc-level-low').show();
		$('#password-checker #pc-level-medium').show();
		$('#password-checker #pc-meter #pc-meter-strength').css('color', 'orange').html('Medium');
		$('#regPassword').attr('valid', 'true');
		$('#regPassword').css('border-color', 'green');
	}
	else if(score > 4 <= 5){
		$('#password-checker #pc-meter-level div').hide();
		$('#password-checker #pc-level-low').show();
		$('#password-checker #pc-level-medium').show();
		$('#password-checker #pc-level-high').show();
		$('#password-checker #pc-meter #pc-meter-strength').css('color', 'green').html('Strong');
		$('#regPassword').attr('valid', 'true');
		$('#regPassword').css('border-color', 'green');
	}
}


function ValidateRegForm(){
	var emailRegEx = /^((([!#$%&'*+\-\/=?^_`{|}~\w])|([!#$%&'*+\-\/=?^_`{|}~\w][!#$%&'*+\-\/=?^_`{|}~\.\w]{0,}[!#$%&'*+\-\/=?^_`{|}~\w]))[@]\w+([-.]\w+)*\.\w+([-.]\w+)*)$/;
	
	var regUserName = $('#regUserName').attr('valid');
	var regDisplayName = $('#regDisplayName').attr('valid');
	var regEmailAddress = $('#regEmailAddress').attr('valid');
	var regEmailConfirm = $('#regEmailConfirm').attr('valid');
	var regPassword = $('#regPassword').attr('valid');
	var regPasswordConfirm = $('#regPasswordConfirm').attr('valid');
	var regBirth = $('#regBirth').attr('valid');
	
	var validationScore = 0;
	
	if(regUserName){ validationScore++; }
	if(regDisplayName){ validationScore++; }
	if(regEmailAddress){ validationScore++; }
	if(regEmailConfirm){ validationScore++; }
	if(regPassword){ validationScore++; }
	if(regPasswordConfirm){ validationScore++; }
	if(regBirth){ validationScore++; }
	
	if(validationScore < 7){
		return false;
	} else if(validationScore == 7){
		return true;
	}
}