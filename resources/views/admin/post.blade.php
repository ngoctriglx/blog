@extends('admin.master')
@section('title','Bài viết')
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
                                    <th scope="col">#</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Người đăng bài</th>
                                    <th scope="col">Lượt xem</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Xử lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $key => $valpost)
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$valpost->sub_title}}</td>
                                    <td>{{$valpost->author}}</td>
                                    <td>{{$valpost->view}}</td>
                                    <td>{{$valpost->updated_at}}</td>
                                    <td>
                                        <a class="f_pc" href="{{route('home.get.blogdetail',['id'=>$valpost->id,'title'=>$valpost->title])}}">
                                            <button type="button" class="btn btn-success">
                                                Chi tiết
                                            </button>
                                        </a>
                                        <a class="f_pc" href="{{route('admin.get.edit',$valpost->id)}}">
                                            <button type="button" class="btn btn-info">Sửa</button>
                                        </a>
                                            <button type="button" onclick="myDeletepost('{{$valpost->sub_title}}',{{$valpost->id}})" class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>
                                @endforeach                            
                            </tbody>
                        </table>
                        <div>{{ $post->links() }}</div>
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