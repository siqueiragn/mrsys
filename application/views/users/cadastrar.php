<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading text-left hidden-print">
                    <h4>Aplicação</h4>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row form-horizontal">
                            <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?acao=salvar');?>" enctype="multipart/form-data">

                                <div class="col-lg-8 col-xs-8">
                                    <div class="form-group">
                                        <label class="col-lg-3 col-xs-3 control-label">Nome do personagem <span>*</span></label>
                                        <div class="col-lg-8 col-xs-8">
                                            <input class="form-control input-sm" maxlength="24" required type="text" tabindex="1" name="nome" id="nome">
                                        </div>

                                    </div>
                                    <div class="form-group">

                                        <label for="" class="col-lg-3 col-xs-3 control-label">Data de Nascimento <span>*</span></label>
                                        <div class="col-lg-3 col-xs-3">
                                            <input type="text" required class="form-control input-sm mascara-data datepicker" placeholder="DD/MM/AAAA" maxlength="10" name="data_nascimento" id="data_nascimento" tabindex="1">
                                        </div>



                                        <label class="col-lg-2 col-xs-2 control-label">Sexo<span>*</span></label>
                                        <div class="col-lg-3 col-xs-3">
                                            <select name="sexo" id="sexo" required class="form-control input-sm" tabindex="1">
                                                <option value=""></option>
                                                <option value="0">Masculino</option>
                                                <option value="1">Feminino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 col-xs-3 control-label">Origem <span>*</span></label>
                                        <div class="col-lg-8 col-xs-8">
                                            <input class="form-control input-sm" maxlength="50" required name="origem" id="origem" tabindex="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-3 col-xs-3 control-label">História</label>
                                        <div class="col-lg-8 col-xs-8">
                                            <textarea name="historia" id="historia" class="form-control default-textarea" tabindex="1" maxlength="2000" placeholder="Escreva algo sobre a vida do seu personagem, use no mínimo dois parágrafos."></textarea>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <label for="" class="col-lg-12 col-xs-12">Explique, COM EXEMPLOS, o que é metagaming, powergaming, out of character, in character, revenge kill e player kill</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 col-xs-12">
                                            <textarea name="questao1" id="questao1" maxlength="2000" class="form-control default-textarea" tabindex="1"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-lg-12 col-xs-12">Explique o que significa a modalidade "roleplay", e explique a diferença entre RP e RPG</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12 col-xs-12">
                                            <textarea name="questao2" id="questao2" maxlength="2000" class="form-control default-textarea" tabindex="1"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-xs-4">

                                    <div class="panel panel-default">

                                        <div class="panel-body">

                                            <div class="area-skin text-center">
                                                <img class="img-skin" src="<?php echo $this->dados_globais['imgURL'] . '/skins/1.png';?>">
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-8 col-xs-8 col-lg-offset-2 col-xs-offset-2">
                                                    <input type="number" name="skin" id="skin" placeholder="" class="form-control input-sm mascara-numero" tabindex="1" min="1" max="300" value="1" onchange="changeSkin('<?php echo $this->dados_globais['imgURL'] . 'skins';?>', 0)">
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <div class="btn-group" role="group" aria-label="...">
                                                    <button type="button" onclick="changeSkin('<?php echo $this->dados_globais['imgURL'] . 'skins';?>', -1);" class="btn btn-default"><i class="fa fa-chevron-left"></i></button>
                                                    <button type="button" onclick="changeSkin('<?php echo $this->dados_globais['imgURL'] . 'skins';?>', +1);" class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="col-lg-9 col-xs-9 text-center">
                                        <button type="submit" class="btn btn-sm btn-default">Salvar</button>
                                        <button type="reset" class="btn btn-sm btn-default">Limpar</button>
                                    </div>
                                </div>

                            </form>
                    </div>
                    <!-- /.row (nested) -->
            </div>
            <!-- /.row -->

</div>
        
<!-- /#wrapper -->