<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formCreate" class="needs-validation" enctype="multipart/form-data" novalidate>
      {{ csrf_field() }}  {{ method_field('POST') }}
      <input type="hidden" id="id" name="id">
      <div class="modal-body">
        <div class="form-group">
          <label for="kategori_id">Kategori</label>
          <select class="form-control" name="kategori_id" id="kat" required>
            @foreach($kategori as $k)
              <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endforeach
          </select>
          <div class="valid-feedback" style="text-align: left;">
            Kategori Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Kategori Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-group">
          <label for="nama_umkm">Nama Umkm</label>
          <input type="text" class="form-control" name="nama_umkm" id="nama_umkm" placeholder="Masukan Nama Umkm" required>
          <div class="valid-feedback" style="text-align: left;">
            Nama Umkm Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Nama Umkm Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-group">
          <label for="nama_produk">Nama Produk</label>
          <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukan Nama Produk" required>
          <div class="valid-feedback" style="text-align: left;">
            Nama Produk Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Nama Produk Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-group">
          <label for="harga_produk">Harga Produk</label>
          <input type="text" class="form-control" name="harga_produk" id="harga_produk" placeholder="Masukan Harga Produk" required>
          <div class="valid-feedback" style="text-align: left;">
            Harga Produk Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Harga Produk Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-group">
          <label for="stok_produk">Stok Produk</label>
          <input type="text" class="form-control" name="stok_produk" id="stok_produk" placeholder="Masukan Stok Produk" required>
          <div class="valid-feedback" style="text-align: left;">
            Stok Produk Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Stok Produk Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-group">
          <label for="deskripsi_produk">Deskripsi Produk</label>
          <textarea class="form-control ckeditor" name="deskripsi_produk" id="deskripsi_produk" rows="3" placeholder="Masukan Deskripsi Produk" required></textarea>
          <div class="valid-feedback" style="text-align: left;">
            Deskripsi Produk Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Deskripsi Produk Tidak Boleh Kosong.
          </div>
        </div>
        <div class="form-group">
          <label for="gambar_produk">Gambar Produk</label>
          <input type="file" class="form-control-file" name="gambar_produk" id="gambar_produk">
          <div class="valid-feedback" style="text-align: left;">
            Gambar Produk Tidak Boleh Kosong.
        </div>
        <div class="invalid-feedback" style="text-align: left;">
            Gambar Produk Tidak Boleh Kosong.
          </div>
        </div>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" onclick="createPost()" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
  </div>
</div>