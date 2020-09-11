<div class="container mt-3">
	
	<h2>Stock Menu</h2>
	<!-- <hr>
	<a href="index.php" class="btn btn-primary btn-sm float-left">&larr; Kembali</a> -->
	<!-- <a href="?h=tambah" class="btn btn-primary btn-sm float-right">Tambah Menu</a> -->
	<div class="clearfix"></div>
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari..." title="Type in a name">
	<table class="table table-bordered" id="myTable">
	<thead class="thead-light" class="align-middle">
			<tr>
				<th>No</th>
				<th>Menu</th>
				<th>Stock</th>
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
				<td><?= $barang['stok_barang'] ?></td>
				<td><?= $barang['jenis_barang'] ?></td>
				<td><?= $barang['harga'] ?></td>
				<td>
					<div class="d-inline" >
						<a href="?h=edit-barang&id=<?= $barang['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i></a>
						<a href="?h=detail&id=<?= $barang['id'] ?>" class="btn btn-primary btn-sm"><i class="fas fa-bars    "></i></a>
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