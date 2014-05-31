<?php
require_once 'EasyDB.php';
$db = new EasyDB('localhost','root','','database');

/* Using classics MySQL's Queries */

//SELECT
$arreglo = $db->get_results("SELECT * FROM mytable WHERE id=9");
echo '<pre>';
print_r($arreglo);
echo '</pre>';
 
//INSERT INTO
echo $db->query("INSERT INTO mytable (fname,lname,age,gender) VALUES('Alfredo','Ramirez','21','Male')");


/* Prepared Statements */

// SELECT using Prepared Statements
$db->prepare('SELECT * FROM mytable WHERE id=:id');
$db->execute(
	array(
		':id' => 9
	)
);
$demo = $db->get_results();
echo '<pre>';
print_r($demo);
echo '</pre>';

// INSERT INTO using Prepared Statements
$db->prepare('INSERT INTO mytable (fname,lname,age,gender) VALUES(:fname,:lname,:age,:gender)');
echo $db->execute(
	array(
		':fname' => 'Alfredo',
		':lname' => 'Ramirez',
		':age'	 => '21',
		':gender' => 'Male'
	)
);