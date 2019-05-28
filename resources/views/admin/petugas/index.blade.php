@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <button class="add-modal btn btn-primary">Tambah</button>
                    <br><br>
                    @include('layouts.errors')
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Nama</td>
                                <td>Level</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            @foreach ($list_petugas as $item)
                                <tr class="item{{$item->id}}">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->level}}</td>
                                    <td>
                                        <button class="edit-modal btn btn-info" data-id={{$item->id}} data-name={{$item->name}} data-email={{$item->email}} data-username={{$item->username}} data-password={{$item->password}} data-level={{$item->level}}>Edit</button>
                                        <button class="delete-modal btn btn-danger" data-id={{$item->id}} data-name={{$item->name}}>Delete</button>
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
                    <form action="/petugas" method="post">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="text" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Level</label>
                                        <select name="level" id="" class="form-control">
                                            <option value=""></option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Petugas">Petugas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                            <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" id="idfield">
                                                <label for="">Id</label>
                                                <input type="number" id="fid" class="form-control" name="id">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" id="n" class="form-control" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" id="e" class="form-control" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" id="u" class="form-control" name="username">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="text" id="p" disabled class="form-control" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Level</label>
                                                <select name="level" id="l" class="form-control">
                                                    <option value=""></option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Petugas">Petugas</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
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
                    $('#n').val($(this).data('name'));
                    $('#e').val($(this).data('email'));
                    $('#u').val($(this).data('username'));
                    $('#p').val($(this).data('password'));
                    $('#l').val($(this).data('level'));
                    $('#edit-modal').modal('show');
                })
                $(document).on('click','#update',function(){
                    $.ajax({
                        method:'post',
                        url:'/petugas/update',
                        data:{
                            '_token':$('input[name=_token]').val(),
                            'id':$('#fid').val(),
                            'name':$('#n').val(),
                            'email':$('#e').val(),
                            'username':$('#u').val(),
                            'password':$('#p').val(),
                            'level':$('#l').val()
                        },
                        success:function(data){
                            $('.item'+data.id).replaceWith("<tr class='item"+data.id+"'><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.level+"</td><td><button class='btn btn-info edit-modal' data-id='"+data.id+"' data-name='"+data.name+"' data-email='"+data.email+"' data-username='"+data.username+"' data-password='"+data.password+"' data-level='"+data.level+"'>Edit</button><button class='btn btn-danger delete-modal' data-id='"+data.id+"' data-name='"+data.name+"'>Delete</button></td></tr>")
                        }
                    })
                })
                $(document).on('click','.delete-modal',function(){
                    $('.dname').text($(this).data('name'));
                    $('.did').text($(this).data('id'));
                    $('#delete-modal').modal('show')
                })
                $(document).on('click','#delete',function(){
                    $.ajax({
                        method:'post',
                        url:'/petugas/delete',
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