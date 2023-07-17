<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Details</title>
    <link rel="stylesheet" href="<?= base_url('css/candidate.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Candidate Details</h2>
        <div class="details">
            <p><strong>ID:</strong> <?= $candidates['id'] ?></p>
            <p><strong>Email:</strong> <?= $candidates['student_email'] ?></p>
            <p><strong>Position ID:</strong> <?= $candidates['position_id'] ?></p>
            <p><strong>Description:</strong> <?= $candidates['description'] ?></p>
            <p><strong>Manifesto File:</strong> <?= $candidates['manifesto_file'] ?></p>
        </div>
        <a href="<?= site_url('admin/list') ?>">Back to List</a>
    </div>
</body>
</html>
