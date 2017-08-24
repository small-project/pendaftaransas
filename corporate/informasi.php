<style type="text/stylesheet">
  .user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
</style>

<div class="row">
   <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
      <A href="" >Edit Profile</A>
      <br>
      <p class=" text-info">May 05,2014,03:00 pm </p>
   </div>
   <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >
      <div class="panel panel-info">
         <div class="panel-heading">
            <h3 class="panel-title" style="text-transform: uppercase;"><?=$info['nama_perusahaan']?></h3>
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNWUxNDVhZmJhMCB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ZTE0NWFmYmEwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-circle img-responsive"> </div>
               <!-- <div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                  </div> -->
               <div class=" col-md-9 col-lg-9 ">
                  <table class="table table-user-information">
                     <tbody>
                        <tr>
                           <td>Bidang:</td>
                           <td><?=$info['bidang_perusahaan']?></td>
                        </tr>
                        <tr>
                           <td>Tanggal Bergabung: </td>
                           <td><?=$info['create_date']?></td>
                        </tr>
                        <tr>
                           <td>Nomor NPWP:</td>
                           <td><?=$info['nomor_NPWP']?></td>
                        </tr>
                        <tr>
                        <tr>
                           <td>Nomor SIUP:</td>
                           <td><?=$info['nomor_SIUP']?></td>
                        </tr>
                        <tr>
                           <td>Alamat Kantor:</td>
                           <td><?=$info['alamat']?>, <?=$info['kelurahan']?>, <?=$info['kecamatan']?>, <?=$info['kota']?></td>
                        </tr>
                        <tr>
                           <td>Email:</td>
                           <td><a href="mailto:<?=$info['email']?>"><?=$info['email']?></a></td>
                        </tr>
                        <tr>
                           <td>Website:</td>
                           <td><?=$info['website']?></td>
                        </tr>
                        <td>Phone:</td>
                        <td><?=$info['nomor_telp']?> (Phone)<br><?=$info['nomor_hp']?> (Mobile)<br><?=$info['nomor_fax']?> (FAX)
                        </td>
                        </tr>
                     </tbody>
                  </table>
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
               </div>
            </div>
         </div>
         <div class="panel-footer">
            <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
            <span class="pull-right">
            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
            </span>
         </div>
      </div>
   </div>
</div>