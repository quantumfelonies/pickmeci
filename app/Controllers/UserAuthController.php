<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\Email\Email;
use Exception;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
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

        // Send email with OTP code
        try {
            $sendemail = new Email();
            $sendemail->setTo($email);
            $sendemail->setSubject('OTP Code');
            $sendemail->setMessage("Hello! <br> Welcome to PickMe voting website. <br> Your OTP code is: $otpCode <br> 
            Use this code to login. Remember, your vote is your voice! <br><br>Regards <br> Election Admin");
            $sendemail->send();

            return redirect()->to('auth/verify')->with('success', 'OTP code has been sent to your email');
        } catch (Exception $e) {
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

            // Update the 'is_verified' field to 1
            $userModel->updateByEmail($email, ['is_verified' => 'Yes']);

            // Log the user in
            session()->set('user', $user);

            return redirect()->to('user/index')->with('success', 'Logged in successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid OTP code');
        }
    }

    public function logout()
    {
        session()->remove('user');
        return redirect()->to('auth/login')->with('success', 'Logged out successfully');
    }
}
