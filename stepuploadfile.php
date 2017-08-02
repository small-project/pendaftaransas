  <div class="row setup-content" id="step-5">
          <div class="col-xs-8 col-md-offset-2 well">

        <div class="col-md-12">
          

           <h3>
            <strong>Upload File</strong>
            </h3>
            <br>

            <form action="processupload.php" method="post" enctype="multipart/form-data" id="MyUploadForm">


            <div class="col-md-4">

           <div class="form-group">
            <label class="control-label">Name File</label>
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
              * ukuran file yang di upload max 2MB</p>
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
   
     <div class="col-md-12">

           <div class="form-group">
           <textarea id="keperibadian" name="keperibadian" class="form-control" required="required" placeholder="Jelaskan Tentang Keperibadian anda"></textarea>
           <span></span>
          </div>

          </div>

           <div class="col-md-12">

           <div class="form-group">
           <textarea id="menghire" name="menghire" class="form-control" required="required" placeholder="Jelaskan Alasan Perusahaan Harus Menghire Anda"></textarea>
           <span></span>
          </div>

          </div>

        <label>
          <input type="checkbox" id="persetujuan" id="1" required="required"/> * Please Check This
        </label>
   

      <p>Dengan ini saya menyatakan bahwa data yang diinput pada form pendaftaran ini benar. Saya bertanggung jawab atas informasi yang telah saya input. Data ini bisa dipergunakan untuk kepentingan perusahaan</p>


              <button class="btn btn-success btn-lg pull-right" type="submit" id="finish"><strong>Simpan  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></strong></button>
          
            </div>
      
      </div>
        </div>
  


  </div>
    </div>
