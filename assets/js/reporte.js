$(document).ready(function () {
  $("#table-entradas").DataTable();
  $("#table-salidas").DataTable();

  refresh_datatables();
});



function refresh_datatables() {
  fecha_inicio = $("#fecha_inicio").val();
  fecha_fin = $("#fecha_fin").val();

  data = { fecha_inicio, fecha_fin };

  console.log(data);

  $.ajax({
    type: "post",
    url: baseURL + "reportes/data/all",
    data: data,
    dataType: "json",
    success: function (response) {
      $("#table-entradas").dataTable().fnDestroy();
      $("#table-salidas").dataTable().fnDestroy();

      console.log(response.entradas);

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

document.querySelector("#fecha_fin").addEventListener("input", ()=>{
    refresh_datatables();
});