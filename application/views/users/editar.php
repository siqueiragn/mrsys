<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
			<div class="row">
                <div class="col-lg-12 form-horizontal">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?action=atz&cd='. $objeto->ID);?>" enctype="multipart/form-data">

                                    <div class="panel panel-default">
                                        <div class="panel-heading text-left">
                                            <?php echo cleanName($objeto->Username);?>
                                        </div>

                                        <div class="panel-body text-center">
                                            <div class="row sections section-1">
                                                <div class="col-lg-6 col-xs-6">
                                                <img width="100" height="200" src="<?php echo site_url("assets/images/skins/$objeto->Skin.png");?>" alt="">
                                                </div>

                                                <div class="col-lg-6 col-xs-6">

                                                    <legend class="perfil-legend">Informações Pessoais</legend>
                                                    <p class="col-lg-12 col-xs-12 perfil-title">Data de Nascimento: <span><?php echo $objeto->Birthdate;?></span> </p>

                                                    <p class="col-lg-12 col-xs-12 perfil-title">Idade: <span><?php echo $objeto->Age;?></span> </p>

                                                    <p class="col-lg-12 col-xs-12 perfil-title">Sexo: <span><?php echo $objeto->Gender == 0 ? 'Masculino' : 'Feminino' ;?></span></p>

                                                    <p class="col-lg-12 col-xs-12 perfil-title">Origem: <span><?php echo $objeto->Origin;?></span></p>

                                                </div>

                                            </div>

                                            <div class="row sections section-1">
                                                <div class="col-lg-12 col-xs-12">
                                                <legend class="perfil-legend ">História</legend>

                                                <p class="col-lg-12 col-xs-12 perfil-title"><?php echo $objeto->historia;?></p>

                                                </div>
                                            </div>

                                            <div class="row sections section-2 hidden">
                                                <div class="col-lg-12 col-xs-12">
                                                <legend class="perfil-legend ">Dados Bancários</legend>

                                                <p class="col-lg-12 col-xs-12 perfil-title">Bolso: <span>$ <?php echo $objeto->Grana;?></span></p>

                                                <p class="col-lg-12 col-xs-12 perfil-title">Banco: <span>$ <?php echo $objeto->Grana;?></span></p>

                                                <p class="col-lg-12 col-xs-12 perfil-title">Savings: <span>$ <?php echo $objeto->Grana;?></span></p>

                                                <p class="col-lg-12 col-xs-12 perfil-title danger">Futuramente, vai ter mais informações aqui.</span></p>


                                                </div>
                                            </div>

                                            <div class="row sections section-3 hidden">
                                                <div class="col-lg-12 col-xs-12">
                                                <legend class="perfil-legend ">Propriedades</legend>

                                                    <p class="col-lg-12 col-xs-12 perfil-title">Aparentemente, você não tem nenhuma propriedade.</p>

                                                </div>
                                            </div>
                                            <div class="row sections section-4 hidden">
                                                <div class="col-lg-12 col-xs-12">
                                                <legend class="perfil-legend ">Veículos</legend>

                                                    <p class="col-lg-12 col-xs-12 perfil-title">Aparentemente, você não tem nenhum veículo.</p>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" id="left-btn" onclick="paginationCharacter(-1);" class="btn btn-default disabled"><i class="fa fa-chevron-left"></i></button>
                                                    <button type="button" id="right-btn" onclick="paginationCharacter(+1);" class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
                                                    <input type="hidden" id="active-section" value="1">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                            </form>
                        </div>

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
</div>
        
<!-- /#wrapper -->