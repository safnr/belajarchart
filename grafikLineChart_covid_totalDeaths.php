<?php
include ('koneksi_covid.php');
$covid = mysqli_query($conn, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($covid)) {
    $nama_negara[] = $row['country'];
    $query = mysqli_query ($conn, "SELECT sum(total_deaths) as total_deaths FROM tb_covid WHERE no = '".$row['no']."'");
    $row = $query->fetch_array();
    $kematian_total[] = $row['total_deaths'];
};
?>
<!DOCTYPE html>
<html>
<head>
    <title>[Line Chart] Graphic Total Deaths Covid</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="width: 800px; height: 800px">
        <canvas id="myChart"></canvas>
    </div>    
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart (ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode ($nama_negara); ?>,
                datasets: [{
                    label: 'Grafik Covid',
                    data: <?php echo json_encode($kematian_total); ?>,
                    backgroundColor: 'rgba(225,99,132,0.2)',
                    borderColor: 'rgba(225,99,132,1)',
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