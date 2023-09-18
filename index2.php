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
			let tabel = $('#example').DataTable({
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
						"data": null,
						"defaultContent": '<button type="button" class="btnEdit">Edit</button> <button class="btnDelete">Hapus</button>'
					}
				]
			})

			// button edit
			$('#example tbody').on('click', '.btnEdit', function() {
				let data = tabel.row($(this).parents('tr')).data();
				window.location.href = "edit.php?nama="+ data[1];
			});

			// button delete
			$('#example tbody').on('click', '.btnDelete', function() {
				let data = tabel.row($(this).parents('tr')).data(); 
				window.location.href = "delete.php?nama="+ data[1];
			});
		})
	</script>
</body>
</html>
