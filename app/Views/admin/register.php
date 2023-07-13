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
            <a class="active" href="#">Add Candidates</a>
            <a href="view">View Candidates</a>
            <a href="votersList">Registered Voters</a>
            <a href="">Election Results</a>

            <a class="log-out-button" href="login">Log out</a>
        </div>
        </nav>
        
        <div class="main-body">
            <h2>Register Candidate</h2>
            <?php if (session()->getFlashData('success')): ?>
                <div class="success-message">
                    <?= session()->getFlashData('success') ?>
                </div>
            <?php elseif (session()->getFlashData('error')): ?>
                <div class="error-message">
                    <?= session()->getFlashData('error') ?>
                </div>
            <?php endif; ?>
            <form action="<?= site_url('candidates/register') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required value="<?= old('email') ?>">
                </div>
                <div class="form-group">
                    <label for="position_id">Position ID:</label>
                    <input type="number" name="position_id" id="position_id" required value="<?= old('position_id') ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required><?= old('description') ?></textarea>
                </div>
                <div class="form-group">
                    <label for="manifesto_file">Manifesto File:</label>
                    <input type="file" name="manifesto_file" id="manifesto_file" required>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>

