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
class EasyDB{
	private $dbhost;
	private $dbuser;
	private $dbpass;
	private $dbname;
 
	function __construct($dbhost, $dbuser, $dbpass, $dbname){
		$this->dbhost = $dbhost;
		$this->dbuser = $dbuser;
		$this->dbpass = $dbpass;
		$this->dbname = $dbname;
		$this->connection = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass);
		mysql_select_db($this->dbname);
	}
 
	function query($input){
		mysql_query($input, $this->connection);
		return true;
	}
 
	function get_results($input){
		$output = array();
		$query = mysql_query($input, $this->connection);
		while($row = mysql_fetch_object($query)){
			$output[] = $row;
		}
		return $output;
	}
}