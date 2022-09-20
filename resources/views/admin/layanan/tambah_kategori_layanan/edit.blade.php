<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="gambarLama" value="{{ $edit->gambar }}">
<div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $edit->nama }}" required>
    @error('nama')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $edit->slug }}">
    @error('slug')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
