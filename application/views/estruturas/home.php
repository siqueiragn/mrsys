<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Cliente');
        data.addColumn('number', 'Missões');
        data.addRows(JSON.parse('<?php echo ($dados);?>'));

        // Instantiate and draw the chart.
        var chart = new google.visualization.ColumnChart(document.getElementById('myColumnChart'));
        var options = {'title':'Missões x Cliente',   'legend':'bottom',};
        chart.draw(data, options);

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Serviço');
        data.addColumn('number', 'Quantidade');
        data.addRows(JSON.parse('<?php echo ($dadosPie);?>'));
        var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
        var options = {'title':'Serviços do mês',   'legend':'right',};
        chart.draw(data, options);
    }
</script>
<div class="form-group">

    <div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1 well">

        <div class="panel panel-default">

            <div class="panel-body text-center">

                <div class="row">

                    <h3 class="text-left dashboard-text">Seja bem-vindo Celso.</h3>
                    <h4 class="text-left dashboard-text">Existem 3 missões aguardando avaliação.</h4>

                </div>
                <!--<img src="<?php /*echo site_url('assets/images/logo.png');*/?>" alt="">-->
               <!-- <h5 class="text-center">Bem, parece que ainda não temos novidades, que coisa, não?</h5>-->

                <div class="row chart-area">

                    <div style="width: 60%;">
                         <div class="card text-left">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-xs text-uppercase card-header">Faturamento Mensal</div>
                                        <div class="card-desc"><strong>R$</strong> &nbsp;40.000,00</div>
                                    </div>
                                    <div class="col-auto">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card text-left">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-xs text-uppercase card-header">Despesas Mensal</div>
                                        <div class="card-desc"><strong>R$</strong> &nbsp;17.478,00</div>
                                    </div>
                                    <div class="col-auto">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="width: 40%;">

                        <div class="card text-left">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mr-2">
                                        <div class="text-xs text-uppercase card-header">Missões</div>
                                        <div class="card-desc"><i class="fa fa-truck"></i> 32</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card text-left">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-uppercase card-header">Funcionários</div>
                                        <div class="card-desc"><i class="fa fa-user"></i> 74</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- Content Row -->

                <div class="row chart-area">
                    <div class="chart" style="width: 60%">
                        <div id="myColumnChart"> </div>
                    </div>
                    <div class="chart" style="width: 40%;">
                        <div id="myPieChart"> </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

</div>