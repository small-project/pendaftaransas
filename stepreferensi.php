
           <div class="row setup-content" id="step-4">
          <div class="col-xs-8 col-md-offset-2 well">
        
        <div class="col-md-12">

              <h3>
              <strong>Riwayat Pekerjaan</strong>
                </h3>
                <br>

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
    <br>


      <h3>
        <strong>Referensi</strong>
        </h3>
        <br>


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
        <br>
        
             <button class="btn btn-info nextBtn btn-lg pull-right" type="button"><strong>Next Upload  <i class="fa fa-arrow-right" aria-hidden="true"></i>
</strong></button>
           
            </div>
      
      </div>
        </div>
