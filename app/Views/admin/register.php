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
            <a href="">Add New Election</a>
            <a href="positions">Positions</a>
            <a class="active" href="#">Add Candidates</a>
            <a href="list">View Candidates</a>
            <a href="votersList">Registered Voters</a>
            <a href="">Election Results</a>

            <a class="log-out-button" href="login">Log out</a>
        </div>
        </nav>
        
        <div class="main-body">
            <h2>Register Candidate</h2>
            <?php if (session()->has('success')): ?>
                <div class="success">
                    <?php foreach (session()->getFlashdata('success') as $message): ?>
                        <p><?= $message ?></p>
                    <?php endforeach; ?>
                </div>
            <?php elseif (session()->has('error')): ?>
                <div class="error">
                    <?php foreach (session()->getFlashdata('error') as $message): ?>
                        <p><?= $message ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
                    
            <form action="<?= site_url('admin/register') ?>" method="post" enctype="multipart/form-data">
                <div>
                    <label>Email:</label>
                    <input type="email" name="student_email" required>
                </div>
                <div>
                    <label>Position:</label>
                    <select name="position_id" required>
                        <option value="">Select Position</option>
                        <?php foreach ($positions as $position): ?>
                            <option value="<?= $position['id'] ?>"><?= $position['position_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label>Description:</label>
                    <textarea name="description" required></textarea>
                </div>
                <div>
                    <label>Manifesto File:</label>
                    <input type="file" name="manifesto_file" required>
                </div>
                <div>
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>

