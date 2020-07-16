@extends('admin.master')
@section('title','Quản lý thành viên')
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="row">
                <div class="col-10">
                    <h3><strong>Bài viết</strong></h3>
                </div>
                <div class="col-2">
                    <a class="f_pc" href="{{route('admin.get.add')}}">
                        <button type="button" class="btn btn-primary">Thêm</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <!-- <h5 class="card-title">
                    Bootstrap 4 Form Validation
                </h5> -->
       
                    <div class="form-row">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tên thành viên</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Tên</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comment as $key => $valcmt)
                                @foreach ($info as $valinfo)
                                    @if ($valcmt->user_id == $valinfo->user_id)
                                    <tr>
                                        <th scope="row">{{$key}}</th>
                                        <td>{{$valinfo->name}}</td>
                                        <td>{{$valcmt->content}}o</td>
                                        <td>{{$valcmt->repost}}</td>
                                        <td>{{$valcmt->id}}</td>
                                        <td>
                                            {{--  <button type="button" onclick="myDeletepost('{{}}',{{}})" class="btn btn-danger">Xóa</button>  --}}
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    function myDeletepost(subtitle,id1){
        var subtitle;
        var id = id1;
        var result = confirm("Bạn có muốn xóa "+subtitle+" ?");
        if (result == true) {
            window.location.href = "http://localhost/blog/public/admin/delete/"+id
          }
    }
</script>
@endsection