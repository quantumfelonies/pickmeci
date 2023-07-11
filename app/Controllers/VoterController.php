<?php

namespace App\Controllers;
use App\Models\VoterModel;

class VoterController extends BaseController
{
    public function index()
    {
        $voterModel = new VoterModel();
        $data['users'] = $voterModel->getVerifiedUsers();
        return view('admin/votersList', $data);
    }
}
?>