var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    animationEnabled: true,
    data: {
        labels: ['Pegue HD´s', 'Conjuntos', 'Labirinto de Pastas', 'Decisões'],
        datasets: [{
            label: "Votos",
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend: {
            display: false,
            labels: {
                fontSize: 17
            }
        },
        title: {
            display: true,
            text: 'Engajamento das crianças com os minijogos',
            fontSize: 25
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});




var ctx2 = document.getElementById('myChart2').getContext('2d');
var myChart2 = new Chart(ctx2, {
    type: 'line',
    animationEnabled: true,
    data: {
        labels: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
        datasets: [{
            data: [5, 10, 12, 13, 16, 20, 28, 33, 48, 69],
            label: "Escola Feirreiro Rocha",
            borderColor: "#3e95cd",
            fill: false
        }, {
            data: [5, 60, 65, 48, 57,46, 78, 65, 64, 58],
            label: "Escola Ernandes II",
            borderColor: "#8e5ea2",
            fill: false
        }, {
            data: [5, 15, 16, 17, 18, 33, 48, 54, 67, 73],
            label: "Escola Rosa de Neon",
            borderColor: "#3cba9f",
            fill: false
        }, {
            data: [5, 20, 10, 16, 24, 38, 74, 16, 50, 78],
            label: "Escola Eneias V",
            borderColor: "#e8c3b9",
            fill: false
        }, {
            data: [6, 3, 2, 2, 7, 26, 82, 17, 31, 100],
            label: "Escola Anjos de Prata",
            borderColor: "#c45850",
            fill: false
        }]
    },
    options: {
        legend: {
            labels: {
                fontSize: 17
            }
        },
        title: {
            display: true,
            text: 'Escolas com maior progresso',
            fontSize: 25
        }

    }
});



var ctx3 = document.getElementById('myChart3').getContext('2d');
var myChart3 = new Chart(ctx3, {
    type: 'doughnut',
    animationEnabled: true,
    data: {
        labels: ["2º", "4º", "5º", "3º", "6º"],
        datasets: [{
            label: "Population (millions)",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
            data: [2478, 5267, 734, 784, 433]
        }]
    },
    options: {
        legend: {
            labels: {
                fontSize: 17
            }
        },
        title: {
            display: true,
            text: 'Turmas que mais jogaram',
            fontSize: 25
        }
    }
});



var ctx4 = document.getElementById('myChart4').getContext('2d');
var myChart4 = new Chart(ctx4, {
    type: 'pie',
    animationEnabled: true,
    data: {
        labels: ["4º", "3º", "5º", "1º", "2º"],
        datasets: [{
            label: "Population (millions)",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
            data: [2478, 5267, 734, 784, 433]
        }]
    },
    options: {
        legend: {
            labels: {
                fontSize: 17
            }
        },
        title: {
            display: true,
            text: 'Progresso das turmas',
            fontSize: 25
        }
    }
});

myChart.render();
myChart2.render();
myChart3.render();
myChart4.render();