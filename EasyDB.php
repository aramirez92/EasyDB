<?php
/*
=======================================================================
Author: Alfredo Ramirez - http://www.ciber-adictos.com
Name: EasyDB
Desc: EasyDB is an open source PHP database class that I wrote at 
      november 2012. The class makes more easy to use MySQL within 
      your PHP script.
License: FREE / Donation 
  	(LGPL - You may do what you like with EasyDB - no exceptions.)
=======================================================================
Twitter:
@fredramirez92 - https://twitter.com/fredramirez92
 
Facebook
@aramirez92 - https://www.facebook.com/aramirez92
=======================================================================
*/

Class EasyDB {
	
	private $dbhost;
	private $dbuser;
	private $dbpass;
	private $dbname;
	private $dbh;
	private $stmt;

	function __construct($dbhost, $dbuser, $dbpass, $dbname) {

		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;

		/* Database Source Name */
		$dsn = 'mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname;

		/* Set PDO Options */
		$options = array(
		   PDO::ATTR_PERSISTENT => true, 
		   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		   PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		   PDO::ATTR_EMULATE_PREPARES => false
		);

		/* Create a new PDO instanace */
		try {
		    $this->dbh = new PDO($dsn, $this->dbuser, $this->dbpass, $options);
		}
		/* Catch any errors */
		catch (PDOException $e) {
		    $this->error = $e->getMessage();
		}
	}

	/* No funciona */
	public function bind($name, $value){
		return $this->stmt->bindParam($name, $value);
	}

	/* Prepared Statement */
	public function prepare($query) {
		return $this->stmt = $this->dbh->prepare($query);
	}

	/* Execute PDO With or Without Statements */
	public function execute($statements=NULL) {

		/* Without Statements */
		if($statements===NULL){

			try{
				$result = $this->stmt->execute();
			} catch (PDOException $e) {
		    	$result = $e->getMessage();
			}
			return $result;

		/* With Statements */
		}else{

			try{
				$result = $this->stmt->execute($statements);
			} catch (PDOException $e) {
		    	$result = $e->getMessage();
			}
			return $result;

		}
		
	}

	/* Get Results From a Query */
	public function get_results($query=NULL) {
		if($query!=NULL){
			$this->stmt = $this->dbh->prepare($query);
		}
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

	/* Insert Or Update Query
	 *
 	 * If you want get the lastInsertId you only
	 * need send $lastId=TRUE
	 *
	 */
	public function query($query,$lastId=FALSE) {

		/* Try query */
		try {

		    $this->dbh->query($query);
		    if($lastId===TRUE){
		    	return $this->dbh->lastInsertId();
		    }

			return TRUE;
		/* Catch any errors */
		} catch (PDOException $e) {
		    return $e->getMessage();
		}
		
	}

}
