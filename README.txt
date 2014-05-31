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

Change Log:

2.00 - PDO Support
	- Added PDO Support
	Funcions...
		- $db->get_results - get multiple row result set from the database.
		- $db->query -- send a query to the database.
		- $db->prepare -- add your query with prepared statements.
		- $db->execute -- execute PDO with or without statements.
		- $db = new EasyDB -- Initiate new db object.

1.00 - Initial Release
	Functions...
		- $db->get_results - get multiple row result set from the database.
		- $db->query -- send a query to the database.
		- $db = new EasyDB -- Initiate new db object.	