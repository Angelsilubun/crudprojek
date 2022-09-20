@extends("admin.layouts.app")

@section("title", "Slider Layanan")

@section("content")

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="card-title">
                Slider Layanan
            </h4>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-block">
                    <h6 class="card-title text-bold">
                        <i class="fa fa-plus"></i> Tambah Data
                    </h6>
                    <hr>
                    <form action="{{ url('/admin/slider/slider_layanan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Upload gambar</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="deskripsi">
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-times"></i> Batal
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-block">
                    <h6 class="card-title text-bold">
                        <i class="fa fa-bars"></i> Data @yield("title")
                    </h6>
                    <hr>
                    <table class="display table table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 0
                            @endphp
                            @foreach ($sliderlayanan as $dataslid)
                                <tr>
                                    <td class="text-center">{{ ++$no }}</td>
                                    {{-- <td><img src="{{url('/storage/' .$dataslid->gambar)}}" style="width:50px;"></td> --}}
                                    <td>
                                        {{-- <img src="{{ Storage::url('public/app/slider/') .$dataslid->gambar }}" alt="" class="rounded" style="width: 80px"> --}}
                                        <img src="{{ Storage::url('public/app/slider/').$dataslid->gambar }}" class="rounded" style="width: 150px">
                                    </td>
                                    <td>{{ $dataslid->judul }}</td>
                                    <td>{{ $dataslid->deskripsi}}</td>
                                    <td class="text-center">
                                        <button onclick="editKategori({{$dataslid->id}})" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalEdit">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-edit"></i> Edit Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/admin/slider/slider_layanan/simpan') }}" method="POST" enctype="multipart/form-data">
                @method("PUT")
                {{ csrf_field() }}
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

@endsection

@section("js")

<script type="text/javascript">
    function editKategori(id) {
        $.ajax({
            url: "{{ url('/admin/slider/slider_layanan/edit') }}",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }
</script>

@endsection
