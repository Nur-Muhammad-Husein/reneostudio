<?php
class Connection
{
	public $connection;
	
	function __construct() {
		$server_name = 'localhost';
		$database = 'reneo_studio';
		$username = 'root';
		$password = '';
		
		$this->connection = new mysqli($server_name, $username, $password, $database);
	}

	function test() {
		if ($connection->connect_error) {
			die('Koneksi gagal: '.$connection->connect_error);
		}
	}
}
?>