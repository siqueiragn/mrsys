<div class="content well well-small col-lg-4 col-xs-4 col-lg-offset-4 col-xs-offset-4" >
    <div class="row-fluid" style="margin: 0 auto;">
        <h2> Registrar </h2>
        <form method="POST" action="<?php echo site_url($this->router->class . '/dbRegister');?>">

            <?php if ($this->input->get('error') == 1) { ?>
            <div class="input-group input-group-sm">

                <h5 style="color: red;">Ocorreu um problema, por favor, verifique os dados informados!</h5>

            </div>
            <?php } ?>

            <div class="input-group input-group-sm" style="margin-bottom: 20px;">
                <span class="input-group-addon" id="sizing-addon4">@</span>
                <input type="email" class="form-control" required placeholder="Email" name="email" aria-describedby="sizing-addon4">
            </div>
            <div class="input-group input-group-sm" style="margin-bottom: 20px;">
                <span class="input-group-addon" id="sizing-addon3"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                <input type="text" class="form-control" required name="user" placeholder="Usuário" aria-describedby="sizing-addon3">
            </div>

            <div class="input-group input-group-sm" style="margin-bottom: 20px;">
                <span class="input-group-addon" id="sizing-addon4"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                <input type="password" class="form-control" required placeholder="Senha" name="pass" id="pass" aria-describedby="sizing-addon4" onblur="mustBeEqual();">
            </div>

            <div class="input-group input-group-sm" style="margin-bottom: 20px;">
                <span class="input-group-addon" id="sizing-addon4"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                <input type="password" class="form-control" required placeholder="Confirme a senha" name="confirmpass" id="confirmpass" aria-describedby="sizing-addon4" onblur="mustBeEqual()">
            </div>

            <div class="btn-group col-md-6 col-xs-offset-3">
                <button class="btn btn-primary btn-block btn-login" type="submit">Confirmar</button>
            </div>
            <div class="btn-group col-md-6 col-xs-offset-3 text-center">
                <a href="<?php echo site_url($this->router->class . '/login');?>">Já possuo uma conta</a>
            </div>
        </form>

    </div>
</div>