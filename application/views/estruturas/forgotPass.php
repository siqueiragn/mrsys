
<div class="form-group">

    <form action="<?php echo site_url('mails/recPassword');?>" method="POST">
        <div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1 well form-horizontal">

            <input type="hidden" id="url" value="<?php echo site_url();?>">
            <div class="col-lg-8 col-xs-8 col-xs-offset-2 col-lg-offset-2 content">
                <div class="form-group">
                    <p>Caso tenha esquecido sua senha, informe seu e-mail logo abaixo para ter acesso as suas novas credenciais. </p>
                    <p>É importante lembrar que não temos acesso as suas senhas, por tanto, será gerado uma nova.</p>
                </div>

                <div class="form-group">

                    <label for="">E-mail</label>
                    <input type="email" class="form-control input-sm" name="email" id="email">

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Recuperar senha</button>
                </div>
            </div>

        </div>
    </form>

</div>