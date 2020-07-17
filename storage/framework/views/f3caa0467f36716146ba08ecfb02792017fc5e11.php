
<?php $__env->startSection('title','Thông tin cá nhân'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home/infouser.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container emp-profile">
    <h2 class="text-center"><label>Trang cá nhân</label></h2>
    <p>
        <hr />
    </p>
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog" style="width: 30%">
            <form action="" id="subpassword" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Đổi mật khẩu</h5>
                        <button onClick="" type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body long-modal">
                        <div class="long-card" style="padding: 20px;">
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valuser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($valuser->password)): ?>
                            <div class="form-group  pass_show">
                                <label>Mật khẩu hiện tại</label>
                                <input class="form-control" name="pass0" id="pass0" placeholder="Nhập mật khẩu cũ"
                                    required type="password">
                            </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <p></p>
                            <div class="form-group pass_show">
                                <label>Mật khẩu mới</label>
                                <input class="form-control" name="pass1" id="pass1"
                                    placeholder="Nhập mật khẩu" required type="password">
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

    <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <form action="<?php echo e(route('user.post.infouser')); ?>" enctype="multipart/form-data" method="POST" class="info-wrap-form">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="info-profile-img">
                    <div class="info-avatar-preview">
                        <div class="info-long-image" id="showImage"
                            style="background-image: url(<?php echo e(asset('/uploads/imguser/'.$val->avatar)); ?>);">
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
                    <div class="col-md-6">
                        <input class="form-control" type="text" value="<?php echo e(Auth::user()->email); ?>" disabled>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal1">Đổi
                            mật khẩu</button>
                    </div>
                </div>
                <p></p>
                <div class="row mb-3 mb-sm-0">
                        <div class="col-md-2">
                            <label>Họ và tên</label>
                        </div>
                        <div class="col-md-8">
                            <input style="width: 103%;" name="name" id="name" class="form-control" type="text" placeholder="Nhập tên của bạn">
                        </div>
                </div>
                <p></p>
                <div class="row mb-3 mb-sm-0">
                        <div class="col-md-2">
                            <label>Giới thiệu</label>
                        </div>
                        <div class="col-md-9">
                            <textarea style="height: 72px; width: 91%;" name="introduce" id="introduce" class="form-control"
                                placeholder="Giới thiệu về bạn"></textarea>
                        </div>
                </div>
                <div class="row mb-3 mb-sm-0">
                        <div class="col-md-2">
                            <label>Xác nhận</label>
                        </div>
                        <div class="col-md-9">
                            <input type="checkbox" name="" id="checkbox">
                        </div>
                </div>
                <div>
                    <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('error')); ?>

                    </div>
                    <?php endif; ?>
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
</div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
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
                    url:"<?php echo e(route('user.post.repassword')); ?>",
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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\blog\resources\views/home/infouser.blade.php ENDPATH**/ ?>