<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
	<div class="row">
        <?php if ($this->input->get('msg') == 1) { ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Operação realizada com sucesso!</strong>
        </div>
        <?php } ?>
        <?php if ($this->input->get('msg') == 8000) { ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Você não tem permissão para utilizar essa área!</strong>
        </div>
        <?php } ?>
        <?php if ($this->input->get('msg') == 8001) { ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Você não tem permissão para acessar esse usuário!</strong>
        </div>
        <?php } ?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading hidden-print">

                    <form action="<?php echo site_url($this->router->class .'/listar');?>" method="get">
                    <div class="input-group" style="width: 100%;">
                        <input type="text" class="form-control input-sm" tabindex="1" name="filtro" value="<?php echo $this->input->get('filtro');?>">

                        <span class="input-group-btn">
                            <button type="submit" class="btn btn btn-primary"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                    </form>

				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">

                    <?php if ($objetos->num_rows()) { ?>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th class="tr-acao">Ações</th>
                            <th>ID</th>
                            <th>Nome</th>
                            <th class="col-lg-1 col-xs-1">Observação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($objetos->result() as $i=>$linha) {
                            switch ($linha->uNadmin) {
                                case 0:
                                    $observacao = 'Jogador';
                                break;
                                default:
                                    $observacao = 'Administrador';
                                    break;
                            }
                            ?>
                            <tr class="<?php echo $i%2 == 0 ?  "odd gradeX" : "even  gradeC";?>">
                                <td>

                                    <a href="<?php echo site_url($this->router->class.'/consultar/'.$linha->uID); ?>" class="btn btn-default btn-sm" title="Consultar">
                                        Consultar
                                    </a>

                                </td>
                                <td><?php echo $linha->uID;?></td>
                                <td><?php echo $linha->uNome;?></td>
                                <td><?php echo $observacao; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                        <?php }

                     else { ?>
                        <h5 class="text-center">Não foram encontrados resultados para essa pesquisa.</h5>
                    <?php } ?>
				   
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>