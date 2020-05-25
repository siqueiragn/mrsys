<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading text-left hidden-print">
                    <h4>Consulta de Serviços</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row form-horizontal">
                        <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?acao=atz&cd='. $objeto->id);?>" enctype="multipart/form-data">

                            <div class="form-group" style="padding-right:40x;">

                                <div class="col-lg-8 col-xs-8" >
                                    <ul class="nav nav-tabs">
                                        <li role="presentation" class="active"><a href="#" class="aba-etapa-1 aba-link" id="1">Principal</a></li>
                                        <li role="presentation"><a href="#" class="aba-etapa-2 aba-link" id="2">Excedentes</a></li>
                                        <li role="presentation"><a href="#" class="aba-etapa-3 aba-link" id="3">Deslocamentos</a></li>
                                        <li role="presentation"><a href="#" class="aba-etapa-4 aba-link" id="4">Custos do Serviço</a></li>
                                        <li role="presentation"><a href="#" class="aba-etapa-5 aba-link" id="5">Salário Desmembrado</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-xs-4 text-right">

                                    <button type="submit" class="btn btn-sm btn-default">Salvar <i class="fa fa-save"></i></button>
                                    <a href="<?php echo site_url($this->router->class . '/listar');?>" class="btn btn-sm btn-default">Listar <i class="fa fa-arrow-left"></i></a>

                                </div>
                            </div>
                            </br>
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-etapa-1">

                                    <div class="form-group">
                                        <label class="col-lg-2 col-xs-2 control-label">Nome<span>*</span></label>
                                        <div class="col-lg-9 col-xs-9">
                                            <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="nome" id="nome" value="<?php echo $objeto->nome;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-2 col-xs-2 control-label">Franquia de Horas<span></span></label>
                                        <div class="col-lg-1 col-xs-1">
                                            <input class="form-control input-sm mascara-numero-5" maxlength="255"  type="text" tabindex="1" name="franquiahora" id="franquiahora" value="<?php echo $objeto->franquiahora;?>">

                                        </div>

                                        <label class="col-lg-2 col-xs-2 control-label">Franquia de Quilometros<span></span></label>
                                        <div class="col-lg-1 col-xs-1">
                                            <input class="form-control input-sm mascara-numero" maxlength="255"  type="text" tabindex="1" name="franquiakm" id="franquiakm" value="<?php echo $objeto->franquiakm;?>">
                                        </div>

                                        <label for="" class="col-xs-1 col-xs-1 control-label">Cliente</label>
                                        <div class="col-xs-4 col-lg-4">
                                            <select name="cliente" id="cliente" class="form-control input-sm" tabindex="1">
                                                <option value=""></option>
                                                <?php foreach($clientes as $linha) {?>
                                                    <option value="<?php echo $linha->id;?>" <?php if ($objeto->cliente == $linha->id) echo "selected";?>><?php echo $linha->nome;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-2 col-xs-2 control-label">Valor Franquia (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input type="text" class="form-control input-sm mascara-dinheiro text-right"  tabindex="1"  name="valor_franquia" id="valor_franquia" placeholder="0,00" value="<?php echo $objeto->valor_franquia;?>">
                                        </div>

                                    </div>


                                </div>

                                <div class="form-etapa-2 aba-area">

                                    <div class="form-group">

                                        <label for="" class="col-lg-3 col-xs-3 control-label">Hora Extra (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="extrahora" id="extrahora" placeholder="0,00" value="<?php echo $objeto->extrahora;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label for="" class="col-lg-3 col-xs-3 control-label">KM Extra (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="extrakm" id="extrakm" placeholder="0,00" value="<?php echo $objeto->extrakm;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label for="" class="col-lg-3 col-xs-3 control-label">Pernoite (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255" required type="text" tabindex="1" name="pernoite" id="pernoite" placeholder="0,00" value="<?php echo $objeto->pernoite;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label for="" class="col-lg-3 col-xs-3 control-label">Batida Extra (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255" required type="text" tabindex="1" name="batida" id="batida" placeholder="0,00" value="<?php echo $objeto->batida;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-3 col-xs-3 control-label">Adicional Domingos e Feriados (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="domfer" id="domfer" placeholder="0,00" value="<?php echo $objeto->domfer;?>">

                                        </div>

                                    </div>

                                </div>
                                <div class="form-etapa-3 aba-area">

                                    <div class="form-group">

                                        <label class="col-lg-3 col-xs-3 control-label">Deslocamento Extra RJ (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="deslocamentorj" id="deslocamentorj" placeholder="0,00" value="<?php echo $objeto->deslocamentorj;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-3 col-xs-3 control-label">Deslocamento Extra Interestadual (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="deslocamentointerestadual" id="deslocamentointerestadual" placeholder="0,00" value="<?php echo $objeto->deslocamentointerestadual;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label  class="col-lg-3 col-xs-3 control-label">Pedágio (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input type="text" class="form-control input-sm mascara-dinheiro" tabindex="1" name="pedagio" id="pedagio" placeholder="0,00" value="<?php echo $objeto->pedagio;?>">
                                        </div>

                                    </div>

                                </div>

                                <div class="form-etapa-4 aba-area">



                                    <div class="form-group">

                                        <label class="col-lg-4 col-xs-4 control-label">Valor pago ao agente (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input type="text" class="form-control input-sm mascara-dinheiro" tabindex="1" name="valor_pago_agente" id="valor_pago_agente" placeholder="0,00" value="<?php echo $objeto->valor_pago_agente;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="ccol-lg-4 col-xs-4 control-label">Valor hora extra pago a agente (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input type="text" class="form-control input-sm mascara-dinheiro" tabindex="1" name="valor_extra_agente" id="valor_extra_agente" placeholder="0,00" value="<?php echo $objeto->valor_extra_agente;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-4 col-xs-4 control-label">Valor km extra pago a agente (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input type="text" class="form-control input-sm mascara-dinheiro" tabindex="1" name="valor_km_agente" id="valor_km_agente" placeholder="0,00" value="<?php echo $objeto->valor_km_agente;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-4 col-xs-4 control-label">Valor de pernoite pago a agente (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input type="text" class="form-control input-sm mascara-dinheiro" tabindex="1" name="valor_pernoite_agente" id="valor_pernoite_agente" placeholder="0,00" value="<?php echo $objeto->valor_pernoite_agente;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-4 col-xs-4 control-label">Valor de deslocamentos pago a agente (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input type="text" class="form-control input-sm mascara-dinheiro" tabindex="1" name="valor_deslocamentos_agente" id="valor_deslocamentos_agente" placeholder="0,00" value="<?php echo $objeto->valor_deslocamentos_agente;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-4 col-xs-4 control-label">Valor adicional domingos e feriados pago a agente (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input type="text" class="form-control input-sm mascara-dinheiro" tabindex="1" name="valor_adicional_agente" id="valor_adicional_agente" placeholder="0,00" value="<?php echo $objeto->valor_adicional_agente;?>">
                                        </div>

                                    </div>

                                </div>

                                <div class="form-etapa-5 aba-area">

                                    <div class="form-group">

                                        <label class="col-lg-2 col-xs-2 control-label">Aux. Combustível (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="combustivel" id="combustivel" placeholder="0,00" value="<?php echo $objeto->combustivel;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-2 col-xs-2 control-label">Aux. Alimentação (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="alimentacao" id="alimentacao" placeholder="0,00" value="<?php echo $objeto->alimentacao;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-2 col-xs-2 control-label">Periculosidade (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="periculosidade" id="periculosidade" placeholder="0,00" value="<?php echo $objeto->periculosidade;?>">

                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-2 col-xs-2 control-label">Aux. Veículo (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="auxveiculo" id="auxveiculo" placeholder="0,00" value="<?php echo $objeto->auxveiculo;?>">

                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-2 col-xs-2 control-label">Adicional Noturno (R$)</label>
                                        <div class="col-lg-2 col-xs-2">
                                            <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="addnoturno" id="addnoturno" placeholder="0,00" value="<?php echo $objeto->addnoturno;?>">

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /#wrapper -->