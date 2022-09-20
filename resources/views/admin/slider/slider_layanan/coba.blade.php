<?php

namespace App\Http\Controllers;

use App\Models\Tentang;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::all();
        return view('admin.home.Tentang.tentang', compact('tentang'));
    }

    public function store(Request $request)
    {

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/app/tentang', $gambar->hashName());
           
           Tentang::create([
               'gambar' => $gambar->hashName(),
               'heading' => $request->heading,
               'deskripsi' => $request->deskripsi
           ]);
           return redirect()->back()->with('success', 'Data berhasil ditambahkan' );
    }

    public function edit(Tentang $tentang){

        return view("admin.Landingpage.Tentang.edit", compact('sliderhome'));
    }

    public function update(Request $request, tentang $tentang){

            if ($request->hasFile('gambar')) {

                $gambar = $request->file('gambar');
                $gambar->storeAs('public/app/tentang', $gambar->hashName());

                Storage::delete('public/app/tentang'.$tentang->gambar);

                $tentang->update([
                    'gambar'     => $gambar->hashName(),
                    'heading'     => $request->heading,
                    'deskripsi'   => $request->deskripsi
                ]);
            } else {
                $tentang->update([
                    'heading'     => $request->heading,
                    'deskripsi'   => $request->deskripsi
                ]);
            }

    return back()->with('berhasil', 'Data berhasil diupdate' );
    }

    public function destroy(tentang $tentang)
    {
        Storage::delete('public/app/tentang'. $tentang->gambar);

        $tentang->delete();

    return back()->with('berhasil', 'Data Berhasil di Hapus');
    }Controller

    <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'heading',
        'deskripsi',
    ];
} Model


@extends('Layoutsadmin.adminlayout')
@section('content')
<section class="home-section">

<body>
<div class="main">
        <div class="topbar">
            <div class="home-content">
                <i class='bx bx-menu'></i>
            </div>
            <!-- Search -->
            <div class="search" data-aos="fade-left" data-aos-duration="1000">
                <label>
                    <input type="text" placeholder="Cari Disini">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>
        </div>

    <!-- ======= Hero Section ======= -->
    <div class="details3">
        <div class="recentOrders3">
            <div class="row">
                <div class="cardHeader3 col-md-10">
                    <h2>Data Home Tentang</h2>
                </div>
                <div class="col-md-2 text-end ">
                    <h2 class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i> Tambah</h2>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Gambar</td>
                        <td>Heading</td>
                        <td>Deskripsi</td>
                        <td class="col-sm-2 text-center">Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse  ($tentang as $tentang )
                    <tr>
                        <td><img src="{{ Storage::url('public/app/tentang/') .$tentang->gambar}}" alt="" style="max-width:100px; max-height:50px"></td>
                        <td>{{ $tentang->heading }}</td>
                        <td> {{ $tentang->deskripsi}}</td>
                        {{-- <td class="text-end" style="size: 30px;"> 
                            <button class="btnedit" onclick="editTentang({{$tentang->id}})" class="btnedit" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" class="btn btn-primary fw-bold rounded-pill px-4 shadow float-end">
                                <i class='bx bx-edit'></i>
                            </button>

                            @csrf
                            @method('DELETE')
                            <button class="btndelete"  >
                                <i class='bx bx-trash'></i>
                            </button>
                        </td> --}}
                        <td class="text-end">
                            <div class="row col-md-12">
                                <div class="col-md-4">
                                    <button class="btnedit" onclick="editTentang({{$tentang->id}})" class="btnedit" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" class="btn btn-primary fw-bold rounded-pill px-4 shadow float-end">
                                        <i class='bx bx-edit'></i>
                                    </button>
                                </div>
                                <div class="col-md-4 text-end">
                                    <form  onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tentang.destroy', $tentang->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btndelete">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $tentang->links() }} --}}

        </div>
    </div>
</div>

         {{-- modal tambah data --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Text</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                        <form action="{{ url('/tentang') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session :: get('success')}}
                            </div>
                             @endif
                                <div class="form-group">
                                    <label for="inputgambar"> Upload Gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar')}}" >
                                </div>
                                    @error('gambar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                <div class="form-group mt-3">
                                    <label >Heading</label>
                                    <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="" >
                                </div>
                                    @error('heading')
                                <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                <div class="form-group mt-3">
                                    <label>Deskripsi</label>
                                    <input type="text" class="form-control @error('deskripsi')  is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi')}}">
                                </div>
                                    @error('deskripsi')
                                <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        </div>
                </div>
            </div>
        </div>


        {{-- modal edit --}}
        <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header hader">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-content-edit">
                        <form action="{{ route('tentang.update', $tentang->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control" name="gambar">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JUDUL</label>
                                <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" value="{{ old('heading', $tentang->heading) }}" placeholder="Masukkan Judul Post">
                            
                                <!-- error message untuk title -->
                                @error('heading')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="5" placeholder="Masukkan Konten Post">{{ old('deskripsi', $tentang->deskripsi) }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <button type="button" class="btn btn-danger btn-sm">Batal</button>
                        </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    
      <script>
    function previewImage() {
        const gambar = document.queryselector('#gambar');
        const imgPreview = document.queryselector('.img-preview');

        imgPreview.styp.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(gambar.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
       
        <script type="text/javascript">
            function editTentang(id) {
                $.ajax({
                    url: "{{ url('/tentang/edit') }}",
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

<script>
    //message with toastr
    @if(session()->has('success'))
    
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!'); 
        
    @endif
</script>
</body>
</section>
@endsection

route::resource('/tentang', TentangController::class);
route::get('/tentang/edit', [TetangController::class, 'edit']);
route::get('/tentang/update', [TentangController::class, 'update']);
