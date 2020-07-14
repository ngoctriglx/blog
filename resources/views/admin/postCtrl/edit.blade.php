@extends('admin.master')
@section('title','Chỉnh sửa bài viết')
@section('css')
<link type="text/css" href="{{asset('css/admin/add.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="row">
                <div class="col-10">
                    <h3><strong>Chỉnh sửa bài viết</strong></h3>
                </div>
                <div class="col-2">
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="row">
                    
                    <form method="POST" enctype="multipart/form-data" action="{{route('admin.post.edit',$post->id)}}">
                        @csrf
                        <div class="col-8">
                            <div class="form-group">
                                <label><strong>Tiêu đề</strong></label>
                                <input type="text" required value="{{$post->title}}" name="title" id="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label><strong>Tiêu đề phụ</strong></label>
                                <input type="text" required value="{{$post->sub_title}}" name="subtitle" id="subtitle" class="form-control">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label><strong>Người viết</strong></label>
                                <input type="text" required value="{{$post->author}}" name="author" id="author" class="form-control">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label><strong>Địa điểm</strong></label>
                                <input type="text" required value="{{$post->place}}" name="place" id="place" class="form-control">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label><strong>Nội dung</strong></label>
                                <textarea class="form-control" required value="" name="content" id="content"
                                    placeholder="">{{$post->content}}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <label><strong>Thêm ảnh</strong></label>
                            <input type="file" name="images[]" accept=".png, .jpg, .jpeg" required multiple id="images">
                        </div>
                        <div class="col-8 mt-4">
                            <div class="form-group">
                                <input type="submit" name="add" id="upload" value="Thêm" class="btn btn-success">
                                <input type="reset" name="" value="Làm mới" class="btn btn-primary">
                            </div>
                        </div>
                        <div id="msg">
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                        </div>
                        <div class="gallery" id="showImage"></div>
                    </form>

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
<script type="text/javascript">
    $(document).ready(function(e){
        const arr = []
        const arr1 = []
        $("#images").change(function(){
            var filename = this.value;
            var lastIndex = filename.lastIndexOf("\\");
            if (lastIndex >= 0) {
                filename = filename.substring(lastIndex + 1);
            }
            var files = $('#images')[0].files;
            for (var i = 0; i < files.length; i++) {
                if (arr.indexOf(files[i].name) === -1) { 
                    arr.push(files[i].name)
                    arr1.push(document.getElementById('images').files[i])
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var addImage = '<div class="col-md-3"><img style="width:128px;height:128px;" src='+e.target.result+'></div>';
                        $("#showImage").append(addImage);
                    }
                    reader.readAsDataURL(this.files[i]);
                } 
                {{-- else {
                    alert(files[i].name + "  úp 1 hình được rồi")
                } --}}
            }
        });
    });

</script>
@endsection