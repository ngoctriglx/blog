<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="<?php echo e(asset('css/home/resetpassword.css')); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="container bootstrap snippet">
        <div class="row wrap-change">
            <div class="col-xs-12 col-sm-12 col-md-6" style="width: 100%;">
                <div class="panel panel-info">
                    <form action="<?php echo e(route('user.post.newpass')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <span class="glyphicon glyphicon-th"></span>
                                Change password
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4 separator social-login-box long-img"> <br>
                                    <img alt="" class="img-thumbnail"
                                        src="https://osclass.calinbehtuk.ro/oc-content/themes/vrisko/images/no_user.png">
                                </div>
                                <div style="margin-top:80px;" class="col-xs-6 col-sm-6 col-md-8 login-box">
                                    <div >
                                        <div>
                                            <label for="">Nhập mật khẩu mới của bạn</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group pass_show">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>
                                            </div>
                                            <input class="form-control" required="" name="password" type="password" placeholder="Mật khẩu mới">
                                            <?php if($errors->has('password')): ?>
                                                <small class="alert alert-danger"><?php echo e($errors->first('password')); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group pass_show">
                                            <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span>
                                            </div>
                                            <input class="form-control" required="" name="repassword" type="password" placeholder="Nhập lại mật khẩu">
                                            <?php if($errors->has('repassword')): ?>
                                                <small class="alert alert-danger"><?php echo e($errors->first('repassword')); ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-4"></div>
                                <div class="col-xs-6 col-sm-6 col-md-4">
                                    <button class="btn icon-btn-save btn-success" type="submit">
                                        <span class="btn-save-label"><i
                                                class="glyphicon glyphicon-floppy-disk"></i></span>Xác nhận</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="<?php echo e(asset('js/resetpassword.js')); ?>"></script>
</body>

</html>



















<?php /**PATH E:\xampp\htdocs\blog\resources\views/home/resetpassword.blade.php ENDPATH**/ ?>