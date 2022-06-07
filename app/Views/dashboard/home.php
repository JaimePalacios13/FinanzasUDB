<div class="container mt-3">
    <div class="row">
        <div class="col-sm">
            <h3>
                <b> Balances de ingresos y salidas </b>
            </h3>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm">
            <div class="animated flipInY">
                <div class="tile-stats">
                    <div class="icon"><i class="fas fa-chart-line"></i></div>
                    <div class="count">$<?=$totalSumaIngreso?></div>
                    <h3>Total de ingresos</h3>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="animated flipInY">
                <div class="tile-stats">
                    <div class="icon"><i class="fas fa-chart-line-down"></i></div>
                    <div class="count">$<?=$totalSumaSalida?></div>
                    <h3>Total de salidas</h3>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="animated flipInY">
                <div class="tile-stats">
                    <div class="icon"><i class="fas fa-sack-dollar"></i></div>
                    <div class="count">$<?=$Disponibilidad?></div>
                    <h3>Balance General</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-sm-4 mt-3">
            <div class="row">
                <div class="col-12 text-center">
                    <h5>Grafico de Ingresos</h5>
                </div>
                <div class="col-12">
                    <canvas id="myChart"></canvas>  
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-3">
            <div class="row">
                <div class="col-12 text-center">
                    <h5>Grafico de Salidas</h5>
                </div>
                <div class="col-12">
                    <canvas id="myChartSalida"></canvas>  
                </div>
            </div>
        </div>
    </div>
</div>
