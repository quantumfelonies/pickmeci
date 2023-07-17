<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
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
                <label for="otp">OTP:</label>
                <input type="text" name="otp" id="otp" required value="<?= old('otp') ?>">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
