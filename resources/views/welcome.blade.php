@include('layouts')
@section('title')
	{{ __('Contact Form') }}
@endsection
<body id="app-layout">

<div class="row">
  	<div class="col-md-6 offset-3 mt-5">
		<div class="card card-default credit-card-box">
			<div class="card-header heading">
				<h5>Contact Form</h5>
			</div>
			<div class="card-body">
				<div class="col-md-12">
				  {!! Form::open(['url' => '/store', 'data-parsley-validate', 'id' => 'contact_form','method' => 'post']) !!}
					@if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
					  <button type="button" class="close" data-dismiss="alert">×</button> 
							<strong>{{ $message }}</strong>
					</div>
					@endif
					<div class="form-group mt-3" id="product-group">
						{!! Form::label('plane', 'Name:') !!}<span class="required">*</span>
						{!! Form::text('name', '', [
							'id'                            => 'name',
							'class'                         => 'form-control',
							'data-stripe'                   => 'number',
							'data-parsley-type'             => 'number',
							'maxlength'                     => '16',
							'data-parsley-trigger'          => 'change focusout',
							'data-parsley-class-handler'    => '#cc-group'
							]) !!}
					</div>
					<div class="form-group mt-3" id="cc-group">
						{!! Form::label(null, 'Phone Number:') !!}<span class="required">*</span>
						{!! Form::text('phone', null, [
							'id'                            => 'phone',
							'class'                         => 'form-control',
							'data-stripe'                   => 'number',
							'data-parsley-type'             => 'number',
							'maxlength'                     => '16',
							'data-parsley-trigger'          => 'change focusout',
							'data-parsley-class-handler'    => '#cc-group'
							]) !!}
					</div>
					<div class="form-group mt-3" id="ccv-group">
						{!! Form::label(null, 'Email:') !!}<span class="required">*</span>
						{!! Form::text('email', null, [
							'id'                            => 'email',
							'class'                         => 'form-control',
							'data-stripe'                   => 'cvc',
							'data-parsley-type'             => 'email',
							'data-parsley-trigger'          => 'change focusout',
							'data-parsley-class-handler'    => '#ccv-group'
							]) !!}
					</div>
					<div class="form-group mt-3">
						{!! Form::label(null, 'Services:') !!}<span class="required">*</span>
						<select class="form-control" name="service" id="service">
							<option value="">Select Services</option>
							<option value="Graphics & Design">Graphics & Design</option>
							<option value="Digital Marketing">Digital Marketing</option>
							<option value="Writing & Translation">Writing & Translation</option>
							<option value="Video & Animation">Video & Animation</option>
							<option value="Music & Audio">Music & Audio</option>
							<option value="Programming & Tech">Programming & Tech</option>
							<option value="Lifestyle">Lifestyle</option>
						</select>
					</div>
					<div class="form-group mt-3">
						{!! Form::label(null, 'Message:') !!}
						<textarea class="form-control" name="message"></textarea>
					</div>
					<div class="form-control mt-3">
		            <canvas id="captcha">captcha text</canvas>
		            <input id="textBox" type="text" name="text" class="form-control" autocomplete="off">
		            <div id="buttons" class="mt-3">
		                <button id="refreshButton" type="button">Refresh</button>
		            </div>
		            <span id="output"></span>
		        	</div>
				  	<div class="form-group mt-5 text-center">
						{!! Form::button('Submit', ['class' => 'btn btn-lg btn-block heading btn-order', 'id' => 'submitButton', 'style' => 'margin-bottom: 10px;', 'onclick' => 'checkform()']) !!}
				  	</div>
				  	<div class="row">
						<div class="col-md-12">
							<span class="payment-errors" style="color: red;margin-top:10px;"></span>
						</div>
				  	</div>
			  		{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script>
	// document.querySelector() is used to select an element from the document using its ID
let captchaText = document.querySelector('#captcha');
var ctx = captchaText.getContext("2d");
ctx.font = "30px Roboto";
// ctx.fillStyle = "#08e5ff";

let userText = document.querySelector('#textBox');
let submitButton = document.querySelector('#submitButton');
let output = document.querySelector('#output');
let refreshButton = document.querySelector('#refreshButton');

// alphaNums contains the characters with which you want to create the CAPTCHA
let alphaNums = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
let emptyArr = [];
// This loop generates a random string of 7 characters using alphaNums
// Further this string is displayed as a CAPTCHA
for (let i = 1; i <= 7; i++) {
    emptyArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
}
var c = emptyArr.join('');
ctx.fillText(emptyArr.join(''),captchaText.width/4, captchaText.height/2);

// This event listener is stimulated whenever the user press the "Enter" button
// "Correct!" or "Incorrect, please try again" message is
// displayed after validating the input text with CAPTCHA
userText.addEventListener('keyup', function(e) {
    // Key Code Value of "Enter" Button is 13
    if (e.keyCode === 13) {
        if (userText.value === c) {
            output.classList.add("correctCaptcha");
            output.innerHTML = "Correct!";
        } else {
            output.classList.add("incorrectCaptcha");
            output.innerHTML = "Incorrect, please try again";
        }
    }
});
// This event listener is stimulated whenever the user clicks the "Submit" button
// "Correct!" or "Incorrect, please try again" message is
// displayed after validating the input text with CAPTCHA
submitButton.addEventListener('click', function() {
    if (userText.value === c) {
        output.classList.add("correctCaptcha");
        output.innerHTML = "Correct!";
    } else {
        output.classList.add("incorrectCaptcha");
        output.innerHTML = "Incorrect, please try again";
    }
});
// This event listener is stimulated whenever the user press the "Refresh" button
// A new random CAPTCHA is generated and displayed after the user clicks the "Refresh" button
refreshButton.addEventListener('click', function() {
    userText.value = "";
    let refreshArr = [];
    for (let j = 1; j <= 7; j++) {
        refreshArr.push(alphaNums[Math.floor(Math.random() * alphaNums.length)]);
    }
    ctx.clearRect(0, 0, captchaText.width, captchaText.height);
    c = refreshArr.join('');
    ctx.fillText(refreshArr.join(''),captchaText.width/4, captchaText.height/2);
    output.innerHTML = "";
});

function checkform()
{
	var name = $('#name').val();
	var phone = $('#phone').val();
	var email = $('#email').val();
	var service = $('#service').val();
	$('.error').remove();
	var error = 0;
	if(name == '' || name.trim() == '')
	{
		$('#name').after('<div class="error">Please Enter the name');
		error = 1;
	}
	if(phone == '' || phone.trim() == '')
	{
		$('#phone').after('<div class="error">Please Enter the phone number');
		error = 1;
	}
	if(email == '' || email.trim() == '')
	{
		$('#email').after('<div class="error">Please Enter the email');
		error = 1;
	}
	if(service == '')
	{
		$('#service').after('<div class="error">Please select the service');
		error = 1;
	}
	if(error == 0)
	{
		$('#contact_form').submit();
	}
	else
	{
		return false;
	}
}
</script>