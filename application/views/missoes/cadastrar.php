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
                        <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?acao=salvar');?>" enctype="multipart/form-data">

                            <div class="form-group">
                                <div class="col-lg-8 col-xs-8" >
                                    <ul class="nav nav-tabs">
                                        <li role="presentation" class="active"><a href="#" class="aba-etapa-1 aba-link" id="1">Etapa 1</a></li>
                                        <li role="presentation"><a href="#" class="aba-etapa-2 aba-link" id="2">Etapa 2</a></li>
                                        <li role="presentation" onclick="calcular_custo_missao()"><a href="#" class="aba-etapa-3 aba-link" id="3">Discriminação Custos</a></li>
                                        <li role="presentation" onclick="calcular_custo_missao()"><a href="#" class="aba-etapa-4 aba-link" id="4">Discriminação Faturamento</a></li>
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
                                        <select name="agente" id="agente" required class="form-control input-sm" tabindex="1">
                                            <option value=""></option>
                                            <?php foreach ($funcionarios as $linha) { ?>
                                                <option value="<?php echo $linha->id;?>"><?php echo $linha->nome;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Agente Auxiliar</label>
                                    <div class="col-lg-4 col-xs-4">
                                        <select name="agente_aux" id="agente_aux" class="form-control input-sm" tabindex="1">
                                            <option value=""></option>
                                            <?php foreach ($funcionarios as $linha) { ?>
                                                <option value="<?php echo $linha->id;?>"><?php echo $linha->nome;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="" class="col-xs-2 col-xs-2 control-label">Serviço</label>
                                    <div class="col-xs-4 col-lg-4">
                                        <select name="servico" id="servico" required class="form-control input-sm" tabindex="1" onchange="buscar_servico('<?php echo site_url($this->router->class . '/servicos');?>')">
                                            <option value=""></option>
                                            <?php foreach($servicos as $linha) {?>
                                                <option value="<?php echo $linha->id;?>"><?php echo $linha->nome;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <label for="" class="col-xs-2 col-lg-2 control-label">Franquia Horas</label>
                                    <div class="col-lg-1 col-xs-1">
                                        <input type="text" class="form-control input-sm" readonly id="franquia_hora">
                                        <input type="hidden" class="form-control input-sm" readonly id="franquia_hora_valor">
                                        <input type="hidden" class="form-control input-sm" readonly id="franquia_hora_valor_extra">
                                    </div>

                                    <label for="" class="col-xs-1 col-lg-1 control-label">Franquia KM</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm" readonly id="franquia_km">
                                        <input type="hidden" class="form-control input-sm" readonly id="franquia_km_valor">
                                        <input type="hidden" class="form-control input-sm" readonly id="franquia_km_valor_extra">
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="" class="col-lg-2 col-xs-2 control-label">Data e Hora Inicio</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm mascara-data-hora" name="data_hora_inicio" id="data_hora_inicio" tabindex="1" onblur="calcular_diferenca_data();">
                                    </div>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Data e Hora Final</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm mascara-data-hora" name="data_hora_final" id="data_hora_final" tabindex="1" onblur="calcular_diferenca_data();">
                                    </div>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Total Horas</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm mascara-numero" name="diferenca_horas" id="diferenca_horas" readonly>
                                    </div>

                                </div>
                                <div class="form-group area-horas-extras hidden">

                                    <label for="" class="col-lg-4 col-xs-4 control-label" style="color: red;">Horas Extras</label>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Hora Extra Quantidade</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm hora_extra_quantidade" tabindex="1" name="hora_extra_quantidade" id="hora_extra_quantidade" readonly>
                                    </div>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Adicional Hora Extra (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm somar-total hora_extra_valor text-right" tabindex="1" name="hora_extra_valor" id="hora_extra_valor" readonly>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="" class="col-lg-2 col-xs-2 control-label">KM Inicial</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm mascara-numero" name="km_inicial" id="km_inicial" tabindex="1" onblur="calcular_km();">
                                    </div>

                                    <label for="" class="col-lg-2 col-xs-2 control-label">KM Final</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm mascara-numero" name="km_final" id="km_final" tabindex="1" onblur="calcular_km();">
                                    </div>

                                    <label for="" class="col-lg-2 col-xs-2 control-label">Total KM</label>
                                    <div class="col-xs-2 col-lg-2">
                                        <input type="text" class="form-control input-sm" readonly name="km_total" id="km_total">
                                    </div>

                                </div>
                                <div class="form-group area-km-extras hidden">

                                    <label for="" class="col-lg-4 col-xs-4 control-label" style="color: red;">KM Extra</label>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">KM Extra Quantidade</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm km_extra_quantidade" tabindex="1" name="km_extra_quantidade" id="km_extra_quantidade" readonly>
                                    </div>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Adicional KM Extra (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm somar-total km_extra_valor text-right" tabindex="1" name="km_extra_valor" id="km_extra_valor" readonly>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <label for="" class="col-lg-2 col-xs-2 control-label">Valor Franquia (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm  mascara-dinheiro valor_franquia" readonly>
                                    </div>

                                </div>

                            </div>
                            <div class="form-etapa-2 aba-area">
                                <div class="form-group">
                                    <label for="" class="col-xs-2 col-lg-2 control-label">Local</label>
                                    <div class="col-xs-10 col-lg-10">
                                        <input type="text" class="form-control input-sm" tabindex="1" name="local" id="local" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-xs-2 control-label col-lg-2">Motorista</label>
                                    <div class="col-xs-3 col-lg-3">
                                        <input type="text" class="form-control input-sm" name="motorista" id="motorista" tabindex="1">
                                    </div>
                                    <label for="" class="col-xs-1 control-label col-lg-1">Placa</label>
                                    <div class="col-xs-2 col-lg-2">
                                        <input type="text" class="form-control input-sm" name="placa" id="placa" tabindex="1">
                                    </div>
                                    <label for="" class="col-lg-1 col-xs-1 control-label">Destino</label>
                                    <div class="col-lg-3 col-xs-3">
                                        <input type="text" class="form-control input-sm" name="destino" id="destino" tabindex="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-lg-1 col-xs-1 control-label">Feriado?</label>
                                    <div class="col-lg-1 col-xs-1 text-left">
                                        <input type="checkbox" class="input-sm feriado" name="feriado" id="feriado" tabindex="1">
                                    </div>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Batida Extra?</label>
                                    <div class="col-lg-1 col-xs-1 text-left">
                                        <input type="checkbox" class="input-sm batida_extra" name="batida_extra" id="batida_extra" tabindex="1">
                                    </div>
                                    <label for="" class="col-lg-2 col-xs-2 control-label">Deslocamento Extra?</label>
                                    <div class="col-lg-1 col-xs-1 text-left">
                                        <input type="checkbox" class="input-sm deslocamento_extra" name="deslocamento_extra" id="deslocamento_extra" tabindex="1">
                                    </div>
                                    <label for="" class="col-lg-1 col-xs-1 control-label">Pedágio?</label>
                                    <div class="col-lg-1 col-xs-1 text-left">
                                        <input type="checkbox" class="input-sm pedagio" name="pedagio" id="pedagio" tabindex="1">
                                    </div>
                                    <label for="" class="col-lg-1 col-xs-1 control-label">Pernoite?</label>
                                    <div class="col-lg-1 col-xs-1 text-left">
                                        <input type="checkbox" class="input-sm pernoite" name="pernoite" id="pernoite" tabindex="1">
                                    </div>
                                </div>

                            </div>
                            <div class="form-etapa-3 aba-area">

                                <div class="form-group discriminacao-pernoite hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">Pernoite pago ao agente (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm text-right" tabindex="1" name="valor_pernoite_agente" id="valor_pernoite_agente" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group discriminacao-deslocamento hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">Deslocamentos pago ao agente (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm text-right" tabindex="1" name="valor_deslocamentos_agente" id="valor_deslocamentos_agente" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group discriminacao-feriado">

                                    <label class="col-lg-4 col-xs-4 control-label">Adicional domingos e feriados pago ao agente (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm text-right" tabindex="1" name="valor_adicional_agente" id="valor_adicional_agente" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group discriminacao-horas-extras hidden">

                                    <label class="ccol-lg-4 col-xs-4 control-label">Hora extra pago ao agente (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="hidden" name="valor_extra_agente" id="valor_extra_agente" readonly>
                                        <input type="text" class="form-control input-sm text-right" tabindex="1" name="valor_pago_extra_agente" id="valor_pago_extra_agente" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group discriminacao-km-extras hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">KM extra pago ao agente (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="hidden" name="valor_km_agente" id="valor_km_agente"  readonly>
                                        <input type="text" class="form-control input-sm text-right" tabindex="1" name="valor_pago_km_agente" id="valor_pago_km_agente" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group discriminacao-batida-extra hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">Batida extra pago ao agente (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm text-right" tabindex="1" name="valor_batida_agente" id="valor_batida_agente" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <label class="col-lg-4 col-xs-4 control-label">Pago ao agente (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm text-right" tabindex="1" name="valor_pago_agente" id="valor_pago_agente" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <label class="col-lg-4 col-xs-4 control-label">Custo Total (R$) </label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm text-right" tabindex="1" name="custo_total_missao" id="custo_total_missao" placeholder="0,00" readonly>
                                    </div>

                                </div>

                            </div>

                            <div class="form-etapa-4 aba-area">

                                <div class="form-group discriminacao-pernoite hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">Pernoite do serviço (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm pernoite text-right" tabindex="1" name="valor_pernoite_servico" id="valor_pernoite_servico" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group discriminacao-deslocamento hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">Deslocamento extra (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm deslocamento_extra text-right" tabindex="1" name="valor_deslocamento_extra" id="valor_deslocamento_extra" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group discriminacao-feriado hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">Adicional domingos e feriados (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm feriado text-right" tabindex="1" name="valor_adicional_feriado" id="valor_adicional_feriado" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group  discriminacao-pedagio hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">Pedágio (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm pedagio text-right" tabindex="1" name="valor_adicional_pedagio" id="valor_adicional_pedagio" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group  discriminacao-batida-extra hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">Batida Extra (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm batida_extra text-right" tabindex="1" name="valor_batida_extra" id="valor_batida_extra" placeholder="0,00" readonly>
                                    </div>

                                </div>
                                <div class="form-group discriminacao-horas-extras hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">Hora Extra (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm somar-total hora_extra_valor text-right" tabindex="1" name="hora_extra_valor_disc" id="hora_extra_valor_disc" readonly>
                                    </div>

                                </div>
                                <div class="form-group discriminacao-km-extras hidden">

                                    <label class="col-lg-4 col-xs-4 control-label">KM Extra (R$)</label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm somar-total km_extra_valor text-right" tabindex="1" name="km_extra_valor_disc" id="km_extra_valor_disc" readonly>
                                    </div>

                                </div>
                                <div class="form-group">

                                    <label class="col-lg-4 col-xs-4 control-label">Valor Franquia (R$) </label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm valor_franquia text-right" tabindex="1" name="franquia_missao" id="franquia_missao" placeholder="0,00" readonly>
                                    </div>

                                </div>

                                <div class="form-group">

                                    <label class="col-lg-4 col-xs-4 control-label">Faturamento Total (R$) </label>
                                    <div class="col-lg-2 col-xs-2">
                                        <input type="text" class="form-control input-sm text-right" tabindex="1" name="faturamento_total_missao" id="faturamento_total_missao" placeholder="0,00" readonly>
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

            <!-- /#wrapper -->