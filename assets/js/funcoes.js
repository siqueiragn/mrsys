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


function mustBeEqual() {

    if ($('#pass').val() != '' && $('#confirmpass').val() != '') {
         if ($('#pass').val() != $('#confirmpass').val()) {
             alertify.alert("As senhas precisam ser idênticas!");
             $('#confirmpass').val('');
         }
    }
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
            $(".km_extra_valor").val( (quantidade_extra * parseFloat(($('#franquia_km_valor_extra').val()).replace(",", "."))).toFixed(2));
            $("#valor_pago_km_agente").val( (quantidade_extra * parseFloat(($('#valor_km_agente').val()).replace(",", "."))).toFixed(2) ); // pgto agente
            $(".km_extra_quantidade").val(quantidade_extra);
        } else {
            $('.area-km-extras').addClass('hidden');
            $(".km_extra_valor").val('0.00');
            $(".km_extra_quantidade").val(0);
        }

        $('#km_total').val(valor_final - valor_inicial);
    }
}

function calcular_diferenca_data() {
    data_inicial = $('#data_hora_inicio');
    data_final   = $('#data_hora_final');

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
                $(".hora_extra_valor").val( (quantidade_extra * parseFloat(($('#franquia_hora_valor_extra').val()).replace(",", "."))).toFixed(2) ); // serviço
                $("#valor_pago_extra_agente").val( (quantidade_extra * parseFloat(($('#valor_extra_agente').val()).replace(",", "."))).toFixed(2) ); // pgto agente
                $(".hora_extra_quantidade").val( quantidade_extra.toFixed(2)  );
            } else {
                $('.area-horas-extras').addClass('hidden');
                $(".hora_extra_valor").val('0.00');
                $(".hora_extra_quantidade").val(0);
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
                $("#franquia_hora").val(               r[0]  ? (r[0])   : 0);
                $("#franquia_hora_valor_extra").val(   r[1]  ? parseFloat(r[1]).toFixed(2)   : 0);
                $("#franquia_km").val(                 r[2]  ? (r[2])   : 0);
                $("#franquia_km_valor_extra").val(     r[3]  ? parseFloat(r[3]).toFixed(2)   : 0);
                $(".valor_franquia").val(              r[4]  ? parseFloat(r[4]).toFixed(2)   : 0);
                $('#valor_pago_agente').val(           r[5]  ? parseFloat(r[5]).toFixed(2)   : 0);
                $('#valor_batida_agente').val(         r[6]  ? parseFloat(r[6]).toFixed(2)   : 0);
                $('#valor_extra_agente').val(          r[7]  ? parseFloat(r[7]).toFixed(2)   : 0);
                $('#valor_km_agente').val(             r[8]  ? parseFloat(r[8]).toFixed(2)   : 0);
                $('#valor_pernoite_agente').val(       r[9]  ? parseFloat(r[9]).toFixed(2)   : 0);
                $('#valor_deslocamentos_agente').val(  r[10] ? parseFloat(r[10]).toFixed(2)  : 0);
                $('#valor_adicional_agente').val(      r[11] ? parseFloat(r[11]).toFixed(2)  : 0);

                $('.feriado').val(                     r[12] ? parseFloat(r[12]).toFixed(2)  : 0);
                $('.batida_extra').val(                r[13] ? parseFloat(r[13]).toFixed(2)  : 0);
                $('.deslocamento_extra').val(          r[14] ? parseFloat(r[14]).toFixed(2)  : 0);
                $('.pedagio').val(                     r[15] ? parseFloat(r[15]).toFixed(2)  : 0);
                $('.pernoite').val(                    r[16] ? parseFloat(r[16]).toFixed(2)  : 0);

                calcular_km();
                calcular_diferenca_data();

            },
            error: function(retorno){

                alertify.alert('Não foi possível realizar o download do arquivo!');
             }
        });
    }

}

