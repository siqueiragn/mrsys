<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
			<div class="row">
                <div class="col-lg-12 form-horizontal">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?acao=atz&cd='. $objeto->id);?>" enctype="multipart/form-data">
								
								<div class="panel panel-default">
								  <div class="panel-heading text-left hidden-print">
									<h4>Dados do Serviço</h4>
									</div>
											</br>
											<div class="form-group" style="padding-right:40px;">
						
													<div class="col-lg-12 col-xs-12 text-right">
                                                    <button type="submit" class="btn btn-sm btn-default">Salvar <i class="fa fa-save"></i></button>
                                                    <a href="<?php echo site_url($this->router->class . '/listar');?>" class="btn btn-sm btn-default">Listar <i class="fa fa-arrow-left"></i></a>
													</div>
                                               
                                            </div>
                                   
                                        <div class="panel-body text-center">
                                     <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-lg-1 col-xs-1 control-label">Nome<span>*</span></label>
                                        <div class="col-lg-10 col-xs-10">
                                            <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="nome" id="nome" value="<?php echo $objeto->nome;?>">
                                        </div>

                                    </div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Valor<span>*</span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255" required type="text" tabindex="1" name="valor" id="valor" value="<?php echo $objeto->valor;?>">
                                      
										</div>
										
										<label class="col-lg-2 col-xs-2 control-label">Franquia de Horas<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm" maxlength="255"  type="text" tabindex="1" name="franquiahora" id="franquiahora" value="<?php echo $objeto->franquiahora;?>">
                                      
										</div>
										
											<label class="col-lg-2 col-xs-2 control-label">Franquia de Quilometros<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm" maxlength="255"  type="text" tabindex="1" name="franquiakm" id="franquiakm" value="<?php echo $objeto->franquiakm;?>">
                                      
										</div>
									
									</div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Custo<span>*</span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255" required type="text" tabindex="1" name="custo" id="custo" value="<?php echo $objeto->custo;?>">
                                      
										</div>
										
										<label class="col-lg-2 col-xs-2 control-label">Hora Extra<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-percentual" maxlength="255"  type="text" tabindex="1" name="valorhora" id="valorhora" value="<?php echo $objeto->valorhora;?>">
                                      
										</div>
										
											<label class="col-lg-2 col-xs-2 control-label">Valor KM<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="valorkm" id="valorkm" value="<?php echo $objeto->valorkm;?>">
                                      
									</div>
									</div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Diária<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="salario" id="salario" value="<?php echo $objeto->salario;?>">
                                      
										</div>
										
										<label class="col-lg-2 col-xs-2 control-label">Aux. Combustível<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="combustivel" id="combustivel" value="<?php echo $objeto->combustivel;?>">
                                      
										</div>
										
											<label class="col-lg-2 col-xs-2 control-label">Aux. Alimentação<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="alimentacao" id="alimentacao" value="<?php echo $objeto->alimentacao;?>">
                                      
									</div>
									</div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Periculosidade<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="periculosidade" id="periculosidade" value="<?php echo $objeto->periculosidade;?>">
                                      
										</div>
										
										<label class="col-lg-2 col-xs-2 control-label">Aux. Veículo<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="auxveiculo" id="auxveiculo" value="<?php echo $objeto->auxveiculo;?>">
                                      
										</div>
										
											<label class="col-lg-2 col-xs-2 control-label">Adicional Noturno<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="addnoturno" id="addnoturno" value="<?php echo $objeto->addnoturno;?>">
                                      
									</div>
									
									</div>
										<label class="col-lg-5 col-xs-5 control-label">Adicional Domingos e Feriados<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="domfer" id="domfer" value="<?php echo $objeto->domfer;?>">
                                      
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