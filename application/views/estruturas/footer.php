<div class="">
    <?php
    if( $this->session->flashdata('mensagem') ){
        $classe 	= $this->session->flashdata('classe');
        $mensagem 	= $this->session->flashdata('mensagem');

        if( $classe == 'alert-error' ){	$classe = 'alert-danger'; } ?>

    <div class="navbar-fixed-bottom pull-right alert <?php echo $classe; ?>"><?php echo $mensagem; ?></div>
    <?php } ?>
</div>