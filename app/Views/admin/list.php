<?= $this->extend('layouts/frontwtbl.php') ?>

<?= $this->section('content') ?>
  <header class="header">
    <div class="title">
      <span>Dashboard</span>
    </div>
  </header>

 <div class="container">
        <nav>
        <div class="side_navbar">
            <a href="index">Home</a>
            <a href="">Add New Election</a>
            <a href="addposition">Add Position</a>
            <a href="positions">Positions</a>
            <a href="register">Add Candidates</a>
            <a class="active" href="#">View Candidates</a>
            <a href="votersList">Registered Voters</a>
            <a href="">Election Results</a>

            <a class="log-out-button" href="login">Log out</a>
        </div>
        </nav>
    <div class="main-body">
        <h1>Candidate List</h1>
        <?php if (session()->getFlashData('success')): ?>
            <div class="success-message">
                <?= session()->getFlashData('success') ?>
            </div>
        <?php elseif (session()->getFlashData('error')): ?>
            <div class="error-message">
                <?= session()->getFlashData('error') ?>
            </div>
        <?php endif; ?>
        
        <table>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Position Name</th>
            <th>Description</th>
            <th>Manifesto File</th>
            <th>Actions</th>

            <tbody>
                <?php foreach ($candidates as $candidate): ?>
                    <tr>
                        <td><?= $candidate['first_name'] ?></td>
                        <td><?= $candidate['last_name'] ?></td>
                        <td><?= $candidate['student_email'] ?></td>
                        <td><?= $candidate['position_name'] ?></td>
                        <td><?= $candidate['description'] ?></td>
                        <td><?= $candidate['manifesto_file'] ?></td>
                        <td>
                            <a href="<?= site_url('admin/candidates/edit/' . $candidate['id']) ?>">Edit</a>
                            <a href="<?= site_url('admin/candidates/delete/'.$candidate['id']) ?>" onclick="return confirm('Are you sure you want to delete this candidate?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="register">Add Candidate</a>
    </div>
    <?= $this->endSection() ?>

