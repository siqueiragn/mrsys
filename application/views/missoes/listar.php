<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">

    <br class="clear">

	<div class="row">

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right hidden-print">

                    <a href="<?php echo site_url($this->router->class .'/cadastrar');?>" class="btn btn-sm btn-default">Nova Missão</a>

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

                        <div class="col-lg-4 col-xs-4 col-lg-offset-7 col-xs-offset-7 text-right">

                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-search"></i>&nbsp;
                            </button>
                            
                            <?php if ( $this->input->get() ) { ?>
                                <a href="<?php echo site_url($this->router->class . '/listar');?>" class="btn btn-default btn-sm">
                                    Limpar Filtros
                                </a>

                            <?php } ?>

                        </div>

                    </div>


                </form>

                <!-- /.panel-heading -->
				<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<tr>
                        <th class="col-lg-1">Ações</th>
                        <th>Data Inicio</th>
                        <th>Data Final</th>
                        <th>Serviço</th>
                        <th>Agente</th>
                        <th>Status</th>
                    </tr>
                    <?php

					foreach( $objetos->result() as $i=>$linha) {
					    switch ($linha->status) {
                            case 0: $status = 'PENDENTE'; break;
                            case 1: $status = 'APROVADO'; break;
                            case 2: $status = 'REPROVADO'; break;
                            default: $status = 'PENDENTE'; break;
                        }
					    ?>
					<tr>
                        <td class="col-lg-2 col-xs-2">

                            <a href="<?php echo site_url($this->router->class.'/editar/'.$linha->missao_id); ?>" class="btn btn-primary btn-sm" title="Editar"><i class="fa fa-cog"></i></a>
                            <a href="<?php echo site_url($this->router->class.'/aprovar/'.$linha->missao_id); ?>" class="btn btn-success btn-sm" title="Editar"><i class="fa fa-check"></i></a>
                            <a href="<?php echo site_url($this->router->class.'/reprovar/'.$linha->missao_id); ?>" class="btn btn-danger btn-sm" title="Editar"><i class="fa fa-times"></i></a>

                        </td>
 					    <td><?php echo $linha->data_hora_inicial;?> </td>
					    <td><?php echo $linha->data_hora_final;?> </td>
					    <td><?php echo $linha->servico_nome;?> </td>
					    <td><?php echo $linha->agente_nome;?> </td>
					    <td><?php echo $status;?> </td>
					</tr>
                    <?php } ?>
					</table>
				   
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>