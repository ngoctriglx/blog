<!DOCTYPE html>
<html lang="en">
<?php 
      use App\Info;
      use Illuminate\Support\Facades\Auth;
      use Illuminate\Support\Facades\DB;
      if(Auth::check())
      $info = Info::where('user_id',Auth::User()->id)->get();
    ?>

<head>
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <link href="<?php echo e(asset('css/home/header.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(asset('css/home/footer.css')); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo e(asset('css/home/profile.css')); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo e(asset('css/home/notification.css')); ?>" rel="stylesheet" type="text/css">
  <?php echo $__env->yieldContent('css'); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
  <div>
    <nav class="master-nav">
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a class="active" href="<?php echo e(route('home.get.home')); ?>"><i class="fas fa-home"></i></a></li>
        <li><a href="<?php echo e(route('home.get.blog')); ?>"><i class="fas fa-pencil-alt"></i></a></li>
        
        
        
        <?php if(Auth::check()): ?>
        <li data-toggle="modal" data-target="#myModal"><img class="profile" <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            src="<?php echo e(asset('/uploads/imguser/'.$val->avatar)); ?>" <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> alt="interactive-avatar" />
        </li>
        <?php else: ?>
        <li><a href="<?php echo e(route('user.get.login')); ?>"><img class="profile" src="<?php echo e(asset('/uploads/imguser/login.jpg')); ?>"
              alt=""></a></li>
        <?php endif; ?>
      </ul>
    </nav>
    <?php if(Auth::check()): ?>
    <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container">
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" style="width: 30%">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Profile</h4>
              <button type="button" class="close" id="removeImage" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body long-modal">
              <div class="long-card" style="width: 30rem;">
                <div class="avatar-upload">
                  <div class="avatar-preview">
                    <div class="long-image" id="imagePreview" <?php if(Auth::check()): ?> <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      style="background-image: url(<?php echo e(asset('/uploads/imguser/'.$val->avatar)); ?>)">
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>

                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <h3 class="card-title"><strong><?php echo e($val->name); ?></strong></strong></h3>
                  <h5 class="card-subtitle mb-2 text-muted"><?php echo e(Auth::User()->email); ?></h5>
                  <p class="card-text"><?php echo e($val->introduce); ?></p>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info"><a style="color: white; text-decoration: none;"
                  href="<?php echo e(route('user.get.infouser')); ?>">Chỉnh sửa</a></button>
              <button onclick="logout()" type="button" class="btn btn-danger" data-dismiss="modal">Logout</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  </div>

  <?php echo $__env->yieldContent('content'); ?>

  <div>
    <div class="footer">
      <div class="row" style="margin-right: 0 !important">
        <div class="col-6">
          <div class="member" style="padding-left: 450px">
            <p>Nguyễn Thái Long</p>
            <p>Nguyễn Hoài Nam</p>
            <p>Trần Ngọc Trí</p>
          </div>
        </div>
        <div class="col-6">
          <div class="member" style="padding-left: 80px">
            <p><i class="fab fa-facebook "></i>&emsp;Facebook</p>
            <p><i class="fab fa-twitter"></i>&emsp;Twitter</p>
            <p><i class="fab fa-youtube"></i>&emsp;Youtube</p>
          </div>
        </div>
      </div>
      <hr class="hr-footer" />
      <span class="text-footer">© Copyright Sidetracked Ltd 2020.</span>
    </div>
  </div>

  <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="<?php echo e(asset('js/home.master.js')); ?>"></script>
  <?php if(session('alert')): ?>
  <script type="text/javascript">
    window.onload = alert('<?php echo e(session('alert')); ?>');
  </script>
  <?php endif; ?>
  <script>
    function logout(){
      window.location.replace("https://localhost/blog/public/user/logoutuser");
  }
  </script>
  <?php echo $__env->yieldContent('script'); ?>
</body>

</html><?php /**PATH E:\xampp\htdocs\blog\resources\views/home/master.blade.php ENDPATH**/ ?>