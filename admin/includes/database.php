<?php 

require_once 'new_config.php';

class Database{


public  $connection;

public function __construct(){
	$this->open_db_connection();
}


public function open_db_connection(){
	$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	if ($this->connection->connect_errno) {
		die("Database connection failed Badly!" . $this->connection->connect_errno); 
	} //end if

} // end methodes


public function query($sql){
	$result = $this->connection->query($sql);
	$this->confirm_query($result);
	return $result;
}

private function confirm_query($result){
		if (!$result) {
		die("query failed!");
	}
}

public function escape_string($string){
	$escaped_string = mysqli_real_escape_string($this->connection, $string);
	return $escaped_string;
}



} // end class


$database = new Database();
$database->open_db_connection();
