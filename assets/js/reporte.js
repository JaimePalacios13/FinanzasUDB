$(document).ready(function () {
  $("#table-entradas").DataTable();
  $("#table-salidas").DataTable();

  refresh_datatables();
});



function refresh_datatables() {
  fecha_inicio = $("#fecha_inicio").val();

  data = { fecha_inicio };

  console.log(data);

  $.ajax({
    type: "post",
    url: baseURL + "reportes/data/all",
    data: data,
    dataType: "json",
    success: function (response) {
      $("#table-entradas").dataTable().fnDestroy();
      $("#table-salidas").dataTable().fnDestroy();

      var data_entry = ` `;
      var data_out = ` `;

      if (response != "no_register") {
        for (let i = 0; i < response.entradas.length; i++) {
          data_entry += ` 
                 <tr>
                      <td>${response.entradas[i]["tipoEntrada"]}</td>
                      <td>${response.entradas[i]["monto"]}</td>
                  </tr>`;
        }

        for (let i = 0; i < response.salidas.length; i++) {
          data_out += ` 
           <tr>
                <td>${response.salidas[i]["tipoSalida"]}</td>
                <td>${response.salidas[i]["monto"]}</td>
            </tr>`;
        }
      }

      document.querySelector("#data-entradas").textContent = "";
      document.querySelector("#data-entradas").innerHTML = data_entry;

      document.querySelector("#data-salidas").textContent = "";
      document.querySelector("#data-salidas").innerHTML = data_out;

      $("#table-entradas").DataTable({
        language: {
          url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json",
        },
      });

      $("#table-salidas").DataTable({
        language: {
          url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json",
        },
      });

    },
  });
}



/* Evento para hacer la petición cada vez que el usuario seleccione una nueva fecha */

document.querySelector("#fecha_inicio").addEventListener("input", ()=>{
    refresh_datatables();
});


/*  */

var ctx = document.getElementById("chart1");
var data = {
    labels: ["Entradas", "Salidas"],
    datasets: [{
        label: '# Balance',
        data: [20, 50],
        backgroundColor: [
            'rgba(15, 35, 201, 1)',
            'rgba(231, 15, 64, 1)',
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
                beginAtZero: true
            }
        }]
    }
};
var chart1 = new Chart(ctx, {
    type: 'doughnut',
    data: data,
    options: options
});

/* var dataURL = ctx.toDataURL('image/jpg');
 *///window.location.href = canvas.toDataURL("image/png");