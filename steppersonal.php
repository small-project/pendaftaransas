<div id="FormPersonal">

    <div class="row setup-content" id="step-1">
          <div class="col-xs-8 col-md-offset-2 well">
        <div class="col-md-12">

              <h3>
                <strong>Personal</strong>
                </h3><br>

          <div class="col-md-4">
        
           <div class="form-group">
              <label class="control-label">Nama Depan</label>
              <input  maxlength="100" type="text" required="required" class="form-control personal" id="nama_depan" name="nama_depan" placeholder="Nama Depan" autocomplete="off"/>
              <span id=errornamadepan></span>
            </div>

          </div>

          <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Nama Belakang</label>
            <input maxlength="100" type="text" required="required" class="form-control" name="nama_belakang" id="nama_belakang" autocomplete="off" placeholder="Nama Belakang" />
          </div>

          </div>


          <div class="col-md-4">
          <div class="form-group">
          
          <div>
          <img src="icon/profile.png" id='defaultimg' width="160" height="160" class="img-circle">
          <img id='img' width="200" height="190" class="img-circle" style=display:none;><br><br>
          </div>

          <div id=uploadfile>
            <label class="btn btn-primary">
                Choose File <input type="file" id="imgInp" accept="image/*" capture="camera" class="form-control" style="display: none;">
            </label>
          </div>

          <button type="button" class="btn btn-danger" onclick="clearImage()" style=display:none; id="clear"><strong>Clear Image</strong></button>
          </div>
          </div>        

           <div class="col-md-12">

          <div class="form-group">
            <label class="control-label">Alamat Lengkap</label>
            <textarea required="required" class="form-control" placeholder="Nama Jalan, RT/RW" name="alamat_lengkap" id="alamat_lengkap" autocomplete="off" ></textarea>
          </div>
            
          </div>



          <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Kota</label>
           <input maxlength="100" type="text" required="required" class="form-control" id="kota" placeholder="Kota" autocomplete="off" name="kota" />
          </div>

          </div>

          <div class="col-md-4">
        
           <div class="form-group">
              <label class="control-label">Kecamatan</label>
              <input  maxlength="100" type="text" required="required" class="form-control" id="kecamatan" placeholder="Kecamatan" name="kecamatan"/>
            </div>

          </div>

          <div class="col-md-4">

              <div class="form-group">
            <label class="control-label">Kelurahan</label>
            <input maxlength="100" type="text" required="required" class="form-control" id="kelurahan" placeholder="Kelurahan" autocomplete="off" name="kelurahan"/>
          </div>

          </div>

        <div class="col-md-4">
        
           <div class="form-group">
              <label class="control-label">No. Handphone</label>
              <input  maxlength="100" type="text" required="required" class="form-control" id="nomor_hp" placeholder="No. Handphone" autocomplete="off" name="nomor_hp"/>
          </div>

          </div>

          <div class="col-md-4">

              <div class="form-group">
            <label class="control-label">No. Telp.Rumah</label>
            <input maxlength="100" type="text" required="required" class="form-control" id="nomor_telp" placeholder="No. Telp.Rumah" autocomplete="off" name="nomor_telp"/>
          </div>

          </div>


          <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Status Tempat Tinggal</label>
           <input maxlength="100" type="text" required="required" class="form-control" id="status_tempat_tinggal" placeholder="Status Tempat Tinggal" name="status_tempat_tinggal" autocomplete="off"/>
          </div>

          </div>

         <div class="col-md-4">
        
           <div class="form-group">
              <label class="control-label">Tempat Lahir</label>
              <input  maxlength="100" type="text" required="required" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" autocomplete="off"/>
            </div>

          </div>

          <div class="col-md-4">

              <div class="form-group">
            <label class="control-label">Tanggal Lahir</label>
            <input maxlength="100" type="text" required="required" class="form-control" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off" placeholder="Tanggal Lahir" />
          </div>

          </div>


          <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Nama Suku</label>
           <input maxlength="100" type="text" required="required" class="form-control" placeholder="Nama Suku" id="nama_suku" autocomplete="off" name="nama_suku"/>
          </div>

          </div>

           <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Agama</label>
           <input maxlength="100" type="text" required="required" class="form-control" placeholder="Agama" id="agama" autocomplete="off" name="agama"/>
          </div>

          </div>


           <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Tinggi Badan (Cm)</label>
           <input maxlength="100" type="text" required="required" class="form-control" placeholder="Tinggi Badan" id="tinggi_badan" autocomplete="off" name="tinggi_badan"/>
          </div>

          </div>

           <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Berat Badan (Kg)</label>
           <input maxlength="100" type="text" required="required" class="form-control" placeholder="Berat Badan" id="berat_badan" autocomplete="off" name="berat_badan"/>
          </div>

          </div>

      

           <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Nomor Sim</label>
           <input maxlength="100" type="text" required="required" class="form-control" id="nomor_sim" name="nomor_sim" placeholder="Nomor SIM" />
           <br>

           <div class="form-group">
           <label>Type Sim </label>
           <br>
           <input type="radio" name="type_sim" id="type_sim" value="A"> <strong>A</strong>
           <input type="radio" name="type_sim" id="type_sim" value="B"> <strong>B</strong>
           <input type="radio" name="type_sim" id="type_sim" value="C"> <strong>C</strong>
           <input type="radio" name="type_sim" id="type_sim" value="B1"> <strong>B1</strong>
           <input type="radio" name="type_sim" id="type_sim" value="B2"> <strong>B2</strong>
           <input type="radio" name="type_sim" id="type_sim" value="D"> <strong>D</strong>
           </div>

          </div>

          </div>

          <div class="col-md-4">

            <div class="form-group">
          
            <label class="control-label">Status</label>
            <br>
           <input type="radio" name="statuspersonal" id="statuspersonal" value="lajang"> <strong>Lajang</strong>
           <input type="radio" name="statuspersonal" id="statuspersonal" value="Menikah"> <strong>Menikah</strong><br>
           <input type="radio" name="statuspersonal" id="statuspersonal" value="Duda"> <strong>Duda</strong>
           <input type="radio" name="statuspersonal" id="statuspersonal" value="Janda"> <strong>Janda</strong>
          
          </div>

          </div>

          <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Jenis Kelamin</label>
            <br>
           <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L"> <strong>Laki-Laki</strong>
           <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P"> <strong>Perempuan</strong><br>

          <br><br>
          </div>

          </div>

          <div class="col-md-12">

           <div class="form-group">
            <label class="control-label">Hobi</label>
           <textarea name="hobi" id="hobi" class="form-control" placeholder="#hastags" required></textarea>
          </div>

          </div>

          <div class="col-md-4">

          </div>
          </div>

           <h3>
    <strong>Informasi Penyakit</strong>
    </h3>
    <br>

          <div class="col-md-4">

          <div class="form-group">
            <label class="control-label">Nama Penyakit</label>
           <input maxlength="100" type="text" class="form-control textbox" id='nama_penyakit' autocomplete="off" placeholder="Nama Penyakit" />
          </div>

          </div>

           <div class="col-md-4">

           <div class="form-group">
            <label class="control-label">Kaeterangan</label>
           <input type="text" autocomplete="off" class="form-control textbox" placeholder="Keterangan" id="status_penyakit"/>
          </div>

          </div>

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

            <div class="col-md-12">
              <button class="btn btn-info nextBtn btn-lg pull-right" type="submit" id="onesteps" disabled="on"><strong>Next Keluarga <i class="fa fa-arrow-right" aria-hidden="true"></i>
</strong></button>
              </div>

            </div>
      </div>