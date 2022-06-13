<?php
include ('koneksi_covid.php');
$label = ["India", "S.Korea", "Turkey", "Vietnam", "Japan", "Iran", "Indonesia", "Malaysia", "Thailand", "Israel"];
while ($row = mysqli_fetch_array($country)) {
    $country[] = $row['country'];
    $query = mysqli_query ($conn, "SELECT sum(total_cases) as total_cases FROM tb_covid");
    $row = $query->fetch_array();
    $total_cases[] = $row['total_cases'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Membuat Grafik Menggunakan Chart JS</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width: 800px; height: 800px">
        <canvas id="myChart"></canvas>
    </div>    
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart (ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode ($label); ?>,
                datasets: [{
                    label: 'Grafik Covid',
                    data: <?php echo json_encode($total_cases); ?>,
                    borderWidth: 1                    
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>  
</body>
</html>