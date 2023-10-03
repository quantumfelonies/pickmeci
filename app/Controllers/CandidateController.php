<?php

namespace App\Controllers;

use App\Models\CandidateModel;
use App\Models\PositionModel;
use App\Models\UserModel;

use CodeIgniter\Controller;

class CandidateController extends Controller
{
    public function register()
    {
        // Load the necessary models and helpers
        helper('form');
        $candidateModel = new CandidateModel();
        $positionModel = new PositionModel();
        $userModel = new UserModel();
    
        $positions = $positionModel->findAll();
    
        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Validate form data
            $rules = [
                'student_email' => 'required|valid_email',
                'position_id' => 'required',
                'description' => 'required',
                'manifesto_file' => 'uploaded[manifesto_file]|max_size[manifesto_file,1024]|ext_in[manifesto_file,pdf,doc,docx]',
            ];
    
            if ($this->validate($rules)) {
                // Get form input data
                $email = $this->request->getPost('student_email');
                $positionId = $this->request->getPost('position_id');
                $description = $this->request->getPost('description');
    
                // Get first name and last name from user table
                // $user = $userModel->where('email', $email)->first();
                // $firstName = $user['first_name'];
                // $lastName = $user['last_name'];

                // Handle uploaded manifesto file
                $manifestoFile = $this->request->getFile('manifesto_file');
                $newFileName = $manifestoFile->getRandomName();
                $manifestoFile->move('uploads', $newFileName);
    
                // Prepare data for insertion into database
                $data = [
                    'student_email' => $email,
                    'position_id' => $positionId,
                    'description' => $description,
                    'manifesto_file' => $newFileName,
                ];
    
                // Insert data into the candidates table
                $candidateModel->insert($data);
    
                // Redirect to the list of candidates
                return redirect()->to(site_url('admin/list'))->with('success', 'Candidate registered successfully');
            } else {
                // Validation failed, display errors
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
        }
    
        // Prepare data to pass to the view
        $data = [
            'positions' => $positions,
        ];
    
        // Load the list form view
        return view('admin/register', $data);
    }
    

    public function list()
    {
        // Load the necessary models
        $candidateModel = new CandidateModel();
        $positionModel = new PositionModel();
        $userModel = new UserModel();
    
        // Fetch all candidates from the database
        $candidates = $candidateModel->findAll();
    
        // Fetch the first name and last name for each candidate
        $candidatesWithUserInfo = [];
        foreach ($candidates as $candidate) {
        $user = $userModel->where('email', $candidate['student_email'])->first();
        $candidate['first_name'] = $user['first_name'];
        $candidate['last_name'] = $user['last_name'];

        $position = $positionModel->find($candidate['id']);
        $candidate['position_name'] = $position['position_name'];

        $candidatesWithUserInfo[] = $candidate;
        }

        // Pass the candidates data to the view
        $data = [
            'candidates' => $candidatesWithUserInfo,
        ];
    
        // Load the candidates list view
        return view('admin/list', $data);
    }

    public function edit($id)
    {
        // Load the necessary models and helpers
        helper('form');
        $candidateModel = new CandidateModel();
        $positionModel = new PositionModel();
        $userModel = new UserModel();

        $positions = $positionModel->findAll();

        // Find the candidate by ID
        $candidate = $candidateModel->find($id);

        if (!$candidate) {
            return redirect()->to(site_url('admin/list'))->with('error', 'Candidate not found');
        }

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Validate form data
            $rules = [
                'student_email' => 'required|valid_email',
                'position_id' => 'required',
                'description' => 'required',
                'manifesto_file' => 'uploaded[manifesto_file]|max_size[manifesto_file,1024]|ext_in[manifesto_file,pdf,doc,docx]',
            ];

            if ($this->validate($rules)) {
                // Get form input data
                $email = $this->request->getPost('student_email');
                $positionId = $this->request->getPost('position_id');
                $description = $this->request->getPost('description');

                // Get first name and last name from user table
                $user = $userModel->where('email', $email)->first();
                $firstName = $user['first_name'];
                $lastName = $user['last_name'];

                // Handle uploaded manifesto file
                $manifestoFile = $this->request->getFile('manifesto_file');
                $newFileName = $manifestoFile->getRandomName();
                $manifestoFile->move('uploads', $newFileName);

                // Prepare data for update
                $data = [
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'student_email' => $email,
                    'position_id' => $positionId,
                    'description' => $description,
                    'manifesto_file' => $newFileName,
                ];

                // Update the candidate
                $candidateModel->update($id, $data);

                // Redirect to the list of candidates
                return redirect()->to(site_url('admin/list'))->with('success', 'Candidate updated successfully');
            } else {
                // Validation failed, display errors
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
        }

        // Prepare data to pass to the view
        $data = [
            'positions' => $positions,
            'candidate' => $candidate,
        ];

        // Load the edit form view
        return view('admin/editcandidate', $data);
    }

    public function delete($id)
    {
        $candidateModel = new CandidateModel();
        $candidate = $candidateModel->find($id);

        if (!$candidate) {
            return redirect()->to(site_url('admin/list'))->with('error', 'Candidate not found');
        }

        // Delete the candidate
        $candidateModel->delete($id);

        // Redirect to the list of candidates
        return redirect()->to(site_url('admin/list'))->with('success', 'Candidate deleted successfully');
    }

} 
?> 

