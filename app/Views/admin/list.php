<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate List</title>
    <link rel="stylesheet" href="<?= base_url('css/candidate.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Candidate List</h2>
        <?php if (session()->getFlashData('success')): ?>
            <div class="success-message">
                <?= session()->getFlashData('success') ?>
            </div>
        <?php elseif (session()->getFlashData('error')): ?>
            <div class="error-message">
                <?= session()->getFlashData('error') ?>
            </div>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Position ID</th>
                    <th>Description</th>
                    <th>Manifesto File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($candidates as $candidate): ?>
                    <tr>
                        <td><?= $candidate['id'] ?></td>
                        <td><?= $candidate['email'] ?></td>
                        <td><?= $candidate['position_id'] ?></td>
                        <td><?= $candidate['description'] ?></td>
                        <td><?= $candidate['manifesto_file'] ?></td>
                        <td>
                            <a href="<?= site_url('candidates/view/' . $candidate['id']) ?>">View</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
