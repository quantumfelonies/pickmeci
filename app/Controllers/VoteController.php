<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\VoteModel;

class VoteController extends Controller
{
    public function index()
    {
        // Fetch student_email and its count from tbl_vote
        $data['voteCounts'] = $voteModel->getVoteCounts();

        // Load the view to display the chart
        return view('admin/totalvotes', $data);
    }
}
?>