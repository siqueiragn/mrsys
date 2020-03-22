<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">

    <?php if ($this->input->get('msg') == 8000) { ?>
        <div class="alert alert-error alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Você não tem permissão para utilizar essa área!</strong>
        </div>
    <?php } ?>
    <br class="clear">
    <div class="row">
    <?php
    if ($noticias->num_rows()) {
        foreach ($noticias->result() as $n) { ?>

            <div class="panel panel-default">

                <div class="panel-body">
                    <?php echo $n->texto;?>
                </div>

                <div class="panel-footer">
                    <label>Autor: <?php echo $n->autor;?> </label> <label style="float: right"> Publicado em: <?php echo $n->stamp;?> </label>
                </div>

            </div>

        <?php }
    } else { ?>

        <div class="panel panel-default">

            <div class="panel-body text-center">
                <img src="<?php echo site_url('assets/images/logo.png');?>" alt="">
                <h5 class="text-center">Bem, parece que ainda não temos novidades, que coisa, não?</h5>
            </div>

        </div>

    <?php } ?>

    </div>
</div>