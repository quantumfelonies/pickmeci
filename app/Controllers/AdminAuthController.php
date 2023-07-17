<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminAuthController extends Controller
{
    public function login()
    {
        // Load the necessary models and helpers
        helper('form');
        $userModel = new UserModel();

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Validate form data
            $rules = [
                'email' => 'required|valid_email',
                'otp' => 'required',
            ];

            if ($this->validate($rules)) {
                // Get form input data
                $email = $this->request->getPost('email');
                $otp = $this->request->getPost('otp');

                // Retrieve user from the database by email and OTP
                $user = $userModel->where('email', $email)->where('otp_code', $otp)->first();

                if ($user) {
                    // Log the user in
                    session()->set('admin', $user);

                    // Redirect to the admin dashboard
                    return redirect()->to(site_url('admin/index'))->with('success', 'Logged in successfully');
                } else {
                    // Invalid email or OTP
                    return redirect()->back()->withInput()->with('error', 'Invalid email or OTP');
                }
            } else {
                // Validation failed, display errors
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
        }

        // Load the admin login view
        return view('admin/login');
    }

    public function dashboard()
    {
        // Check if the admin is logged in
        if (!session()->has('admin')) {
            return redirect()->to(site_url('admin/login'))->with('error', 'Please login first');
        }

        // Load the admin dashboard view
        return view('admin/index');
    }

    public function logout()
    {
        // Check if the admin is logged in
        if (session()->has('admin')) {
            // Log the admin out
            session()->remove('admin');
        }

        // Redirect to the admin login page
        return redirect()->to(site_url('admin/login'))->with('success', 'Logged out successfully');
    }
}
