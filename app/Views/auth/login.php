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
        <style>
        /* Custom CSS to style the image as a background */
        .background-image {
            background-image: url('https://images.unsplash.com/photo-1602906530215-1bf5f4925279?ixlib=rb-4.0.3&q=');
            background-size: cover;
            background-position: center;
            height: 100vh; /* Make the image cover the full height of the viewport */
            width: 50%; /* Make the image cover half the width of the viewport */
            float: left; /* Align the container to the left */
        }

        .registration-form {
            width: 50%; /* Make the form cover the other half of the width */
            float: left; /* Align the form to the left */
        }

        /* Add any additional styling for the registration form as needed */
    </style>
    </head>
	<body>
	<div class="registration-background">
        <div class="background-image">
        <!-- <img src="logo.png" class="background-image" alt="background image"> -->
        </div>
        <div class="registration-form">
            <div class="form-content">
                <h2>Login</h2>
                <form action="<?= site_url('sendOTP') ?>" method="post">
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


