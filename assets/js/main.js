$('[data-toggle="tooltip"]').tooltip();
$('a[target="_blank"]').tooltip({
    title: 'This link opens in a new tab.'
});

$('#loginErr').hide();
$('#loginSpinner').hide();
$('#forgotAlert').hide();
$('#forgotSpinner').hide();

$('#password-checker ul li').css('list-style-image', 'url("./assets/img/pc-red.png")');
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
				$.ajax({
					url: 'login.php',
					type: 'POST',
					cache: false,
					data: {
						userID: res.response.userID,
						lang: res.response.lang,
						displayName: res.response.displayName,
                        tdbStaff: res.response.tdbStaff,
						companyID: res.response.companyID,
                        canManageCompany: res.response.canManageCompany
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

$('.passwordEye').click(function(){
    var inputID = $(this).attr('data-input');
    ($('#' + inputID).attr('type') == 'password') ? $('#' + inputID).attr('type', 'text') : $('#' + inputID).attr('type', 'password');
    $('#' + inputID).css('padding-right', '40px');
    ($('#' + inputID).attr('type') == 'password') ? $(this).html('<i class="fas fa-eye"></i>') : $(this).html('<i class="fas fa-eye-slash"></i>');
});


function formatTimestamp(timestamp)
{
    var date = new Date(timestamp);
    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    var hour = date.getHours();
    var minute = date.getMinutes();
    
    switch(month){
        case 1:
            month = 'January';
            break;
        case 2:
            month = 'February';
            break;
        case 3:
            month = 'March';
            break;
        case 4:
            month = 'April';
            break;
        case 5:
            month = 'May';
            break;
        case 6:
            month = 'June';
            break;
        case 7:
            month = 'July';
            break;
        case 8:
            month = 'August';
            break;
        case 9:
            month = 'September';
            break;
        case 10:
            month = 'October';
            break;
        case 11:
            month = 'November';
            break;
        case 12:
            month = 'December';
            break;
    }
    
    var newDate = {
        day: day,
        month: month,
        year: year,
        hour: hour,
        minute: minute
    };
    
    return newDate;
}