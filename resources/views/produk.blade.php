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
            Data Produk
          </div>
          <div style="font-size: 12px;color: white;">
            List data Produk berisi data lengkap dari data-data Produk, dan mengubah data Produk.
          </div>
        </div>
          <div class="col-12">
            <button onclick="Tambah();" class="btn btn-secondary"><i class="fa fa-plus"></i> Tambah Produk</button>
            <a target="_blank" href="/produk/excel"><button class="btn btn-success"><i class="fa fa-download"></i> Cetak Excel</button></a>
          </div>
      </div>
      <hr>
    </div>
  </div>
</div>
<div class="container-fluid mt--9">
  <div class="row">
    <div class="col-xl-12">
      <div class="card shadow" style="padding: 1.5rem;">
        <div class="row">
          <div class="col-12">
              <label>Pilih Kategori :</label>
              <select class="form-control" id="kategori">
                  <option value="all"> All Produk</option>
                  @foreach ($kategori as $kat)
                      <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                  @endforeach
              </select>
          </div>
        </div>
        <hr>
        <div class="table-responsive">
          <!-- Projects table -->
          <table id="customers" class="datatables">
            <thead>
              <tr>
                <th>No ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Gambar</th>
                <th width="10%">Opsi</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@include('modal')
@include('layouts.footer') 
<script type="text/javascript">

var table = "";
        $(function() {

            table = $('.datatables').DataTable({
                pageLength: 50,
                processing: true,
                serverSide: true,
                columnDefs: [{
                    "targets": [3],
                    "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
                },
                {
                    "targets": [4],
                    "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
                },
                 ],
                order: [
                    [0, 'desc']
                ],
                ajax: {
                    url: "{{ route('produk.data') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    data: function(d) {
                        d.kategori = $('#kategori').val();
                    },
                    dataType: "json",
                    type: "GET",
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'kategori',
                        name: 'kategori'
                    },
                    {
                        data: 'harga_beli',
                        name: 'harga_beli'
                    },
                    {
                        data: 'harga_jual',
                        name: 'harga_jual'
                    },
                    {
                        data: 'stok',
                        name: 'stok'
                    },
                    { 
                    render: function ( data, type, row ) {
                      
                      return '<img class="file" width="100%" width="100%" src="/assets/gambar/'+row.gambar+'">';

                    }
                },
                    {
                        render: function(data, type, row) {

                            return '<button class="btn btn-danger btn-sm" onclick="Delete(' + row
                                .id +
                                ')"><i class="fa fa-trash"></i></button>';

                        }
                    }
                ]
            });
        });

function Tambah() {

            $('#new').modal('show');

        }

        function SimpanKaryawan() {

            var empty = false;
            $('input.isi, select.isi').each(function() {
                if ($(this).val() == '') {
                    empty = true;
                }
            });
            if (empty) {
                swal({
                    text: "Isian Tidak Boleh Kosong!",
                    icon: "error",
                    buttons: false,
                    timer: 2000,
                });

            } else {

                $.ajax({
                    type: 'POST',
                    url: "{{ route('produk.tambah') }}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'nama': $('#nama').val(),
                        'kategori_id': $('#kategori_id').val(),
                        'harga_beli': $('#harga_beli').val(),
                        'harga_jual': $('#harga_jual').val(),
                        'stok': $('#stok').val(),
                        'gambar': $('.imgs').val(),
                    },
                    success: function(data) {

                        $('#new').modal('hide');

                        swal({
                            title: "Success",
                            text: "Product Berhasil Tersimpan",
                            icon: "success",
                            buttons: false,
                            timer: 2000,
                        });

                        setTimeout(function() {
                            window.location.reload()
                        }, 1000);



                    }

                });

            }

        }

function Delete(id){

  $('#iddel').val(id);

  $('#delete').modal('show');

}

function YakinDelete(){

  $('#delete').modal('hide');

  var ids = $('#iddel').val();

  $.ajax({
    type: 'POST',
    url: "{{ route('produk.hapus') }}",
    data: {
      '_token': $('input[name=_token]').val(),
      'id': ids,
    },
    success: function(data) {

      swal({
          title: "Success",
          text: "Produk Berhasil di Delete!",
          icon: "success",
          buttons: false,
          timer: 2000,
      });

      table.ajax.reload();

    }

  });

}


$('#kategori').on('change', function() {

            table.ajax.reload();

        });


$("#uploadfoto").on("change", function() {

     $('.loading').attr('style','display: block');

    var formData = new FormData();
    formData.append('file', $('#uploadfoto')[0].files[0]);

    $.ajax({
        url: "{{ route('produk.upload') }}",
        method:"POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,

        success:function(data) {

           $('.loading').attr('style','display: none');

            if(data.status == '1'){

                $('.photos').html("<img width='100%' src='/assets/gambar/"+data.name+"'><hr>");
                $('.imgs').val(data.name);        

            } else {

                swal({
                    title: "Gagal!",
                    text: "Pastikan File yang Anda Upload Benar!",
                    icon: "error",
                    buttons: false,
                    timer: 2000,
                });

                
            }
        }
    });

  });


</script>


