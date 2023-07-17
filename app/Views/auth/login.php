<!DOCTYPE html>
<html>
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>User Login</title>
		<link rel="stylesheet" href="<?= base_url('css/login.css'); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...your-sha512-here..." crossorigin="anonymous" />
	</head>
	<body>
	<div class="registration-background">
        <div class="background-image">
        <img src="logo.png" class="background-image" alt="background image">
        </div>
        <div class="registration-form">
            <div class="form-content">
                <h2>Login</h2>
                <form action="<?= site_url('send-otp') ?>" method="post">
                    <div class="input">
                        <!-- <span>Email</span> -->
                        <!-- <label for="email">Email:</label> -->
                        <input type="email" name="email" id="email" placeholder="Enter your school email address"
                         required value="<?= old('email') ?>">
                    </div>
                    <small id="emailHelp" class="form-text" style="color: blue;"><i class="fas fa-info-circle"></i> 
                        Please enter a valid school email address ending with .edu</small>
                <button type="submit">Send OTP</button>
                </form>
            </div>
        </div>
    </div>  
	</body>
</html>


