<div class="row">
    <div class="col-sm-12">


        <div class="card">
            <div class="card-header">
                Reportes
            </div>
            <div class="card-body">

                <div class="row mb-4">
                    <div class="col-sm-8 mx-auto">
                        <div class="row">
                            <div class="col-sm-6"> <input type="month" name="" id="fecha_inicio" class="form-control"></div>
                            <div class="col-sm-6">
                                <a href="<?= base_url() ?>/print-reporte" class="btn btn-primary float-right">Imprimir reporte</a>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-sm-6">
                        <table class="table table-hover table-striped" id="table-entradas">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody id="data-entradas">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <div class="col-sm-6">
                        <table class="table table-hover table-striped" id="table-salidas">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody id="data-salidas">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>

                <div class="row">
                    <div class="col-sm-12">
                    <canvas id="chart1" width="400" height="100"></canvas>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<script src="<?= base_url() ?>/assets/js/reporte.js"></script>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: ["Dia 1", "Dia 2" ],
        datasets: [{
            label: '# Dias de uso Enero',
            data: [20, 50],
            backgroundColor: [
                'rgba(200, 100, 100, 0.25)',
                'rgba(100, 100, 100, 0.25)',
            ],
            borderColor: [
                'rgba(200,200,200,1)',
                'rgba(200,200,200,1)',
            ],
            borderWidth: 2
        }]
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: options
});

var dataURL = ctx.toDataURL('image/png');
//window.location.href = canvas.toDataURL("image/png");
</script>

<form method="POST" action="<?= base_url() ?>/print-reporte" name="form" id="form">
  <input type="hidden" name="base64" id="base64"/>
  <button type="submit">
    Guardar imagen
  </button>
</form>

<script>

   // on the submit event, generate a image from the canvas and save the data in the textarea
   document.getElementById('form').addEventListener("submit",function(){
        var ctx = document.getElementById("chart1");

      var image = ctx.toDataURL(); // data:image/png....
      document.getElementById('base64').value = image;
   },false);

</script>
