<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">

    <br class="clear">

	<div class="row">

		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right hidden-print">

                    <a href="<?php echo site_url($this->router->class .'/cadastrar');?>" class="btn btn-sm btn-default">Novo Funcionário</a>

				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<tr><th class="col-lg-1">Ações</th><th>Nome</th></tr>
                    <?php

					foreach( $objetos->result() as $i=>$linha) { ?>
					<tr>
                        <td>

                            <a href="<?php echo site_url($this->router->class.'/editar/'.$linha->id); ?>" class="btn btn-primary btn-sm" title="Editar">Editar</a>

                        </td>
					    <td><?php echo $linha->nome;?> </td>
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