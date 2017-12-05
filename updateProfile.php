<?php

if (isset($_POST['addUpdate'])) {
    # code...
    $ktp = $_POST['txt_ktp'];
    $nama = $_POST['txt_nama'];
    $nama = explode(' ', $nama);
    $nama_depan = $nama[0];
    $nama_belakang = $nama[1];

    $hp = $_POST['txt_hp'];
    $telp = $_POST['txt_telp'];
    $suku = $_POST['txt_suku'];
    $agama = $_POST['txt_agama'];
    $status = $_POST['txt_status'];
    $tinggi = $_POST['txt_tinggi'];
    $berat = $_POST['txt_berat'];
    $nomor_sim = $_POST['txt_sim'];
    $jenis = $_POST['txt_jenis'];
    $tmpt = $_POST['txt_tmpt'];

    $bpjs = $_POST['txt_bpjs'];
    $npwp = $_POST['txt_npwp'];

    $alamat = $_POST['txt_alamat'];
    $kelurahan = $_POST['txt_kelurahan'];
    $kecamatan = $_POST['txt_kecamatan'];
    $kota = $_POST['txt_kota'];

    // $type_bank = $_POST['txt_bank'];
    // $cabang = $_POST['txt_cabang'];
    // $norek = $_POST['txt_rek'];

    $sql = "UPDATE tb_karyawan SET nama_depan = :depan, nama_belakang = :belakang, nomor_hp = :hp, nomor_telp = :telp, nama_suku = :suku, agama = :agama, status_perkawinan = :status, tinggi_badan = :tinggi, berat_badan = :berat, no_NPWP = :npwp, no_BPJS = :bpjs ,nomor_sim = :nomorSim, jenis_sim = :jenisSim, status_tempat_tinggal = :tmpt, alamat = :alamat, kelurahan = :kel, kecamatan = :kec, kota = :kota WHERE no_ktp = :ktp";
    $stmt = $auth_user->runQuery($sql);
    $stmt->execute(array(
        ':depan'    => $nama_depan,
        ':belakang' => $nama_belakang,
        ':hp'       => $hp,
        ':telp'     => $telp,
        ':suku'     => $suku,
        ':agama'    => $agama,
        ':status'   => $status,
        ':tinggi'   => $tinggi,
        ':berat'    => $berat,
        ':npwp'     => $npwp,
        ':bpjs'     => $bpjs,
        ':nomorSim' => $nomor_sim,
        ':jenisSim' => $jenis,
        ':tmpt'     => $tmpt,
        ':alamat'   => $alamat,
        ':kel'      => $kelurahan,
        ':kec'      => $kecamatan,
        ':kota'     => $kota,
        ':ktp'      => $ktp
    ));
    if ($stmt) {
        # code...
        echo "<script>
alert('Update Success!');
window.location.href='/profile.php?p=update';
</script>";
    } else{
        echo "Gagal";
    }

}

