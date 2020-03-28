<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading text-left hidden-print">
                    <h4>Cadastro de Serviços</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row form-horizontal">
                            <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?acao=salvar');?>" enctype="multipart/form-data">
								
								<div class="form-group" style="padding-right:40x;">
                                   
                                    <div class="col-lg-12 col-xs-12 text-right">

                                        <button type="submit" class="btn btn-sm btn-default">Salvar <i class="fa fa-save"></i></button>
                                        <button type="reset" class="btn btn-sm btn-default">Limpar</button>
                                        <a href="<?php echo site_url($this->router->class . '/listar');?>" class="btn btn-sm btn-default">Listar <i class="fa fa-arrow-left"></i></a>

                                    </div>
                                </div>
								</br>
                                <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="col-lg-1 col-xs-1 control-label">Nome<span>*</span></label>
                                        <div class="col-lg-10 col-xs-10">
                                            <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="nome" id="nome">
                                        </div>

                                    </div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Valor<span>*</span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255" required type="text" tabindex="1" name="valor" id="valor">
                                      
										</div>
										
										<label class="col-lg-2 col-xs-2 control-label">Franquia de Horas<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm" maxlength="255"  type="text" tabindex="1" name="franquiahora" id="franquiahora">
                                      
										</div>
										
											<label class="col-lg-2 col-xs-2 control-label">Franquia de Quilometros<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm" maxlength="255"  type="text" tabindex="1" name="franquiakm" id="franquiakm">
                                      
										</div>
									
									</div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Custo<span>*</span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255" required type="text" tabindex="1" name="custo" id="custo">
                                      
										</div>
										
										<label class="col-lg-2 col-xs-2 control-label">Hora Extra<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="valorhora" id="valorhora">
                                      
										</div>
										
											<label class="col-lg-2 col-xs-2 control-label">Valor KM<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="valorkm" id="valorkm">
                                      
									</div>
									</div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Diária<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="salario" id="salario">
                                      
										</div>
										
										<label class="col-lg-2 col-xs-2 control-label">Aux. Combustível<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="combustivel" id="combustivel">
                                      
										</div>
										
											<label class="col-lg-2 col-xs-2 control-label">Aux. Alimentação<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="alimentacao" id="alimentacao">
                                      
									</div>
									</div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Periculosidade<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="periculosidade" id="periculosidade">
                                      
										</div>
										
										<label class="col-lg-2 col-xs-2 control-label">Aux. Veículo<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="auxveiculo" id="auxveiculo">
                                      
										</div>
										
											<label class="col-lg-2 col-xs-2 control-label">Adicional Noturno<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="addnoturno" id="addnoturno">
                                      
									</div>
									
									</div>
										<label class="col-lg-5 col-xs-5 control-label">Adicional Domingos e Feriados<span></span></label>
                                        <div class="col-lg-2 col-xs-2">
                                             <input class="form-control input-sm mascara-dinheiro" maxlength="255"  type="text" tabindex="1" name="domfer" id="domfer">
                                      
									</div>
									
									</div>
									
                               

                            </form>
                    </div>
                    <!-- /.row (nested) -->
            </div>
            <!-- /.row -->

</div>
        
<!-- /#wrapper -->