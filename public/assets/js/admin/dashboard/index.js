"use strict";

// Class definition
var KTDashboardIndex = function () {

    var paiDashboard;
    // Elements
    // const ctx = document.getElementById('myChart');

    // new Chart(ctx, {
    //     type: 'doughnut',
    //     data: {
    //         labels: ['Seu Ganho', 'Taxa Nome da empresa'],
    //         datasets: [{
    //             data: [{id: 'Sales', nested: {value: 1500}}, {id: 'Purchases', nested: {value: 500}}]
    //         }]
    //         // labels: ['Seu Ganho', 'Taxa Nome da empresa', 'Quem indicou', 'Green', 'Purple', 'Orange'],
    //         // datasets: [{
    //         //     label: '# of Votes',
    //         //     data: [50, 19, 3, 5, 2, 3],

    //         // }]
    //     },
    //     options: {
    //         borderWidth: 10,
    //         borderRadius: 2,
    //         hoverBorderWidth: 0,
    //         plugins: {
    //             legend: {
    //                 display: false
    //             }
    //         },    
    //         parsing: {
    //             key: 'nested.value'
    //         }
    //     }
    // });
    var handleGraphic = function () {
        let imoveisVenda
        let imoveisAluguel

        $.ajax({
            url: `${urlBase}/dashboard/getProperties`,
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (res) {
                imoveisAluguel = res.imoveisAluguel
                imoveisVenda = res.imoveisVenda

            },
            error: function (e) {
                console.log('erroe', e)
            }
        })
        //grafico 1
        google.load('visualization', '1', {
            packages: ['corechart', 'bar', 'line']
        });

        google.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Imoveis', 'Total de imoveis'],
                ['Aluguel', imoveisAluguel.length],
                ['Venda', imoveisVenda.length]

            ]);

            var options = {
                title: 'Meus imoveis',
                colors: ['#dcdcdc', '#ff0000']
            };

            var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
            chart.draw(data, options);
        });
    }

    var handleGraphic2 = function () {

        let vetorTipo;

        $.ajax({
            url: `${urlBase}/dashboard/getTiposImoveis`,
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (res) {
                vetorTipo = res.arrayTodos;
                console.log('retorno', res)
            },
            error: function (e) {
                console.log('erroe', e)
            }
        })

        google.load('visualization', '1', {
            packages: ['corechart', 'bar', 'line']
        });

        google.setOnLoadCallback(function () {
            var dataVisualization = [['Tipo do Imovel', 'Total do tipo']];

            vetorTipo.forEach(function(item) {
                dataVisualization.push([item[0], item[1]]);
            });

            var data = google.visualization.arrayToDataTable(
                dataVisualization
            );

            var options = {
                title: 'Tipos dos Imóveis Cadastrados',               
            };

            var chart = new google.visualization.PieChart(document.getElementById('myPieChart2'));
            chart.draw(data, options);
        });
    }

    var handleGraphic3 = function () {

        let vetorTipo;

        $.ajax({
            url: `${urlBase}/dashboard/getMunicipios`,
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (res) {
                vetorTipo = res.arrayTodos;
                console.log('retorno', res)
            },
            error: function (e) {
                console.log('erroe', e)
            }
        })

        google.load('visualization', '1', {
            packages: ['corechart', 'bar', 'line']
        });

        google.setOnLoadCallback(function () {
            var dataVisualization = [['Município', 'Total no município']];

            vetorTipo.forEach(function(item) {
                dataVisualization.push([item[0], item[1]]);
            });

            var data = google.visualization.arrayToDataTable(
                dataVisualization
            );

            var options = {
                title: 'Quantidade de imóveis por municípios',               
            };

            var chart = new google.visualization.PieChart(document.getElementById('myPieChart3'));
            chart.draw(data, options);
        });
    }

    var handleGraphic4 = function () {
        let imoveis200
        let imoveis200to400
        let imoveis400to600
        let imoveis600to800
        let imoveis800to1milhao
        let imoveis1milhao

        $.ajax({
            url: `${urlBase}/dashboard/getValoresImoveis`,
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (res) {
                imoveis200 = res.imoveis200
                imoveis200to400 = res.imoveis200to400
                imoveis400to600 = res.imoveis400to600
                imoveis600to800 = res.imoveis600to800
                imoveis800to1milhao = res.imoveis800to1milhao
                imoveis1milhao = res.imoveis1milhao
            },
            error: function (e) {
                console.log('erroe', e)
            }
        })
        //grafico 1
        google.load('visualization', '1', {
            packages: ['corechart', 'bar', 'line']
        });

        google.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Faixa de Valores', 'Valores'],
                ['Até 200 mil', imoveis200.length],
                ['200 mil - 400 mil', imoveis200to400.length],
                ['400 mil - 600 mil', imoveis400to600.length],
                ['600 mil - 800 mil', imoveis600to800.length],
                ['800 mil - 1 milhão', imoveis800to1milhao.length],
                ['Acima de 1 milhão', imoveis1milhao.length]
            ]);

            var options = {
                title: 'Faixa de Valores dos Imóveis a Venda',
                colors: ['#dcdcdc', '#ff0000', '#0000ff', '#ff9900', '#109618' , '#990099']
            };

            var chart = new google.visualization.PieChart(document.getElementById('myPieChart4'));
            chart.draw(data, options);
        });
    }

    var handleGraphic5 = function () {
        let imovelAprovado
        let imovelAguardando


        $.ajax({
            url: `${urlBase}/dashboard/getStatusImovel`,
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function (res) {
                imovelAprovado = res.imovelAprovado
                imovelAguardando = res.imovelAguardando

            },
            error: function (e) {
                console.log('erroe', e)
            }
        })
        //grafico 1
        google.load('visualization', '1', {
            packages: ['corechart', 'bar', 'line']
        });

        google.setOnLoadCallback(function () {
            var data = google.visualization.arrayToDataTable([
                ['Status', 'Valores'],
                ['Publicados no Site', imovelAprovado.length],
                ['Aguardando Aprovação', imovelAguardando.length],
            ]);

            var options = {
                title: 'Status de Aprovação do Imóvel',
                colors: ['#109618', '#ff9900' ]
            };

            var chart = new google.visualization.PieChart(document.getElementById('myPieChart5'));
            chart.draw(data, options);
        });
    }

    // Public functions
    return {
        // Initialization
        init: function () {
            paiDashboard = document.querySelector('#dashboardInicio');

            if(!paiDashboard){
                return;
            }

            handleGraphic(),
            handleGraphic2(),
            handleGraphic3(),
            handleGraphic4(),
            handleGraphic5()
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDashboardIndex.init();
});
