<?php

namespace App\Controllers;

use App\Models\ElectionModel;
use CodeIgniter\Controller;

class ElectionController extends Controller
{
    public function create()
    {
        $electionModel = new ElectionModel();

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'election_title' => 'required',
                'start_date' => 'required|valid_date',
                'end_date' => 'required|valid_date',
            ];

            if ($this->validate($rules)) {
                $title = $this->request->getPost('election_title');
                $startDate = $this->request->getPost('start_date');
                $endDate = $this->request->getPost('end_date');

                $data = [
                    'election_title' => $title,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                ];

                $electionModel->insert($data);

                return redirect()->to(site_url('elections'))->with('success', 'Election created successfully');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }
        }

        return view('admin/createElection');
    }

    public function index()
    {
        $electionModel = new ElectionModel();
        $elections = $electionModel->findAll();

        $data = [
            'elections' => $elections,
        ];

        return view('admin/electionsList', $data);
    }

    // public function view(int $id)
    // {
    //     $electionModel = new ElectionModel();
    //     $election = $electionModel->find($id);

    //     if (!$election) {
    //         return redirect()->to(site_url('elections'))->with('error', 'Election not found');
    //     }

    //     $data = [
    //         'election' => $election,
    //     ];

    //     return view('admin/viewElection', $data);
    // }
}
