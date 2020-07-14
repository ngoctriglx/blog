<?php 
use App\Info;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

?>


<?php $__env->startSection('css'); ?>
<link type="text/css" href="<?php echo e(asset('css/home/blogdetail.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('title',$valpost->title); ?>
<?php $__env->startSection('content'); ?>
<div>
  <div class="wrap-container">
    <div class="row">
      <div class="col-8">
        <hr />
        <div class="wrap-image">
          <img <?php $__currentLoopData = $imgavt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valimgavt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> src="<?php echo e(asset('uploads/imgpost/'.$valimgavt->link_img)); ?>" <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            alt="detail-blog" />
        </div>
        <div class="wrap-title">
          <span class="icon-title">
            <strong>#<?php echo e($valpost->id); ?></strong><p>Travel</p>
          </span>
          <div class="text-title">
            <h2><?php echo e($valpost->sub_title); ?></h2>
            <h5>By<a href=""><?php echo e($valpost->author); ?></a>/<a href=""><?php echo e($valpost->created_at); ?></a></h5>
          </div>
        </div>
        <div class="title-blog-detail">
          <h2><span><?php echo e($valpost->place); ?></span></h2>
        </div>
        <div class="tile-content">
          <strong> # </strong> <?php echo e($valpost->title); ?>

        </div>
        <hr class="hr-content" />
        <div class="wrap-content">
          <p>
            <?php echo e($valpost->content); ?>

          </p>
          <hr class="hr-content" />
          
          <?php $__currentLoopData = $imgpost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valimgpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($valimgpost->post_id === $valpost->id): ?>
          
          <div class="gallery">
            <a target="_blank" href="<?php echo e(asset('uploads/imgpost/'.$valimgpost->link_img)); ?>">
              <img src="<?php echo e(asset('uploads/imgpost/'.$valimgpost->link_img)); ?>" alt="image content">
            </a>
            
          </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <nav class="long-nav">
            <span><i style="color: red;" class="fa fa-heart"></i></span>
            <span><i style="color: orange;" class="fa fa-bookmark"></i></span>
            <span><i style="color: blue;" class="fa fa-share"></i></span>
          </nav>
          <hr class="hr-content" />
        </div>
        
        <img class="d-flex g-width-50 g-height-50 rounded-circle" <?php if(Auth::check()): ?> <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          src="<?php echo e(asset('/uploads/imguser/'.$valinfo->avatar)); ?>" <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?> src="<?php echo e(asset('/uploads/imguser/login.jpg')); ?>" <?php endif; ?>
          alt="Image Description">
        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
          <div class="g-mb-15">
            <h5 class="h5 g-color-gray-dark-v1 mb-0">
              <?php if(Auth::check()): ?>
              <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($valinfo->name); ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </h5>
          </div>
          <form action="<?php echo e(route('user.post.comment',$valpost->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div style="margin-top: 15px;">
              <textarea name="content" required style="height: 100px;"
                class="form-control media-body u-shadow-v18 g-bg-secondary" placeholder="Comment"></textarea>
                
              <div style="margin-top: 15px;">
                <div class="row">
                  
                  <div class="col-md-4">
                    <button style="margin-left: 10px;" type="submit" class="btn btn-primary">Comment</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="wrap-comment">
          <h2><?php echo e($cmt->count()); ?> COMMENT</h2>
          
          <!-- comment -->
          <?php $__currentLoopData = $cmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valcmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $infocmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfocmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($valcmt->user_id === $valinfocmt->user_id): ?>
          <div class="row">
            <div class="col-md-12">
              <div class="media g-mb-30 media-comment">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="<?php echo e(asset('/uploads/imguser/'.$valinfocmt->avatar)); ?>"
                  alt="Image Description">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                  <div class="g-mb-15">
                    <h5 style="font-size: 20px; font-weight: bold;" class="h5 g-color-gray-dark-v1 mb-0"><?php echo e($valinfocmt->name); ?></h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12"><?php echo e(($valcmt->created_at)); ?></span>
                  </div>

                  <p><?php echo e($valcmt->content); ?></p>

                  <ul class="list-inline d-sm-flex my-0">
                    <li class="list-inline-item g-mr-20">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                        178
                      </a>
                    </li>
                    <li class="list-inline-item g-mr-20">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                        34
                      </a>
                    </li>
                    <li class="list-inline-item ml-auto">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                        Reply
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- reply comment -->
              
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                  <div class="media g-mb-30 media-comment">
                    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" <?php if(Auth::check()): ?>
                      <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> src="<?php echo e(asset('/uploads/imguser/'.$valinfo->avatar)); ?>" <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php else: ?>
                      src="<?php echo e(asset('/uploads/imguser/login.jpg')); ?>" <?php endif; ?> alt="Image Description">
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                      <div class="text-right"><i class="fa fa-times-circle"></i>
                      </div>
                      <div class="g-mb-15">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0"><?php if(Auth::check()): ?>
                          <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php echo e($valinfo->name); ?>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?></h5>
                      </div>
                      <form action="<?php echo e(route('user.post.replycomment',$valcmt->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div style="margin-top: 15px;">
                          <textarea style="height: 130px;" name="content" required
                            class="form-control media-body u-shadow-v18 g-bg-secondary"
                            placeholder="comment"></textarea>
                          <div style="margin-top: 15px;">
                            <div class="row">
                              <div class="col-md-8">
                              </div>
                              <div class="col-md-4">
                                <button style="margin-left: 56px;" type="submit"
                                  class="btn btn-primary">Comment</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                  <?php $__currentLoopData = $replycmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valreplycmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $__currentLoopData = $infocmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfocmt1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($valreplycmt->comment_id === $valcmt->id): ?>
                  <?php if($valreplycmt->user_id === $valinfocmt1->user_id): ?>
                  <div class="media g-mb-30 media-comment">
                    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                      src="<?php echo e(asset('/uploads/imguser/'.$valinfocmt1->avatar)); ?>" alt="Image Description">
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                      <div class="g-mb-15">
                        <h5 style="font-size: 20px; font-weight: bold;" class="h5 g-color-gray-dark-v1 mb-0"><?php echo e($valinfocmt1->name); ?></h5>
                        <span class="g-color-gray-dark-v4 g-font-size-12"><?php echo e(($valreplycmt->created_at)); ?></span>
                      </div>

                      <p><?php echo e($valreplycmt->content); ?></p>

                      <ul class="list-inline d-sm-flex my-0">
                        <li class="list-inline-item g-mr-20">
                          <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="fa fa-thumbs-up g-pos-rel g-top-1 g-mr-3"></i>
                            178
                          </a>
                        </li>
                        <li class="list-inline-item g-mr-20">
                          <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="fa fa-thumbs-down g-pos-rel g-top-1 g-mr-3"></i>
                            34
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      
      <div class="col-4">
        <div class="interactive">
          <div>
            <h2>SUBSCRIBE</h2>
            <div class="wrap-avatar-square">
              <img class="avatar-square"
                src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                alt="interactive-avatar" />
              <div class="child">
                <code>Viet Nam Travel</code>
                <button><i class="fab fa-youtube">&nbsp;YouTube</i></button>
                <div class="followers"><a href="/">40k</a></div>
              </div>
            </div>
          </div>
          <div>
            <h2>ABOUT</h2>
            <div class="wrap-avatar-cycler">
              <img class="avatar-cycler"
                src="https://images.unsplash.com/photo-1592252687443-08df10cd260c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                alt="interactive-avatar" />
              <span>
                Này đó! Tôi là Aileen Adalid. 21 tuổi, tôi bỏ công việc công ty ở Philippines để theo đuổi ước mơ.
                Ngày nay, tôi là một người du mục kỹ thuật số thành công (doanh nhân, nhà văn du lịch, & vlogger) sống
                một lối sống du lịch bền vững.
              </span>
              <span>
                Nhiệm vụ của tôi? Để cho bạn thấy làm thế nào hoàn toàn có thể tạo ra
                một cuộc sống du lịch (bất kể tỷ lệ cược), và tôi sẽ giúp bạn đạt được điều đó thông qua hướng dẫn du
                lịch chi tiết, cuộc phiêu lưu, tài nguyên, mẹo và THÊM của tôi!
              </span>
            </div>
          </div>
          <div>
            <h2>INSTAGRAM</h2>
            <div class="interactive-instagram">
              <div class="row wrap-cards">
                <div class="col-6 card-items">
                  <div class="card" style="width: 10rem; border: none;">
                    <img class="card-img-top"
                      src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                      alt="Card image cap">
                  </div>
                </div>
                <div class="col-6 card-items">
                  <div class="card" style="width: 10rem; border: none;">
                    <img class="card-img-top"
                      src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                      alt="Card image cap">
                  </div>
                </div>
                <div class="col-6 card-items">
                  <div class="card" style="width: 10rem; border: none;">
                    <img class="card-img-top"
                      src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                      alt="Card image cap">
                  </div>
                </div>
                <div class="col-6 card-items">
                  <div class="card" style="width: 10rem; border: none;">
                    <img class="card-img-top"
                      src="https://images.unsplash.com/photo-1592218636432-1fcfb03707dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                      alt="Card image cap">
                  </div>
                </div>
                <div class="button-instagram">
                  <button type="button" class="btn btn-primary"><i class="fab fa-instagram"></i>&nbsp;Follow
                    Instagram</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
  function checkcmt(){
    var a = document.getElementById('cmt').value;
    if(a){
      document.getElementById('bncmt').disabled = false;
    }
    else{
      document.getElementById('bncmt').disabled = true;
    }
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\blog\resources\views/home/blogdetail.blade.php ENDPATH**/ ?>