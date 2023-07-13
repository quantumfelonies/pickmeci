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
        <a class="active" href="#">Home</a>
        <a href="add_election.php">Add New Election</a>
        <a href="register">Add Candidates</a>
        <a href="view">View Candidates</a>
        <a href="votersList">Registered Voters</a>
        <a href="final_results.php">Election Results</a>

        <a class="log-out-button" href="login">Log out</a>
      </div>
    </nav>

    <div class="main-body">
      <div class="promo_card"> 
       <h1>Welcome Admin</h1>
          <p>Click an option on the sidebar to get started</p>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

