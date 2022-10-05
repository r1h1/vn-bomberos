let llamadoAmbulancia = document.getElementById('llamadoAmbulancia').innerHTML;
let llamadoIncendio = document.getElementById('llamadoIncendio').innerHTML;
let llamadoRescate = document.getElementById('llamadoRescate').innerHTML;
let llamadoVarios = document.getElementById('llamadoVarios').innerHTML;


const charts = document.querySelectorAll(".chart");

charts.forEach(function (chart) {
    var ctx = chart.getContext("2d");
    var myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Ambulancia", "Incendio", "Rescate", "Varios"],
            datasets: [
                {
                    label: "Llamadas ",
                    data: [llamadoAmbulancia, llamadoIncendio, llamadoRescate, llamadoVarios],
                    backgroundColor: [
                        "rgba(255, 193, 7, 0.7)",
                        "rgba(25, 135, 84, 0.7)",
                        "rgba(220, 53, 69, 0.7)",
                        "rgba(13, 110, 253, 0.7)",
                    ],
                    borderColor: [
                        "rgba(255, 193, 7, 1)",
                        "rgba(25, 135, 84, 1)",
                        "rgba(220, 53, 69, 1)",
                        "rgba(13, 110, 253, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
});

$(document).ready(function () {
    $(".data-table").each(function (_, table) {
        $(table).DataTable();
    });
});