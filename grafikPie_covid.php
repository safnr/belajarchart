<?php
include ('koneksi_covid.php');
$produk = mysqli_query($conn, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($produk)) {
    $country[] = $row['country'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div id="canvas-holder" style="width: 50%;">
        <canvas id="myChart"></canvas>
    </div>    
    <script>
        var config = {
            type: 'pie',
            data: {
                datasets
            }
        }
    </script>  
</body>
</html>