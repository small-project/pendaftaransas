 <div class="row setup-content" id="step-2">
          <div class="col-xs-8 col-md-offset-2 well">
        
        <div class="col-md-12">
     
              <h3>
                <strong>Keluarga</strong>
                </h3><br>
     
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
        </br><br><br>



              <button class="btn btn-info nextBtn btn-lg pull-right" type="button" ><strong>Next Pendidikan <i class="fa fa-arrow-right" aria-hidden="true"></i>
</strong></button>
            

            </div>
 
      </div>      
        </div>
   