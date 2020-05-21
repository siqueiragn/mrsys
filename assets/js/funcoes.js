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

function calcular_km() {
    valor_inicial = $('#km_inicial').val()  ? parseInt($('#km_inicial').val()) : 0;
    valor_final   = $('#km_final').val()    ? parseInt($('#km_final').val()) : 0;

    if ( valor_final < valor_inicial && $('#km_final').val() != '') {
        $('#km_final').val('');
        alertify.alert('<strong>KM Final não pode ser menor que KM Inicial!</strong>');
    } else {

        franquia_km = parseInt($("#franquia_km").val());
        diferenca = valor_final - valor_inicial;
        if (diferenca > franquia_km) {
            $('.area-km-extras').removeClass('hidden');
            quantidade_extra = diferenca - franquia_km;
            $("#km_extra_valor").val(quantidade_extra * parseFloat(($('#franquia_km_valor_extra').val()).replace(",", ".")));
            $("#km_extra_quantidade").val(quantidade_extra);
        } else {
            $('.area-km-extras').addClass('hidden');
            $("#km_extra_valor").val('0.00');
            $("#km_extra_quantidade").val(0);
        }

        $('#km_total').val(valor_final - valor_inicial);
    }
}

function calcular_diferenca_data(data_inicial, data_final) {

    dataInicial = moment($(data_inicial).val(), 'DD/MM/YYYY h:m');
    dataFinal   = moment($(data_final).val(), 'DD/MM/YYYY h:m');

    if ( $(data_inicial).val() != '' && $(data_final).val() != '' ) {

        setTimeout( function() {
            diferenca = (Math.abs(dataInicial.diff(dataFinal, 'minutes')) )/60;
            $("#diferenca_horas").val( diferenca );

            franquia_horas = parseInt($("#franquia_hora").val());
            if ( diferenca > franquia_horas ) {
                $('.area-horas-extras').removeClass('hidden');
                quantidade_extra = diferenca - franquia_horas;
                $("#hora_extra_valor").val( quantidade_extra * parseFloat(($('#franquia_hora_valor_extra').val()).replace(",", ".")) );
                $("#hora_extra_quantidade").val( quantidade_extra  );
            } else {
                $('.area-horas-extras').addClass('hidden');
                $("#hora_extra_valor").val('0.00');
                $("#hora_extra_quantidade").val(0);
            }
        }, 500);
    }

}

function buscar_servico( url ) {

    id = $('#servico').val();
    if ( id != '') {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                servico: id,
            },
            success: function( retorno ){

                r = retorno.split('{QUEBRA}');
                $("#franquia_hora").val(r[0]);
                $("#franquia_hora_valor").val(r[1]);
                $("#franquia_hora_valor_extra").val(r[2]);
                $("#franquia_km").val(r[3]);
                $("#franquia_km_valor").val(r[4]);
                $("#franquia_km_valor_extra").val(r[5]);

            },
            error: function(retorno){

                alertify.alert('Não foi possível realizar o download do arquivo!');
             }
        });
    }

}