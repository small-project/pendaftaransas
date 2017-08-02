
    <div class="row setup-content" id="step-3">
          <div class="col-xs-8 col-md-offset-2 well">
        
        <div class="col-md-12">
              
              <h3>
                <strong>Riwayat Pendidikan</strong>
                </h3>
                <br>

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
        <br>

      <h3>
        <strong>Riwayat Kursus</strong>
          </h3>
          <br>


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
        <br>

      <h3>
        <strong>Riwayat Penghargaan</strong>
        </h3>
        </br>


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
    <br>


    <h3>
      <strong>Bahasa Asing</strong>
      </h3>
      <br>


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
    <br>


    <h3>
      <strong>Keahlian</strong>
      </h3>
      <br>


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
        <br>

              <button class="btn btn-info nextBtn btn-lg pull-right" type="button"><strong>Next Referensi <i class="fa fa-arrow-right" aria-hidden="true"></i>
</strong></button>

            </div>
      
      </div>
        </div>