<div class="modal fade " id="modalForm" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog" 
data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog-centered modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-lg-12" >
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="" id="alamat"></textarea>
                            
                            @error('alamat')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="mapel_id">Mapel</label>
                        <select type="text" class="form-control" name="mapel_id" id="mapel_id">
                        @foreach ($mapel as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kelas_id">Kelas</label>
                        <select type="text" class="form-control" name="kelas_id" id="kelas_id">
                        @foreach ($kelas as $item)
                            <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

</div>