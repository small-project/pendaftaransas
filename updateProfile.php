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
		':depan'	=> $nama_depan,
		':belakang'	=> $nama_belakang,
		':hp'		=> $hp,
		':telp'		=> $telp,
		':suku'		=> $suku,
		':agama'	=> $agama,
		':status'	=> $status,
		':tinggi'	=> $tinggi,
		':berat'	=> $berat,
		':npwp'		=> $npwp,
		':bpjs'		=> $bpjs,
		':nomorSim'	=> $nomor_sim,
		':jenisSim'	=> $jenis,
		':tmpt'		=> $tmpt,
		':alamat'	=> $alamat,
		':kel'		=> $kelurahan,
		':kec'		=> $kecamatan,
		':kota'		=> $kota,
		':ktp'		=> $ktp
		));
	if ($stmt) {
		# code...
		echo "<script>
alert('Update Success!');
window.location.href='/SAS/pendaftaran/';
</script>";
	} else{
		echo "Gagal";
	}

	}

?>

      <style type="text/css" rel="stylesheet">
            .panel-primary > .panel-heading {
                  color: #fff;
                  background-color: #337ab7;
            border-color: #337ab7;
            }
            .panel-title > a:hover{
                  text-decoration: none;
            }

            .panel-title > a:focus{
                  text-decoration: none;
            }
      </style>

