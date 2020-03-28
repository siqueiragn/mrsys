<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
			<div class="row">
                <div class="col-lg-12 form-horizontal">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">

                            <div class="panel panel-default">

                                <div class="panel-body text-center">

                                    <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?acao=atz&cd='. $objeto->id);?>" enctype="multipart/form-data">

                                        <div class="form-group">

                                            <div class="col-lg-offset-8 col-xs-offfset-8 col-lg-4 col-xs-4 text-right">

                                                <button type="submit" class="btn btn-sm btn-default">Salvar <i class="fa fa-save"></i></button>
                                                <a href="<?php echo site_url($this->router->class . '/listar');?>" class="btn btn-sm btn-default">Listar <i class="fa fa-arrow-left"></i></a>

                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <label for="" class="col-lg-2 col-xs-2 control-label">Agente</label>
                                            <div class="col-lg-4 col-xs-4">
                                                <select name="agente" id="agente" class="form-control input-sm" tabindex="1">
                                                    <option value=""></option>
                                                    <?php foreach ($funcionarios as $linha) { ?>
                                                        <option value="<?php echo $linha->id;?>" <?php if ($objeto->agente == $linha->id) echo "selected";?> ><?php echo $linha->nome;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label for="" class="col-lg-2 col-xs-2 control-label">Agente Auxiliar</label>
                                            <div class="col-lg-4 col-xs-4">
                                                <select name="agente_aux" id="agente_aux" class="form-control input-sm" tabindex="1">
                                                    <option value=""></option>
                                                    <?php foreach ($funcionarios as $linha) { ?>
                                                        <option value="<?php echo $linha->id;?>" <?php if ($objeto->agente2 == $linha->id) echo "selected";?> ><?php echo $linha->nome;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="" class="col-xs-2 col-xs-2 control-label">Cliente</label>
                                            <div class="col-xs-4 col-lg-4">
                                                <select name="cliente" id="cliente" class="form-control input-sm" tabindex="1">
                                                    <option value=""></option>
                                                    <?php foreach($clientes as $linha) {?>
                                                        <option value="<?php echo $linha->id;?>" <?php if($objeto->id == $linha->id) echo 'selected'; ?>><?php echo $linha->nome;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="" class="col-xs-2 col-xs-2 control-label">Serviço</label>
                                            <div class="col-xs-4 col-lg-4">
                                                <select name="servico" id="servico" class="form-control input-sm" tabindex="1" onchange="buscar_servico('<?php echo site_url($this->router->class . '/servicos');?>')">
                                                    <option value=""></option>
                                                    <?php foreach($servicos as $linha) {?>
                                                        <option value="<?php echo $linha->id;?>"<?php if ($linha->id == $objeto->servico) echo 'selected';?> ><?php echo $linha->nome;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <label for="" class="col-xs-2 col-lg-2 control-label">Franquia Horas</label>
                                            <div class="col-lg-1 col-xs-1">
                                                <input type="text" class="form-control input-sm" readonly id="franquia_hora" value="<?php echo $servico->franquiahora;?>">
                                            </div>

                                            <label for="" class="col-xs-1 col-lg-1 control-label">Franquia KM</label>
                                            <div class="col-lg-2 col-xs-2">
                                                <input type="text" class="form-control input-sm" readonly id="franquia_km" value="<?php echo $servico->franquiakm;?>">
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <label for="" class="col-lg-2 col-xs-2 control-label">Data e Hora Inicio</label>
                                            <div class="col-lg-2 col-xs-2">
                                                <input type="text" class="form-control input-sm mascara-data-hora" name="data_hora_inicio" id="data_hora_inicio" tabindex="1" onblur="calcular_diferenca_data(this, $('#data_hora_final'));" value="<?php echo $objeto->data_hora_inicial;?>">
                                            </div>
                                            <label for="" class="col-lg-2 col-xs-2 control-label">Data e Hora Final</label>
                                            <div class="col-lg-2 col-xs-2">
                                                <input type="text" class="form-control input-sm mascara-data-hora" name="data_hora_final" id="data_hora_final" tabindex="1" onblur="calcular_diferenca_data($('#data_hora_inicio'), this);" value="<?php echo $objeto->data_hora_final;?>">
                                            </div>
                                            <label for="" class="col-lg-2 col-xs-2 control-label">Total Horas</label>
                                            <div class="col-lg-2 col-xs-2">
                                                <input type="text" class="form-control input-sm mascara-numero" name="diferenca_horas" id="diferenca_horas" readonly>
                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <label for="" class="col-lg-2 col-xs-2 control-label">KM Inicial</label>
                                            <div class="col-lg-2 col-xs-2">
                                                <input type="text" class="form-control input-sm mascara-numero" name="km_inicial" id="km_inicial" tabindex="1" value="<?php echo $objeto->km_inicial;?>" onblur="calcular_km();">
                                            </div>

                                            <label for="" class="col-lg-2 col-xs-2 control-label">KM Final</label>
                                            <div class="col-lg-2 col-xs-2">
                                                <input type="text" class="form-control input-sm mascara-numero" name="km_final" id="km_final" tabindex="1" value="<?php echo $objeto->km_final;?>" onblur="calcular_km();">
                                            </div>

                                            <label for="" class="col-lg-2 col-xs-2 control-label">Total KM</label>
                                            <div class="col-xs-2 col-lg-2">
                                                <input type="text" class="form-control input-sm" readonly id="km_total">
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-xs-2 col-lg-2 control-label">Local</label>
                                            <div class="col-xs-10 col-lg-10">
                                                <select class="form-control input-sm" tabindex="1" name="local" id="local">
                                                    <option value=""></option>
                                                    <?php foreach ($locais as $linha) {?>
                                                        <option value="<?php echo $linha->id;?>"<?php if ($linha->id == $objeto->endereco) echo "selected";?>><?php echo $linha->nome;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-xs-2 control-label col-lg-2">Motorista</label>
                                            <div class="col-xs-3 col-lg-3">
                                                <input type="text" class="form-control input-sm" name="motorista" id="motorista" tabindex="1" value="<?php echo $objeto->motorista;?>">
                                            </div>
                                            <label for="" class="col-xs-1 control-label col-lg-1">Placa</label>
                                            <div class="col-xs-2 col-lg-2">
                                                <input type="text" class="form-control input-sm" name="placa" id="placa" tabindex="1" value="<?php echo $objeto->placa;?>">
                                            </div>
                                            <label for="" class="col-lg-1 col-xs-1 control-label">Destino</label>
                                            <div class="col-lg-3 col-xs-3">
                                                <input type="text" class="form-control input-sm" name="destino" id="destino" tabindex="1" value="<?php echo $objeto->destino;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-lg2 col-xs-2 control-label">Feriado?</label>
                                            <div class="col-lg-1 col-xs-1">
                                                <input type="checkbox" class="form-control checkbox-medio input-sm" <?php echo $objeto->feriado == 1 ? "checked" : ""; ?> name="feriado" id="feriado" tabindex="1">
                                            </div>
                                        </div>


                                        <hr>

                                        <script>

                                            calcular_diferenca_data($('#data_hora_inicio'), $("#data_hora_final"));
                                            calcular_km();

                                        </script>
                                    </form>

                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
        
<!-- /#wrapper -->