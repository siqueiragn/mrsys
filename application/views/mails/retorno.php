
<div class="form-group">

    <form action="<?php echo site_url($this->router->class . '/recPassword');?>" method="POST">
        <div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1 well form-horizontal">

            <input type="hidden" id="url" value="<?php echo site_url();?>">
            <div class="col-lg-8 col-xs-8 col-xs-offset-2 col-lg-offset-2 content">
                <div class="form-group">
                    <?php if ($mensagem) { ?>
                        <h4 class="text-center">Email enviado com sucesso!</h4>
                        <h4 class="text-center">Em até 24hs você receberá uma nova senha em sua caixa de mensagens.</h4>
                    <?php } else { ?>
                        <h4 class="text-center">Email não encontrado, verifique!</h4>
                        <h4 class="text-center">Redirecionando ao inicio em 3 segundos.</h4>

                        <div class="form-group">
                            <div class="col-lg-4 col-xs-4 col-lg-offset-4 col-xs-offset-4">
                                <button class="btn-default btn" onclick="history.back();" type="button">Retornar</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </form>

</div>