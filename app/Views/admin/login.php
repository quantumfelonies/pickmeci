<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= base_url('css/login.css'); ?>">
    <style>
        /* Custom CSS to style the image as a background */
        .background-image {
            background-image: url('https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixlib=rb-4.0.3&q=85&f');
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
        <!-- <img src="https://images.unsplash.com/photo-1663789669038-ba180c8c155a?ixlib=rb-4.0.3&q=8" class="half-page-image" alt="background image"> -->
        </div>
        <div class="registration-form">
            <div class="form-content">
    <div class="container">
        <h2>Admin Login</h2>
        <?php if (session()->getFlashData('success')): ?>
            <div class="success-message">
                <?= session()->getFlashData('success') ?>
            </div>
        <?php elseif (session()->getFlashData('error')): ?>
            <div class="error-message">
                <?= session()->getFlashData('error') ?>
            </div>
        <?php endif; ?>
        <form action="<?= site_url('admin/login') ?>" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required value="<?= old('email') ?>">
            </div>
            <div class="form-group">
                <label for="otp">Password:</label>
                <input type="text" name="otp" id="otp" required value="<?= old('otp') ?>">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    </div>
    </div>  
</body>
</html>
