<?php
require_once 'class.user.php';
require_once 'header.php';


$data   = new USER();
$cek    = new USER();
$tbName = "tb_temporary_perusahaan";
$kode   = "REQ";
$id     = "no_pendaftaran";
$nomor  = $cek->Generate($id, $kode, $tbName);


// BPO = BPO01 //
// MPO = MPO01 //
// system integrator = SYG01 //
// Konsultan = KST01 //
$getPost = $_POST[''];


if (isset($_POST['ajukanBPO'])) {

    $kd            = "BPO01";
    $kd_perusahaan = $_POST['txt_kodePerusahaan'];
    $nameProject   = $_POST['txt_project'];
    $companyName   = $_POST['txt_nama'];
    $cp            = $_POST['txt_cp'];
    $phone         = $_POST['txt_phone'];
    $email         = $_POST['txt_email'];
    $status        = "1";
    $dt            = array(
        $kd,
        $nameProject,
        $companyName,
        $cp,
        $phone,
        $email,
        $status
    );
    // print_r($dt);
    $sql           = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, kode_perusahaan, nama_perusahaan, cp, phone, email, kebutuhan, nama_project, status) VALUES (:kode, :kd, :nama, :cp, :telp, :email, :kebutuhan, :nama_project, :st)";
    $stmt          = $data->runQuery($sql);
    $stmt->execute(array(
        ':kode' => $nomor,
        ':kd' => $kd_perusahaan,
        ':nama' => $companyName,
        ':cp' => $cp,
        ':telp' => $phone,
        ':email' => $email,
        ':kebutuhan' => $kd,
        ':nama_project' => $nameProject,
        ':st' => $status
    ));
    if (!$stmt) {
        # code...
        $pesan = "DATA TIDAK MASUK KE DATABASE";
    } else {
        $pesan = "Data Berhasil Diajukan. <p>Selanjutnya Anda akan dihubungi oleh pihak sales kami.</p>";
    }

} elseif (isset($_POST['ajukanMPO'])) {

    $kd            = $_POST['txt_kd'];
    $kd_perusahaan = $_POST['txt_kodePerusahaan'];
    $companyName   = $_POST['txt_nama'];
    $cp            = $_POST['txt_cp'];
    $phone         = $_POST['txt_phone'];
    $email         = $_POST['txt_email'];
    $st      = "1";
    $nameProject   = "NULL";
    $kebutuhan     = "MPO01";
    // $data = array($nomor, $kd, $kd_perusahaan, $companyName, $cp, $phone, $email, $nameProject, $kebutuhan, $st);
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";

                $mpoQuery = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, kode_perusahaan, nama_perusahaan, cp, phone, email, kebutuhan, kode_pekerjaan, nama_project, status) VALUES (:kode, :kd, :nama, :cp, :telp, :email, :kebutuhan, :pekerjaan, :nama_project, :st)";

            $stmt = $data->runQuery($mpoQuery);
            $stmt->execute(array(
                ':kode' =>$nomor,
                ':kd'   =>$kd_perusahaan,
                ':nama' =>$companyName,
                ':cp'   =>$cp,
                ':telp' =>$phone,
                ':email' =>$email,
                ':kebutuhan' =>$kebutuhan,
                ':pekerjaan' =>$kd,
                ':nama_project' =>$nameProject,
                ':st' =>$st));
            if (!$stmt) {
                # code...
                $pesan =  "DATA TIDAK MASUK KE DATABASE";
            }else{
                $pesan =  "Data Berhasil Diajukan. <p>Selanjutnya Anda akan dihubungi oleh pihak sales kami.</p>";

            }

} elseif (isset($_POST['sys'])) {
    $nameProject   = 'NULL';
    $kd            = 'SYG01';
    $kd_perusahaan = $_POST['txt_kodePerusahaan'];
    $companyName   = $_POST['txt_nama'];
    $cp            = $_POST['txt_cp'];
    $phone         = $_POST['txt_phone'];
    $email         = $_POST['txt_email'];
    $status        = "1";

    $sql  = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, kode_perusahaan, nama_perusahaan, cp, phone, email, kebutuhan, nama_project, status) VALUES (:kode, :kd, :nama, :cp, :telp, :email, :kebutuhan, :nama_project, :st)";
    $stmt = $data->runQuery($sql);
    $stmt->execute(array(
        ':kode' => $nomor,
        ':kd' => $kd_perusahaan,
        ':nama' => $companyName,
        ':cp' => $cp,
        ':telp' => $phone,
        ':email' => $email,
        ':kebutuhan' => $kd,
        ':nama_project' => $nameProject,
        ':st' => $status
    ));
    if (!$stmt) {
        # code...
        $pesan = "DATA TIDAK MASUK KE DATABASE";
    } else {
        $pesan = "Data Berhasil Diajukan. <p>Selanjutnya Anda akan dihubungi oleh pihak sales kami.</p>";
    }
} elseif (isset($_POST['kst'])) {
    $nameProject   = 'NULL';
    $kd            = 'KST01';
    $kd_perusahaan = $_POST['txt_kodePerusahaan'];
    $companyName   = $_POST['txt_nama'];
    $cp            = $_POST['txt_cp'];
    $phone         = $_POST['txt_phone'];
    $email         = $_POST['txt_email'];
    $status        = "1";

    $sql  = "INSERT INTO tb_temporary_perusahaan (no_pendaftaran, kode_perusahaan, nama_perusahaan, cp, phone, email, kebutuhan, nama_project, status) VALUES (:kode, :kd, :nama, :cp, :telp, :email, :kebutuhan, :nama_project, :st)";
    $stmt = $data->runQuery($sql);
    $stmt->execute(array(
        ':kode' => $nomor,
        ':kd' => $kd_perusahaan,
        ':nama' => $companyName,
        ':cp' => $cp,
        ':telp' => $phone,
        ':email' => $email,
        ':kebutuhan' => $kd,
        ':nama_project' => $nameProject,
        ':st' => $status
    ));
    if (!$stmt) {
        # code...
        $pesan = "DATA TIDAK MASUK KE DATABASE";
    } else {
        $pesan = "Data Berhasil Diajukan. <p>Selanjutnya Anda akan dihubungi oleh pihak sales kami.</p>";
    }
} else {
    $pesan = "You have no power here, Gandalf!";
}
?>
<br/>
<div class = "col-md-4 col-md-offset-4">
<div class="panel panel-success">
    <div class="panel-heading">SELAMAT!!</div>
    <div class="panel-body"><?= $pesan ?>

<br/>
<p style = "text-align: center;"><a href="home.php?p=req">pengajuan lainnya</a></p></div>
</div>
</div>