?>

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
                    <div class="col-sm-4">
                        Nomor KTP
                    </div>
                    <div class="col-sm-4">
                        Nama Lengkap
                    </div>
                    <div class="col-sm-4">
                        Alamat Email
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" name="txt_ktp" value="<?php print($userRow['no_ktp']); ?>" readonly>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nama_depan']); ?> <?php print($userRow['nama_belakang']); ?>" name="txt_nama" >
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['email']); ?>" readonly>
                        </div>
                    </div>

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
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_hp']); ?>" name="txt_hp">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_telp']); ?>" name="txt_telp">
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
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nama_suku']); ?>" name="txt_suku">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['agama']); ?>" name="txt_agama">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['status_perkawinan']); ?>" name="txt_status">
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
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['tinggi_badan']); ?>" name="txt_tinggi">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['berat_badan']); ?>" name="txt_berat">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['nomor_sim']); ?>" name="txt_sim">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['jenis_sim']); ?>" name="txt_jenis">
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
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['status_tempat_tinggal']); ?>" name="txt_tmpt">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['alamat']); ?>" name="txt_alamat">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['kelurahan']); ?>" name="txt_kelurahan">
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
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['kecamatan']); ?>" name="txt_kecamatan">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['kota']); ?>" name="txt_kota">
                        </div>
                        <div class="col-sm-4">

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
                                <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['no_BPJS']); ?>" name="txt_bpjs">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputEmail3" value="<?php print($userRow['no_NPWP']); ?>" name="txt_npwp">
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-block btn-primary" type="submit" name="addUpdate">
                                    Update
                                </button>
                            </div>
                        </div>

                </form>

            </div>
        </div>
    </div>

    <div class="panel panel-success">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Informasi Penyakit
                </a>
            </h4>
        </div>

        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">

                <div class="col-md-4">

                    <div class="form-group">
                        <label class="control-label">Nama Penyakit</label>
                        <input maxlength="100" type="text" class="form-control textbox" id='nama_penyakit' autocomplete="off" placeholder="Nama Penyakit" />
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">
                        <label class="control-label">Keterangan</label>
                        <input type="text" autocomplete="off" class="form-control textbox" placeholder="Keterangan" id="status_penyakit"/>
                    </div>

                </div>
                </br>
                <div class="col-md-4">
                    <button type="button" id="datapenyakit" class="btn btn-primary">
                        <strong>Tambah  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></strong></button></strong>
                    </button>
                </div>

                <br><br>

                <table id="tablepenyakit"
                       data-toggle="table"
                       data-toolbar="#toolbar"
                       data-height="230"
                       data-pagination="true"
                       data-click-to-select="true"
                       data-url="Json/data-penyakit.php?no_ktp=<?php echo $user_id; ?>"
                       data-unique-id="id">
                    <thead>
                    <tr>

                        <th data-field="" data-checkbox="true"></th>
                        <th data-field="nama_penyakit" class="danger">Nama Penyakit</th>
                        <th data-field="status" class="info">Status</th>
                        <th data-field="action" class="info">Hapus</th>
                    </tr>
                    </thead>
                </table>
                <br>


            </div>
        </div>
    </div>

    <div class="panel panel-success">
        <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Informasi Keluarga
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Nama Lengkap</label>
                        <input  maxlength="100" type="text" required="required" class="form-control" autocomplete="off" id="nama_lengkap" placeholder="Nama Lengkap"/>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">
                        <label class="control-label">Status Keluarga</label>
                        <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="statuskeluarga" placeholder="Status Keluarga" />
                    </div>

                </div>


                <div class="col-md-4">

                    <div class="form-group">
                        <label class="control-label">No. Handphone</label>
                        <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="nomor_handphone" placeholder="No. Handphone" />
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">
                        <label class="control-label">Tempat Lahir</label>
                        <input  maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="tempat_lahirkeluarga" placeholder="Tempat Lahir"/>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">
                        <label class="control-label">Tanggal Lahir</label>
                        <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Tanggal Lahir" id="tanggal_lahirkeluarga"/>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">
                        <label class="control-label">Pendidikan Terakhir</label>
                        <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="pendidikan" placeholder="Pendidikan Terakhir" />
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="form-group">
                        <label class="control-label">Pekerjaan</label>
                        <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="pekerjaan" placeholder="Pekerjaan" />
                    </div>

                </div>


                <div class="form-group">
                    <label class="control-label">Jenis Kelamin</label>
                    <br>
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L"> <strong>Laki-Laki</strong>
                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P"> <strong>Perempuan</strong><br>
                </div>
                <br>

                <div class="col-md-12">
                    <label>
                        <input type="checkbox" id='hub_urgent' value="1"/> * Keluarga yang dapat dihubungi dalam keadaan darurat.
                    </label>
                    <br><br>
                    <button type="button" class="btn btn-primary" id="datakeluarga">
                        <strong>Tambah  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></strong>
                    </button>
                    <br><br>
                </div>

                <table id="tablekeluarga"
                       data-toggle="table"
                       data-toolbar="#toolbar"
                       data-height="230"
                       data-pagination="true"
                       data-click-to-select="true"
                       data-url="Json/data-keluarga.php?no_ktp=<?php echo $user_id ?>"
                       data-unique-id="id">
                    <thead>
                    <tr>

                        <th data-field="" data-checkbox="true"></th>
                        <th data-field="nama_lengkap" class="active">Nama Lengkap</th>
                        <th data-field="status_keluarga" class="danger">Status Keluarga</th>
                        <th data-field="jenis_kelamin" class="info">Jenis Kelamin</th>
                        <th data-field="tempat_lahir" class="warning">Tempat Lahir</th>
                        <th data-field="pendidikan" class="success">Pendidikan</th>
                        <th data-field="pekerjaan" class="danger">pekerjaan</th>
                        <th data-field="nomor_handphone" class="info">Handphone</th>
                        <th data-field="action" class="info">Hapus</th>
                    </tr>
                    </thead>
                </table>

            </div>
        </div>


        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Informasi Pendidikan
                    </a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Tingkat Pendidikan</label>
                            <select name="" id="tingkat_pendidikan" class="form-control">
                                <<option value="">-- Pilih Tingkat Pendidikan --</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Nama Pendidikan</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="nama_pendidikan" placeholder="Nama Badan Pendidikan" />
                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Jurusan</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Jurusan" id="jurusan" />
                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Tahun Masuk</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Tahun Masuk" id="tahun_masuk" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Tahun Lulus</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Tahun Lulus" id="tahun_keluar" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Nilai Rata-rata (10-100)</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Nilai Rata" id="nilai_rata" />
                        </div>

                    </div>

                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="datapendidikan">
                            <strong>Tambah  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></strong>
                        </button>

                        <br><br>
                    </div>

                    <table id="tablependidikan"
                           data-toggle="table"
                           data-toolbar="#toolbar"
                           data-height="230"
                           data-pagination="true"
                           data-click-to-select="true"
                           data-url="Json/data-pendidikan.php?no_ktp=<?php echo $user_id ?>"
                           data-unique-id="id">
                        <thead>
                        <tr>

                            <th data-field="" data-checkbox="true"></th>
                            <th data-field="tingkat" class="danger">Tingkat Pendidikan</th>
                            <th data-field="nama_bapen" class="info">Nama Badan Pendidikan</th>
                            <th data-field="jurusan" class="active">Jurusan</th>
                            <th data-field="tahun_masuk" class="success">Tahun Masuk</th>
                            <th data-field="tahun_lulus" class="warning">Tahun Keluar</th>
                            <th data-field="nilai" class="warning">Nilai Rata2</th>
                            <th data-field="action" class="warning">Hapus</th>
                        </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Informasi Khursus
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Nama Bidang</label>
                            <input  maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="nama_bidang" placeholder="Nama Bidang"  />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Bidang Peyelenggara</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="bidan_penyelenggara" placeholder="Bidang Penyelenggara" />
                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Tahun Masuk</label>
                            <input maxlength="100" type="text" required="required" class="form-control" autocomplete="off" placeholder="Tahun Masuk" id="tahun_masukkhursus" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Tahun Lulus</label>
                            <input maxlength="100" type="text" required="required" class="form-control" autocomplete="off" placeholder="Tahun Lulus" id="tahun_luluskhursus" />
                        </div>

                    </div>

                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="datakhursus">
                            <strong>Tambah  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></strong>
                        </button>
                    </div>

                    <table id="tablekhursus"
                           data-toggle="table"
                           data-toolbar="#toolbar"
                           data-height="230"
                           data-pagination="true"
                           data-click-to-select="true"
                           data-url="Json/data-khursus.php?no_ktp=<?php echo $user_id ?>";
                           data-unique-id="id">
                        <thead>
                        <tr>

                            <th data-field="" data-checkbox="true"></th>
                            <th data-field="nama_bidang" class="danger">Nama Bidang</th>
                            <th data-field="nama_penyelenggara" class="info">Bidang Penyelenggara</th>
                            <th data-field="tahun_masuk" class="success">Tahun Masuk</th>
                            <th data-field="tahun_lulus" class="warning">Tahun Keluar</th>
                            <th data-field="action" class="warning">Hapus</th>
                        </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseFive">
                        Informasi Bahasa Asing <small style="color: #ebebeb;">yang dikuasai.</small>
                    </a>
                </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Nama Bahasa</label>
                            <input maxlength="100" type="text" required="required" class="form-control" autocomplete="off" id="nama_bahasa" placeholder="Nama Bahasa" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Writing (10-100)</label>
                            <input maxlength="100" type="text" required="required" class="form-control" autocomplate="off" id="writing" placeholder="Writing" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Listening (10-100)</label>
                            <input maxlength="100" id="listening" type="text" required="required" autocomplete="off" class="form-control" placeholder="Listening" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Speaking (10-100)</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Speaking" id="speaking" />
                        </div>

                    </div>

                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="databahasa">
                            <strong>Tambah  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></strong>
                        </button>
                    </div>
                    <br><br>

                    <table id="tablebahasa"
                           data-toggle="table"
                           data-toolbar="#toolbar"
                           data-height="230"
                           data-pagination="true"
                           data-click-to-select="true"
                           data-url="Json/data-bahasa.php?no_ktp=<?php echo $user_id ?>"
                           data-unique-id="id">
                        <thead>
                        <tr>

                            <th data-field="" data-checkbox="true"></th>
                            <th data-field="nama_bahasa" class="danger">Nama Bahasa</th>
                            <th data-field="writing" class="info">Writing</th>
                            <th data-field="listening" class="success">Listening</th>
                            <th data-field="speaking" class="warning">Speaking</th>
                            <th data-field="action" class="warning">Hapus</th>
                        </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>


        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseFive">
                        Informasi Penghargaan
                    </a>
                </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">


                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Nama Penghargaan</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Nama Penghargaan" id="nama_penghargaan" />
                        </div>

                    </div>

                    <div class="col-md-8">

                        <div class="form-group">
                            <label class="control-label">Keterangan</label>
                            <textarea name="keterangan" autocomplete="off" id="keterangan" placeholder="Keterangan" class="form-control"></textarea>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="datapenghargaan">
                            <strong>Tambah  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></strong>
                        </button>

                        <br><br>
                    </div>

                    <table id="tablepenghargaan"
                           data-toggle="table"
                           data-toolbar="#toolbar"
                           data-height="230"
                           data-pagination="true"
                           data-click-to-select="true"
                           data-url="Json/data-penghargaan.php?no_ktp=<?php echo $user_id ?>"
                           data-unique-id="id">
                        <thead>
                        <tr>

                            <th data-field="" data-checkbox="true"></th>
                            <th data-field="nama_penghargaan" class="danger">Nama Penghargaan</th>
                            <th data-field="keterangan" class="info">Keterangan</th>
                            <th data-field="action" class="info">Hapus</th>
                        </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseFive">
                        Informasi Keahlian
                    </a>
                </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Nama Keahlian</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="nama_keahlian" placeholder="Nama Keahlian" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Nilai (10-100)</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Nilai" id="nilai_keahlian"/>
                        </div>

                    </div>


                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="datakeahlian">
                            <strong>Tambah  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></strong>
                        </button>
                    </div>
                    <br><br>

                    <table id="tablekeahlian"
                           data-toggle="table"
                           data-toolbar="#toolbar"
                           data-height="230"
                           data-pagination="true"
                           data-click-to-select="true"
                           data-url="Json/data-keahlian.php?no_ktp=<?php echo $user_id ?>"
                           data-unique-id="id">
                        <thead>
                        <tr>

                            <th data-field="" data-checkbox="true"></th>
                            <th data-field="nama_keahlian" class="danger">Nama Keahlian</th>
                            <th data-field="nilai" class="info">Nilai</th>
                            <th data-field="action" class="info">Hapus</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseFive">
                        Informasi Riwayat Pekerjaan
                    </a>
                </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Nama Perusahaan</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Tahun Masuk</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Tahun Masuk" id="tahun_masukkerja" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Tahun Keluar</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Tahun Keluar" id="tahun_keluarkerja" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Jabatan Terakhir</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Jabatan Terakhir" id="jabatan" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Informasi Gaji</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Informasi Gaji" id="gaji" />
                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Alasan Berenti</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Alasan Berenti" id="alasan_berhenti" />
                        </div>

                    </div>

                    <div class="col-md-8">

                        <div class="form-group">
                            <label class="control-label">Deksripsi Pekerjaan</label>
                            <textarea placeholder="Deskrpsi Pekerjaan" class="form-control" autocomplete="off" id="keterangan_pekerjaan"></textarea>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="datapekerjaan">
                            <strong>Tambah  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></strong>
                        </button>
                    </div>
                    <br><br>

                    <table id="tablepekerjaan"
                           data-toggle="table"
                           data-toolbar="#toolbar"
                           data-height="230"
                           data-pagination="true"
                           data-click-to-select="true"
                           data-url="Json/data-pekerjaan.php?no_ktp=<?php echo $user_id ?>"
                           data-unique-id="id">
                        <thead>
                        <tr>

                            <th data-field="" data-checkbox="true"></th>
                            <th data-field="nama_perusahaan" class="danger">Nama Perusahaan</th>
                            <th data-field="tahun_masuk" class="info">Tahun Masuk</th>
                            <th data-field="tahun_keluar" class="success">Tahun Keluar</th>
                            <th data-field="jabatan" class="warning">Jabatan</th>
                            <th data-field="gaji" class="warning">Gaji</th>
                            <th data-field="alasan_berhenti" class="warning">Alasan Berenti</th>
                            <th data-field="keterangan" class="warning">Keterangan</th>
                            <th data-field="action" class="warning">Hapus</th>
                        </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>

        <div class="panel panel-success">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false" aria-controls="collapseTen">
                        Informasi Referensi
                    </a>
                </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Nama Lengkap</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" id="nama_lengkap_referensi" placeholder="Nama Lengkap" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <input maxlength="100" autocomplete="off" type="text" required="required" class="form-control" placeholder="Jabatan" id="jabatan_referensi" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">No.Handphone</label>
                            <input maxlength="100" type="text" required="required" class="form-control" autocomplete="off" placeholder="No.Handphone" id="nomor_hpreferensi" />
                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label class="control-label">Hubungan</label>
                            <input maxlength="100" type="text" required="required" class="form-control" autocomplete="off" placeholder="Hubungan" id="hubungan_referensi" />
                        </div>

                    </div>

                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" id="datareferensi">
                            <strong>Tambah  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></strong>
                        </button>
                    </div>
                    <br><br>


                    <table id="tablereferensi"
                           data-toggle="table"
                           data-toolbar="#toolbar"
                           data-height="230"
                           data-pagination="true"
                           data-click-to-select="true"
                           data-url="Json/data-referensi.php?no_ktp=<?php echo $user_id ?>"
                           data-unique-id="id">
                        <thead>
                        <tr>

                            <th data-field="" data-checkbox="true"></th>
                            <th data-field="nama_lengkap" class="danger">Nama Lengkap</th>
                            <th data-field="jabatan" class="info">Jabatan</th>
                            <th data-field="nomor_hp" class="success">No.handphone</th>
                            <th data-field="hubungan" class="warning">Hubungan</th>
                            <th data-field="action" class="warning">Hapus</th>
                        </tr>
                        </thead>
                    </table>


                </div>
            </div>
        </div>
        
        
          <div class="panel panel-success">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseUpdateFileLamaran" aria-expanded="false" aria-controls="collapseTwo">
                    Update File Lamaran Pekerjaan
                </a>
            </h4>
        </div>

        <div id="collapseUpdateFileLamaran" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">

             
            <div class="col-md-12">
          

           <h3>
            <strong>Update File Lamaran Pekerjaan</strong>
            </h3>
            <br>

            <form action="prosesupdatefile.php" method="post" enctype="multipart/form-data" id="MyUpdateFileForm">


            <div class="col-md-4">

           <div class="form-group">
            <label class="control-label">Name File</label>
            <!--command-->
           <input type="text" autocomplete="off" required="required" class="form-control" name="type_file" placeholder="Name File" />
          </div>

          </div>

           <div class="col-md-4">

           <div class="form-group">
            <label class="control-label">Pilih File</label>
            <div>
            <label class="btn btn-primary">
                Choose File <input type="file" id="FileInput" name="FileInput" required="required" class="form-control" style="display: none;">
            </label>
          </div>

          </div>

          </div>



          <div class="col-md-4">
          <button type="submit" class="btn btn-primary" id="submit-btn" value="Upload">
          <strong>Upload</strong>
          </button>   
          <br><br>
          </div>

          </form>

          <div class="col-md-12">

          <div id="progressbox" ><div id="progressbar"></div ><div id="statustxt">0%</div></div>
          
          <div id="output"></div>

          <img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
          <blockquote>
            <p>Perhatian !<br>
              * upload cv,lamaran pekerjan, dll <br>
              * harap upload data untuk jenis file pdf.<br>
              * ukuran file yang di upload max 2MB<br>
              * Jika ingin melakukan update file cek kembali dilist, jika sudah ada lakukan penghapusan terlebih dahulu sebelum melakukan update file</p>
          </blockquote>
          </div>
          <table id="tableuploadfile"
               data-toggle="table"
               data-toolbar="#toolbar"
               data-height="230"
               data-pagination="true"
               data-click-to-select="true"
               data-url="Json/data-uploadfile.php?no_ktp=<?php echo $user_id ?>"
         data-unique-id="id">
            <thead>

            <tr>

                <th data-field="" data-checkbox="true"></th>          
        <th data-field="nama_file" class="danger">Nama File</th>
        <th data-field="type_file" class="success">Type File</th>
                <th data-field="paths" class="info">Path</th>
                  <th data-field="action" class="info">Hapus</th>
            </thead>
        </table>
        <br>
   




            </div>
        </div>
    </div>



        <!-- Modal Penyakit -->
        <div id="modalpenyakit" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Penyakit</h4>
                    </div>

                    <div class="modal-body">

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Nama Penyakit:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_namapenyakit" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Status:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_status">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button onclick="updatepenyakit()" class="btn btn-default">Update</button>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>





        <!-- Modal Keluarga -->
        <div id="modalkeluarga" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data Keluarga</h4>
                    </div>

                    <div class="modal-body">

                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">Nama Lengkap:</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Nama Lengkap" class="form-control" id="edit_namalengkap" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Status Keluarga:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="edit_statuskeluarga" placeholder="Status Keluarga">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">No. Handphone:</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="No. Handphone" class="form-control" id="edit_nohandphone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Tempat Lahir:</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Tempat Lahir" class="form-control" id="edit_tempatlahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Tanggal Lahir:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tanggal Lahir" id="edit_tanggallahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Pendidikan Terakhir:</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Pendidikan Terakhir" class="form-control" id="edit_pendidikanterakhir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Pekerjaan:</label>
                                <div class="col-sm-10">
                                    <input type="text" placeholder="Pekerjaan" class="form-control" id="edit_pekerjaan">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="pwd">Jenis Kelamin:</label>
                                <div class="col-sm-10">
                                    <input type="radio" name="jenis_kelamin" id="edit_jeniskelamin" value="L"> <strong>Laki-Laki</strong>
                                    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P"> <strong>Perempuan</strong><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button onclick="updatekeluarga()" class="btn btn-default">Update</button>
                                </div>
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>