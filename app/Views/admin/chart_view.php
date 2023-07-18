<!DOCTYPE html>
<html>
<head>
    <title>Votes Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style the chart container */
        #chartContainer {
            width: 600px;
            height: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>Votes Chart</h1>
    <!-- Create a canvas element to hold the chart -->
    <canvas id="chartContainer"></canvas>

    <script>
        <script>
    // Parse the PHP data into JavaScript array
    var voteData = <?php echo json_encode($voteCounts); ?>;
    
    // Extract student emails and counts from the data
    var studentEmails = voteData.map(item => item.student_email);
    var voteCounts = voteData.map(item => item.count);

    // Load Chart.js
    var ctx = document.getElementById('chartContainer').getContext('2d');

    // Create the bar chart
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: studentEmails,
            datasets: [{
                label: 'Votes Count',
                data: voteCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

    </script>
</body>
</html>
