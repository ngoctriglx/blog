@extends('home.master')
@section('title','Thông tin cá nhân')
@section('css')
<link rel="stylesheet" href="{{ asset('css/home/infouser.css')}}">
@endsection
@section('content')

<div class="container emp-profile">
    <h2 class="text-center"><label>Trang cá nhân</label></h2>
    <p>
        <hr />
    </p>
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog" style="width: 30%">
            <form action="" id="subpassword" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button onClick="" type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Đổi mật khẩu</h4>
                    </div>
                    <div class="modal-body long-modal">
                        <div class="long-card" style="padding: 20px;">
                            @foreach ($user as $valuser)
                            @if (!empty($valuser->password))
                            <div class="form-group  pass_show">
                                <label>Mật khẩu hiện tại</label>
                                <input class="form-control" name="pass0" id="pass0" placeholder="Nhập mật khẩu cũ"
                                    required type="password">
                            </div>
                            @endif
                            @endforeach
                            <p></p>
                            <div class="form-group pass_show">
                                <label>Mật khẩu mới</label>
                                <input class="form-control" name="pass1" id="pass1"
                                    placeholder="Mật khẩu có 6 ký tự trở lên" required type="password">
                            </div>
                            <p></p>
                            <div class="form-group pass_show">
                                <label>Nhập lại mật khẩu</label>
                                <input class="form-control" name="pass2" id="pass2" placeholder="Nhập lại mật khẩu"
                                    required type="password">
                            </div>
                            <p></p>
                            <div id="msg1">
                                <ul></ul>
                            </div>
                            <p></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="save2" id="myReset" class="btn btn-success">Lưu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @foreach ($info as $val)

    <form action="{{route('user.post.infouser')}}" enctype="multipart/form-data" method="POST" class="info-wrap-form">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="info-profile-img">
                    <div class="info-avatar-preview">
                        <div class="info-long-image" id="showImage"
                            style="background-image: url({{asset('/uploads/imguser/'.$val->avatar)}});">
                        </div>
                    </div>
                    <div class="info-file btn btn-lg btn-primary">
                        Thay đổi
                        <input class="long-input" type='file' name="images" id="images" accept=".png, .jpg, .jpeg" />
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row mb-3 mb-sm-0">
                    <div class="col-md-2">
                        <label>Email</label>
                    </div>
                    <div class="col-md-6" style="width: 57%;">
                        <input class="form-control" type="text" value="{{Auth::user()->email}}" disabled>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal1">Đổi
                            mật khẩu</button>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div>
                        <div class="col-md-2">
                            <label>Họ và tên</label>
                        </div>
                        <div class="col-md-9">
                            <input name="name" id="name" class="form-control" type="text" placeholder="{{$val->name}}">
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div>
                        <div class="col-md-2">
                            <label>Giới thiệu</label>
                        </div>
                        <div class="col-md-9">
                            <textarea style="height: 80px;" name="introduce" id="introduce" class="form-control"
                                placeholder="{{$val->introduce}}"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <div class="col-md-2">
                            <label>Confirm</label>
                        </div>
                        <div class="col-md-9">
                            <input type="checkbox" name="" id="checkbox">
                        </div>
                    </div>
                </div>
                <div>
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <p>
            <hr />
        </p>
        <div class="row">
            <div class="col-md-9" style="margin-left: 80px;">
            </div>
            <div class="col-md-2">
                <button type="submit" name="subinfo" id="subinfo" disabled="disabled"
                    class="btn btn-success">Lưu</button>
                <button type="button" class="btn btn-danger">Thoát</button>
            </div>
        </div>
    </form>
    @endforeach
    @endsection
    @section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e){
            
            $("#images").change(function(){
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("#showImage").css('background-image', 'url(' + e.target.result + ')');
                        }
                        reader.readAsDataURL(this.files[0]);
            });
    
            {{--  $("#subinfo").click(function(e){
                    e.preventDefault();
                    var formData = new FormData();
                    var image = $('#images')[0].files[0];
                    formData.append("images", image);
                    var name = $("#name").val();
                    var introduce = $("#introduce").val();
                    formData.append('name',name);
                    formData.append('introduce',introduce);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"{{ route('user.post.infouser') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache:false,
                        success:function(data) {
                            $("#msginfo").html(data.msg);
                         }
                    });
            });  --}}
        });
    </script>
    <script>
        $(document).ready(function(e){
            
            $("#subpassword").submit(function(e){
                $("li").remove();
                e.preventDefault();
                var formData = new FormData();
                var pass0 = $("#pass0").val();
                var pass1 = $("#pass1").val();
                var pass2 = $("#pass2").val();
                formData.append('pass0',pass0);
                formData.append('pass1',pass1);
                formData.append('pass2',pass2);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('user.post.repassword')}}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache:false,
                    success:function(data) {
                        if($.isEmptyObject(data.error)){
                            $("#msg1").html(data.success);
                        }else{
                            printErrorMsg(data.error);
                        } 
                    }
                });
                function printErrorMsg (msg) {
                    $.each( msg, function( key, value ) {
                        $("#msg1").find("ul").append('<li>'+value+'</li>');
                    });
                }
            });
        });
    </script>
    <script>
        document.getElementById('checkbox').onclick = function(e){
            if (this.checked){
                $("#subinfo").prop("disabled", false);
            }else{
                $("#subinfo").prop("disabled", true);
            }
        };
    </script>
    <script>
        $(document).ready(function () {
            $('.pass_show').append('<span class="ptxt">Show</span>');
        });
        $(document).on('click', '.pass_show .ptxt', function () {
            $(this).text($(this).text() == "Show" ? "Hide" : "Show");
            $(this).prev().attr('type', function (index, attr) { return attr == 'password' ? 'text' : 'password'; });
        });
    </script>
    @endsection