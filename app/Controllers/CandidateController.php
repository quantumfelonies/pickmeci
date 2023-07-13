<?php

namespace App\Controllers;

use App\Models\CandidateModel;
use CodeIgniter\Controller;

class CandidateController extends Controller
{
    public function register()
    {
        // Load the necessary models and helpers
        helper('form');
        $candidateModel = new CandidateModel();

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Validate form data
            $rules = [
                'student_email' => 'required|valid_email',
                'position_id' => 'required|numeric',
                'description' => 'required',
                'manifesto_file' => 'uploaded[manifesto_file]|max_size[manifesto_file,1024]|ext_in[manifesto_file,pdf,doc,docx]',
            ];

            if ($this->validate($rules)) {
                // Get form input data
                $email = $this->request->getPost('email');
                $positionId = $this->request->getPost('position_id');
                $description = $this->request->getPost('description');

                // Handle uploaded manifesto file
                $manifestoFile = $this->request->getFile('manifesto_file');
                $newFileName = $manifestoFile->getRandomName();
                $manifestoFile->move('uploads', $newFileName);

                // Prepare data for insertion into database
                $data = [
                    'email' => $email,
                    'position_id' => $positionId,
                    'description' => $description,
                    'manifesto_file' => $newFileName,
                ];

                // Insert data into the candidates table
                $candidateModel->insert($data);

                // Redirect to the list of candidates
                return redirect()->to(site_url('candidates/list'))->with('success', 'Candidate registered successfully');
            } else {
                // Validation failed, display errors
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
        }

        // Load the registration form view
        return view('admin/register');
    }

    public function list()
    {
        // Load the necessary models
        $candidateModel = new CandidateModel();

        // Fetch all candidates from the database
        $candidates = $candidateModel->findAll();

        // Pass the candidates data to the view
        $data = [
            'candidates' => $candidates,
        ];

        // Load the candidates list view
        return view('admin/list', $data);
    }

    public function view($id)
    {
        // Load the necessary models
        $candidateModel = new CandidateModel();

        // Fetch the candidate from the database based on the provided ID
        $candidate = $candidateModel->find($id);

        // Check if the candidate exists
        if (!$candidate) {
            return redirect()->to(site_url('candidates/list'))->with('error', 'Candidate not found');
        }

        // Pass the candidate data to the view
        $data = [
            'candidate' => $candidate,
        ];

        // Load the candidate view
        return view('admin/view', $data);
    }
}
