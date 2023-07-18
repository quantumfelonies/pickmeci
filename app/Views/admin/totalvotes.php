

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Results</title>
</head>
<body>
    <h1>Vote Results</h1>
    <table>
        <thead>
            <tr>
                <th>Student Email</th>
                <th>Vote Count</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($votesPerEmail as $vote): ?>
                <tr>
                    <td><?= $vote['student_email']; ?></td>
                    <td><?= $vote['vote_count']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
