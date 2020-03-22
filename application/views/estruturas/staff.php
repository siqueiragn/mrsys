
<div class="content well well-small col-lg-8 col-xs-8 col-lg-offset-2 col-xs-offset-2">
    <div class="row-fluid" style="margin: 0 auto;">

        <?php foreach ($objetos->result() as $i=>$objeto) {
            $imagem = $objeto->imgName ? $objeto->imgName : 'default_avatar.png';

            switch ($objeto->uNadmin) {
                case 1:
                    $funcao = 'TESTER';
                break;
                case 2:
                    $funcao = 'GAME ADMIN 1';
                break;
                case 3:
                    $funcao = 'GAME ADMIN 2';
                break;
                case 4:
                    $funcao = 'GAME ADMIN 3';
                break;
                case 5:
                    $funcao = 'GAME ADMIN 4';
                break;
                case 6:
                    $funcao = 'LEAD ADMIN';
                break;
                case 7:
                    $funcao = 'MANAGEMENT';
                break;

            }
            ?>
            <div class="user col-lg-4 col-xs-4">

                <div class="user-header text-center">
                <img class="img-avatar" src="<?php echo site_url("assets/images/staff/$imagem");?>" alt="" \>
                <h5 class="text-center"><?php echo $objeto->uNome;?></h5>
                <h5 class="text-center"><?php echo $funcao;?></h5>
                </div>
                <hr class="custom-hr">
                <div class="user-body">
                    <?php echo $objeto->aboutme;?>
                </div>
            
            </div>

        <?php } ?>
        
    </div>
</div>