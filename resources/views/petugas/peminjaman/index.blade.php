@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <h3>Data Peminjaman</h3>
                    <div class="sk-circle" id="spinner-peminjaman">
                        <div class="sk-circle1 sk-child"></div>
                        <div class="sk-circle2 sk-child"></div>
                        <div class="sk-circle3 sk-child"></div>
                        <div class="sk-circle4 sk-child"></div>
                        <div class="sk-circle5 sk-child"></div>
                        <div class="sk-circle6 sk-child"></div>
                        <div class="sk-circle7 sk-child"></div>
                        <div class="sk-circle8 sk-child"></div>
                        <div class="sk-circle9 sk-child"></div>
                        <div class="sk-circle10 sk-child"></div>
                        <div class="sk-circle11 sk-child"></div>
                        <div class="sk-circle12 sk-child"></div>
                    </div>
                    <br>
                    <button class="btn btn-primary modal-pinjam">Pinjam</button>
                    <br><br>
                    <table class="table table-borderless" id="table-pinjam">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Pegawai</td>
                                <td>Barang</td>
                                <td>Jumlah</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            @foreach ($list_peminjaman as $item)
                                <tr class="itempinjam{{$item->id}}">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->barang}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>
                                        <button class="btn btn-info detail-modal" id="modal-detail" data-id={{$item->id}} data-name={{$item->name}} data-barang={{$item->barang}} data-jumlah={{$item->jumlah}} data-kembali={{$item->tgl_kembali}}>Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box">
                    <h3>List Booking</h3>
                    <div class="sk-circle" id="spinner-peminjaman-booking">
                        <div class="sk-circle1 sk-child"></div>
                        <div class="sk-circle2 sk-child"></div>
                        <div class="sk-circle3 sk-child"></div>
                        <div class="sk-circle4 sk-child"></div>
                        <div class="sk-circle5 sk-child"></div>
                        <div class="sk-circle6 sk-child"></div>
                        <div class="sk-circle7 sk-child"></div>
                        <div class="sk-circle8 sk-child"></div>
                        <div class="sk-circle9 sk-child"></div>
                        <div class="sk-circle10 sk-child"></div>
                        <div class="sk-circle11 sk-child"></div>
                        <div class="sk-circle12 sk-child"></div>
                    </div>
                    <br>
                    <table class="table table-borderless" id="table-booking">
                        <thead>
                            <tr>   
                                <td>#</td>
                                <td>Pegawai</td>
                                <td>Barang</td>
                                <td>
                                   Aksi
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;?>
                            @foreach ($list_booking as $item)
                                <tr class="itembooking{{$item->id}}">
                                    <td>{{$no++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->barang}}</td>
                                    <td>
                                        <button class="btn btn-primary" id="booking-detail" data-id="{{$item->id}}" data-pegawai_id="{{$item->pegawai_id}}" data-barang="{{$item->barang}}" data-name="{{$item->name}}" data-jumlah="{{$item->jumlah}}" data-tujuan="{{$item->tujuan}}" data-tgl_pinjam="{{$item->tgl_pinjam}}" data-tgl_kembali="{{$item->tgl_kembali}}" >Detail</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="detailModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                   <div class="container-fluid">
                       <div class="row">
                           <div class="col-md-6">
                                <div class="form-group" id="detailfieldid">
                                    <label for="">id</label>
                                    <input type="number" id="detail-id" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" id="detail-name" disabled class="form-control">
                                </div>
                               <div class="form-group">
                                   <label for="">Barang</label>
                                   <input type="text" id="detail-barang" disabled class="form-control">
                               </div>
                               
                                
                           </div>
                           <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="number" id="detail-jumlah" disabled  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Tgl kembali</label>
                                    <input type="date" id="detail-tglkembali" class="form-control">
                                </div>
                           </div>
                       </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="update" data-dismiss="modal">Update</button>
                    <button class="btn btn-info" id="kembali" data-dismiss="modal">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="pinjamModal1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Pinjam</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                            <table class="table table-borderless" id="table-barang">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Barang</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;?>
                                        @foreach ($list_barang as $item)
                                            <tr >
                                                <td>{{$no++}}</td>
                                                <td>{{$item->barang}}</td>
                                                <td>{{$item->jumlah}}</td>
                                                <td>
                                                    <button class="btn btn-primary next-pinjam" id="" data-b_id="{{$item->id}}" data-b="{{$item->barang}}">Pilih</button>
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
    
    <div class="modal fade" role="dialog" id="pinjamModal2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Pinjam</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                                <table class="table table-borderless" id="table-barang">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Pegawai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1;?>
                                            @foreach ($list_pegawai as $item)
                                                <tr >
                                                    <td>{{$no++}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>
                                                        <button class="btn btn-primary next2-pinjam" id=""  data-p_id="{{$item->id}}" data-p="{{$item->name}}">Pilih</button>
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
        <div class="modal fade" role="dialog" id="pinjamModal3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Pinjam</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <form action="/peminjaman/add" method="post">
                                        @csrf
                                    <div class="col-md-6">
                                        <div class="form-group" id="barang_id">
                                            <input type="number" id="b_id" name="barang_id">
                                        </div>
                                        <div class="form-group" id="pegawai_id">
                                            <input type="number" id="p_id" name="pegawai_id">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Barang</label>
                                            <input type="text" disabled class="form-control" id="b">
                                        </div>
                                        <div class="form-group" >
                                            <label for="">Pegawai</label>
                                            <input type="text" disabled class="form-control" id="p">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Jumlah</label>
                                            <input type="number" required class="form-control" name="jumlah" id="j">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Tujuan</label>
                                                <input type="text" required class="form-control" name="tujuan" id="t">
                                            </div>
                                            <div class="form-group" >
                                                <label for="">Tgl pinjam</label>
                                                <input type="date" required class="form-control" name="tgl_pinjam" id="tgl_p">
                                            </div>
                                            <div class="form-group" >
                                                <label for="">Tgl Kembali</label>
                                                <input type="date" required class="form-control" name="tgl_kembali" id="tgl_k">
                                            </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit" >Pinjam</button>
                                </form>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="modal fade" role="dialog" id="bookingdetailModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Booking</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <form action="/booking/acc" method="post">
                            @csrf
                        <div class="col-md-6">
                            <div class="form-group" id="booking-fieldid">
                                <input type="number" id="booking-b_id" name="barang_id">
                            </div>
                            <div class="form-group" id="booking-fieldpegawai">
                                <input type="number" id="booking-p_id" name="pegawai_id">
                            </div>
                            <div class="form-group">
                                <label for="">Barang</label>
                                <input type="text" disabled class="form-control" id="booking-b">
                            </div>
                            <div class="form-group" >
                                <label for="">Pegawai</label>
                                <input type="text" disabled class="form-control" id="booking-p">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number"  class="form-control" name="jumlah" id="booking-j">
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tujuan</label>
                                    <input type="text"  class="form-control" name="tujuan " id="booking-t">
                                </div>
                                <div class="form-group" >
                                    <label for="">Tgl pinjam</label>
                                    <input type="date"  class="form-control" name="tgl_pinjam" id="booking-tgl_p">
                                </div>
                                <div class="form-group" >
                                    <label for="">Tgl Kembali</label>
                                    <input type="date"  class="form-control" name="tgl_kembali" id="booking-tgl_k">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" id="acc-booking" >Acc</button>
                            <button class="btn btn-danger" id="tolak-booking" >Tolak</button>
                        </div>
                        
                    </form>
                    </div>                                
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$('#spinner-peminjaman').hide()
$('#spinner-peminjaman-booking').hide()

$('.modal-pinjam').on('click',function(){
    $('#pinjamModal1').modal('show')
   
})
$('#close').on('click',function(){
    $('#pinjamModal3').close()
})
$('.next-pinjam').on('click',function(){
    $('#pinjamModal1').modal('hide')
    $('#b_id').val($(this).data('b_id'))
    $('#b').val($(this).data('b'))
    $('#pinjamModal2').modal('show')
   console.log('asdf')
})
$('.next2-pinjam').on('click',function(){
    $('#pinjamModal2').modal('hide')
    $('#barang_id').hide()
    $('#pegawai_id').hide()
    
    $('#p_id').val($(this).data('p_id'))
    
    $('#p').val($(this).data('p'))
    $('#pinjamModal3').modal('show')
})
$('.detail-modal').on('click',function(){
    $('#detailfieldid').hide()
    $('#detail-id').val($(this).data('id'))
    // $('#detail-id').val($(this).data('id'))
    $('#detail-name').val($(this).data('name'))
    $('#detail-barang').val($(this).data('barang'))
    $('#detail-jumlah').val($(this).data('jumlah'))
    $('#detail-tglkembali').val($(this).data('kembali'))
    $('#detailModal').modal('show')
})
$('#kembali').on('click',function(){
    $('#spinner-peminjaman').show()
    $.ajax({
        method:'post',
        url:'/peminjaman/kembali',
        data:{
            '_token':$('input[name=_token]').val(),
            'id':$('#detail-id').val(),
        },
        success:function(data){
            $('#spinner-peminjaman').hide()
            $('.itempinjam'+$('#detail-id').val()).remove()
        }
    })
})
$('#update').on('click',function(){
    $('#spinner-peminjaman').show()
    $.ajax({
        method:'post',
        url:'/peminjaman/update',
        data:{
            '_token':$('input[name=_token]').val(),
            'id':$('#detail-id').val(),
            'name':$('#detail-name').val(),
            'tgl_kembali':$('#detail-tglkembali').val(),
        },
        success:function(data){
            $('#spinner-peminjaman').hide()
            $('.itempinjam'+$('#detail-id').val()).replaceWith("<tr class='itempinjam"+data.id+"'><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.barang+"</td><td>"+data.jumlah+"</td><td><button class='btn btn-info detail-modal' id='modal-detail' data-id='"+data.id+"' data-name='"+data.name+"' data-barang='"+data.barang+"' data-jumlah='"+data.jumlah+"' data-kembali='"+data.kembali+"'>Detail</button></td></tr>")
        }
    })
}) 
$('#booking-detail').on('click',function(){
    $('#booking-fieldid').hide()
    $('#booking-fieldpegawai').hide()
    $('#booking-b_id').val($(this).data('id'))
    $('#booking-p_id').val($(this).data('pegawai_id'))
    $('#booking-b').val($(this).data('barang'))
    $('#booking-p').val($(this).data('name'))
    $('#booking-j').val($(this).data('jumlah'))
    $('#booking-t').val($(this).data('tujuan'))
    $('#booking-tgl_p').val($(this).data('tgl_pinjam'))
    $('#booking-tgl_k').val($(this).data('tgl_kembali'))
    $('#bookingdetailModal').modal('show')
    console.log('asdf')
})
// $('#acc-booking').on('click',function(){
//     $.ajax({
//         method:'post',
//         url:'/booking/acc',
//         data:{
//             '_token':$('#input[name=_token]').val(),
//             'id':$('#booking-b_id').val()
//         },
//         success:function(data){
//             $('#spinner-peminjaman-booking').hide()
//             $('.itembooking'+$('#booking-b_id').val()).remove()
//             $('.itempinjam'+$('#detail-id').val()).replaceWith("<tr class='itempinjam"+data.id+"'><td>"+data.id+"</td><td>"+data.name+"</td><td>"+data.barang+"</td><td>"+data.jumlah+"</td><td><button class='btn btn-info detail-modal' id='modal-detail' data-id='"+data.id+"' data-name='"+data.name+"' data-barang='"+data.barang+"' data-jumlah='"+data.jumlah+"' data-kembali='"+data.kembali+"'>Detail</button></td></tr>")
//         }
//     })
// })
</script>
@endsection