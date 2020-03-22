<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
	<div class="row">
        <?php if ($this->input->get('msg') == 1) { ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Aplicação realizada com sucesso!</strong> Em breve você será avaliado.
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
            <strong>Você não tem permissão para acessar esse personagem!</strong>
        </div>
        <?php } ?>
        <?php if ($this->input->get('msg') == 8002) { ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Você já possui três personagens!</strong>
        </div>
        <?php } ?>
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading text-right hidden-print">



                    <?php if ($objetos->num_rows() < 3) { ?>
                    <a href="<?php echo site_url($this->router->class .'/cadastrar');?>" class="btn btn-sm btn-default">Novo Personagem</a>
                    <?php } ?>

				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
                    <?php

                    if ($objetos->num_rows() ) {

                        switch ($objetos->num_rows()) {
                            case 1: $classTxt = "col-lg-offset-4 col-lg-4 col-xs-offset-4 col-xs-4"; break;
                            default: $classTxt = 'col-lg-4 col-xs-4';
                        }

                        foreach ($objetos->result() as $i=>$linha) {

                            switch ($linha->STATUS) {
                                case 0:
                                    $status = 'Em avaliação';
                                    $classe = "label-warning";
                                    break;
                                case 1:
                                    $status = 'Ativo';
                                    $classe = "label-success";
                                    break;
                                case 2:
                                    $status = 'Recusado';
                                    $classe = "label-danger";
                                    break;
                            }

                            ?>

                            <div class="<?php echo $classTxt;?>">

                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        <?php echo cleanName($linha->Username);?>

                                    </div>

                                    <div class="panel-body text-center">
                                        <div class="row">

                                            <span class="label <?php echo $classe;?>"><?php echo $status;?></span>


                                        </div>

                                        <img width="100" height="200" src="<?php echo site_url("assets/images/skins/$linha->Skin.png");?>" alt="">


                                        <br>
                                        <div class="row">

                                            <a href="<?php echo site_url( $this->router->class . '/editar/' . $linha->ID);?>" class="btn btn-default btn-sm">Gerenciar</a>

                                        </div>
                                    </div>
                                </div>

                            </div>


                        <?php }

                    } else { ?>
                        <h5 class="text-center">Oh, parece que você não tem nenhum personagem, que tal criar um?</h5>
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