
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

    <meta name="robots" content="all" />
    <meta name="keywords" content="UCP, GTA San Andreas, SAMP, LSRP" />

    
    <link rel="icon" href="<?php echo site_url( '/assets/images/favicon.png');?>" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <title>LSRP BR-PT</title>

    <!-- Bootstrap -->
    <link href="<?php echo site_url('/assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/css/custom.css');?>" rel="stylesheet">

    <link href="<?php echo site_url('/assets/css/alertify.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">




    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="<?php echo site_url('/assets/js/alertify.min.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/funcoes.js');?>"></script>


    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="<?php echo site_url('/assets/js/bootstrap.min.js');?>"></script>
</head>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url();?>">LSRP PT/BR</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="https://forum.ls-rp.pt" target="_blank">Fórum</a></li>
                <li><a href="<?php echo site_url($this->router->class . '/staff');?>">Equipe</a></li>
                <li><a href="<?php echo site_url($this->router->class . '/about');?>">Sobre</a></li>
            </ul>

            <div class="navbar-form navbar-right">
                <form  method="POST" class="login-input-group hidden" action="<?php echo site_url($this->router->class . '/dbAuthme');?>">

                    <div class="col-lg-6 col-xs-6" style="height: 30px;">
                        <div class="input-group input-group-sm" style="margin-bottom: 20px;">
                            <span class="input-group-addon" id="sizing-addon3"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                            <input type="text" class="form-control" required name="user" placeholder="Usuário" aria-describedby="sizing-addon3">
                        </div>
                    </div>
                    <div class="col-lg-5 col-xs-5" style="height: 30px;">
                        <div class="input-group input-group-sm" style="margin-bottom: 20px;">
                            <span class="input-group-addon" id="sizing-addon4"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                            <input type="password" class="form-control" required placeholder="Senha" name="pass" aria-describedby="sizing-addon4">
                        </div>
                    </div>
                    <button class="btn btn btn-primary" type="submit"><i class="fa fa-chevron-right"></i></button>

                </form>

                <div class="row register-input-group">

                    <div class="col-lg-6 col-xs-6 small-padding">
                        <a class="btn btn-default" href="<?php echo site_url($this->router->class . '/registrar');?>">Registrar</a>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <button class="btn btn-default" onclick="login();">Entrar</button>
                    </div>

                </div>
            </div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="logo-header" style="margin-left: 20px; margin-top: 10px;">
                <!-- <a href="<?php /*echo site_url();*/?>">
                        <img src="<?php /*echo site_url('/assets/img/favicon.png');*/?>" alt="Logo" style="float: left; " >
                    </a>-->

                <a class="navbar-brand" href="<?php /*echo site_url();*/?>"> LSRP User Control Panel</a>
            </div>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right hidden-xs">

            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                    <p style="color: white;"><?php echo $this->nativesession->get('username');?></p>

                </a>

                <ul class="dropdown-menu dropdown-user">
                    <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil</a>
                     </li>
                     <li class="divider"></li>-->
                    <li><a href="<?php echo site_url('/home/logout');?>"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->

        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <li class="panel-link">
                        <a href="<?php echo site_url('/home/home');?>"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li class="panel-link">
                        <a href="<?php echo site_url('/characters/listar'); ?>"><i class="fa fa-group fa-fw"></i> Personagens</a>
                    </li>
                    <?php if ($this->nativesession->get('admin') > 0 ) { ?>
                        <li class="panel-link">

                            <a class="panel-link" href="#"><i class="fa-newspaper-o fa"></i> Notícias <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a class="panel-link" href="<?php echo site_url('/news/cadastrar'); ?>">Cadastrar</a>
                                </li>
                                <li>
                                    <a class="panel-link" href="<?php echo site_url('/news/listar'); ?>">Listar</a>
                                </li>
                            </ul>

                        </li>

                        <li class="panel-link">
                            <a href="<?php echo site_url('/characters/aplicacoes'); ?>"><i class="fa fa-list fa-fw"></i> Aplicações </a>
                        </li>

                        <li class="panel-link">
                            <a href="<?php echo site_url('/users/listar'); ?>"><i class="fa fa-folder-open "></i> Usuários </a>
                        </li>

                        <li class="panel-link">
                            <a href="<?php echo site_url('/users/about'); ?>"><i class="fa fa-user"></i> Cartão de Visita </a>
                        </li>


                    <?php } ?>
                </ul>

            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
