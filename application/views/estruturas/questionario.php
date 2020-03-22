<br class="clear">
<br class="clear">
<div class="container">
    <div class="row">
        <?php if ($this->input->get('errors') ) {
            $helps = is_array($this->input->get('errors')) ? unserialize($this->input->get('errors')) : array();
        } ?>
        <div class="col-lg-8 col-lg-offset-2 col-xs-8 col-xs-offset-8">
            <div class="login-panel panel panel-default">

                <div class="panel-body">
                    <form role="form" action="<?php echo site_url( $this->router->class.'/dbRegisterStepTwo');?>" method="POST">

                        <?php if ($this->input->get('errors')) { ?>
                            <div class="form-group" style="color: red;">
                                <h3>Opa, parece que você não conseguiu acertar todas as questões. Assinalamos algumas dicas nas questões que você errou, boa sorte ;)</h3>
                            </div>
                            <hr>
                        <?php } ?>
                        <div class="form-group">

                            <label for="" class="col-lg-12 col-xs-12">1. Se você está in-game (dentro do servidor) e um jogador comete deathmatch em você (uma quebra de regra). O jogador desloga do servidor e você consegue tirar uma print pelo F8. Você irá:</label>
                            <?php if ( in_array(1, $helps) ) { ?> <p class="help-form">* Você nunca deve enviar mensagem IN-GAME quando não se há flagrantes ou enviar /sos para esta finalidade.</p> <?php } ?>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question1" class="cbox-form" value="a">
                                Denunciar ele na área de denúncias no fórum.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question1" class="cbox-form" value="b">
                                Chamar um administrador e reportar o jogador para algum admin conectado.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question1" class="cbox-form" value="c">
                                Irá enviar um /sos para que os administradores fiquem atentos, evitando novos DM's.
                            </div>

                        </div>
                        <div class="form-group">

                            <label for="" class="col-lg-12 col-xs-12">2. Se você está sendo abordado por um policial e possui drogas com você, você irá:</label>
                            <?php if ( in_array(2, $helps) ) { ?> <p class="help-form">* Você não deve interpretar medo ou algo do gênero se o seu personagem não condiz com isto. Você deve fugir ou ter medo de acordo com o PASSADO do seu personagem.</p> <?php } ?>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question2" class="cbox-form" value="a">
                                Interpretar suor, arrepios, ansiedade, medo; isto trás realidade ao roleplay e não é forçar falta de roleplay de medo.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question2" class="cbox-form" value="b">
                                Sair do carro e disparar contra o policial.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question2" class="cbox-form" value="c">
                                Seguir o roleplay de acordo com a história do seu personagem, podendo evadir, atirar ou ficar com medo.
                            </div>

                        </div>
                        <div class="form-group">

                            <label for="" class="col-lg-12 col-xs-12">3. Você está com um problema in-game; você não sabe um comando para uma animação. Qual é o primeiro passo?</label>
                            <?php if ( in_array(3, $helps) ) { ?> <p class="help-form">* Você não deve enviar /sos ou MPs como primeira opção; antes, você deve procurar no /ajuda se teu comando está ali.</p> <?php } ?>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question3" class="cbox-form" value="a">
                                Eu envio um /sos com a minha dúvida, para que a administração me auxilie.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question3" class="cbox-form" value="b">
                                Procuro antes no /ajuda o comando.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question3" class="cbox-form" value="c">
                                Envio uma mensagem particular para algum jogador e em últimos casos envio um /sos.
                            </div>

                        </div>
                        <div class="form-group">

                            <label for="" class="col-lg-12 col-xs-12">4. Qual a sequência de comandos interpretativos abaixo está errado?</label>
                            <?php if ( in_array(4, $helps) ) { ?> <p class="help-form">* Você não deve utilizar o comando /me para DESCREVER algo, a aparência de algo; você também não pode fazer perguntas pelo /do e nem ações pelo /do.</p> <?php } ?>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question4" class="cbox-form" value="a">
                                /me tem uma calça azul, com detalhes em amarelo.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question4" class="cbox-form" value="b">
                                /do Michael Jones corre na direção de Peter Johnson.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question4" class="cbox-form" value="c">
                                /do Michael Jones tem reação?
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question4" class="cbox-form" value="d">
                                /me dá uma sequência de chutes nas costelas de Michael Johnson.
                            </div>

                        </div>
                        <div class="form-group">

                            <label for="" class="col-lg-12 col-xs-12">5. Você toma um tiro de .50 no estômago, qual seria a sua primeira interpretação?</label>
                            <?php if ( in_array(5, $helps) ) { ?> <p class="help-form">* Você deve interpretar com a MAIOR realidade um tiro na barriga. Você não vai conseguir falar, seus órgãos estariam danificados internamente, a hemorragia interna tomaria conta de tudo. Você não teria sequer força para se levantar do chão e ir lá, ou discar um celular.</p> <?php } ?>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question5" class="cbox-form" value="a">
                                Interpretar dor no estômago, ligar para o hospital ou ir até lá.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question5" class="cbox-form" value="b">
                                Interpretar cuspir sangue, não conseguir falar, agonizar, dor extrema e outras especificações do ferimento.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question5" class="cbox-form" value="c">
                                Interpretar cair no chão, tentar discar o celular e pegar ele no bolso, tentar falar com alguém na rua para ajuda.
                            </div>

                        </div>
                        <div class="form-group">

                            <label for="" class="col-lg-12 col-xs-12">6. Quais das modificações abaixo são permitidas no servidor?</label>
                            <?php if ( in_array(6, $helps) ) { ?> <p class="help-form">* Você não pode ter melhor desempenho que os jogadores, você precisa estar igualado à todos, em questão de animação ou em questão de posição de veículos. </p> <?php } ?>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question6" class="cbox-form" value="a">
                                Modificações de câmera, somente para prints (camhack).
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question6" class="cbox-form" value="b">
                                Modificações para rebaixar carro, só para prints.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question6" class="cbox-form" value="c">
                                Modificações para melhorar as animações, permitido parkour.
                            </div>

                        </div>
                        <div class="form-group">

                            <label for="" class="col-lg-12 col-xs-12">7. Se eu estou em um roleplay e vejo que um dos envolvidos FEZ (passado) metagaming, tendo provas, devo:</label>
                            <?php if ( in_array(7, $helps) ) { ?> <p class="help-form">* Você não pode ter melhor desempenho que os jogadores, você precisa estar igualado à todos, em questão de animação ou em questão de posição de veículos. </p> <?php } ?>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question7" class="cbox-form" value="a">
                                Chamar um administrador e pausar o roleplay, para que tudo seja resolvido e decorra de forma justa.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question7" class="cbox-form" value="b">
                                Sigo o roleplay e denuncio depois no fórum.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question7" class="cbox-form" value="c">
                                Ignoro o roleplay, me retiro da cena, quito e vou direto pro fórum; roleplays deste gênero não podem continuar.
                            </div>

                        </div>
                        <div class="form-group">

                            <label for="" class="col-lg-12 col-xs-12">8. Você está em uma perseguição, o motor quebra e você tem uma pistola; é você contra 8 viaturas policiais; o que seria mais realista você fazer?</label>
                            <?php if ( in_array(8, $helps) ) { ?> <p class="help-form">* Você não deve faltar com o roleplay de medo em uma perseguição ou sequer quitar. Entre na lógica do seu personagem. </p> <?php } ?>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question8" class="cbox-form" value="a">
                                Atirar contra os policiais, porque a história do meu personagem diz isso.
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question8" class="cbox-form" value="b">
                                Se entregar, porque ninguém é tão suicida assim (se não condizer com a história, é claro).
                            </div>
                            <div class="input-group">
                                <input required tabindex="1" type="radio" name="question8" class="cbox-form" value="c">
                                Quitar do jogo.
                            </div>

                        </div>

                        <hr>

                        <div class="form-group">

                            <div class="col-lg-4 col-xs-4 col-lg-offset-4 col-xs-offset-4 text-center">
                                <button type="submit" class="btn btn-primary">Continuar</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>