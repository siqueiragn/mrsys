<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
    <div class="row">
        <div class="col-lg-12">
            <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/dbAvaliar?id=' . $objeto->ID);?>" enctype="multipart/form-data">
            <div class="panel panel-default">

                <div class="panel-heading hidden-print text-center">

                    <input type="hidden" id="status" name="status" value="aprovar">
                    <button type="submit" onclick="$('#status').val('aprovar');" class="btn btn-success">Aprovar</button>
                    <button type="button" onclick="recusar_aplicacao();" class="btn btn-danger">Recusar</button>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row form-horizontal">

                                <div class="form-group area-recusar hidden ">
                                    <div class="form-group">
                                        <label class="col-lg-8 col-xs-8 col-lg-offset-2 col-xs-offset-2">Informe o motivo da recusa: </label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-8 col-xs-8 col-lg-offset-2 col-xs-offset-2">
                                            <textarea name="motivo" id="motivo" class="form-control default-textarea" maxlength="2000" tabindex="1" placeholder=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-lg-8 col-xs-8 col-lg-offset-2 col-xs-offset-2 text-center">

                                        <button type="submit" class="btn btn-danger">Confirmar Recusa da Aplicação</button>

                                        </div>
                                    </div>
                                    <hr style="width: 80%;">
                                </div>

                            <div class="form-group">
                                <div class="col-lg-8 col-xs-8">
                                    <div class="form-group">
                                        <label class="col-lg-3 col-xs-3 control-label">Nome do personagem <span>*</span></label>
                                        <div class="col-lg-8 col-xs-8">
                                            <input class="form-control input-sm" type="text" disabled value="<?php echo $objeto->Username;?>">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label for="" class="col-lg-3 col-xs-3 control-label">Data de Nascimento <span>*</span></label>
                                        <div class="col-lg-3 col-xs-3">
                                            <input type="text" class="form-control input-sm mascara-data"  disabled value="<?php echo $objeto->Birthdate;?>">
                                        </div>



                                        <label class="col-lg-2 col-xs-2 control-label">Sexo<span>*</span></label>
                                        <div class="col-lg-3 col-xs-3">
                                            <select class="form-control input-sm" disabled>
                                                <option value=""></option>
                                                <option value="0" <?php if ($objeto->Gender == "0") echo "selected";?> >Masculino</option>
                                                <option value="1" <?php if ($objeto->Gender == "1") echo "selected";?> >Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 col-xs-3 control-label">Origem <span>*</span></label>
                                        <div class="col-lg-8 col-xs-8">
                                            <input class="form-control input-sm" disabled value="<?php echo $objeto->Origin;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-3 col-xs-3 control-label">História <span>*</span></label>
                                        <div class="col-lg-8 col-xs-8">
                                            <div><?php echo $objeto->historia;?></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-xs-3">

                                    <div class="panel panel-default">

                                        <div class="panel-body">

                                            <div class="area-skin text-center">
                                                <img class="img-skin" src="<?php echo $this->dados_globais['imgURL'] . '/skins/' . $objeto->Skin .'.png';?>">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">

                                        <div class="form-group">
                                            <label for="" class="col-lg-12 col-xs-12">Explique, COM EXEMPLOS, o que é metagaming, powergaming, out of character, in character, revenge kill e player kill</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12 col-xs-12">
                                                <div ><?php echo $objeto->questao1;?></div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group">
                                            <label for="" class="col-lg-12 col-xs-12">Explique o que significa a modalidade "roleplay", e explique a diferença entre RP e RPG</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12 col-xs-12">
                                                <div><?php echo $objeto->questao2;?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                    </div>
                    <!-- /.row (nested) -->
                </div>
            <!-- /.row -->
            </div>
            </form>
        </div>
    </div>
</div>
        
<!-- /#wrapper -->