<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
	<div class="row">
        <?php if ($this->input->get('msg') == 1) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Aplicação aprovada com sucesso!</strong>
        </div>
        <?php } ?>
        <?php if ($this->input->get('msg') == 2) { ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Aplicação recusada com sucesso!</strong>
        </div>
        <?php } ?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right hidden-print">



				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
                    <?php

                    if ($objetos->num_rows() ) { ?>

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <th class="col-lg-1 col-xs-1">Número</th>
                                <th>Usuário</th>
                                <th>Nome do Personagem</th>
                                <th class="col-lg-1 col-xs-1">Ações</th>
                            </thead>
                        <?php foreach ($objetos->result() as $i=>$linha) { ?>
                            <tr>
                                <td class="text-center"><?php echo $i + 1;?></td>
                                <td><?php echo $linha->uNome;?></td>
                                <td><?php echo $linha->Username;?></td>
                                <td>
                                    <a href="<?php echo site_url($this->router->class . '/avaliar/' . $linha->ID);?>" class="btn btn-default">Avaliar</button>
                                </td>
                            </tr>

                        <?php } ?>
                        </table>

                    <?php } else { ?>
                        <h5 class="text-center">Sem aplicações por enquanto. ;)</h5>
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