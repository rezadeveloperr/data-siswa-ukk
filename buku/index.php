<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Buku</title>
	<style type="text/css">
		*{
			font-family: "Trebuchet MS";
		}
		h1{
			text-transform: uppercase;
			color: #D2B48C;

		}
		table{
			border: 1px solid #ddeeee;
			border-collapse: collapse;;
			border-spacing: 0;
			width: 70%;
			margin: 10px auto 10px auto;
		}
		table thead th{
			background-color: #D2B48C;
			border:1px solid #ffffff;
			color: #FFFFFF;
			padding: 10px;
			text-align: left;
		}
		table tbody td{
			border:1px solid #D2B48C;
			color: #333;
			padding: 10px;
		}
		a{
			background-color: #D2B48C;
			color: #fff;
			padding: 10px;
			font-size: 12px;
			text-decoration:none; 
		}

	</style>

</head>
<body>
	<center><h1>Data Buku</h1></center>

	<center><a href="tambah_buku.php">+ &nbsp; Tambah Buku </a></center>
	<br>
	<table>
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Pengarang</th>
				<th>Penerbit</th>
				<th>Gambar</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$query = " SELECT * FROM tabelbuku2 ORDER BY id ASC ";
			$result = mysqli_query($koneksi,$query);

			if (!$result) {
				die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			}
			$no = 1;
    
			while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['judul']; ?></td>
				<td><?php echo $row['pengarang']; ?></td>
				<td><?php echo $row['penerbit']; ?></td>
				<td><img style="width: 120px;" src="gambar/<?php echo $row['gambar'];?>"></td>
				<td>
					<a href="edit_buku.php?id=<?php echo $row['id']; ?>">Edit</a>
					<a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin menghapus buku ini?')">Hapus</a>
				</td>

				<?php
				$no++;
			}
			?>
			</tr>
		</tbody>
	</table>
</body>
</html>