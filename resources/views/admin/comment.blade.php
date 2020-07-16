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
                {{--  <div class="col-2">
                    <a class="f_pc" href="{{route('admin.get.add')}}">
                <button type="button" class="btn btn-primary">Thêm</button>
                </a>
            </div> --}}
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">
                    Bootstrap 4 Form Validation
                </h5> -->
            <ul class="nav nav-tabs">
                <li><a href="#nav-comment" data-toggle="tab">Comment</a></li>
                <li><a href="#nav-replycomment" data-toggle="tab">Replycomment</a></li>
            </ul>
            <div class="tab-content">
                <div class="form-row" id="nav-comment">
                   
                        <table class="table">
                            
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên người dùng</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Repost</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <form action="" method="POST">
                                @csrf
                            <tbody>
                                @foreach ($comment as $key => $valcmt)
                                @foreach ($info as $valinfo)
                                @if ($valcmt->user_id == $valinfo->user_id)
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$valinfo->name}}</td>
                                    <td>{{$valcmt->content}}</td>
                                    <td>{{$valcmt->repost}}</td>
                                    <td>

                                        <button type="button" onclick="myDeletecmt('comment',{{$valcmt->id}})"
                                            class="btn btn-danger">Xóa</button>

                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach
                            </tbody>
                        </form>
                        </table>
                        <div>{{ $comment->links() }}</div>
                </div>
            </div>
            <div class="tab-content">
                <div class="form-row" id="nav-replycomment">
                   
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên người dùng</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Repost</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <form action="" method="POST">
                                @csrf
                            <tbody>
                                @foreach ($replycomment as $key => $valcmt)
                                @foreach ($info as $valinfo)
                                @if ($valcmt->user_id == $valinfo->user_id)
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$valinfo->name}}</td>
                                    <td>{{$valcmt->content}}</td>
                                    <td>{{$valcmt->repost}}</td>
                                    <td>
                                        <button type="button" onclick="myDeletecmt('replycomment',{{$valcmt->id}})"
                                            class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach

                            </tbody>
                        </form>
                        </table>
                        <div>{{ $replycomment->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
    function myDeletecmt(status,id) {
            var result = confirm("Bạn có muốn xóa ?");
            if (result == true) {
                var formData = new FormData();
                formData.append('id',id);
                formData.append('status',status);
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type:'POST',
                    url:"{{route('admin.post.delete.cmt')}}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache:false,
                    success:function(data) {
                        alert(data.success);
                    }
                });
                location.reload();
            }
        }
</script>
@endsection