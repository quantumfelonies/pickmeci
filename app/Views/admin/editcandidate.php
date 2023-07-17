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
                <a href="#">Add New Election</a>
                <a href="positions">Positions</a>
                <a href="register">Add Candidates</a>
                <a href="list">View Candidates</a>
                <a href="votersList">Registered Voters</a>
                <a href="#">Election Results</a>
                <a href="logout">Logout</a>
            </div>
        </nav>
        <div class="main-body">
            <h2>Edit Candidate</h2>
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

            <form action="<?= site_url('admin/candidates/edit/'.$candidate['id']) ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="student_email">Email:</label>
                    <input type="email" name="student_email" id="student_email" required value="<?= $candidate['student_email'] ?>">
                </div>
                <div class="form-group">
                    <label for="position_id">Position:</label>
                    <select name="position_id" id="position_id" required>
                        <option value="">Select Position</option>
                        <?php foreach ($positions as $position): ?>
                            <option value="<?= $position['id'] ?>" <?= $candidate['position_id'] == $position['id'] ? 'selected' : '' ?>><?= $position['position_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" required><?= $candidate['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="manifesto_file">Manifesto File:</label>
                    <input type="file" name="manifesto_file" id="manifesto_file">
                </div>
                <button type="submit">Update Candidate</button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
