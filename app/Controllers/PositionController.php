<?php
namespace App\Controllers;

use App\Models\PositionModel;
use CodeIgniter\Controller;

class PositionController extends Controller
{
    public function index()
    {
        $positionModel = new PositionModel();
        $positions = $positionModel->findAll();

        return view('admin/positions', ['positions' => $positions]);
    }

    public function add()
{
    $positionModel = new PositionModel();

    if ($this->request->getMethod() === 'post') {
        $name = $this->request->getPost('name');

        $data = [
            'position_name' => $name,
        ];

        $positionModel->insert($data);

        return redirect()->to('/admin/positions')->with('success', 'Position added successfully');
    }

    return view('admin/addposition');
}

public function update($id)
{
    $positionModel = new PositionModel();
    $position = $positionModel->find($id);

    if ($this->request->getMethod() === 'post') {
        $name = $this->request->getPost('name');

        $data = [
            'position_name' => $name,
        ];

        $positionModel->update($id, $data);

        return redirect()->to('/admin/positions')->with('success', 'Position updated successfully');
    }

    return view('admin/updateposition', ['position' => $position]);
}

    public function delete($id)
    {
        $positionModel = new PositionModel();
        $positionModel->delete($id);

        return redirect()->to('/admin/positions');
    }
}
?>
