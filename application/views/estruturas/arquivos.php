<?php $this->load->helper('url'); ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo site_url('../assets/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('../assets/css/alertify.min.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('../assets/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet">

    <!-- Fancybox Core CSS -->
    <link href="<?php echo site_url('../assets/css/fancybox.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo site_url('../assets/css/sb-admin-2.css');?>" rel="stylesheet">
    <link href="<?php echo site_url('../assets/css/estilos.less');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo site_url('../assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <!-- MetisMenu CSS -->
    <link href="<?php echo site_url('../assets/css/metisMenu.min.css');?>" rel="stylesheet">


    <!-- jQuery -->
    <script src="<?php echo site_url('../assets/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('../assets/js/jquery.validationEngine.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('../assets/js/jquery.validationEngine-pt_BR.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('../assets/js/jquery.maskMoney.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url('../assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo site_url('../assets/js/alertify.min.js');?>"></script>
    <script src="<?php echo site_url('../assets/js/moment.min.js');?>"></script>
    <script src="<?php echo site_url('../assets/js/pt-br.js');?>"></script>
    <script src="<?php echo site_url('../assets/js/bootstrap-datetimepicker.min.js');?>"></script>

    <!-- Fancybox Core JavaScript -->
    <script src="<?php echo site_url('../assets/js/fancybox.js');?>"></script>

    <!-- CKEditor Core JavaScript -->
    <script src="<?php echo site_url('../assets/js/ckeditor5-build-classic/ckeditor.js');?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo site_url('../assets/js/metisMenu.min.js');?>"></script>

    <!-- Custom JavaScript -->
    <script src="<?php echo site_url('../assets/js/mascaras.js');?>"></script>
    <script src="<?php echo site_url('../assets/js/funcoes.js');?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo site_url('../assets/js/raphael.min.js');?>"></script>
    <script src="<?php echo site_url('../assets/js/morris.min.js');?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo site_url('../assets/js/sb-admin-2.js');?>"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        $('.datepicker').datetimepicker({useCurrent: false, format: 'DD/MM/YYYY',locale: 'pt-br',tooltips:{today: 'Ir para hoje', clear: 'Limpar', close: 'Fechar', selectMonth: 'Selecionar Mês', prevMonth: 'Mês Anterior', nextMonth: 'Próximo Mês', selectYear: 'Selecionar Ano', prevYear: 'Ano Anterior', nextYear: 'Próximo Ano', selectDecade: 'Selecionar Década', prevDecade: 'Década Anterior', nextDecade: 'Próxima Década'}});

    </script>

</head>
