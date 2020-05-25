<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">

    <br class="clear">

	<div class="row">

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right hidden-print">

                    <a href="<?php echo site_url($this->router->class .'/cadastrar');?>" class="btn btn-sm btn-default">Nova Missão</a>

				</div>
                <br class="clear">
                <form action="<?php echo site_url($this->router->class . '/listar');?>">

                <div class="form-group">

                        <div class="col-lg-4 col-xs-4">
                            <input type="text" class="form-control input-sm" name="nome" placeholder="NOME" value="<?php echo $this->input->get('nome');?>" tabindex="1">
                        </div>
                        <div class="col-lg-2 col-xs-2">
                            <input type="text" class="form-control input-sm mascara-cpf" name="cpf" placeholder="CPF" tabindex="1" value="<?php echo $this->input->get('cpf');?>">
                        </div>
                        <div class="col-lg-2 col-xs-2">
                            <select class="form-control input-sm" name="status" id="status" tabindex="1">
                                <option value="1" <?php if ($this->input->get('status') == "1") echo "selected";?>>ATIVO</option>
                                <option value="0" <?php if ($this->input->get('status') == "0") echo "selected";?>>INATIVO</option>
                                <option value="T" <?php if ($this->input->get('status') == "T") echo "selected";?>>TODOS</option>
                            </select>
                        </div>

                        <div class="col-lg-4 col-xs-4">

                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-search"></i>&nbsp;
                            </button>
                            <a href="<?php echo site_url($this->router->class . '/listar');?>" class="btn btn-default btn-sm">
                                Limpar
                            </a>

                        </div>

                </div>
                </form>

                <!-- /.panel-heading -->
				<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<tr>
                        <th class="col-lg-1">Ações</th>
                        <th>ID</th>
                        <th>Data Inicio</th>
                        <th>Data Final</th>
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

                            <a href="<?php echo site_url($this->router->class.'/editar/'.$linha->id); ?>" class="btn btn-primary btn-sm" title="Editar">Consultar</a>
                            <a href="<?php echo site_url($this->router->class.'/aprovar/'.$linha->id); ?>" class="btn btn-success btn-sm" title="Editar">Aprovar</a>
                            <a href="<?php echo site_url($this->router->class.'/reprovar/'.$linha->id); ?>" class="btn btn-danger btn-sm" title="Editar">Reprovar</a>

                        </td>
					    <td><?php echo $linha->id;?> </td>
					    <td><?php echo $linha->data_hora_inicial;?> </td>
					    <td><?php echo $linha->data_hora_final;?> </td>
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