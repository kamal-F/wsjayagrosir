<!doctype html>
<html>
<head>
<title>Jaya Grosir Enterprise</title>
<link rel="stylesheet" type="text/css" href="css/latih.css" />
<link rel="shortcut icon" href="images/test.ico">

</head>
<body>


<div id="bungkus">
	<div id="header"> JAYA GROSIR</div>
	<div id="wrap1">
		<div id="logo">Logo</div>
		<div id="Menu">Pilihan<ol>
<li><a href="#">Pilihan 1</a></li>
<li><a href="#">Pilihan 2</a></li>
<li><a href="#">Pilihan 3</a></li>
<li><a href="#">Pilihan 4</a></li>
<li><a href="#">Pilihan 5</a></li>
</ol>
Berita
<ul>
<li><a href="#">Berita lokal</a></li>
<li><a href="#">Berita asia</a></li>
<li><a href="#">Berita dunia</a></li>
</ul>

</div>
	</div>
	<div id="wrapnavconten">		
		<div id="navigasi">
		  <ul>
		    <li class='aktifnav'><a href='#'>home</a></li>
		    <li><a href='#'>test</a></li>
		    <li><a href='#'>test lagi</a></li>
		  </ul>
		</div>
		<div id="conten">
		<h1>Barang bekas kwalitet Premium</h1><br/>
		<?php 
		include 'infobabe.php';		
		?>		
		<table border="1">
		<tr><th>Deskripsi</th><th>Tersedia</th></tr>
		<?php 
		foreach ($babe as $val){
			echo '<tr><td>'.$val['desc'].'</td><td>'.$val['balance'].'</td></tr>';			
		}
		?>		
		</table>
		</div>
	</div>
	
	<div id="infobawah">2013</div>
</div>
</body>
</html>