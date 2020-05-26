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

    <link href="<?php echo site_url('/assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/css/custom.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/css/alertify.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('/assets/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">

    <!-- Fancybox Core CSS -->
    <link href="<?php echo site_url('/assets/css/fancybox.css');?>" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?php echo site_url('/assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
	
	<!-- MetisMenu CSS -->

	
    <!-- jQuery -->
    <script src="<?php echo site_url('/assets/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/assets/js/jquery.validationEngine.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/assets/js/jquery.maskMoney.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('/assets/js/jquery.validationEngine-pt_BR.js');?>"></script>
    <script src="<?php echo site_url('/assets/js/alertify.min.js');?>"></script>

    <script>

        $( document ).ready(function() {
            $('.aba-area').css('display', 'none');
        });

    </script>

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
    <script src="<?php echo site_url('/assets/js/relatorios.js');?>"></script>
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
            <form  method="POST" class=" " action="<?php echo site_url($this->router->class . '/dbAuthme');?>">
            <ul class="nav navbar-nav menu-principal " style=" margin-top: 8px;">
                <li>
                    <a href="<?php echo site_url('/home');?>">
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
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Relatórios">Relatórios <span class="caret"></span></a>
                    <ul class="dropdown-menu ">
                        <li>
                            <a href="<?php echo site_url('relatorios/1');?>">Missões Analítico</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('relatorios/2');?>">Missões x Cliente</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('relatorios/3');?>">Despesas por Funcionário</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('relatorios/4');?>">Serviços Custos</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle menu-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->nativesession->get('username');?> <span class="caret"></span></a>
                    <ul class="dropdown-menu multi-level">

                        <li>
                            <a href="<?php echo site_url('/logout');?>"><i class="fa fa-sign-out"></i> Logout </a>
                        </li>
                    </ul>
                </li>
                <?php } else { ?>

                    <li class="pull-right margin-lateral">
                        <button class="btn btn btn-primary" type="submit" tabindex="3"> Login <i class="fa fa-lock"></i></button>
                    </li>

                    <li class="pull-right margin-lateral">
                        <input type="password" style="width: 200px;"  tabindex="2" class="form-control" placeholder="Senha" name="pass" aria-describedby="sizing-addon4">
                    </li>

                    <li class="pull-right margin-lateral">
                        <input type="text" style="width: 200px;" tabindex="1" class="form-control" name="user" placeholder="Usuário" aria-describedby="sizing-addon3">
                    </li>


                <?php } ?>

            </ul>
            </form>


        </div>
    </div>
</nav>

<div class="espacador" style="padding: 40px;"></div>


