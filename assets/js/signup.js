$('#regErr').hide();
$('#regLoading').hide();

$('#password-checker ul li').css('list-style-image', 'url("./assets/img/pc-red.png")');
$('#password-checker #pc-meter-level *').hide();

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

$('#regDisplayName').attr('valid', 'true');
$('#regDisplayName').change(function(e){
    if($('#regDisplayName').val().length > 0){
        $('#regDisplayName').css('border-color', 'green');
        $('#regDisplayName').attr('valid', 'true');
    } else{
        $('#regDisplayName').css('border-color', '#ced4da');
        $('#regDisplayName').attr('valid', 'false');
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
					if(res.error == 'Username already taken!' || res.error == 'Email address already taken!'){
						$('#regErr p').html(res.error);
						$('#regErr').fadeIn();
						setTimeout(function(){
							$('#regErr').fadeOut();
							setTimeout(function(){
								$('#regErr p').html("Check that all the information you've entered is correct.<br>If the problem persists, contact support.");
							}, 500);
						}, 2000);
					} else{
						alert('An error occured: ' + res.error);
					}
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