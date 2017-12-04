<?php
	
	echo "modul";
	/**
	* 
	*/

	require_once('../dbconfig.php');
	class Modul
	{
		private $conn;
		function __construct(argument)
		{
			$database = new Database();
			$db = $database->dbConnection();
			$this->conn = $db;
			}
		function Query($type, $param)

		{

			$info = "SELECT * FROM tb_karyawan WHERE no_ktp = :".$param."";
			$pendidikan = "SELECT * FROM tb_info_pendidikan WHERE no_ktp = :".$param."";

			$stmt = $this->conn->prepare($type);
			$stmt->execute($stmt);
			return $stmt;

		}
	}
	

	$dt = new Modul();
	$param = "3175070204930007";
	$info = $dt->Query($pendidikan, $param);

	while ($row = $info->fetch(PDO::FETCH_LAZY)) {
		# code...
		$sekolah = $row['tingkat'];

		print_r($sekolah);
	}
	


?>