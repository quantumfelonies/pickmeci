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
        <a href="createElection">Add New Election</a>
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
    <h2>Create Election</h2>

<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger"><?= session('error') ?></div>
<?php endif; ?>

<?php echo form_open('elections/create') ?>

<div class="form-group">
    <label for="election_title">Election Title</label>
    <input type="text" name="election_title" id="election_title" class="form-control" required value="<?= old('election_title') ?>">
</div>

<div class="form-group">
    <label for="start_date">Start Date</label>
    <input type="date" name="start_date" id="start_date" class="form-control" required value="<?= old('start_date') ?>">
</div>

<div class="form-group">
    <label for="end_date">End Date</label>
    <input type="date" name="end_date" id="end_date" class="form-control" required value="<?= old('end_date') ?>">
</div>

<button type="submit" class="btn btn-primary">Create</button>

<?php echo form_close() ?>


    </div>
</div>
<?= $this->endSection() ?>

