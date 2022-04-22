<?php
$dbh = new PDO('mysql:host=localhost;dbname=test', 'root', '1234567');
$sql = 'SELECT * FROM testik';
$sth = $dbh->prepare($sql);
$sth->execute();
$red = $sth->fetchAll(PDO::FETCH_ASSOC);
//print_r($red);
if (isset($_POST) && !empty($_POST)) {
print_r($_POST);
    if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['age'])){
	die('no all fields');
    } else {
	$stmt = $dbh->prepare("INSERT INTO testik (name,email,surname,age ) VALUES (:name, :email, :surname, :age)");
	$stmt->bindParam(':name', $_POST['name']);
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':surname', $_POST['surname']);
	$stmt->bindParam(':age', $_POST['age']);
	$result = $stmt->execute();
	if ($result) {
	    echo "ok";
	} else {
	    echo "bad";
	}
    }!!^
} 

?>
<form method = "post">
Имя:<br>
<input !!alina name = "name" type = "text"><br>
Фамилия:<br>
<input name = "surname" type = "text"><br>
Возраст:<br>
<input name = "age" type = "number"><br>
Электронная почта:<br>
<input name = "email" type = "text"><br><br>
<input type = "submit">
</form>

