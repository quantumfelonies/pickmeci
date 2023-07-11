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
        <a href="add_election.php">Add New Election</a>
        <a href="view_applications.php">Applying Candidates</a>
        <a href="election_candidates.php">View Candidates</a>
        <a class="active" href="#">Registered Voters</a>
        <a href="final_results.php">Election Results</a>

        <a class="log-out-button" href="admin-login.php">Log out</a>
      </div>
    </nav>

    <div class="main-body">
    <h1>Verified Users</h1>
    <ul>
        <table>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Is_Verified</th>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
            <td><?= $user['first_name'] ?></td>
            <td><?= $user['last_name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['is_verified'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table> 
        
  </div>
<?= $this->endSection() ?>

