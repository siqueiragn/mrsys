<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">

    <br class="clear">

	<div class="row">

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading text-left hidden-print">

                    <h4>Relatório de Missões - Analítico</h4>

				</div>
                <br class="clear">
                <form class="form-horizontal" action="<?php echo site_url($this->router->class . '/listar');?>">

                    <div class="form-group">

                        <label class="col-lg-2 col-xs-2 control-label">Data Hora Inicial</label>
                        <div class="col-lg-2 col-xs-2">
                            <input type="text" class="form-control input-sm mascara-data-hora" name="data_hora_inicial" placeholder="DD/MM/YYYY hh:mm" value="<?php echo $this->input->get('data_hora_inicial');?>" tabindex="1">
                        </div>

                        <label for="" class="col-lg-2 col-xs-2 control-label">Data Hora Final</label>
                        <div class="col-lg-2 col-xs-2">
                            <input type="text" class="form-control input-sm mascara-data-hora" name="data_hora_final" placeholder="DD/MM/YYYY hh:mm" value="<?php echo $this->input->get('data_hora_final');?>" tabindex="1">
                        </div>

                        <label for="" class="col-lg-1 col-xs-1 control-label">Status</label>
                        <div class="col-lg-2 col-xs-2">
                            <select class="form-control input-sm" name="status" id="status" tabindex="1">
                                <option value="0" <?php if ($this->input->get('status') == "0") echo "selected";?>>PENDENTE</option>
                                <option value="1" <?php if ($this->input->get('status') == "1") echo "selected";?>>APROVADO</option>
                                <option value="2" <?php if ($this->input->get('status') == "2") echo "selected";?>>REPROVADO</option>
                                <option value="" <?php if ($this->input->get('status') == "" || !$this->input->get()) echo "selected";?>>TODOS</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">

                        <label for="" class="col-lg-2 col-xs-2 control-label">Cliente</label>
                        <div class="col-xs-4 col-lg-4">
                            <select name="cliente" id="cliente" class="form-control input-sm" tabindex="1">
                                <option value=""></option>
                                <?php foreach($clientes as $linha) {?>
                                    <option value="<?php echo $linha->id;?>" <?php if ($this->input->get('cliente') == $linha->id) echo "selected"; ?>><?php echo $linha->nome;?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <label for="" class="col-lg-1 col-xs-1 control-label">Agente</label>
                        <div class="col-lg-4 col-xs-4">
                            <select name="agente" id="agente" class="form-control input-sm" tabindex="1">
                                <option value=""></option>
                                <?php foreach ($funcionarios as $linha) { ?>
                                    <option value="<?php echo $linha->id;?>"><?php echo $linha->nome;?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">

                        <div class="col-lg-4 col-xs-4 col-lg-offset-4 col-xs-offset-4 text-center">

                            <div class="col-lg-4 col-xs-4">

                                <button type="button" class="btn btn-block btn-primary btn-sm" onclick="emissao_relatorio_missoes('<?php echo site_url('relatorios/relatorios_missoes_analitico');?>', 'pdf');">
                                    <i class="fa fa-file-pdf-o"></i>&nbsp;PDF
                                </button>

                            </div>
                            <div class="col-lg-4 col-xs-4">

                                <button type="button" class="btn btn-block btn-primary btn-sm" onclick="emissao_relatorio_missoes('<?php echo site_url('relatorios/relatorios_missoes_analitico');?>', 'excel');">
                                    <i class="fa fa-file-excel-o"></i>&nbsp;Excel
                                </button>

                            </div>
                            <div class="col-lg-4 col-xs-4">

                                <button type="button" class="btn btn-block btn-primary btn-sm" onclick="emissao_relatorio_missoes('<?php echo site_url('relatorios/relatorios_missoes_analitico');?>', 'csv');">
                                    <i class="fa fa-file-text-o"></i>&nbsp;CSV
                                </button>

                            </div>

                        </div>

                    </div>


                </form>

                <div id="modal-download" class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ações Relatório</h5>
                            </div>
                            <div class="modal-body">
                                <p>O relatório foi emitido com sucesso! O que deseja fazer?</p>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary">Download <i class="fa fa-download"></i></button>
                                    <button type="button" class="btn btn-primary">Enviar por e-mail <i class="fa fa-send"></i></button>
                                    <button type="button" class="btn btn-primary">Fechar <i class="fa fa-times"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>