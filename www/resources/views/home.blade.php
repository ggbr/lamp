@extends('layouts.app',[
    'title' => 'Home',
    'breadcrumbs' => []
])
@if (session('status'))
    @component('global.alert', ['type' => 'success'])
        {{ session('status') }}
    @endcomponent
@endif

@section('PageStyleSheets')
<link href="{{ asset('vendors/data-tables/css/jquery.dataTables.min.css') }}" type="text/css" rel="stylesheet">
<style type="text/css">
    .tabela, td{
        height: 27px;
    }
</style>
@endsection

@section('PageScripts')
<script type="text/javascript" src="{{ asset('vendors/data-tables/js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript">

$(function () {

      $('#listaMenu').DataTable({
        "columnDefs": [
            { "width": "6%", "targets": 0 }
        ],
        "order": [[ 1, "asc" ]],
        "ajax": "{{ url('/getHome') }}",
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "buttons": {
                "pageLength": {
                    "_": "%d <i class=\"fa fa-arrow-down\"></i>",
                    "-1": "Mostrando tudo <i class=\"fa fa-arrow-down\"></i>"
                },
            }
        },
        "lengthMenu": [
            [10, 25, 50, 100, -1],
            ["10 linhas", "25 linhas", "50 linhas", "100 linhas", "Mostrar tudo"]
        ]
    });
});

//Redimensionamento da janela//
$(window).on('resize', function(){
      var win = $(this); //this = window
      if (win.height() >= 820) { /* ... */ }
      if (win.width() >= 1280) { /* ... */ }
});


$('.datepicker').pickadate({
    selectMonths: true,
    selectYears: 15,
    // Título dos botões de navegação
    labelMonthNext: 'Próximo Mês',
    labelMonthPrev: 'Mês Anterior',
    // Título dos seletores de mês e ano
    labelMonthSelect: 'Selecione o Mês',
    labelYearSelect: 'Selecione o Ano',
    // Meses e dias da semana
    monthsFull: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
    monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
    weekdaysFull: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
    weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
    // Letras da semana
    weekdaysLetter: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
    //Botões
    today: 'Hoje',
    clear: 'Limpar',
    close: 'Ok',
    // Formato da data que aparece no input
    format: 'dd/mm/yyyy',
    onClose: function() {
      $(document.activeElement).blur()
    }
  });


function comparaDatas(){
    var dataInicial = $("#dataInicio").val();
    var dataFinal = $("#dataFim").val();
    if(dataInicial > dataFinal){
    swal('Erro, a data inicial não pode ser maior que a data final');
    $("#dataFim").val(dataInicial);
    }
}

</script>
@endsection

@section('PageContent')

<!--start container-->
<div class="container">
        <div class="section">
            <div class="row">
            <div class="col s12">
            <div class="row ">
            <div class="input col s6 m3"><p >Data início</p>
                <i class= "material-icons prefix"> date_range</i>
                <input id="dataInicio" type="text" class="datepicker" name="dataInicio" required>
                <label for="dataInicio"></label>
            </div>
            <div class="input col s6 m3"><p>Data Final</p>
                <i class= "material-icons prefix">date_range </i>
                <input id="dataFim" type="text" class="datepicker" name="dataFim" required>
                <label for="dataFim"></label>
            </div>
            <a id="filtrarData" onclick="comparaDatas()" class="btn waves-effect #2e7d32 waves-light" style="width: 180px; height: 35px; left:35px;margin-top:45px;">
                Filtrar
                <i class= "material-icons left"> search</i>
                </a>
            </div>
            </div>
            </div>
            <br>
            <div class="col s12">
            <table id="listaMenu" class="responsive-table tabela">
                <thead>
                    <th>Ações</th>
                    <th>Data do aviso</th>
                    <th>Data do sinistro</th>
                    <th>N° sinistro</th>
                    <th>Segurado</th>
                    <th>Corretor</th>
                    <th>Tipo da ocorrência</th>
                    <th>Valor embarcado</th>
                    <th>Valor do prejuizo</th>
                    <th>Seguradora</th>
                </thead>
            </table>
            <br>
            </div>
        </div>
    </div>

@endsection

