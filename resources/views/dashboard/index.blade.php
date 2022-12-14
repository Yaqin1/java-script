@extends('layout.app')

@section('title')
Dashboard
@endsection

@section('content')

<section class="content-header">

    <div class="row">
        @if(auth()->user()->role == 'admin')
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$guru->count()}}</h3>
                    <p>Data Guru</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-user-tie"></i>
                </div>
                <a href="{{ route ('guru.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$kelas->count()}}</h3>
                    <p>Daftar Kelas</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-chalkboard"></i>
                </div>
                <a href="{{ route ('kelas.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$mapel->count()}}</h3>
                    <p>Daftar Mapel</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-book"></i>
                </div>
                <a href="{{ route ('mapel.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$siswa->count()}}</h3>
                    <p>Data Siswa</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-user-graduate"></i>
                </div>
                <a href="{{ route ('siswa.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        @endif

        @if(auth()->user()->role == 'siswa')
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text_primary">
                        {{ !empty(auth()->user()->name) ? (auth()->user()->name) : '' }}
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Mata Pelajaran</td>
                                <td>Guru</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($find_siswa as $item)
                            <tr>
                                <td>{{$item->mapel->nama}}</td>
                                <td>{{$item->kelas->nama}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>


@endsection