<table id="customers" >
  <thead>
    <tr >
      <th>Nama Produk</th>
      <th>Kategori</th>
      <th>Harga Beli</th>
      <th>Harga Jual</th>
      <th>Stok</th>
      <th>Gambar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($product as $data)
    
    <tr>
      <td>{{ $data->name }}</td>
      <td>{{ $data->kategori }}</td>
      <td>{{ $data->harga_beli }}</td>
      <td>{{ $data->harga_jual }}</td>
      <td>{{ $data->stok }}</td>
      <td>{{ $data->gambar }}</td>
    </tr>

    @endforeach
  </tbody>
</table>