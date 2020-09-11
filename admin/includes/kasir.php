<div class="container mt-5">
	
	<h2>Pimpinan Cabang</h2>
	<hr>
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari..." title="Type in a name">
	<a href="index.php" class="btn btn-primary btn-sm float-right">&larr; Kembali</a>
	<a href="?h=tambah-kasir" class="btn btn-success btn-sm float-left">Tambah Cabang</a>
	<div class="clearfix"></div>
	<hr>
	<table class="table table-bordered" id="myTable">
	<thead class="thead-light" class="align-middle">
		<thead>
			<tr>
				<th>No</th>
				<th>Cabang</th>
				<th>Password</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_kasir as $kasir): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $kasir['nama'] ?></td>
				<td><?= $kasir['password'] ?></td>
				<td>
					<div class="d-inline">
						<a href="?h=edit-kasir&id=<?= $kasir['id'] ?>" class="btn btn-success btn-sm"><i class="fas fa-user-edit    "></i></a>
						<a href="?h=hapus-kasir&id=<?= $kasir['id'] ?>" onclick="return confirm('Yakin Hapus <?= $kasir['nama'] ?>?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt    "></i></a>
					</div>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>

</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>