function calcular_custo_missao() {

    custo       = 0;
    faturamento = 0;

    faturamento += parseFloat(($('#franquia_missao').val()   ? $('#franquia_missao').val()   : '0,00').replace(',', '.'));
    custo       += parseFloat(($('#valor_pago_agente').val() ? $('#valor_pago_agente').val() : '0,00').replace(',', '.'));

    /* horas extras */
    horas_extras = parseFloat(($('#hora_extra_valor').val() ? $('#hora_extra_valor').val() : '0,00').replace(',', '.'));
    if ( horas_extras != 0) {
        $('.discriminacao-horas-extras').removeClass('hidden');
        faturamento += horas_extras;
    } else {
        $('.discriminacao-horas-extras').addClass('hidden');
    }
    /* =========== */

    /* km extras */
    km_extras = parseFloat(($('#km_extra_valor').val() ? $('#km_extra_valor').val() : '0,00').replace(',', '.'));
    if ( km_extras != 0) {
        $('.discriminacao-km-extras').removeClass('hidden');
        faturamento += km_extras;
    } else {
        $('.discriminacao-km-extras').addClass('hidden');
    }
    /* =========== */

    /* pernoite */
    pernoite        = parseFloat(($('#pernoite').is(':checked')     ? $('#pernoite').val()              : '0,00').replace(',', '.'));
    pernoite_agente = parseFloat(($('#valor_pernoite_agente').val() ? $('#valor_pernoite_agente').val() : '0,00').replace(',', '.'));

    if ($('#pernoite').is(':checked') && (pernoite != 0 || pernoite_agente != 0) ) {
        $('.discriminacao-pernoite').removeClass('hidden');
        faturamento += pernoite;
        custo       += pernoite_agente;
    } else {
        $('.discriminacao-pernoite').addClass('hidden');
    }
    /* ============ */


    /* deslocamento */
    deslocamento        = parseFloat(($('#deslocamento_extra').is(':checked')     ? $('#deslocamento_extra').val()         : '0,00').replace(',', '.'));
    deslocamento_agente = parseFloat(($('#valor_deslocamentos_agente').val()      ? $('#valor_deslocamentos_agente').val() : '0,00').replace(',', '.'));

    if ($('#deslocamento_extra').is(':checked') && (deslocamento != 0 || deslocamento_agente != 0) ) {
        $('.discriminacao-deslocamento').removeClass('hidden');
        faturamento += deslocamento;
        custo       += deslocamento_agente;
    } else {
        $('.discriminacao-deslocamento').addClass('hidden');
    }
    /* ============ */


    /* feriado */
    feriado                = parseFloat(($('#feriado').is(':checked')       ? $('#feriado').val()                : '0,00').replace(',', '.'));
    valor_adicional_agente = parseFloat(($('#valor_adicional_agente').val() ? $('#valor_adicional_agente').val() : '0,00').replace(',', '.'));

    if ($('#feriado').is(':checked') && (feriado != 0 || valor_adicional_agente != 0) ) {
        $('.discriminacao-feriado').removeClass('hidden');
        faturamento += feriado;
        custo       += valor_adicional_agente;
    } else {
        $('.discriminacao-feriado').addClass('hidden');
    }
    /* ============ */


    /* pedagio */
    pedagio     = parseFloat(($('#pedagio').is(':checked') ? $('#pedagio').val() : '0,00').replace(',', '.'));
    if ( pedagio != 0 ) {
        $('.discriminacao-pedagio').removeClass('hidden');
        faturamento += pedagio;
    } else {
        $('.discriminacao-pedagio').addClass('hidden');
    }

    /* batida extra */
    batida_extra        = parseFloat(($('#batida_extra').is(':checked') ? $('#batida_extra').val() : '0,00').replace(',', '.'));
    batida_extra_agente = parseFloat(($('#valor_batida_agente').val() ? $('#valor_batida_agente').val() : '0,00').replace(',', '.'));

    if ( $('#batida_extra').is(':checked') && (batida_extra != 0 || batida_extra_agente != 0)  ) {
        $('.discriminacao-batida-extra').removeClass('hidden');
        faturamento += batida_extra;
        custo       += batida_extra_agente;
    } else {
        $('.discriminacao-batida-extra').addClass('hidden');
    }
    /* ================ */



    $('#custo_total_missao').val( (custo.toFixed(2).replace('.', ',')) );
    $('#faturamento_total_missao').val( (faturamento.toFixed(2).replace('.', ',')) );

}