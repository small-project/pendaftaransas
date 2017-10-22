<?php 

$noNIP = $_GET['nip'];

$query = "SELECT * FROM tb_karyawan WHERE no_ktp = :nip";
$stmt = $config->runQuery($query);
$stmt->execute(array(':nip' => $noNIP));

$userRow = $stmt->fetch(PDO::FETCH_LAZY);


?>
<h4>Data Karyawan</h4>
<hr>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-success">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Informasi Personal
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">

                <form class="form-horizontal" method="post" action="">
                    <div class="col-md-12" style="margin-bottom: 20px;">
                        <div class="col-md-4" style="margin-right: -50px;">
                            <img src="<?=$userRow['foto']?>" class="img-responsive img-rounded" width="60%" style="margin-left: 20%;">
                        </div>
                        <div class="col-md-8" style="margin-left: -10px; margin-top:10px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                        <div class="col-sm-4">
                                                Nomor KTP
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="inputEmail3" name="txt_ktp" value="<?php print($userRow['no_ktp']); ?>" readonly>
                                            </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        Nama Lengkap
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nama_depan']); ?> <?php print($userRow['nama_belakang']); ?>" name="txt_nama" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        Alamat Email
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="inputEmail3" name="txt_ktp" value="<?php print($userRow['email']); ?>" readonly>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
<br>
                    <div class="col-sm-4">
                        Nomor Handphone
                    </div>
                    <div class="col-sm-4">
                        Nomor Telp
                    </div>
                    <div class="col-sm-4">
                        Tempat Tanggal Lahir
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_hp']); ?>" name="txt_hp" readonly>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_telp']); ?>" name="txt_telp" readonly>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['tempat_lahir']); ?>, <?php print($userRow['tgl_lahir']); ?>" readonly>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        Nama Suku
                    </div>
                    <div class="col-sm-4">
                        Agama
                    </div>
                    <div class="col-sm-4">
                        Status Pernikahan
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nama_suku']); ?>" name="txt_suku" readonly>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['agama']); ?>" name="txt_agama" readonly>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['status_perkawinan']); ?>" name="txt_status" readonly>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        Tinggi
                    </div>
                    <div class="col-sm-2">
                        Berat
                    </div>
                    <div class="col-sm-4">
                        Nomor SIM
                    </div>
                    <div class="col-sm-2">
                        SIM
                    </div>
                    <div class="col-sm-2">
                        Jenis Kelamin
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['tinggi_badan']); ?>" name="txt_tinggi" readonly>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['berat_badan']); ?>" name="txt_berat" readonly>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_sim']); ?>" name="txt_sim" readonly>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['jenis_sim']); ?>" name="txt_jenis" readonly>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['jenis_kelamin']); ?>" readonly>
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm-4">
                        Status Tempat Tinggal
                    </div>
                    <div class="col-sm-4">
                        Alamat Rumah <small><strong></strong></small>
                    </div>
                    <div class="col-sm-4">
                        Kelurahan <small><strong></strong></small>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['status_tempat_tinggal']); ?>" name="txt_tmpt" readonly>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['alamat']); ?>" name="txt_alamat" readonly>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['kelurahan']); ?>" name="txt_kelurahan" readonly>
                        </div>

                    </div>

                    <div class="col-sm-4">
                        Kecamatan
                    </div>
                    <div class="col-sm-4">
                        Kota <small><strong></strong></small>
                    </div>
                    <div class="col-sm-4">
                        .
                    </div>
                    <div class="form-group">

                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['kecamatan']); ?>" name="txt_kecamatan" readonly>
                        </div>
                        <div class="col-sm-4" readonly>
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['kota']); ?>" name="txt_kota" readonly>
                        </div>
                        <div class="col-sm-4" readonly>

                        </div>

                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="col-sm-4">Nomor BPJS</div>
                        <div class="col-sm-4">Nomor NPWP</div>
                        <div class="col-sm-4"></div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['no_BPJS']); ?>" name="txt_bpjs" readonly>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['no_NPWP']); ?>" name="txt_npwp" readonly>
                            </div>
                        </div>

                </form>

            </div>
        </div>
    </div>

    