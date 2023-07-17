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
        <a class="active" href="#">Positions</a>
        <a href="addposition">Add Position</a>
        <a href="register">Add Candidates</a>
        <a href="list">View Candidates</a>
        <a href="votersList">Registered Voters</a>
        <a href="">Election Results</a>

        <a class="log-out-button" href="login">Log out</a>
        </div>
        </nav>
        <div class="main-body">
            <h2>Update Position</h2>
            <?php if (session()->getFlashData('success')): ?>
                <div class="success-message">
                    <?= session()->getFlashData('success') ?>
                </div>
            <?php elseif (session()->getFlashData('error')): ?>
                <div class="error-message">
                    <?= session()->getFlashData('error') ?>
                </div>
            <?php endif; ?>
            

            <form action="<?= site_url('admin/positions/update/' . $position['id']) ?>" method="post">
                <div>
                    <label for="name">Position Name:</label>
                    <input type="text" name="name" id="name" required value="<?= $position['position_name'] ?>">
                </div>
                <button type="submit">Update Position</button>
            </form>
        </div>
</div>
<?= $this->endSection() ?>
