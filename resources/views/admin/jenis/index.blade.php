@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <button class="add-modal btn btn-primary">Tambah</button>
                    <br><br>
                    @if ($message = Session::get('errors'))
                        <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    
                    {{-- @include('layouts.errors') --}}
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Jenis</td>
                                <td>Keterangan</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            @foreach ($list_jenis as $item)
                                <tr class="item{{$item->id}}">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->jenis}}</td>
                                    <td>{{$item->keterangan}}</td>
                                    <td>
                                        <button class="edit-modal btn btn-info" data-id={{$item->id}} data-jenis={{$item->jenis}} data-kd_jenis={{$item->kd_jenis}} data-keterangan={{$item->keterangan}}>Edit</button>
                                        <button class="delete-modal btn btn-danger" data-id={{$item->id}} data-jenis={{$item->jenis}}>Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tambah</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/jenis" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <input type="text" class="form-control" required name="jenis">
                        </div>
                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan">
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        {{-- <form action="/jenis" method="post"> --}}
                            @csrf
                            <div class="form-group" id="idfield">
                                <label for="">Id</label>
                                <input type="number" id="fid"class="form-control" name="id">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis</label>
                                <input type="text" id="j" class="form-control" name="jenis">
                            </div>
                            <div class="form-group">
                                <label for="">Kd Jenis</label>
                                <input type="text" disabled id="kd" class="form-control" name="kd_jenis">
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <input type="text" id="k" class="form-control" name="keterangan">
                            </div>
                            <br><br>
                            <button id="update" class="btn btn-success" data-dismiss="modal">Update</button>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete-modal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Delete</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        Yakin menghapus <span class="dname"></span>? <span class="did hidden"></span>
                    </div>
                    <br><br>
                    <button class="btn btn-danger" id="delete" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    <script>
        $(document).on('click','.add-modal',function(){
            $('#add-modal').modal('show');
        })
        $(document).on('click','.edit-modal',function(){
            $('#idfield').hide();
            $('#fid').val($(this).data('id'));
            $('#j').val($(this).data('jenis'));
            $('#kd').val($(this).data('kd_jenis'));
            $('#k').val($(this).data('keterangan'));
            $('#edit-modal').modal('show');
        })
        $(document).on('click','#update',function(){
            $.ajax({
                method:'post',
                url:'/jenis/update',
                data:{
                    '_token':$('input[name=_token]').val(),
                    'id':$('#fid').val(),
                    'jenis':$('#j').val(),
                    'kd_jenis':$('#kd').val(),
                    'keterangan':$('#k').val()
                },
                success:function(data){
                    if((data.errors)){
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.jenis);
                    }else{
                        $('.error').addClass('hidden');
                        $('.item'+data.id).replaceWith("<tr class='item"+data.id+"'><td>"+data.id+"</td><td>"+data.jenis+"</td><td>"+data.keterangan+"</td><td><button class='btn btn-info edit-modal' data-id='"+data.id+"' data-jenis='"+data.jenis+"' data-kd_jenis='"+data.kd_jenis+"' data-keterangan='"+data.keterangan+"'>Edit</button><button class='btn btn-danger delete-modal' data-id='"+data.id+"' data-jenis='"+data.jenis+"'>Delete</button></td></tr>")
                    }
                   
                }
            })
        })
        $(document).on('click','.delete-modal',function(){
            $('.dname').text($(this).data('jenis'));
            $('.did').text($(this).data('id'));
            $('#delete-modal').modal('show')
        })
        $(document).on('click','#delete',function(){
            $.ajax({
                method:'post',
                url:'/jenis/delete',
                data:{
                    _token:$('input[name=_token]').val(),
                    'id':$('.did').text()
                },
                success:function(data){
                    $('.item'+$('.did').text()).remove();
                }
            })
        })



    </script>
@endsection