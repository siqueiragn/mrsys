<div class="col-lg-10 col-xs-10 col-lg-offset-1 col-xs-offset-1">
    <br class="clear">
			<div class="row">
                <div class="col-lg-12 form-horizontal">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <form role="form" method="POST" action="<?php echo site_url($this->router->class . '/DB?acao=atz&cd='. $objeto->id);?>" enctype="multipart/form-data">

                                    <div class="panel panel-default">

                                        <div class="panel-body text-center">

                                            <div class="form-group">
                                                <div class="col-lg-8 col-xs-8" >
                                                    <ul class="nav nav-tabs">
                                                        <li role="presentation" class="active"><a href="#" class="aba-etapa-1 aba-link" id="1">Principal</a></li>
                                                        <li role="presentation"><a href="#" class="aba-etapa-2 aba-link" id="2">Documentos</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4 col-xs-4 text-right">

                                                    <button type="submit" class="btn btn-sm btn-default">Salvar <i class="fa fa-save"></i></button>
                                                    <a href="<?php echo site_url($this->router->class . '/listar');?>" class="btn btn-sm btn-default">Listar <i class="fa fa-arrow-left"></i></a>

                                                </div>
                                            </div>

                                            <div class="form-etapa-1">
                                                <div class="col-lg-8 col-xs-8 section-1">

                                                    <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Nome<span>*</span></label>
                                                        <div class="col-lg-8 col-xs-8">
                                                            <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="nome" id="nome" value="<?php echo $objeto->nome;?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">

                                                        <label class="col-lg-3 col-xs-3 control-label">CPF<span>*</span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm mascara-cpf" maxlength="255" required type="text" tabindex="1" name="cpf" id="cpf" value="<?php echo $objeto->cpf;?>">

                                                        </div>

                                                         <label class="col-lg-2 col-xs-2 control-label">RG<span>*</span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm mascara-rg" maxlength="255" required type="text" tabindex="1" name="rg" id="rg" value="<?php echo $objeto->rg;?>">

                                                        </div>

                                                    </div>
                                                    <div class="form-group">

                                                        <label for="" class="col-lg-3 col-xs-3 control-label">Data de Nascimento <span>*</span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                            <input type="text" required class="form-control input-sm mascara-data datepicker" placeholder="DD/MM/AAAA" maxlength="10" name="data_nascimento" id="data_nascimento" tabindex="1" value="<?php echo $objeto->nascimento;?>">
                                                        </div>

                                                        <label for="" class="col-lg-2 col-xs-2 control-label">Contratação <span>*</span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                            <input type="text" required class="form-control input-sm mascara-data datepicker" placeholder="DD/MM/AAAA" maxlength="10" name="contratacao" id="contratacao" tabindex="1" value="<?php echo $objeto->contratacao;?>">
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                     <label class="col-lg-3 col-xs-3 control-label">CNH<span>*</span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="cnh" id="cnh"value="<?php echo $objeto->cnh;?>">

                                                        </div>

                                                        <label for="" class="col-lg-2 col-xs-2 control-label">Vencimento <span>*</span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                            <input type="text" required class="form-control input-sm mascara-data datepicker" placeholder="DD/MM/AAAA" maxlength="10" name="vencimentocnh" id="vencimentocnh" tabindex="1" value="<?php echo $objeto->vencimentocnh;?>">
                                                        </div>

                                                    </div>

                                                     <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Nome do Pai <span></span></label>
                                                        <div class="col-lg-8 col-xs-8">
                                                            <input class="form-control input-sm" maxlength="255"  name="pai" id="pai" tabindex="1" value="<?php echo $objeto->pai;?>">
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Nome da Mãe <span></span></label>
                                                        <div class="col-lg-8 col-xs-8">
                                                            <input class="form-control input-sm" maxlength="255"  name="mae" id="mae" tabindex="1" value="<?php echo $objeto->mae;?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Endereço <span></span></label>
                                                        <div class="col-lg-8 col-xs-8">
                                                            <input class="form-control input-sm" maxlength="255"  name="endereco" id="endereco" tabindex="1" value="<?php echo $objeto->endereco;?>">
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Complemento <span></span></label>
                                                        <div class="col-lg-8 col-xs-8">
                                                            <input class="form-control input-sm" maxlength="255"  name="complemento" id="complemento" tabindex="1" value="<?php echo $objeto->complemento;?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">CEP<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm mascara-cep" maxlength="255"  type="text" tabindex="1" name="cep" id="cep" value="<?php echo $objeto->cep;?>">

                                                        </div>

                                                        <label class="col-lg-2 col-xs-2 control-label">Cidade<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm" maxlength="255" type="text" tabindex="1" name="cidade" id="cidade" value="<?php echo $objeto->cidade;?>">

                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Telefone<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm mascara-telefone" maxlength="255" type="text" tabindex="1" name="tel" id="tel" value="<?php echo $objeto->tel;?>">

                                                        </div>

                                                        <label class="col-lg-2 col-xs-2 control-label">Celular<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm mascara-celular" maxlength="255" type="text" tabindex="1" name="cel" id="cel" value="<?php echo $objeto->cel;?>">

                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Banco<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm " maxlength="255" type="text" tabindex="1" name="banco" id="banco" value="<?php echo $objeto->banco;?>">

                                                        </div>

                                                         <label class="col-lg-2 col-xs-2 control-label">Agencia<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm" maxlength="255" type="text" tabindex="1" name="agencia" id="agencia" value="<?php echo $objeto->agencia;?>">

                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                     <label class="col-lg-3 col-xs-3 control-label">Conta Bancária<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm" maxlength="255" type="text" tabindex="1" name="conta" id="conta" value="<?php echo $objeto->conta;?>">

                                                        </div>

                                                         <label class="col-lg-2 col-xs-2 control-label">Tipo de Conta<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <select class="form-control input-sm" tabindex="1" name="tipoconta" id="tipoconta">
                                                             <option value=""></option>
                                                             <option value="Corrente"<?php if ( $objeto->tipodeconta == 'Corrente' ) echo "selected"; ?>>Corrente</option>
                                                             <option value="Poupança"<?php if ( $objeto->tipodeconta == 'Poupança' ) echo "selected"; ?>>Poupança</option>
                                                             </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Veículo<span>*</span></label>
                                                        <div class="col-lg-8 col-xs-8">
                                                            <input class="form-control input-sm" maxlength="255" required type="text" tabindex="1" name="veiculo" id="veiculo" value="<?php echo $objeto->veiculo;?>">
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Placa<span>*</span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm " maxlength="255" required type="text" tabindex="1" name="placa" id="placa" value="<?php echo $objeto->placa;?>">

                                                        </div>

                                                         <label class="col-lg-2 col-xs-2 control-label">Cor<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm" maxlength="255" type="color" tabindex="1" name="cor" id="cor" value="<?php echo $objeto->cor;?>">

                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-lg-3 col-xs-3 control-label">Ano/Modelo<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm " maxlength="255" type="text" tabindex="1" name="ano" id="ano" value="<?php echo $objeto->ano;?>">

                                                        </div>

                                                         <label class="col-lg-2 col-xs-2 control-label">Rastreador<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <select class="form-control input-sm" tabindex="1" name="rastreador" id="rastreador">
                                                             <option value=""></option>
                                                             <option value="0"<?php if ( $objeto->rastreador == '0' ) echo "selected"; ?>>Não</option>
                                                             <option value="1"<?php if ( $objeto->tastreador == '1' ) echo "selected"; ?>>Sim</option>
                                                             </select>
                                                        </div>


                                                    </div>

                                                    <div class="form-group">

                                                        <label for="" class="col-lg-3 col-xs-3 control-label">Diária Recebida <span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                            <input class="form-control input-sm mascara-dinheiro " maxlength="255" type="text" tabindex="1" name="diaria" id="diaria" value="<?php echo $objeto->diaria;?>">
                                                        </div>

                                                        <label class="col-lg-2 col-xs-3 control-label">Salário Fixo<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <input class="form-control input-sm mascara-dinheiro " maxlength="255" type="text" tabindex="1" name="salario" id="salario" value="<?php echo $objeto->salario;?>">

                                                        </div>
                                                        </div>

                                                    <div class="form-group">

                                                        <label for="" class="col-lg-3 col-xs-3 control-label">Desligamento <span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                            <input type="text" class="form-control input-sm mascara-data datepicker" placeholder="DD/MM/AAAA" maxlength="10" name="desligamento" id="desligamento" tabindex="1" value="<?php echo $objeto->desligamento;?>">
                                                        </div>

                                                        <label class="col-lg-2 col-xs-2 control-label">Status<span></span></label>
                                                        <div class="col-lg-3 col-xs-3">
                                                             <select class="form-control input-sm" tabindex="1" name="status" id="status">
                                                             <option value=""></option>
                                                             <option value="0"<?php if ( $objeto->ativo == '0' ) echo "selected"; ?>>Inativo</option>
                                                             <option value="1"<?php if ( $objeto->ativo == '1' ) echo "selected"; ?>>Ativo</option>
                                                             </select>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="col-lg-4 col-xs-4">

                                                    <div class="panel panel-default">

                                                        <div class="panel-body">

                                                            <div class="area-skin text-center">
                                                                <?php if ($objeto->foto != '') { ?>
                                                                <img class="img-skin" src="<?php echo $this->dados_globais['externalImgPath'] . $this->router->class . '/' . "$objeto->id/$objeto->foto";?>">
                                                                <?php } else { ?>
                                                                <img class="img-skin" src="<?php echo $this->dados_globais['externalImgURL'] . "defaults/avatar.png";?>">
                                                                <?php } ?>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">

                                                        <input type="file" class="input-sm" name="avatar">

                                                    </div>

                                                </div>

                                                 <hr>

                                            </div>

                                            <div class="form-etapa-2 aba-area">
                                                <div class="form-group">

                                                    <label class="col-lg-5 col-xs-5 col-lg-offset-1 col-xs-offset-1">Tipo Documento</label>
                                                    <label class="col-lg-5 col-xs-5">Arquivo</label>

                                                </div>

                                                <?php foreach($documentos as $linha) { ?>
                                                <div class="form-group">

                                                    <div class="col-lg-5 col-xs-5 col-lg-offset-1 col-xs-offset-1">
                                                        <input type="text" class="form-control maiusculo input-sm" tabindex="1" readonly value="<?php echo $linha->tipo;?>">
                                                    </div>
                                                    <div class="col-lg-5 col-xs-5 text-center">
                                                        <div class="col-lg-6 col-xs-6 text-right">
                                                            <a target="_blank" class="btn btn-sm btn-danger btn-block" href="<?php echo site_url('ucp/download_arquivo?modulo=' . $this->router->class . '&pasta=ged&id=' . $objeto->id . '&arquivo=' . "{$linha->id}.{$linha->extensao}" );?>">
                                                                Download <i class="fa fa-download"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-6 col-xs-6 text-left">
                                                            <a class="btn btn-sm btn-danger btn-block" href="<?php echo site_url($this->router->class . '/inativarGed?func=' . $objeto->id . '&ged=' . $linha->id);?>">
                                                                Excluir <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                </div>
                                                <?php } ?>

                                                <?php for ($i = 0; $i < 10; $i++) { ?>
                                                <div class="form-group">

                                                    <div class="col-lg-5 col-xs-5 col-lg-offset-1 col-xs-offset-1">
                                                        <input type="text" class="form-control maiusculo input-sm" name="tipo_documento[]" tabindex="1">
                                                    </div>
                                                    <div class="col-lg-5 col-xs-5">
                                                        <input type="file" class="input-sm" name="arquivo[]" tabindex="1">

                                                    </div>

                                                </div>
                                                <?php } ?>
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