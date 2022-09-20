<input type="hidden" name="id" value="{{ $edit->id }}">
<input type="hidden" name="gambarLama" value="{{ $edit->image }}">
<div class="form-group">
    <label for="judul"> Judul </label>
    <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" value="{{ $edit->judul }}">
</div>
<div class="form-group">
    <label for="deskripsi"> Deskripsi </label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" placeholder="Masukkan Deskripsi">{{ $edit->deskripsi }}</textarea>
</div>
<div class="form-group">
    <label for="image_new"> Gambar </label>
    @if (empty($edit->image))

    @else
    <img src="{{ url('/storage/'.$edit->image) }}" class="img-fluid gambar-preview-new mb-3" id="tampilGambar">
    @endif
    <input type="file" class="form-control" name="image_new" id="image_new" onchange="previewImageNew()">
</div>

<script type="text/javascript">
    function previewImageNew() {
        const image = document.querySelector("#image_new");
        const imgPreview = document.querySelector(".gambar-preview-new");
        imgPreview.style.display = "block";
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
            $("#tampilGambar").addClass('mb-3');
            $("#tampilGambar").width("100%");
            $("#tampilGambar").height("300");
        }
    }
</script>
