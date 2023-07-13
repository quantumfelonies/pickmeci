<!-- auth/verify.php -->
<form action="<?= site_url('verify-otp') ?>" method="post">
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required value="<?= old('email') ?>">
    </div>
    <div>
        <label for="otp_code">OTP Code:</label>
        <input type="int" name="otp_code" id="otp_code" required>
    </div>
    <button type="submit">Verify OTP</button>
</form>
