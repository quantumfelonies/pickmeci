<?= $this->extend('layouts/frontend.php') ?>

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
        <a href="add_election.php">Add New Election</a>
        <a href="positions">Positions</a>
        <a class="active" href="#">Add Position</a>
        <a href="register">Add Candidates</a>
        <a href="list">View Candidates</a>
        <a href="votersList">Registered Voters</a>
        <a href="final_results.php">Election Results</a>

        <a href="<?= site_url('admin/logout') ?>">Logout</a>
      </div>
    </nav>
    <div class="main-body">
                <h2>Add new Position</h2>
        <?php if (session()->getFlashData('success')): ?>
            <div class="success-message">
                <?= session()->getFlashData('success') ?>
            </div>
        <?php elseif (session()->getFlashData('error')): ?>
            <div class="error-message">
                <?= session()->getFlashData('error') ?>
            </div>
        <?php endif; ?>
        

        <form action="<?= site_url('admin/positions/add') ?>" method="post">
            <div class="form-group">
                <label for="name">Position Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <button type="submit">Add Position</button>
        </form>

    </div>
</div>
<?= $this->endSection() ?>

