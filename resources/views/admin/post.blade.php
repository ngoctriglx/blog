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
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Người đăng bài</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Bình luận</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Xử lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post as $key => $valpost)
                                <tr>
                                    <th scope="row">{{$key}}</th>
                                    <td>{{$valpost->sub_title}}</td>
                                    <td>{{$valpost->author}}o</td>
                                    <td>{{$valpost->content}}</td>
                                    <td>1</td>
                                    <td>{{$valpost->created_at}}</td>
                                    <td>
                                        <a class="f_pc" href="{{route('home.get.blogdetail',$valpost->title)}}">
                                            <button type="button" class="btn btn-success">
                                                Chi tiết
                                            </button>
                                        </a>
                                        <a class="f_pc" href="{{route('admin.get.edit',$valpost->id)}}">
                                            <button type="button" class="btn btn-info">Sửa</button>
                                        </a>
                                        <a class="f_pc" href="">
                                            <button onclick="buttonDelete()" type="button"
                                                class="btn btn-danger">Xóa</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>

                <!-- change avatar? -->

                <!-- <div class="container">
                    <h1>jQuery Image Upload 
                        <small>with preview</small>
                    </h1>
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"><i class="fa fa-cog"></i></label>
                        </div>
                        <div class="avatar-preview">
                            <div class="long-image" id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    function buttonDelete() {
      var result = confirm("Bạn có muốn xóa ?");
      if(result == true)
          //gọi hàm xóa
      endif
      //không có gì xãy ra
    }
</script>
@endsection