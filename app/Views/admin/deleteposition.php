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
            <h2>Delete Position</h2>
            <p>Are you sure you want to delete this position?</p>
            <form action="<?= site_url('admin/positions/delete/' . $position['id']) ?>" method="post">
                <button type="submit">Delete</button>
            </form>
        </div>
</div>
<?= $this->endSection() ?>
