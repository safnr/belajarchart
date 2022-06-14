<?php
include ('koneksi_covid.php');
$covid = mysqli_query($conn, "SELECT * FROM tb_covid");
while ($row = mysqli_fetch_array($covid)) {
    $nama_negara[] = $row['country'];
    $query = mysqli_query ($conn, "SELECT sum(total_cases) as total_cases FROM tb_covid WHERE no = '".$row['no']."'");
    $row = $query->fetch_array();
    $total_kasus[] = $row['total_cases'];
};
?>
<!DOCTYPE html>
<html>
<head>
    <title>[Doughnut Chart] Graphic Total Cases Covid</title>
    <script type="text/javascript" src="chart.js"></script>
</head>
<body>
    <div id="canvas-holder" style="width: 50%;">
        <canvas id="chart-area"></canvas>
    </div>    
    <script>
        var config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: <?php echo json_encode($total_kasus); ?>,
                    backgroundColor: [
                        'rgba(225,99,132,0.2)',
                        'rgb(255,64,0,0.2)',
                        'rgba(252,186,3,0.2)',
                        'rgba(255,255,86,0.2)',                
                        'rgba(191,255,0,0.2)',
                        'rgba(0,255,191,0.2)',
                        'rgba(54,162,235,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(185,192,192,0.2)',
                        'rgba(235,0,128,0.2)'
                    ],
                    borderColor:[
                        'rgba(225,99,132,1)',
                        'rgb(255,64,0,1)',
                        'rgba(252,186,3,1)',
                        'rgba(255,255,86,1)',                
                        'rgba(191,255,0,1)',
                        'rgba(0,255,191,1)',
                        'rgba(54,162,235,1)',
                        'rgba(75,192,192,1)',
                        'rgba(185,192,192,1)',
                        'rgba(235,0,128,1)'
                    ],
                    label: 'Presentase Penjualan Barang'
                }],
                labels: <?php echo json_encode ($nama_negara); ?>},
                options: {
                    responsive:true
                }
            };
            window.onload = function () {
                var ctx = document.getElementById('chart-area') .getContext('2d');
                window.myPie = new Chart (ctx, config);                
            };
            document.getElementById('randomizeData') .addEventListener ('click',
            function() {
                config.data.datasets.forEach (function (dataset) {
                    dataset.data = dataset.data.map (function(){
                        return randomScalingFactor();
                    });                                        
                });
                window.myPie.update();
            });
            var colorNames = Object.keys(window.chartColors);
            document.getElementById ('addDataset') .addEventListener ('click',
            function() {
                var newDataset = {
                    backgroundColor: [],
                    data: [],
                    label: 'New dataset ' +
                    config.data.datasets.length,
                };
                for (var index = 0; index < config.data.labels.length;
                ++index) {
                    new Dataset.data.push (randomScalingFactor());
                    var colorName = colorNames[index %
                colorNames.length];
                    var newColor = window.chartColors[colorName];
                    newDataset.backgroundColor.push(newColor);
                }
                config.data.datasets.push(newDataset);
                window.myPie.update();
            });
            document.getElementById('removeDataset') .addEventListener('click',
            function() {
                config.data.datasets.splice(0, 1);
                window.myPie.update();
            });
    </script>
</body>
</html>