
<div class="main form-horizontal" style="margin-top: 2%;" >
    <div class="form-group">

        <div class="col-lg-offset-1 col-xs-offset-1 col-lg-10 col-xs-10">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Equipe</a></li>
                <li role="presentation"><a href="#">Messages</a></li>
            </ul>
        </div>

        <div class="content well well-small col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1" >
            <div class="row-fluid " style="margin: 0 auto;">
                <?php if ($this->input->get('error') == 1) { ?>
                    <div class="form-group">
                        <div class="col-lg-6 col-xs-12">
                        <h4 style="color: red;">Usuário e/ou senha incorretos! Verifique.</h4>
                        </div>
                    </div>
                <?php } ?>

                <form class="row" method="POST" action="<?php echo site_url($this->router->class . '/dbAuthme');?>">

                    <div class="col-lg-5 col-xs-5">
                        <div class="input-group input-group-sm" style="margin-bottom: 20px;">
                            <span class="input-group-addon" id="sizing-addon3"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                            <input type="text" class="form-control" required name="user" placeholder="Usuário" aria-describedby="sizing-addon3">
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-5">
                        <div class="input-group input-group-sm" style="margin-bottom: 20px;">
                            <span class="input-group-addon" id="sizing-addon4"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                            <input type="password" class="form-control" required placeholder="Senha" name="pass" aria-describedby="sizing-addon4">
                        </div>
                    </div>
                    <div class="col-lg-2 col-xs-2">
                            <button class="btn btn-sm btn-primary btn-block" type="submit">Entrar</button>
                    </div>
                </form>

                <hr>
                <div class="row">
                    TESTE
                </div>

            </div>
        </div>
    </div>
</div>