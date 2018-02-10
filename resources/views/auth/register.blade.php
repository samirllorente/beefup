<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Gentellela Alela! | </title>
    
    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">

</head>

<body class="login">
<div class="login_wrapper">
    <div class="animate form login_form">
        <section class="login_content">
			{!! Form::open(['url' => url('/register'), 'method' => 'post']) !!}
			
			<h1>Create Account</h1>

			{!! Form::text('name', null, ['placeholder' => 'Full Name']) !!}

			{!! Form::email('email', null, ['placeholder' => 'Email']) !!}

			{!! Form::password('password', ['placeholder' => 'Password']) !!}

			{!! Form::password('password_confirmation', ['placeholder' => 'Confirmation']) !!}
		
			{!! Form::submit('Register', ['class' => 'btn btn-default']) !!}
		   
			<div class="clearfix"></div>
			
			<div class="separator">
				<p class="change_link">Already a member ?
					<a href="{{ url('/login') }}" class="to_register"> Log in </a>
				</p>
				
				<div class="clearfix"></div>
				<br />
				
				<div>
					<h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
					<p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
				</div>
			</div>
			{!! Form::close() !!}
        </section>
    </div>
</div>
</body>
</html>