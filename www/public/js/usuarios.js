$('#listaUsuarios').DataTable({
	"columnDefs": [
		{ "width": "2%", "targets": 0 }
	],
    "ajax": "json/usuarios.json",
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
		[ 10, 25, 50, 100, -1 ],
		[ "10 linhas", "25 linhas", "50 linhas", "100 linhas", "Mostrar tudo" ]
	]
});