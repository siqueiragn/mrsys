<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">

    <br class="clear">

	<div class="row">

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right hidden-print">

                    <a href="<?php echo site_url($this->router->class .'/cadastrar');?>" class="btn btn-sm btn-default">Novo Funcionário</a>

				</div>
                <br class="clear">
                <form action="<?php echo site_url($this->router->class . '/listar');?>">

                <div class="form-group">

                        <div class="col-lg-4 col-xs-4">
                            <input type="text" class="form-control input-sm" name="nome" placeholder="NOME FUNCIONÁRIO" value="<?php echo $this->input->get('nome');?>" tabindex="1">
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
                        <th>Nome</th>
                        <th>CPF</th>
                    </tr>
                    <?php

					foreach( $objetos->result() as $i=>$linha) { ?>
					<tr>
                        <td>

                            <a href="<?php echo site_url($this->router->class.'/editar/'.$linha->id); ?>" class="btn btn-primary btn-sm" title="Editar">Editar</a>

                        </td>
					    <td><?php echo $linha->nome;?> </td>
					    <td><?php echo converter_cpf($linha->cpf);?> </td>
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