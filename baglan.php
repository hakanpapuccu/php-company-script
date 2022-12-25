<?php 

try {
	$db = new PDO ("mysql:host=localhost;dbname=firma" , 'root', '12345678');
	//echo "Bağlantı başarılı";
}

catch (PDOExpception $e) {

	echo $e = getMessage();

}



 ?>