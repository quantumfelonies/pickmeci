<?php

namespace App\Controllers;

use App\Models\ElectionModel;
use CodeIgniter\Controller;

class ElectionController extends Controller
{
    public function create()
    {
        // Load the necessary models and helpers
        helper('form');
        $electionModel = new ElectionModel();

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Validate form data
            $rules = [
                'title' => 'required',
                'start_date' => 'required|valid_date',
                'end_date' => 'required|valid_date',
            ];

            if ($this->validate($rules)) {
                // Get form input data
                $title = $this->request->getPost('title');
                $startDate = $this->request->getPost('start_date');
                $endDate = $this->request->getPost('end_date');

                // Prepare data for insertion into database
                $data = [
                    'title' => $title,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                ];

                // Insert data into the elections table
                $electionModel->insert($data);

                // Redirect to the list of elections
                return redirect()->to(site_url('elections'))->with('success', 'Election created successfully');
            } else {
                // Validation failed, display errors
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
        }

        // Load the create election form view
        return view('elections/create');
    }

    public function index()
    {
        // Load the necessary models
        $electionModel = new ElectionModel();

        // Fetch all elections from the database
        $elections = $electionModel->findAll();

        // Pass the elections data to the view
        $data = [
            'elections' => $elections,
        ];

        // Load the elections list view
        return view('elections/index', $data);
    }

    public function view($id)
    {
        // Load the necessary models
        $electionModel = new ElectionModel();

        // Fetch the election from the database based on the provided ID
        $election = $electionModel->find($id);

        // Check if the election exists
        if (!$election) {
            return redirect()->to(site_url('elections'))->with('error', 'Election not found');
        }

        // Pass the election data to the view
        $data = [
            'election' => $election,
        ];

        // Load the election view
        return view('elections/view', $data);
    }
}
