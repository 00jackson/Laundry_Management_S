<!DOCTYPE html>
<html lang="en">
<?php include('./header.php'); ?>
<?php include('./db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Laundry Management System</title>
  <html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>

<body>
    <header class="h-20 bg-violet-400 flex justify-between">
        <div class="flex items-center pl-4">
            <h1 class="text-white text-3xl">Laundry Management System</h1>
        </div>
        <div class="flex items-center pr-4">
            <h2 class="text-white text-lg">About</h2>
        </div>
    </header>
    <main class="flex justify-center">
        <div class="my-10 bg-gray-200 rounded-xl">
            <form class="grid gap-6 grid-cols-1 px-4 py-2">
                <div class="flex justify-center bg-violet-500 rounded-xl">
                    <h2 class="text-white text-xl py-4 font-semibold">Login</h2>
                </div>
                <div class="flex justify-between">
                    <label class="px-4 py-2" for="email">Email</label>
                    <input
                        class="border border-violet-300 focus:border-violet-800 focus:outline-none px-2 py-1 rounded-md"
                        id="email" type="text">
                </div>
                <div class="flex justify-between">
                    <label class="px-4 py-2" for="password">Password</label>
                    <input
                        class="border border-violet-300 focus:border-violet-800 focus:outline-none px-2 py-1 rounded-md"
                        id="password" type="text">
                </div>
                <div class="flex justify-center pt-4">
                    <button class="bg-gray-400 px-4 py-2 text-white rounded-full hover:bg-violet-500">Submit</button>
                </div>
                <div class="flex justify-center">
                    <p>Haven't created account? <a href="signup.html" class="text-blue-500 underline">create here!</a>
                    </p>
                </div>
            </form>
        </div>
    </main>
</body>

</html>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    background:blueviolet;
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#59b6ec61;
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.7em;
    border-radius: 50% 50%;
    color: #000000b3;
}

</style>

<body>


  <main id="main" class=" bg-dark">
  		<div id="login-left">
  			<div class="logo">
  				<div class="laundry-logo"></div>
  			</div>
  		</div>
  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>