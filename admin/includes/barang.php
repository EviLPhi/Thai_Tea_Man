<div class="container mt-5">
	<h2>Stock  Menu</h2>
	<hr>
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari..." title="Type in a name">
	<a href="index.php" class="btn btn-primary btn-sm float-right">&larr; Kembali</a>
	<a href="?h=tambah" class="btn btn-success btn-sm float-left">Tambah Menu</a>
	<div class="clearfix"></div>
	<hr>
	<!-- Filter Cabang -->
	<div class="dropdown">
    	<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown">Filter</button>
    	<div class="dropdown-menu">
			<?php foreach ($data_kasir as $kasir): ?>
			<a class="dropdown-item" href="?id_kasir=<?= $kasir['id'] ?>"><?= $kasir['nama'] ?></a>
			<?php endforeach ?>
    	</div>
  	</div>
	<h2><?= $nama_kasir ?></h2>
	<table class="table table-bordered" id="myTable">
	<thead class="thead-light" class="align-middle">
		<thead>
			<tr>
				<th>No</th>
				<th>Menu</th>
				<th>Stok</th>
				<th>Jenis</th>
				<th>Harga</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($data_barang as $barang): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $barang['nama_barang'] ?></td>
				<td><?= $barang['stock'] ?></td>
				<td><?= $barang['jenis_barang'] ?></td>
				<td><?= $barang['harga'] ?></td>
				<td>
					<div class="d-inline">
						<a href="?h=detail&id=<?= $barang['id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-bars"></i></a>
						<a href="?h=edit-barang&id=<?= $barang['id'] ?>" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
						<a href="?h=hapus&id=<?= $barang['id'] ?>" onclick="return confirm('Yakin Hapus <?= $barang['nama_barang'] ?>?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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