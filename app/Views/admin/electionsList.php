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
        <h2>List of Elections</h2>

        <?php if (session()->has('success')) : ?>
            <div class="alert alert-success"><?= session('success') ?></div>
        <?php endif; ?>

        <?php if (session()->has('error')) : ?>
            <div class="alert alert-danger"><?= session('error') ?></div>
        <?php endif; ?>

        <?php if (empty($elections)) : ?>
        <div class="alert alert-info">No elections found</div>
        <?php else : ?>

        
        <table class="table">
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
            <tbody>
                <?php foreach ($elections as $election) : ?>
                    <tr>
                        <td><?= $election['election_title'] ?></td>
                        <td><?= $election['start_date'] ?></td>
                        <td><?= $election['end_date'] ?></td>
                        <td>
                            <a href="<?= site_url('admin/view/' . $election['id']) ?>">View</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </table>
        <a href="admin/createElection">Add Election</a>
    </div>

</div>
<?= $this->endSection() ?>