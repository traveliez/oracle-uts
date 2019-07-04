<?php

$url = 'http://192.168.43.76:8888/apex/obe/product';

$json = file_get_contents($url);

$hasil = json_decode($json, true);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Oracle</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h1 class="text-center">Product Resi Dwi Thawasa</h1>
	<div class="container">
		<table class="table table-bordered">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Product Name</th>
		      <th scope="col">Category</th>
		      <th scope="col">Buy Price</th>
		      <th scope="col">Sell Price</th>
		      <th scope="col">Description</th>
		      <th scope="col">Actions</th>
		    </tr>
		  </thead>
		  <tbody>
		  		<?php foreach ($hasil['items'] as $value): ?>
		  	<tr>
		  			<td><?php echo $value['productid'] ?></td>
		  			<td><?php echo $value['productname'] ?></td>
		  			<td><?php echo $value['category'] ?></td>
		  			<td><?php echo $value['buyprice'] ?></td>
		  			<td><?php echo $value['sellprice'] ?></td>
		  			<td><?php echo $value['description'] ?></td>
		  			<td><a href="" class="btn btn-danger">Delete</button></td>
		  	</tr>
		  		<?php endforeach ?>
		  </tbody>
		</table>
	</div>
</body>
</html>
