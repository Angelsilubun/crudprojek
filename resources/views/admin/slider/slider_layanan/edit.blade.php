<input type="hidden" name="id" value="{{ $edit->id }}">
    <div class="input-group mb-3">
        <label for="gambar">Upload</label>
        <input type="file" class="form-control" id="gambar" value="{{ $edit->gambar }}">
    </div>
    <div class="form-group">
        <label for="judul"> Judul </label>
        <input type="text" class="form-control" name="judul" id="judul" value="{{ $edit->judul }}">
    </div>
    <div class="form-group">
        <label for="deskripsi"> deskripsi </label>
        <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="{{ $edit->deskripsi }}">
    </div>
