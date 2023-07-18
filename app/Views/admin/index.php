<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>
  <header class="header">
    <div class="title">
      <span>Dashboard</span>
      <?php if (session()->has('user_email')): ?>
        <span class="user-email"><?= session('user_email') ?></span>
      <?php endif; ?>
    </div>
  </header>

  <div class="container">
    <nav>
      <div class="side_navbar">
        <a class="active" href="#">Home</a>
        <a href="add_election.php">Add New Election</a>
        <a href="positions">Positions</a>
        <a href="register">Add Candidates</a>
        <a href="list">View Candidates</a>
        <a href="votersList">Registered Voters</a>
        <a href="final_results.php">Election Results</a>

        <a href="<?= site_url('admin/logout') ?>">Logout</a>
      </div>
    </nav>
    <div class="main-body">
      <div class="promo_card">
                <h2>Admin Dashboard</h2>
        <?php if (session()->getFlashData('success')): ?>
            <div class="success-message">
                <?= session()->getFlashData('success') ?>
            </div>
        <?php elseif (session()->getFlashData('error')): ?>
            <div class="error-message">
                <?= session()->getFlashData('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('user_email')): ?>
    <div class="user-email">
        Email: <?= session('user_email') ?>
    </div>
<?php endif; ?>
        <p>Welcome, Admin!</p>
        <p>Click an option on the sidebar to get started</p>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

