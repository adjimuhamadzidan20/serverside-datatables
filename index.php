<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> -->

	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
	<title>ServerSide</title>

	<style type="text/css">
		.container {
			width: 80%;
			padding: 10px;
			margin: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Data Penduduk</h1>
		<table id="example" class="display" style="width:100%">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama Depan</th>
					<th>Nama Belakang</th>
					<th>Email</th>
					<th>Kelahiran</th>
					<th>Ditambahkan</th>
					<th>Opsi</th>
				</tr>
			</thead>
		</table>
	</div>

	<!-- import jquery -->
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

	<!-- import jquery datatable -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> -->

	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable({
				processing: true,
				serverSide: true,
				ajax: ({
					"url": "data.php",
					"datatype": "json",
				}),
				columnDefs: [
					{
						"searchable": false,
						"orderable": false,	
						"targets": 6,
						data: 0,
						render: function (data, type, row) {
							let btn = '<a href="edit.php?id='+ data +'">Edit</a> <a href="hapus.php?id='+ data +'">Hapus</a>';
							return btn;
						}
					}
				]

				// "columns": [
				// 	{data: '0', render: function (data, type, row, meta) {
				// 		return meta.row + meta.settings._iDisplayStart + 1;
				// 	}
				// 	},
				// 	{"data": '1'},
				// 	{"data": '2'},
				// 	{"data": '3'},
				// 	{"data": '4'},
				// 	{"data": '5'},
				// 	// {"data": '6'},
				// 	// {"data": '7'}
				// ] 
			})
		})
	</script>
</body>
</html>
