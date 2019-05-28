@extends('layouts.app2')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <h2>Barang yg tersedia</h2>
                <br>
                <p class="error  alert alert-danger hidden"></p>
                <table class="table">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Barang</td>
                            <td>Stok</td>
                            <td>Posisi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        @foreach ($list_barang as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->barang}}</td>
                            <td>{{$item->jumlah}}</td>
                            <td>{{$item->ruang}}</td>
                            <td>
                                <button class=" booking-modal btn btn-dark" data-id="{{$item->id}}" data-barang="{{$item->barang}}" data-stok="{{$item->jumlah}}" >Booking</button>
                            </td>
                        </tr>                           
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
            <div class="col-2">
                <div class="spinner-border hidden" id="loadingSpinner" style="margin-top:150px;margin-left:50px" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="col-5">
                <h2>List Booking</h2>
                <br>
               {{-- <input type="date" class="form-control" id="date-from">
               <input type="date" class="form-control" id="date-to">
               <button class="btn btn-primary" id="filter">Filter</button> --}}
                <table class="table" id="table-booking">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Barang</td>
                            <td>Jumlah</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ;?>
                        @foreach ($list_booking as $item)
                            <tr class="item{{$item->id}}">
                                <td>{{$no++}}</td>
                                <td>{{$item->barang}}</td>
                                <td>{{$item->jumlah}}</td>
                                <td>
                                        @if ($item->status==="Belum")
                                        <span class="badge badge-warning">{{$item->status}}</span>
                                    @elseif($item->status==="Oke")
                                        <span class="badge badge-success">{{$item->status}}</span>
                                    @else
                                        <span class="badge badge-danger">{{$item->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-danger modal-cancel"  data-id="{{$item->id}}" data-barang="{{$item->barang}}">Cancel</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="bookingModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Booking</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>List Barang</strong>
                                <br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Barang</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="book-id"></td>
                                            <td id="book-barang"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                {{-- <form action="/booking/add" method="post"> --}}
                                    @csrf
                                <div class="form-group">
                                    <label for="">Tujuan</label>
                                    <input type="text" class="form-control" required id="tujuan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="number" class="form-control" required id="jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="">Tgl Pinjam</label>
                                    <input type="date" class="form-control" required id="tgl_pinjam">
                                </div>
                                <div class="form-group">
                                    <label for="">Tgl Kembali</label>
                                    <input type="date" class="form-control" required id="tgl_kembali">
                                </div>
                                <button type="submit" class="btn btn-dark" data-dismiss="modal" id="add-booking" >Booking</button>
                            {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" id="bookingAlertsuccess">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Booking</h4>
                        <button class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                       <strong>Berhasil, silahkan tunggu persetujuan petugas</strong>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-dark">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" role="dialog" id="bookingAlertdelete">
                <div class="modal-dialog centered-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>Booking</h4>
                            <button class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                           Yakin mengcancel <span class="dname"></span> ? <span class="hidden did"></span>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" id="cancel" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
<script>
    
    $('.error').hide()
    $('#loadingSpinner').hide()
    $('.booking-modal').on('click',function(){
        $('#book-id').text($(this).data('id'))
        $('#book-barang').text($(this).data('barang'))
        $('#bookingModal').modal('show')
    })
    $('#add-booking').on('click',function(){
        $('#loadingSpinner').show()
        $.ajax({
            method:'post',
            url:'/booking/add',
            data:{
                _token:$('input[name=_token]').val(),
                'barang_id':$('#book-id').text(),
                'tujuan':$('#tujuan').val(),
                'stok':$(this).data('stok'),
                'jumlah':$('#jumlah').val(),
                'tgl_pinjam':$('#tgl_pinjam').val(),
                'tgl_kembali':$('#tgl_kembali').val()
            },
            success:function(data){
                $('#loadingSpinner').hide()
                if(data=="errors"){
                    $('.error').text('input dengan benar')
                    $('.error').show()
                }else{
                    $('#bookingAlertsuccess').modal('show')
                    $('#table-booking').append("<tr class='item"+data.id+"'><td>"+data.id+"</td><td>"+data.barang+"</td><td>"+data.jumlah+"</td><td>"+data.status+"</td><td><button class='btn btn-danger' data-id='"+data.id+"' data-barang='"+data.barang+"'>Cancel</button></td></tr>")
                    // console.log(data)
                }
            }
        })
    })
    $('.modal-cancel').on('click',function(){
        $('.did').hide();
        $('.dname').text($(this).data('barang'))
        $('.did').text($(this).data('id'))
        $('#bookingAlertdelete').modal('show')
    })

    $('#cancel').on('click',function(){
        $('#loadingSpinner').show()
        $.ajax({
            method:'post',
            url:'/booking/cancel',
            data:{
                '_token':$('input[name=_token]').val(),
                'id':$('.did').text()
            },
            success:function(data){
                $('#loadingSpinner').hide()
                $('.item'+$('.did').text()).remove()
            }
        })
    })
    $('#filter').on('click',function(){
        $('#loadingSpinner').show()
        $.ajax({
            method:'post',
            url:'/booking/filter',
            data:{
                '_token':$('input[name=_token]').val(),
                'datefrom':$('#date-from').val(),
                'dateto':$('#date-to').val()
            },
            success:function(data){
                $('#loadingSpinner').hide()
                for (let index = 0; index < data.length; index++) {
                    $('#table-booking').append("<tr class='item"+data.id+"'><td>"+data[index].id+"</td><td>"+data[index].barang+"</td><td>"+data[index].jumlah+"</td><td>"+data[index].status+"</td></tr>")
                   
                }
                console.log(data)
               
            }
        })
    })
</script>
@endsection