<div class="" style="padding-left: 15px; padding-right: 15px;">
   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
               <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
               Informasi Personal
               </a>
            </h4>
         </div>
         <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
               <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="txt_namaDepan" placeholder="nama depan" required>
                        </div>
                        <div class="col-sm-6">
                           <input type="text" class="form-control" name="txt_namaBelakang" placeholder="nama belakang" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-12">
                           <textarea class="form-control" name="txt_alamat" placeholder="nama jalan, rt/rw" rows="3" required></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_kelurahan" placeholder="kelurahan" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_kecamatan" placeholder="kecamatan" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_kota" placeholder="kota" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_mobile" placeholder="No. Handphone" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_rumah" placeholder="No. Telp Rumah" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_statusRumah" placeholder="Status Tempat Tinggal" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_tempatLahir" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_tanggal" placeholder="Tanggal Lahir" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_namaSuku" placeholder="Nama Suku" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_agama" placeholder="Agama" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_tinggiBadan" placeholder="Tinggi Badan (cm)" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_beratBadan" placeholder="Berat Badan (kg)" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <select class="form-control" name="txt_status">
                              <option value="0">Status</option>
                              <option value="lajang">Lajang</option>
                              <option value="menikah">Menikah</option>
                              <option value="duda">Duda</option>
                              <option value="janda">Janda</option>
                           </select>
                        </div>
                        <div class="col-sm-4">
                           <select class="form-control" name="txt_jenisKelamin">
                              <option value="0">Jenis Kelamin</option>
                              <option value="L">Laki - Laki</option>
                              <option value="P">Perempuan</option>
                           </select>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_beratBadan" placeholder="Berat Badan (kg)" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <select class="form-control" name="txt_typeSIM">
                              <option value="0">Type SIM</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                              <option value="B1">B1</option>
                              <option value="B1">B1</option>
                              <option value="D">D</option>
                           </select>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_nomorSim" placeholder="Nomor SIM" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="number" class="form-control" name="txt_nomorBPJS" placeholder="nomor BPJS" required>
                        </div>
                        <div class="col-sm-4">
                           <input type="number" class="form-control" name="txt_nomorNPWP" placeholder="nomor NPWP" required>
                        </div>
                        <div class="col-sm-4">
                           <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
               Informasi Penyakit
               </a>
            </h4>
         </div>
         <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
               <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_namaPenyakit" placeholder="nama penyakit" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_keteranganPenyakit" placeholder="keterangan" required>
                        </div>
                        <div class="col-sm-4">        
                           <button class="btn btn-block btn-primary" role="button" >Tambah</button>
                        </div>
                     </div>
                  </form>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Nama Penyakit</th>
                        <th class="danger">Status</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               Informasi Keluarga
               </a>
            </h4>
         </div>
         <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_namaLengkap" placeholder="nama lengkap" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_statusKeluarga" placeholder="status keluarga" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_nomorHP" placeholder="nomor handphone" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_tempatLahirKeluarga" placeholder="tempat lahir" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" id="tanggalLahir" class="form-control" name="txt_tanggaLahir" placeholder="tanggal lahir" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" id="pendidikanterakhir" class="form-control" name="txt_pendidikanTerakhir" placeholder="pendidikan terakhir" required>
                        </div>
                     </div>
                  </form>
                  <br/>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Nama Lengkap</th>
                        <th class="danger">Status Keluarga</th>
                        <th class="danger">Jenis Kelamin</th>
                        <th class="danger">Pendidikan</th>
                        <th class="danger">Pekerjaan</th>
                        <th class="danger">Handphone</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingFour">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
               Informasi Pendidikan
               </a>
            </h4>
         </div>
         <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <select class="form-control" name="txt_tingkatPendidikan">
                              <option value="0">Tingkat Pendidikan</option>
                              <option value="SD">SD</option>
                              <option value="SMP">SMP</option>
                              <option value="SMA/SMK">SMA Sederatajat</option>
                              <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                           </select>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_namaBadanPendidikan" placeholder="nama badan pendidikan" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_jurusanPendidikan" placeholder="jurusan" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="number" class="form-control" name="txt_tahunMasuk" placeholder="tahun masuk" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_tahunLulus" placeholder="tahun lulus" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_nilaiRata" placeholder="nilai rata-rata" required>
                        </div>
                     </div>
                  </form>
                  <br/>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Tingkat Pendidikan</th>
                        <th class="danger">Nama Badan</th>
                        <th class="danger">Jurusan</th>
                        <th class="danger">Tahun Masuk</th>
                        <th class="danger">Tahun Keluar</th>
                        <th class="danger">Nilai Rata"</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingFive">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
               Informasi Pendidikan non Formal (Kursus)
               </a>
            </h4>
         </div>
         <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_namaBidangKursus" placeholder="nama bidang kursus" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_bidangPenyelenggara" placeholder="bidang penyelenggara" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_tahunMasukKursus" placeholder="tahun masuk" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="number" class="form-control" name="txt_tahunLulusKursus" placeholder="tahun lulus" required>
                        </div>
                        <div class="col-sm-4">        
                           <button class="btn btn-block btn-primary" role="button" type="submit" >Tambah</button>
                        </div>
                        <div class="col-sm-4">
                        </div>
                     </div>
                  </form>
                  <br/>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Nama Bidang</th>
                        <th class="danger">Badan Penyelenggara</th>
                        <th class="danger">Tahun Masuk</th>
                        <th class="danger">Tahun Keluar</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingSix">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
               Informasi Bahasa Asing <small style="color: #ebebeb;">yang dikuasai.</small>
               </a>
            </h4>
         </div>
         <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_namaBahasa" placeholder="nama Bahasa" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_nilaiWriting" placeholder="Writing" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_nilaiListening" placeholder="Listening" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="number" class="form-control" name="txt_nilaiSpeaking" placeholder="Speaking" required>
                        </div>
                        <div class="col-sm-4">        
                           <button class="btn btn-block btn-primary" role="button" type="submit" >Tambah</button>
                        </div>
                        <div class="col-sm-4">
                        </div>
                     </div>
                  </form>
                  <br/>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Nama Bahasa</th>
                        <th class="danger">Writing</th>
                        <th class="danger">Listening</th>
                        <th class="danger">Speaking</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingSeven">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
               Informasi Penghargaan
               </a>
            </h4>
         </div>
         <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_namaPenghargaan" placeholder="nama penghargaan" required>
                        </div>
                        <div class="col-sm-8">        
                           <textarea class="form-control" name="txt_keteranganPenghargaan" placeholder="penghargaan" rows="3" required></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-4">        
                           <button class="btn btn-block btn-primary" role="button" type="submit" >Tambah</button>
                        </div>
                        <div class="col-sm-4">
                        </div>
                     </div>
                  </form>
                  <br/>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Nama Penghargaan</th>
                        <th class="danger">Keterangan</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingEight">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
               Informasi Keahlian
               </a>
            </h4>
         </div>
         <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_namaKeahlian" placeholder="nama keahlian" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_nilaiKeahlian" placeholder="nilai" required>
                        </div>
                        <div class="col-sm-4">        
                           <button class="btn btn-block btn-primary" role="button" type="submit" >Tambah</button>
                        </div>
                     </div>
                  </form>
                  <br/>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Nama Keahlian</th>
                        <th class="danger">Nilai</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingNine">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
               Informasi Riwayat Pekerjaan
               </a>
            </h4>
         </div>
         <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_namaPerusahaan" placeholder="nama perusahaan" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_tahunMasukPekerjaan" placeholder="tahun masuk" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_tahunKeluarPekerjaan" placeholder="tahun masuk" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_jabatanTerakhir" placeholder="jabatan terakhir" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_gajian" placeholder="informasi gaji" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="text" class="form-control" name="txt_alasanBerhenti" placeholder="alasan berhenti" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-8">
                           <textarea class="form-control" name="txt_deskripsiPekerjaan" placeholder="Deskripsi Pekerjaan" rows="3" required></textarea>
                        </div>
                        <div class="col-sm-4">        
                           <button class="btn btn-block btn-primary" role="button" type="submit" >Tambah</button>
                        </div>
                     </div>
                  </form>
                  <br/>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Nama Perusahaan</th>
                        <th class="danger">Tahun Masuk</th>
                        <th class="danger">Tahun Keluar</th>
                        <th class="danger">Jabatan</th>
                        <th class="danger">Gaji</th>
                        <th class="danger">Alasan Berhenti</th>
                        <th class="danger">Keterangan</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingTen">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
               Informasi Referensi
               </a>
            </h4>
         </div>
         <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_namaLengkapReferensi" placeholder="nama lengkap" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_jabatanReferensi" placeholder="jabatan" required>
                        </div>
                        <div class="col-sm-4">        
                           <input type="number" class="form-control" name="txt_nomorMobile" placeholder="nomor handphone" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_hubungan" placeholder="hubungan" required>
                        </div>
                        <div class="col-sm-4">        
                           <button class="btn btn-block btn-primary" role="button" type="submit" >Tambah</button>
                        </div>
                     </div>
                  </form>
                  <br/>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Nama Lengkap</th>
                        <th class="danger">Jabatan</th>
                        <th class="danger">Nomor Handphone</th>
                        <th class="danger">Hubungan</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>
      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingEleven">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
               Upload File
               </a>
            </h4>
         </div>
         <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-4">
                           <input type="text" class="form-control" name="txt_namaFile" placeholder="nama file" required>
                        </div>
                        <div class="col-sm-4">        
                           <button class="btn btn-block btn-primary" role="button" type="submit" >Upload</button>
                        </div>
                        <div class="col-sm-4">        
                           
                        </div>
                     </div>
                  </form>
                  <br/>
                  <table class="table table-bordered">
                     <thead class="success">
                        <th class="danger">Nama File</th>
                        <th class="danger">Type File</th>
                        <th class="danger">Path</th>
                        <th class="danger">#</th>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
            </div>
         </div>
      </div>

      <div class="panel panel-primary">
         <div class="panel-heading" role="tab" id="headingTwelve">
            <h4 class="panel-title">
               <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
               Persetujuan
               </a>
            </h4>
         </div>
         <div id="collapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwelve">
            <div class="panel-body">
                  <form class="form-horizontal" method="post" action="#" data-toggle="validator">
                     <div class="form-group">
                        <div class="col-sm-12">
                           <textarea class="form-control" name="txt_kepribadian" placeholder="Jelaskan Tentang Kepribadian Anda" rows="3" required></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-12">        
                           <textarea class="form-control" name="txt_alasan" placeholder="Jelaskan Alasan Perusahaan Harus Menghire Anda" rows="3" required></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-sm-12">
                           <input type="checkbox" name="txt_persetujuan">*Please Check This
                        </div>
                        <div class="col-sm-12">
                           <p>Dengan ini saya menyatakan bahwa data yang diinput pada form pendaftaran ini benar. Saya bertanggung jawab atas informasi yang telah saya input. Data ini bisa dipergunakan untuk kepentingan perusahaan.</p>
                        </div>
                     </div>
                  </form>
                  <br/>
                  <div class="row col-sm-3 col-sm-offset-9">
                     <button class="btn btn-block btn-primary" role="button" type="submit">Simpan</button>
                  </div>
            </div>
         </div>
      </div>

      
   </div>
</div>