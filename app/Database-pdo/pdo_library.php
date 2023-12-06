<?php
	class count_library{
		public $CountLibrary,$PrintCount;
		function __construct(){
			$IdAdder=$_SERVER['REMOTE_ADDR'];
			switch($IdAdder){
				case "127.0.0.1":
						$library_server="localhost";
						$library_username="root";
						$library_password="053282395";
						$library_db="library_rc";
						$library_port=3399;
							try{
								$CountLibrary=new PDO("mysql:host=$library_server;dbname=$library_db;port=$library_port;charset=utf8",$library_username,$library_password);
								$CountLibrary->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
								$PrintCount="You can count on the database at this time";
							}catch(PDOException $e){
								$PrintCount="You can't count on the database at this time";
							}
					break;
				case "::1":
						$library_server="localhost";
						$library_username="root";
						$library_password="053282395";
						$library_db="library_rc";
						$library_port=3306;
							try{
								$CountLibrary=new PDO("mysql:host=$library_server;dbname=$library_db;port=$library_port;charset=utf8",$library_username,$library_password);
								$CountLibrary->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
								$PrintCount="You can count on the database at this time";
							}catch(PDOException $e){
								$PrintCount="You can't count on the database at this time";
							}				
					break;
				case "localhost";
						$library_server="localhost";
						$library_username="root";
						$library_password="053282395";
						$library_db="library_rc";
						$library_port=3306;
							try{
								$CountLibrary=new PDO("mysql:host=$library_server;dbname=$library_db;port=$library_port;charset=utf8",$library_username,$library_password);
								$CountLibrary->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
								$PrintCount="You can count on the database at this time";
							}catch(PDOException $e){
								$PrintCount="You can't count on the database at this time";
							}				
					break;
				default:
						$library_server="localhost";
						$library_username="Regina@ict2022";
						$library_password="Regina@ict2022";
						$library_db="library_rc";
						$library_port=3306;
							try{
								$CountLibrary=new PDO("mysql:host=$library_server;dbname=$library_db;port=$library_port;charset=utf8",$library_username,$library_password);
								$CountLibrary->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
								$PrintCount="You can count on the database at this time";
							}catch(PDOException $e){
								$PrintCount="You can't count on the database at this time";
							}				
			}
			$this->CountLibrary=$CountLibrary;
			$this->PrintCount=$PrintCount;
		}function CallCountLibrary(){
			return $this->CountLibrary;
		}function PrintCountLibraty(){
			return $this->PrintCount;
		}
	}
?>