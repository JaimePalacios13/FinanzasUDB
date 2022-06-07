$(document).ready(function() {

    $.ajax({
        type: "GET",
        url: baseURL + 'grafEntradas',
        dataType: "json",
        success: function(rsp) {
            var monto = [];
            var labels = [];
            var colorBac = [];

            for (var i = 0; i < rsp.data.length; i++) {
                monto.push(rsp.data[i].monto)
                labels.push(rsp.data[i].tipoEntrada)
                if (i % 2 == 0) {
                    var r = generateRandomInt(128, 255)
                    var g = generateRandomInt(128, 255)
                    var b = generateRandomInt(128, 255)
                    var a = '0.8'
                    var color = "rgba(" + r + "," + g + "," + b + "," + a + ")"
                    colorBac.push(color)
                } else {
                    var r = generateRandomInt(128, 255)
                    var g = generateRandomInt(128, 255)
                    var b = generateRandomInt(128, 255)
                    var a = '0.8'
                    var color = "rgba(" + r + "," + g + "," + b + "," + a + ")"
                    colorBac.push(color)
                }
            }

            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Stock de Productos',
                        data: monto,
                        backgroundColor: colorBac,
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
        }
    });

    /* grafico 2 */
    $.ajax({
        type: "GET",
        url: baseURL + 'grafSalidas',
        dataType: "json",
        success: function(rsp) {
            var montoSalida = [];
            var labelsSalidas = [];
            var colorBac = [];

            for (var i = 0; i < rsp.data.length; i++) {
                montoSalida.push(rsp.data[i].monto)
                labelsSalidas.push(rsp.data[i].tipoSalida)
                if (i % 2 == 0) {
                    var r = generateRandomInt(128, 255)
                    var g = generateRandomInt(128, 255)
                    var b = generateRandomInt(128, 255)
                    var a = '0.8'
                    var color = "rgba(" + r + "," + g + "," + b + "," + a + ")"
                    colorBac.push(color)
                } else {
                    var r = generateRandomInt(128, 255)
                    var g = generateRandomInt(128, 255)
                    var b = generateRandomInt(128, 255)
                    var a = '0.8'
                    var color = "rgba(" + r + "," + g + "," + b + "," + a + ")"
                    colorBac.push(color)
                }
            }

            const ctx = document.getElementById('myChartSalida').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labelsSalidas,
                    datasets: [{
                        label: '',
                        data: montoSalida,
                        backgroundColor: colorBac,
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
        }
    });
});

function generateRandomInt(min, max) {
    return Math.floor((Math.random() * (max - min)) + min);
}