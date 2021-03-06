
<?php $__env->startSection('title','Chỉnh sửa bài viết'); ?>
<?php $__env->startSection('css'); ?>
<link type="text/css" href="<?php echo e(asset('css/admin/add.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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

                    <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('admin.post.edit',$post->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label><strong>Tiêu đề</strong></label>
                                    <input type="text" required value="<?php echo e($post->title); ?>" name="title" id="title"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><strong>Tiêu đề phụ</strong></label>
                                    <input type="text" required value="<?php echo e($post->sub_title); ?>" name="subtitle"
                                        id="subtitle" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><strong>Người viết</strong></label>
                                    <input type="text" required value="<?php echo e($post->author); ?>" name="author" id="author"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label><strong>Video</strong></label>
                                    <input type="text" required value="<?php echo e($post->video); ?>" name="video" id="place"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><strong>Nội dung</strong></label>
                                    <textarea style="height: 150px" class="form-control" required value=""
                                        name="content" id="content" placeholder=""><?php echo e($post->content); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label><strong>Thêm ảnh</strong></label>
                            <input type="file" name="images[]" accept=".png, .jpg, .jpeg" multiple id="images">
                        </div>

                        <div style="display: flex">
                            <?php $__currentLoopData = $imgpost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valimgpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <form action="" method="POST">
                                <?php echo csrf_field(); ?>
                                <span class="pip">
                                    <div id="abc<?php echo e($valimgpost->id); ?>">
                                        <img class="imageThumb" style="width:128px;height:128px;"
                                            src="<?php echo e(asset('/uploads/imgpost/'.$valimgpost->link_img)); ?>">
                                        <br><span class="img-delete" data-id="<?php echo e($valimgpost->id); ?>"
                                            key-id="<?php echo e($key); ?>">Remove</span>
                                    </div>
                                </span>
                            </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div><button style="margin-top: 10px" type="button" id="resetimg">Reset ảnh</button></div>
                        <div style="display: flex" id="showImage"></div>
                        </div>
                        

                        <div class="col-8 mt-4" style="margin-top: 20px">
                            <div class="form-group">
                                <input type="submit" name="add" id="upload" value="Sửa" class="btn btn-success">
                            </div>
                        </div>
                        <div id="msg">
                            <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
         new nicEditor().panelInstance('content');
    });
</script>
<script type="text/javascript">
    $(document).ready(function(e){
        $(".img-delete").click(function(e){
            var id = $(this).attr("data-id");
            var key = $(this).attr("key-id");
            var result = confirm("Bạn có muốn xóa ảnh số "+key+" ?");
            if (result == true) {
                e.preventDefault();
                var id = $(this).attr("data-id");
                $("div#abc"+id).remove();
                var formData = new FormData();
                formData.append('id',id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"<?php echo e(route('admin.post.delete.img')); ?>",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache:false,
                    success:function(data) {
                        alert(data.success);
                    }
                });
            }
        });
        $("#resetimg").click(function(){
            $("span#pip").remove();
            document.getElementById("images").value = "";
        });
        $("#images").change(function(){
            $("span#pip").remove();
            var files = $('#images')[0].files;
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var addImage = '<span class="pip" id="pip">'+
                        '<img class="imageThumb" style="width:128px;height:128px;" src=' + e.target.result + '>';
                    $("#showImage").append(addImage);
                }
                reader.readAsDataURL(this.files[i]);
            } 
        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\blog\resources\views/admin/postCtrl/edit.blade.php ENDPATH**/ ?>