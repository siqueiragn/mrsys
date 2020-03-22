$( document ).ready(function() {

$('.mascara-data').addClass('validate[custom[date]]');//Força validação de data em todos os campos com mascara data

$('[data-toggle="popover"]').popover({container: 'body'});
$('form').validationEngine({
    validateNonVisibleFields: true,
    onValidationComplete: function(form, status){

        ($('button[type="submit"]')).not('.manter').attr('disabled', true);

        if( status == false ){

            $('.alert-fixed-form').fadeIn();
            setTimeout(function(){ $('.alert-fixed-form').fadeOut(); }, 3000);
            $('button[type="submit"]').attr('disabled', false);

        }
        else {
            return true;
        }
    }
});
$('.fancybox').fancybox();
$('.alert:not(.alert-fixed)').delay(5000).fadeOut();
$('.datepicker').datetimepicker({useCurrent: false, format: 'DD/MM/YYYY',locale: 'pt-br',tooltips:{today: 'Ir para hoje', clear: 'Limpar', close: 'Fechar', selectMonth: 'Selecionar Mês', prevMonth: 'Mês Anterior', nextMonth: 'Próximo Mês', selectYear: 'Selecionar Ano', prevYear: 'Ano Anterior', nextYear: 'Próximo Ano', selectDecade: 'Selecionar Década', prevDecade: 'Década Anterior', nextDecade: 'Próxima Década'}});


    //OCULTAR TDs filhas de TR-ACAO para impressão
    $('table tr td:nth-child('+$("table th.tr-acao").index() + 1+')').addClass('hidden-print');

    ClassicEditor.create( document.querySelector( '.classic-editor' ), { removePlugins: [ "EasyImage", "Image", "ImageCaption", "ImageStyle", "ImageToolbar", "ImageUpload",  "MediaEmbed" ] }
).catch();


    $('.aba-link').click(function (e) {
        e.preventDefault();
        var id_elemento = e.target.id;
        $('.easy-autocomplete').attr('style', '');//Bug-fix abas/autocomplete
        $('.aba-link').parent('li').removeClass('active');
        $('.aba-area, .form-etapa-1').hide();
        $('.form-etapa-'+id_elemento).show();
        $('.form-etapa-'+id_elemento+' .form-control:not([readonly])').first().focus();
        $('.aba-etapa-'+id_elemento).parent('li').addClass('active');
    });

});


function rem(){

    alertify.confirm('Você tem certeza que deseja realizar esta operação?', function(){ $('#remover').val('1'); $('form')[0].submit(); });

}

function mustBeEqual() {

    if ($('#pass').val() != '' && $('#confirmpass').val() != '') {
         if ($('#pass').val() != $('#confirmpass').val()) {
             alertify.alert("As senhas precisam ser idênticas!");
             $('#confirmpass').val('');
         }
    }
}

function changeSkin( src, direction ) {

    skin = parseInt($('#skin').val());

    skin += parseInt(direction);
    if ( skin > 0 && skin < 312) {

        $('.img-skin').attr('src', src + '/' + skin + '.png');
        $('#skin').val(skin);

    }

}

function recusar_aplicacao() {
    $('#status').val('recusar');

    $('.area-recusar').removeClass('hidden');

}

function paginationCharacter( direction ) {

    section = parseInt($('#active-section').val());
    section += parseInt(direction);
    if ( section > 0 && section < 5) {
        $('.sections').addClass('hidden');
        $('.section-' + section).removeClass('hidden');

        if ( section == 1 ) {
            $('#left-btn').addClass('disabled');
        } else {
            $('#left-btn').removeClass('disabled');
        }
        if ( section == 4 ) {
            $('#right-btn').addClass('disabled');
        } else {
            $('#right-btn').removeClass('disabled');
        }

        $('#active-section').val( section );
    }
}

function validateFields( val ) {

    if (val == 0) {
        $(".cartao").attr('disabled', true);
    }

}

function login() {
    $('.register-input-group').addClass("hidden");
    $('.login-input-group').removeClass("hidden");
}

function download_arquivo( elemento, url ) {

    $(elemento).prop('disabled', true);
    $.ajax({
        url: url,
        type: 'GET',
        success: function(retorno){

          $(elemento).prop('disabled', false);
          window.open(retorno, '_blank');

        },
        error: function(retorno){

            alertify.alert('Não foi possível realizar o download do arquivo!');
            $(elemento).prop('disabled', false);
        }
    });
}
