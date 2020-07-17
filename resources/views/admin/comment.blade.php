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
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">
                    Bootstrap 4 Form Validation
                </h5> -->
            {{--  <ul class="nav nav-tabs">
                <li><a href="#nav-comment" data-toggle="tab">Comment</a></li>
                <li><a href="#nav-replycomment" data-toggle="tab">Replycomment</a></li>
            </ul>  --}}
           
            
                <ul class="nav nav-tabs">
                    <li><a href="#a" data-toggle="tab"><button type="button" class="btn btn-primary" style="margin-right: 10px">Comment</button></a></li>
                    <li><a href="#b" data-toggle="tab"><button type="button" class="btn btn-primary">Replycomment</button></a></li>
                 </ul>
                 
                 <div class="tab-content">
                    <div class="tab-pane active" id="a">
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
                                            <form action="{{route('admin.post.delete.cmt')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="comment" value="replycomment">
                                                <input type="hidden" name="id" value="{{$valcmt->id}}">
                                                <button type="submit" 
                                                class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                            <div>{{ $replycomment->links() }}</div>
                        </div>
                    </div>
                    <div class="tab-pane" id="b">
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
                                            <form action="{{route('admin.post.delete.cmt')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="comment" value="comment">
                                                <input type="hidden" name="id" value="{{$valcmt->id}}">
                                                <button type="submit" 
                                                class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
    
                            </table>
                            <div>{{ $comment->links() }}</div>
                        </div>

                    </div>
                 </div>
           
            
        </div>
    </div>
</div>
</div>

@endsection
@section('script')
{{--  <script>
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
</script>  --}}
@endsection