
<?php $__env->startSection('title','Du lịch bốn phương'); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('css/home/blog.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div>
  <div class="wrap-container">
    <div class="wrap-information">
      <h1>Blog</h1>
      <code>
            You have found yet another learning space 
            in this universe where you got a chance to 
            learn something useful along with me. 
            ome let learn & explore the world together 😇
          </code>
    </div>
    <div class="social">
      <button class="btn btn-info btn-sm fb" type="button">
        <i class="fab fa-facebook "></i>
        &#160;Follow
      </button>
      <a class="followers" href="https://www.facebook.com/">40k</a>
      <button class="btn btn-secondary btn-sm " type="button">
        <i class="fab fa-twitter"></i>
        &#160;Follow
      </button>
      <a class="followers" href="https://www.facebook.com/">30k</a>
      <button class="btn btn-danger btn-sm" type="button">
        <i class="fab fa-youtube"></i>
        &#160;Youtube
      </button>
      <a class="followers" href="https://www.facebook.com/">20k</a>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row wrap-cards">
      <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php $__currentLoopData = $imgpost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php $__currentLoopData = $val1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($val2->post_id === $val->id): ?>
      <div class="col-sm card-items">
        <div class="card" style="width: 20rem;">
          <img class="card-img-top" style="height: 200px" src="<?php echo e(asset('uploads/imgpost/'.$val2->link_img)); ?>" alt="">
          <div class="card-body" 
          style="display: flex;
          flex-direction: column;
          align-items: start;
          padding: 20px;">
            <h3 class="card-text"><?php echo e($val->title); ?></h3>
            <p class="card-text"><?php echo e($val->sub_title); ?></p>
            <span style="
              white-space: nowrap; 
              width: 150px;
              overflow: hidden;
              text-overflow: ellipsis;
              margin-bottom: 20px">
              <?php echo e($val->content); ?>

            </span>
            <a href="<?php echo e(route('home.get.blogdetail',['id'=>$val->id,'title'=>$val->title])); ?>"><small>Xem thêm</small></a>

          </div>
        </div>
      </div>


      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<div><?php echo e($post->links()); ?></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\blog\resources\views/home/blog.blade.php ENDPATH**/ ?>