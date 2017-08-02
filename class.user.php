<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname,$umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO tb_login_karyawan(no_ktp,email,password) VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT no_ktp, email, password FROM tb_login_karyawan WHERE no_ktp=:uname OR email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['password']))
				{
					$_SESSION['user_session'] = $userRow['no_ktp'];
					$_SESSION['email_session'] = $userRow['email'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
	
	public function Generate($id, $kode, $tbName)
	{
		$sql = "SELECT MAX(RIGHT(no_pendaftaran, 4)) AS max_id FROM tb_temporary_perusahaan ORDER BY no_pendaftaran";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_LAZY);
		$id = $row['max_id'];
		$sort_num = (int) substr($id, 1, 6);
  		$sort_num++;
  		$new_code = sprintf("$kode%04s", $sort_num);

  		return $new_code;
	}
}

class PENDAFTARAN
{
	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
    public function personal($no_ktp,$no_NIK, $nama_depan, $nama_belakang, $jenis_kelamin, $email, $nomor_hp, $nomor_telp, $tempat_lahir, $tgl_lahir, $nama_suku, $agama, $tinggi_badan, $berat_badan, $nomor_sim, $jenis_sim, $status_perkawinan, $status_tempat_tinggal, $foto, $hobi, $alamat, $kelurahan, $kecamatan, $kota)
    {

    	$cekno_ktp=$this->conn->prepare("SELECT count(no_ktp) FROM tb_karyawan where no_ktp=:no_ktp");
    	$cekno_ktp->execute(array(
    			':no_ktp'=>$no_ktp));

    	 if($cekno_ktp->fetchColumn() > 0){

    	 	try {

    	 		$stmt=$this->conn->prepare("
    	 		UPDATE tb_karyawan SET nama_depan=:nama_depan,nama_belakang=:nama_belakang,jenis_kelamin=:jenis_kelamin,email=:email,nomor_hp=:nomor_hp,nomor_telp=:nomor_telp,tempat_lahir=:tempat_lahir,tgl_lahir=:tgl_lahir,nama_suku=:nama_suku,agama=:agama,tinggi_badan=:tinggi_badan,berat_badan=:berat_badan,nomor_sim=:nomor_sim,jenis_sim=:jenis_sim,status_perkawinan=:status_perkawinan,status_tempat_tinggal=:status_tempat_tinggal,foto=:foto,hobi=:hobi,alamat=:alamat,kelurahan=:kelurahan,kecamatan=:kecamatan,kota=:kota where no_ktp=:no_ktp");

    	 		$stmt->execute(array(
    	 			'nama_depan'=>$nama_depan,
    	 			'nama_belakang'=>$nama_belakang,
    	 			'jenis_kelamin'=>$jenis_kelamin,
    	 			'email'=>$email,
    	 			'nomor_hp'=>$nomor_hp,
    	 			'nomor_telp'=>$nomor_telp,
    	 			'tempat_lahir'=>$tempat_lahir,
    	 			'tgl_lahir'=>$tgl_lahir,
    	 			'nama_suku'=>$nama_suku,
    	 			'agama'=>$agama,
    	 			'tinggi_badan'=>$tinggi_badan,
    	 			'berat_badan'=>$berat_badan,
    	 			'nomor_sim'=>$nomor_sim,
    	 			'jenis_sim'=>$jenis_sim,
    	 			'status_perkawinan'=>$status_perkawinan,
    	 			'status_tempat_tinggal'=>$status_tempat_tinggal,
    	 			'foto'=>$foto,
    	 			'hobi'=>$hobi,
    	 			'alamat'=>$alamat,
    	 			'kelurahan'=>$kelurahan,
    	 			'kecamatan'=>$kecamatan,
    	 			'kota'=>$kota,
    	 			'no_ktp'=>$no_ktp
    	 			));

    	 		return $stmt;	
    	 		
    	 	}  catch (PDOException $e){
		    		echo $e->getMessage();
    	 	}

    	 }
    	 else{

		    	try {
		    		$stmt = $this->conn->prepare("
		    			INSERT INTO tb_karyawan(no_ktp, no_NIK, nama_depan, nama_belakang, jenis_kelamin, email, nomor_hp, nomor_telp, tempat_lahir, tgl_lahir, nama_suku, agama,tinggi_badan,berat_badan, nomor_sim, jenis_sim, status_perkawinan, status_tempat_tinggal,foto,hobi,alamat,kelurahan,kecamatan,kota) VALUES (:no_ktp, :no_NIK, :nama_depan, :nama_belakang, :jenis_kelamin, :email, :nomor_hp, :nomor_telp, :tempat_lahir, :tgl_lahir, :nama_suku,:agama,:tinggi_badan,:berat_badan, :nomor_sim, :jenis_sim, :status_perkawinan, :status_tempat_tinggal,:foto,:hobi,:alamat, :kelurahan, :kecamatan, :kota)");
		    		$stmt->bindparam(":no_ktp", $no_ktp);
		    		$stmt->bindparam(":no_NIK", $no_NIK);
		    		$stmt->bindparam(":nama_depan", $nama_depan);
		    		$stmt->bindparam(":nama_belakang", $nama_belakang);
		    		$stmt->bindparam(":jenis_kelamin", $jenis_kelamin);
		    		$stmt->bindparam(":email", $email);
		    		$stmt->bindparam(":nomor_hp", $nomor_hp);
		    		$stmt->bindparam(":nomor_telp", $nomor_telp);
		    		$stmt->bindparam(":tempat_lahir", $tempat_lahir);
		    		$stmt->bindparam(":tgl_lahir", $tgl_lahir);
		    		$stmt->bindparam(":nama_suku", $nama_suku);
		    		$stmt->bindparam(":agama", $agama);
		    		$stmt->bindparam(":tinggi_badan", $tinggi_badan);
		    		$stmt->bindparam(":berat_badan", $berat_badan);
		    		$stmt->bindparam(":nomor_sim", $nomor_sim);
		    		$stmt->bindparam(":jenis_sim", $jenis_sim);
		    		$stmt->bindparam(":status_perkawinan", $status_perkawinan);
		    		$stmt->bindparam(":status_tempat_tinggal", $status_tempat_tinggal);
		    		$stmt->bindparam(":foto", $foto);
		    		$stmt->bindparam(":hobi", $hobi);
		    		$stmt->bindparam(":alamat", $alamat);
		    		$stmt->bindparam(":kelurahan", $kelurahan);
		    		$stmt->bindparam(":kecamatan", $kecamatan);
		    		$stmt->bindparam(":kota", $kota);
					$stmt->execute();

					return $stmt;	


		    	} catch (PDOException $e)
		    	{
		    		echo $e->getMessage();
		    	}

      	}


    }

}
?>