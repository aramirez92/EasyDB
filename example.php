<?php
//Include EasyDB Class
require_once('EasyDB.php');
 
//DB Connection
$database = new EasyDB('localhost','root','', 'dbname');
 
//Get Results
$arreglo = $database->get_results("SELECT * FROM tabla WHERE id='x'");
 
//Print results
foreach($arreglo as $valor){
  echo $valor->columna;
}
 
//Insert a row
$database->query("INSERT into tabla (nombre, direccion) VALUES('Alfredo Ramirez Ortega', 'Mazatlan')");