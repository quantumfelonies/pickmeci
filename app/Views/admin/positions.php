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
        <a class="active" href="#">Positions</a>
        <a href="register">Add Candidates</a>
        <a href="list">View Candidates</a>
        <a href="votersList">Registered Voters</a>
        <a href="">Election Results</a>

        <a class="log-out-button" href="login">Log out</a>
        </div>
        </nav>
        <div class="main-body">
            <h2>Positions</h2>
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
                <th>Name</th>
                <th>Actions</th>
                <tbody>
                    <?php foreach ($positions as $position): ?>
                    <tr>
                        <td><?= $position['position_name'] ?></td>
                        <td>
                            <a href="/admin/positions/update/<?= $position['id'] ?>">Edit</a>
                            <a href="/admin/positions/delete/<?= $position['id'] ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/admin/positions/add">Add New Position</a>
        </div>
        </div>
</div>
<?= $this->endSection() ?> 