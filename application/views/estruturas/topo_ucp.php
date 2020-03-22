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
    <script type="text/javascript" src="<?php echo site_url('/assets/js/jquery.validationEngine-pt_BR.js');?>"></script>

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

     <script>
        $('.datepicker').datetimepicker({useCurrent: false, format: 'DD/MM/YYYY',locale: 'pt-br',tooltips:{today: 'Ir para hoje', clear: 'Limpar', close: 'Fechar', selectMonth: 'Selecionar Mês', prevMonth: 'Mês Anterior', nextMonth: 'Próximo Mês', selectYear: 'Selecionar Ano', prevYear: 'Ano Anterior', nextYear: 'Próximo Ano', selectDecade: 'Selecionar Década', prevDecade: 'Década Anterior', nextDecade: 'Próxima Década'}});
    </script>

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
            <ul class="nav navbar-nav ">
                <li>
                    <a href="<?php echo site_url();?>">
                    MRSys
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle menu-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Cadastros Básicos">Cadastros<span class="caret"></span></a>
                    <ul class="dropdown-menu multi-level">
                        <li>
                            <a href="<?php echo site_url('clientes/listar');?>">Cliente</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('funcionarios/listar');?>">Funcionários</a>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>

<div class="espacador" style="padding: 40px;"></div>


