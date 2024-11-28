<!-- MODAL TAMBAH PRODUK -->
<div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default">Tambah Produk</h3>
                <hr>
            </div>

            <div class="modal-body" style="padding-bottom: 0px;padding-top: 0px;">
                <div class="row content">
                    <div class="col-12">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control isi" placeholder="Nama Produk" id="nama">
                        <br>
                        <label>Kategori</label>
                        <select class="form-control" id="kategori_id">
                            <option>==Pilih Kategori==</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <label>Harga Beli</label>
                        <input type="text" class="form-control isi" placeholder="Harga Beli" id="harga_beli">
                        <br>
                        <label>Harga Jual</label>
                        <input type="text" class="form-control isi" placeholder="Harga Jual" id="harga_jual">
                        <br>
                        <label>Stok</label>
                        <input type="text" class="form-control isi" placeholder="Stok" id="stok">
                        <br>
                        <div class="form-group" align="left" id="upload">
                          <label>Upload Gambar</label>
                          <div class="photos"></div>
                          <input class="imgs" type="hidden">
                          <div onclick="$('#uploadfoto').click();" class="card-body"
                              style="height: 100px;padding-top: 2.2rem;" align="center">
                          <button class="btn btn-warning btn-block">
                              <i style="font-size:30px;color: #c5c5c5;" class="fa fa-camera"></i>
                          </button>
                          </div>
                          <input id="uploadfoto" name="file" type="file" style="display:none;"/>
                      </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer tombol">
                <table width="100%">
                    <tr>
                        <td>
                            <button type="button" class="btn btn-secondary btn-block ml-auto"
                                data-dismiss="modal">Batal</button>
                        </td>
                        <td width="5%">
                            &nbsp;
                        </td>
                        <td>
                            <button type="button" onclick="SimpanKaryawan();"
                                class="btn btn-block btn-absen ml-auto menusxx">Simpan</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL HAPUS PRODUK -->

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="modal-title-default"> </h3>

            </div>

            <div class="modal-body" style="padding-bottom: 0px;padding-top: 0px;">
                <div class="row content">
                    <div class="col-12">
                        <div style="font-size: 18px; color: #1d8ee5;">
                            <b>DELETE PRODUK</b>
                        </div>
                        <div style="font-size: 12px;">
                            Anda Yakin akan Delete Produk ini?
                        </div>
                        <input type="hidden" id="iddel">
                    </div>
                </div>
            </div>

            <div class="modal-footer tombol">
                <table width="100%">
                    <tr>
                        <td>
                            <button type="button" class="btn btn-secondary btn-block ml-auto"
                                data-dismiss="modal">Tidak</button>
                        </td>
                        <td width="5%">
                            &nbsp;
                        </td>
                        <td>
                            <button type="button" onclick="YakinDelete()"
                                class="btn btn-block btn-absen ml-auto menusxx">Yakin</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

