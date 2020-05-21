<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading text-left hidden-print">
                    <h4>Cadastro de Missões</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row form-horizontal">
                        <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?acao=atz&id=' . $objeto->missao_id);?>" enctype="multipart/form-data">

                            <div class="form-group">
                                <div class="col-lg-8 col-xs-8" >
                                    <ul class="nav nav-tabs">
                                        <li role="presentation" class="active"><a href="#" class="aba-etapa-1 aba-link" id="1">Etapa 1</a></li>
                                        <li role="presentation"><a href="#" class="aba-etapa-2 aba-link" id="2">Etapa 2</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-xs-4 text-right">

                                    <button type="submit" class="btn btn-sm btn-default">Salvar <i class="fa fa-save"></i></button>
                                    <button type="reset" class="btn btn-sm btn-default">Limpar</button>
                                    <a href="<?php echo site_url($this->router->class . '/listar');?>" class="btn btn-sm btn-default">Listar <i class="fa fa-arrow-left"></i></a>

                                </div>
                            </div>

                            <div class="form-etapa-1">

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

                                    <label for="" class="col-xs-2 col-xs-2 control-label">Serviço</label>
                                    <div class="col-xs-4 col-lg-4">
                                        <select name="servico" id="servico" class="form-control input-sm" tabindex="1" onchange="buscar_servico('<?php echo site_url($this->router->class . '/servicos');?>')">
                                            <option value=""></option>
                                            <?php foreach($servicos as $linha) {?>
                                                <option value="<?php echo $linha->id;?>" <?php if ($objeto->servico_id == $linha->id) echo "selected"; ?>><?php echo $linha->nome;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <label for="" class="col-xs-2 col-lg-2 control-label">Franquia Horas</label>
                                    <div class="col-lg-1 col-xs-1">
                                        <input type="text" class="form-control input-sm" readonly id="franquia_hora" value="<?php echo $objeto->franquiahora;?>">
                                        <input type="hidden" class="form-control input-sm" readonly id="franquia_hora_valor" value="<?php echo $objeto->valorhora;?>">
                                        <input type="hidden" class="form-control input-sm" readonly id="franquia_hora_valor_extra" value="<?php echo $objeto->extrahora;?>">
                                    </div>

                                    <label for="" class="col-xs-1 col-lg-1 control-label">Franquia KM</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm" readonly id="franquia_km" value="<?php echo $objeto->franquiakm;?>">
                                        <input type="hidden" class="form-control input-sm" readonly id="franquia_km_valor" value="<?php echo $objeto->valorkm;?>">
                                        <input type="hidden" class="form-control input-sm" readonly id="franquia_km_valor_extra" value="<?php echo $objeto->extrakm;?>">
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
                                        <input type="text" class="form-control input-sm mascara-numero" name="diferenca_horas" id="diferenca_horas" readonly value="<?php echo $objeto->hora_diferenca;?>">
                                    </div>

                                </div>
                                <div class="form-group area-horas-extras <?php echo $objeto->qtd_total_hora_extra > 0 ? '' : 'hidden';?>">

                                    <label for="" class="col-lg-4 col-xs-4 control-label" style="color: red;">Horas Extras</label>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Hora Extra Quantidade</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm" tabindex="1" name="hora_extra_quantidade" id="hora_extra_quantidade" readonly value="<?php echo $objeto->qtd_total_hora_extra;?>">
                                    </div>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Adicional Hora Extra (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm somar-total" tabindex="1" name="hora_extra_valor" id="hora_extra_valor" readonly  value="<?php echo $objeto->total_hora_extra;?>">
                                    </div>

                                </div>
                                <div class="form-group">


                                    <label for="" class="col-lg-2 col-xs-2 control-label">KM Inicial</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm mascara-numero" name="km_inicial" id="km_inicial" tabindex="1" onblur="calcular_km();"  value="<?php echo $objeto->km_inicial;?>">
                                    </div>

                                    <label for="" class="col-lg-2 col-xs-2 control-label">KM Final</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm mascara-numero" name="km_final" id="km_final" tabindex="1" onblur="calcular_km();"  value="<?php echo $objeto->km_final;?>">
                                    </div>

                                    <label for="" class="col-lg-2 col-xs-2 control-label">Total KM</label>
                                    <div class="col-xs-2 col-lg-2">
                                        <input type="text" class="form-control input-sm" readonly name="km_total" id="km_total"  value="<?php echo $objeto->km_diferenca;?>">
                                    </div>

                                </div>
                                <div class="form-group area-km-extras <?php echo $objeto->qtd_total_km_extra > 0 ? '' : 'hidden';?>">

                                    <label for="" class="col-lg-4 col-xs-4 control-label" style="color: red;">KM Extra</label>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">KM Extra Quantidade</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm" tabindex="1" name="km_extra_quantidade" id="km_extra_quantidade" readonly  value="<?php echo $objeto->qtd_total_km_extra;?>">
                                    </div>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Adicional KM Extra (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm somar-total" tabindex="1" name="km_extra_valor" id="km_extra_valor" readonly  value="<?php echo $objeto->total_km_extra;?>">
                                    </div>

                                </div>

                            </div>
                            <div class="form-etapa-2 aba-area">
                                <div class="form-group">
                                    <label for="" class="col-xs-2 col-lg-2 control-label">Local</label>
                                    <div class="col-xs-10 col-lg-10">
                                        <input type="text" class="form-control input-sm" tabindex="1" name="local" id="local" value="<?php echo $objeto->endereco;?>" />
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
                                        <input type="checkbox" class="form-control checkbox-medio input-sm" name="feriado" id="feriado" tabindex="1" <?php if ($objeto->feriado == 1) echo "checked";?> >
                                    </div>
                                </div>

                            </div>


                            <hr>


                        </form>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.row -->

            </div>

        </div>
    </div>
</div>




