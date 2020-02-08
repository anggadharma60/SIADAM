<html>
<head>
	
	<title>SIADAM LOGIN</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/') . 'login.css'?>">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<link rel="icon" type="image/png" sizes="48x48" href="<?php echo base_url('assets/img/') . 'siadampng.png'?>">
	
</head>
<body>
	
	<img class="wave" src="<?php echo base_url('assets/img/login/') . 'wave.png'?>">
	<div class="container">
		<div class="img">
			<img src="<?php echo base_url('assets/img/login/') . 'telkom.png'?>">
		</div>
		<div class="login-content">
			<form action="<?php echo site_url('Autentikasi/login')?>" method="POST">
				<img src="<?php echo base_url('assets/img/') . 'siadampng.png'?>">
				<h2 class="title">SIADAM</h2>
				<h4 class="title">Sistem Informasi</h4>
				<h4 class="title">Access Data Management</h4>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username" autocomplete="off">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" autocomplet="off">
            	   </div>
            	</div>
				<a href="#">Forgot Password?</a>
				<input type="submit" name="btnlogin" class="btn" value="Login">
				<input type="button" class="btn" value="Back" onclick="goBack()">
            </form>
        </div>
    </div>
	<script type="text/javascript" src="<?php echo base_url('assets/js/') . 'login.js'?>"></script>
	<script>
		function goBack() {
			window.location.href='<?php echo base_url()?>';
		}
	</script>
</body>
</html>