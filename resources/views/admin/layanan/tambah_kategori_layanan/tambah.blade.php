@extends('Layoutsadmin.adminlayout')
@section('content')
<section class="home-section">
    <div class="main">
        <div class="topbar">
            <div class="home-content">
                <i class='bx bx-menu'></i>
            </div>
            <div class="cardHeader-title">
                <h2>Kategori</h2>
            </div>
        </div>
        <div class="details1 ">
            <div class="recentOrders">
                <div class="cardHeader" >
                    <h4>Kategori Baru</h4>
                    <a href="#" class="btn btn-thema"data-bs-toggle="modal" data-bs-target="#exampleModalTambah" class="btn btn-primary fw-bold rounded-pill px-4 shadow float-end">Tambah</a>
                </div>
                <br>
                @if (session('berhasil'))
                <div class="alert alert-success">
                    {{ session('berhasil') }}
                </div>
                @endif
                <table>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Kategori</td>
                            <td>Slug</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $kategori)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $kategori->nama }}</td>
                            <td>{{ $kategori->slug }}</td>
                            <td class="td" style="size: 30px;">
                                <button onclick="editKategori({{$kategori->id}})" class="btnedit" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" class="btn btn-primary fw-bold rounded-pill px-4 shadow float-end">
                                    <i class='bx bx-edit'></i>
                                </button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalHapus{{ $kategori->id }}" class="btn btn-danger btn-sm fw-bold px-4">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @foreach ($kategori as $item)
    <div class="modal fade" id="exampleModalHapus{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width:45%">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h3 class="modal-title" id="exampleModalLabel">
                        Hapus Data
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/kategori/'.$item->id) }}" method="POST">
                    @method("DELETE")
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal-content-hapus">
                        Apakah Yakin Untuk Menghapus Data Ini?
                    </div>
                    <div class="modal-footer d-md-block">
                        <button type="submit" class="btn btn-primary btn-sm">Hapus</button>
                        <button type="button" class="btn btn-danger btn-sm">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal Create -->
    <div class="modal fade" id="exampleModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 50%">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h3 class="modal-title" id="exampleModalLabel">Tambah Kategori</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('/kategori') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required>
                            @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required>
                            @error('slug')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer d-md-block">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <button type="button" class="btn btn-danger btn-sm">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width:45%">
            <div class="modal-content">
                <div class="modal-header hader">
                    <h3 class="modal-title" id="exampleModalLabel">Edit Kategori</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/kategori/simpan') }}" method="POST" enctype="multipart/form-data">
                    @method("PUT")
                    {{ csrf_field() }}
                    <div class="modal-body" id="modal-content-edit">

                    </div>
                    <div class="modal-footer d-md-block">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <button type="button" class="btn btn-danger btn-sm">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

{{-- JS delete --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
        $('#deletekategori').click(function(){
            var id = $(this).attr('rel');
            var deleteFunction = $(this).attr('rel1')
            swal({
                title: "Are you sure?",
                text: "Your will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function(){
                window.location.href="/delete/"+deleteFunction+"/"+id;
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });
        });
    });
  
</script>
@endsection

@section('js')

<script type="text/javascript">
    function editKategori(id) {
        $.ajax({
            url: "{{ url('/kategori/edit') }}",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        })
    }

</script>

@endsection
