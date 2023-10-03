<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use CodeIgniter\Session\Session;
use Exception;

class UserAuthController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function verify()
    {
        return view('auth/verify');
    }

    public function sendOTP()
    {
        $email = $this->request->getVar('email');

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->with('error', 'Invalid email format');
        }

        // Generate random OTP code
        $otpCode = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Save OTP code to the database
        $userModel = new UserModel();
        $userModel->updateByEmail($email, ['otp_code' => $otpCode]);

        // try {
            $sendemail = \Config\Services::email();
            $sendemail->setFrom('aelection269@gmail.com', 'PickMe');
            $sendemail->setTo($email);
            $sendemail->setSubject('Account Verification: OTP Code');
            $sendemail->setMessage('Hello ' . $email . ',' . '<br> Welcome to PickMe voting website. <br> Your OTP code is:' . $otpCode . 
            '<br> Use this code to login. Remember, your vote is your voice! <br><br>Regards <br> Election Admin');
            
            try {
                $sendemail->send();
    
                // OTP email sent successfully
                return redirect()->to(site_url('auth/verify'))->with('success', 'OTP code has been sent to your email');
            } catch (\Exception $e) {
                // Exception occurred while sending email
                return redirect()->back()->withInput()->with('error', 'Failed to send OTP code. Please try again.');
            } 

    }

    public function verifyOTP()
    {
        $email = $this->request->getVar('email');
        $otpCode = $this->request->getVar('otp_code');

        // Retrieve user from the database by email and OTP code
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->where('otp_code', $otpCode)->first();

        if ($user) {
            // Clear the OTP code in the database after successful verification
            $userModel->updateByEmail($email, ['otp_code' => null]);

            // Update the 'is_verified' field to 'Yes'
            $userModel->updateByEmail($email, ['is_verified' => 'Yes']);

            // Log the user in
            // session()->set('user', $user);

            $this->session->setFlashdata('success', 'Logged in successfully');
            return redirect()->to('user/voter');
        } else {
            $this->session->setFlashdata('error', 'Invalid OTP code');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->remove('user');
        return redirect()->to('auth/login')->with('success', 'Logged out successfully');
    }
}
?>