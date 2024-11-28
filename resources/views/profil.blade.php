<!-- INDEX ADMIN -->

@include('layouts.header')
<!-- Header -->
<style>
#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 12px 8px 12px 8px;
  font-size: 12px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #dd3343;
  color: white;
}

.btn:not(:last-child) {
    margin-right: .2rem;
}

td {
    white-space: nowrap;
  }
</style>
<div class="header bg-survey pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="header-body">      
      <div class="row">
        <div class="col-12">
          <div style="font-size: 24px;font-weight: bold;color: white;">
            Biodata Profile
          </div>
          <div style="font-size: 12px;color: white;">
            List data Profil Lengkap Saya.
          </div>        
            <hr>
        </div>
        <div class="card card-shadow" style="border-radius: 15px;">
            <div class="container-fluid pt-3 pt-md-3">
            <div class="row">
                <div class="col-8 pt-3 pt-md-3">
                    <img src="/assets/gambar/{{$user->gambar}}" style="border-radius:10px">
                    <hr>
                    <h2>Nama : <b>{{$user->name}}</b></h2>
                    <hr>
                    <h2>Posisi : <b>{{$user->posisi}}</b></h2>
                </div>
            </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('layouts.footer') 


