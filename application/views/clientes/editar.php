<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
			<div class="row">
                <div class="col-lg-12 form-horizontal">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?acao=atz&cd='. $objeto->id);?>" enctype="multipart/form-data">
								
								<div class="panel panel-default">
								  <div class="panel-heading text-left hidden-print">
									<h4>Dados do Cliente</h4>
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
                                        <div class="col-lg-11 col-xs-11">
                                            <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="nome" id="nome" value="<?php echo $objeto->nome;?>">
                                        </div>

                                    </div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">CNPJ<span>*</span></label>
                                        <div class="col-lg-11 col-xs-11">
                                             <input class="form-control input-sm mascara-cnpj" maxlength="255" required type="text" tabindex="1" name="cnpj" id="cnpj" value="<?php echo $objeto->cnpj;?>">
                                      
										</div>
									
									</div>
									 <div class="form-group">
                                        <label class="col-lg-1 col-xs-1 control-label">Endereço<span></span></label>
                                        <div class="col-lg-11 col-xs-11">
                                            <input class="form-control input-sm" maxlength="255"  type="text" name="endereco" id="endereco" tabindex="1" value="<?php echo $objeto->endereco;?>">
                                        </div>
                                    </div>
									<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Responsável<span>*</span></label>
                                        <div class="col-lg-5 col-xs-5">
                                             <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="responsavel" id="responsavel" value="<?php echo $objeto->responsavel;?>">
                                      
										</div>
								
										 <label class="col-lg-1 col-xs-1 control-label">Telefone<span>*</span></label>
                                        <div class="col-lg-5 col-xs-5">
                                             <input class="form-control input-sm mascara-celular" maxlength="255" required type="text" tabindex="1" name="tel" id="tel" value="<?php echo $objeto->contato;?>">
                                      
                                        </div>
								
									</div>
									
									 <div class="form-group">
                                        <label class="col-lg-1 col-xs-1 control-label">E-mail<span></span></label>
                                        <div class="col-lg-11 col-xs-11">
                                            <input class="form-control input-sm" maxlength="255"  type="text" name="mail" id="mail" tabindex="1" value="<?php echo $objeto->mail;?>">
                                        </div>
                                    </div>
									
								<div class="form-group">
									 <label class="col-lg-1 col-xs-1 control-label">Status<span>*</span></label>
                                        <div class="col-lg-6 col-xs-6">
                                             <select class="form-control input-sm" tabindex="1" name="status" id="status">
											 <option value=""></option>
											 <option value="0"<?php if ( $objeto->ativo == '0' ) echo "selected"; ?>>Inativo</option>
											 <option value="1"<?php if ( $objeto->ativo == '1' ) echo "selected"; ?>>Ativo</option>
											 </select>
											 
                                        </div>
								</div>	
								
                            </form>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
        
<!-- /#wrapper -->