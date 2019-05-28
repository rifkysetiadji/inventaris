@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <button class="add-modal btn btn-primary">Tambah</button>
                    <br><br>
                    @if($message=session()->get('errors'))
                        <div class="alert alert-block alert-danger">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong>{{$message}}</strong>
                        </div>
                    @endif
                    <table class="table table-borderless" id="table-barang">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Barang</td>
                                <td>Jumlah</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            @foreach ($list_barang as $item)
                                <tr class="item{{$item->id}}">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->barang}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>
                                        <button class="edit-modal btn btn-info" data-id={{$item->id}} data-barang={{$item->barang}} data-kondisi={{$item->kondisi}} data-keterangan={{$item->keterangan}} data-jumlah={{$item->jumlah}} data-jenis_id={{$item->jenis_id}} data-ruang_id={{$item->ruang_id}} data-kd_barang={{$item->kd_barang}}  >Edit</button>
                                        <button class="delete-modal btn btn-danger" data-id={{$item->id}} data-barang={{$item->barang}}>Delete</button>
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
                    <form action="/barang" method="post">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Barang</label>
                                        <input type="text" class="form-control" name="barang">
                                    </div>
                                    <div class="form-group">
                                        <label for="">kondisi</label>
                                        <select name="kondisi" id="" class="form-control">
                                            <option value="Baik">Baik</option>
                                            <option value="Tidak Baik">Tidak Baik</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis</label>
                                        <select name="jenis_id" id="" class="form-control">
                                                <option value=""></option>
                                            @foreach ($list_jenis as $item)
                                                
                                                <option value="{{$item->id}}">{{$item->jenis}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="">ruang</label>
                                            <select name="ruang_id" id="" class="form-control">
                                                    <option value=""></option>
                                                @foreach ($list_ruang as $item)
                                                    
                                                    <option value="{{$item->id}}">{{$item->ruang}}</option>
                                                @endforeach
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
                                                            <input type="number" id="fid"class="form-control" name="id">
                                                        </div>
                                                <div class="form-group">
                                                    <label for="">Barang</label>
                                                    <input type="text" id="b" class="form-control" name="barang">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">kondisi</label>
                                                    <select name="kondisi" id="k" class="form-control">
                                                        <option value="Baik">Baik</option>
                                                        <option value="Tidak Baik">Tidak Baik</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Keterangan</label>
                                                    <input type="text" id="ket" class="form-control" name="keterangan">
                                                </div>
                                                <div class="form-group">
                                                        <label for="">Jumlah</label>
                                                        <input type="number" id="j" class="form-control" name="jumlah">
                                                    </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                                <div class="form-group">
                                                    <label for="">Jenis</label>
                                                    <select name="jenis_id" id="jen" class="form-control">
                                                        @foreach ($list_jenis as $item)
                                                            <option value=""></option>
                                                            <option value="{{$item->id}}">{{$item->jenis}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                        <label for="">ruang</label>
                                                        <select name="ruang_id" id="ru" class="form-control">
                                                            @foreach ($list_ruang as $item)
                                                                <option value=""></option>
                                                                <option value="{{$item->id}}">{{$item->ruang}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                            <label for="">Kd Barang</label>
                                                            <input type="text" id="kd" disabled class="form-control" name="kd_barang">
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
            $(document).ready( function () {
    $('#table-barang').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    
    
} );
                $(document).on('click','.add-modal',function(){
                    $('#add-modal').modal('show');
                })
                $(document).on('click','.edit-modal',function(){
                    $('#idfield').hide();
                    $('#fid').val($(this).data('id'));
                    $('#b').val($(this).data('barang'));
                    $('#k').val($(this).data('kondisi'));
                    $('#ket').val($(this).data('keterangan'));
                    $('#j').val($(this).data('jumlah'));
                    $('#jen').val($(this).data('jenis_id'));
                    $('#ru').val($(this).data('ruang_id'));
                    $('#kd').val($(this).data('kd_barang'));
                    $('#edit-modal').modal('show');
                })
                $(document).on('click','#update',function(){
                    $.ajax({
                        method:'post',
                        url:'/barang/update',
                        data:{
                            '_token':$('input[name=_token]').val(),
                            'id':$('#fid').val(),
                            'barang':$('#b').val(),
                            'kondisi':$('#k').val(),
                            'keterangan':$('#ket').val(),
                            'jumlah':$('#j').val(),
                            'jenis_id':$('#jen').val(),
                            'ruang_id':$('#ru').val(),
                            'kd_barang':$('#kd').val(),
                            
                        },
                        success:function(data){
                            $('.item'+data.id).replaceWith("<tr class='item"+data.id+"'><td>"+data.id+"</td><td>"+data.barang+"</td><td>"+data.jumlah+"</td><td><button class='btn btn-info edit-modal' data-id='"+data.id+"' data-barang='"+data.barang+"' data-kondisi='"+data.kondisi+"' data-keterangan='"+data.keterangan+"' data-jumlah='"+data.jumlah+"' data-jenis_id='"+data.jenis_id+"' data-ruang_id='"+data.ruang_id+"' data-kd_barang='"+data.kd_barang+"' >Edit</button><button class='btn btn-danger delete-modal' data-id='"+data.id+"' data-barang='"+data.barang+"'>Delete</button></td></tr>")
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
                        url:'/barang/delete',
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