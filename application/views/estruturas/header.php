<?php $this->load->helper('url'); ?>

<head>
    <title><?php echo ucfirst($this->router->class);?></title>

    <style>

        @media print {
            a[href]:after {
                content: none !important;
            }

            .tr-acao {
                display: none !important;
            }

        }


    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link rel="icon" href="<?php echo site_url( '/assets/images/favicon.png');?>" type="image/gif" sizes="16x16">

    <link href="<?php echo site_url('/assets/css/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/css/custom_ucp.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/css/custom_menu.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/css/alertify.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">

    <!-- Fancybox Core CSS -->
    <link href="<?php echo site_url('/assets/css/fancybox.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url('/assets/css/estilos.less');?>" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?php echo site_url('/assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
	
	<!-- MetisMenu CSS -->
    <link href="<?php echo site_url('/assets/css/metisMenu.min.css');?>" rel="stylesheet">
	
	
    <!-- jQuery -->
    <script src="<?php echo site_url('/assets/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/assets/js/jquery.validationEngine.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/assets/js/jquery.maskMoney.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/assets/js/jquery.validationEngine-pt_BR.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/alertify.min.js');?>"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url('/assets/js/bootstrap.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/custom_menu.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/moment.min.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/pt-br.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/bootstrap-datetimepicker.min.js');?>"></script>

    <!-- Fancybox Core JavaScript -->
    <script src="<?php echo site_url('/assets/js/fancybox.js');?>"></script>

    <!-- CKEditor Core JavaScript -->
    <script src="<?php echo site_url('/assets/js/ckeditor5-build-classic/ckeditor.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo site_url('/assets/js/metisMenu.min.js');?>"></script>

    <!-- Custom JavaScript -->
    <script src="<?php echo site_url('/assets/js/funcoes.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/mascaras.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/load-mascaras.js');?>"></script>

</head>

<body>
<nav class="navbar navbar-default hidden-sm navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Navegação</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav " style=" margin-top: 8px;">
                <li>
                    <a href="<?php echo site_url();?>">
                    MRSys
                    </a>
                </li>
                <?php if ($this->nativesession->get('autenticado')) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle menu-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Cadastros Básicos">Cadastros<span class="caret"></span></a>
                    <ul class="dropdown-menu multi-level">
                        <li>
                            <a href="<?php echo site_url('clientes/listar');?>">Cliente</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('funcionarios/listar');?>">Funcionários</a>
                        </li>
						<li>
                            <a href="<?php echo site_url('servicos/listar');?>">Serviços</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('missoes/listar');?>" class="menu-link" title="Cadastros Básicos">Missões</a>
                </li>
                <?php } ?>
            </ul>

            <div class="navbar-form navbar-right" style="margin-bottom: 0;  margin-top: 8px;">

                <?php if (!$this->nativesession->get('autenticado')) { ?>
                <form  method="POST" class="login-input-group hidden" action="<?php echo site_url($this->router->class . '/dbAuthme');?>">

                    <div class="col-lg-5 col-xs-5" style="height: 30px;">
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

                <div class="row register-input-group" style="margin-bottom: 8px;">

                    <div class="col-lg-6 col-xs-6">
                        <button class="btn btn-sm btn-default" onclick="login();">Entrar</button>
                    </div>

                </div>

                <?php } else { ?>
                <div class="row register-input-group" style="margin-bottom: 8px;">

                    <div class="col-lg-6 col-xs-6">
                        <a href="<?php echo site_url('/logout');?>" class="btn btn-sm btn-default">Logout</a>
                    </div>

                </div>
                <?php } ?>

            </div>

        </div>
    </div>
</nav>

<div class="espacador" style="padding: 40px;"></div>

