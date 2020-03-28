<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading text-left hidden-print">
                    <h4>Cadastro de Clientes</h4>
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
                                        <div class="col-lg-11 col-xs-11">
                                            <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="nome" id="nome">
                                        </div>

                                    </div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">CNPJ<span>*</span></label>
                                        <div class="col-lg-11 col-xs-11">
                                             <input class="form-control input-sm mascara-cnpj" maxlength="255" required type="text" tabindex="1" name="cnpj" id="cnpj">
                                      
										</div>
									
									</div>
									 <div class="form-group">
                                        <label class="col-lg-1 col-xs-1 control-label">Endereço<span></span></label>
                                        <div class="col-lg-11 col-xs-11">
                                            <input class="form-control input-sm" maxlength="255"  type="text" name="endereco" id="endereco" tabindex="1">
                                        </div>
                                    </div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Responsável<span>*</span></label>
                                        <div class="col-lg-5 col-xs-5">
                                             <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="responsavel" id="responsavel">
                                      
										</div>
								
										 <label class="col-lg-1 col-xs-1 control-label">Telefone<span>*</span></label>
                                        <div class="col-lg-5 col-xs-5">
                                             <input class="form-control input-sm mascara-celular" maxlength="255" required type="text" tabindex="1" name="tel" id="tel">
                                      
                                        </div>
								
									</div>
									
									 <div class="form-group">
                                        <label class="col-lg-1 col-xs-1 control-label">E-mail<span></span></label>
                                        <div class="col-lg-11 col-xs-11">
                                            <input class="form-control input-sm" maxlength="255"  type="text" name="mail" id="mail" tabindex="1">
                                        </div>
                                    </div>
                               

                            </form>
                    </div>
                    <!-- /.row (nested) -->
            </div>
            <!-- /.row -->

</div>
        
<!-- /#wrapper -->