

<?php $__env->startSection('css'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link type="text/css" href="<?php echo e(asset('css/home/blogdetail.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title',$post->title); ?>
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
            <strong>#<?php echo e($post->id); ?></strong>
            <p>Travel</p>
          </span>
          <div class="text-title">
            <h2><?php echo e($post->sub_title); ?></h2>
            <h5>By<a href=""><?php echo e($post->author); ?></a>/<a href=""><?php echo e($post->created_at); ?></a></h5>
          </div>
        </div>
        <div class="title-blog-detail">
          <h2><span><?php echo e($post->title); ?></span></h2>
        </div>
        <div class="tile-content">
          
        </div>
        <hr class="hr-content" />
        <div class="wrap-content">
          <p>
            <?php echo e($post->content); ?>

          </p>
          <hr class="hr-content" />

          <?php $__currentLoopData = $imgpost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valimgpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($valimgpost->post_id === $post->id): ?>
          
          <div style="display: flex; justify-content: center">
            <div class="gallery">
              <a target="_blank" href="<?php echo e(asset('uploads/imgpost/'.$valimgpost->link_img)); ?>">
                <img src="<?php echo e(asset('uploads/imgpost/'.$valimgpost->link_img)); ?>" alt="image content">
              </a>
            </div>
          </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <nav class="long-nav">
            <form action="" method="POST">
              <?php echo csrf_field(); ?>
              <?php if(Auth::check()): ?>
              <?php if(!empty($likepost)): ?>
              <span class="like" data-id="<?php echo e($post->id); ?>"><i id="like" style="color:red;" class="fa fa-heart">
                  <?php if($sllike !=0): ?>
                  <?php echo e($sllike); ?>

                  <?php endif; ?>
                </i></span>
              <?php else: ?>
              <span class="like" data-id="<?php echo e($post->id); ?>"><i id="like" style="color:blue ;" class="fa fa-heart">
                  <?php if($sllike !=0): ?>
                  <?php echo e($sllike); ?>

                  <?php endif; ?>
                </i></span>
              <?php endif; ?>
              
              <span class="fb-share-button" data-href="<?php echo e($urlshare); ?>" data-layout="button" data-size="small"><i
                  style="color: blue;" class="fa fa-share"></i></span>
              <?php else: ?>
              <h3 style="color: blue">Đăng nhập để like và chia sẽ bài viết</h3>
              <?php endif; ?>
            </form>
          </nav>
          <hr class="hr-content" />
        </div>

        

        <div class="u-shadow-v18 g-bg-secondary g-pa-30">
          <img class="d-flex g-width-50 g-height-50 rounded-circle" <?php if(Auth::check()): ?>
            src="<?php echo e(asset('/uploads/imguser/'.$info->avatar)); ?>" <?php else: ?> src="<?php echo e(asset('/uploads/imguser/login.jpg')); ?>"
            <?php endif; ?> alt="Image Description">
          <div class="g-mb-15">
            <h5 class="h5 g-color-gray-dark-v1 mb-0">
              <?php if(Auth::check()): ?><?php echo e($info->name); ?><?php endif; ?>
            </h5>
          </div>
          <form action="" id="comment" data-id="<?php echo e($post->id); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div style="margin-top: 15px;">
              <textarea id="content" name="content" required style="height: 100px;"
                class="form-control u-shadow-v18 g-bg-secondary" placeholder="Comment"></textarea>
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
          <?php if($sumcmt !== 0): ?>
          <h2><?php echo e($sumcmt); ?> Bình luận</h2>
          <?php endif; ?>

          <!-- comment -->
          <?php $__currentLoopData = $cmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valcmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $infocmt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfocmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($valcmt->user_id === $valinfocmt->user_id): ?>
          <div class="row">
            <div class="col-md-12">
              <div class="media g-mb-30 media-comment" style="padding: 30px 0">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                  src="<?php echo e(asset('/uploads/imguser/'.$valinfocmt->avatar)); ?>" alt="Image Description">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                  <div class="g-mb-15">
                    <h5 style="font-size: 20px; font-weight: bold;" class="h5 g-color-gray-dark-v1 mb-0">
                      <?php echo e($valinfocmt->name); ?></h5>
                    <span class="g-color-gray-dark-v4 g-font-size-12"><?php echo e(($valcmt->created_at)); ?></span>
                  </div>

                  <p><?php echo e($valcmt->content); ?></p>

                  <ul class="list-inline d-sm-flex my-0">
                    
                    <li class="list-inline-item ml-auto">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                        <button type="button" class="btn btn-link" onclick="reply(<?php echo e($valcmt->id); ?>)" data-id="">Trả
                          lời</button>
                      </a>
                    </li>
                    <form action="" method="POST">
                      <?php echo csrf_field(); ?>
                    <li class="list-inline-item ml-auto">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                        <button type="button" class="btn btn-link" onclick="repost('comment',<?php echo e($valcmt->id); ?>)" data-id="">Repost</button>
                      </a>
                    </li>
                  </form>
                  </ul>
                </div>
              </div>
              <!-- reply comment -->

              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                  <div class="media g-mb-30 media-comment" id="reply<?php echo e($valcmt->id); ?>" style="display: none">
                    <div class="u-shadow-v18 g-bg-secondary g-pa-30">
                      <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" <?php if(Auth::check()): ?>
                        src="<?php echo e(asset('/uploads/imguser/'.$info->avatar)); ?>" <?php else: ?>
                        src="<?php echo e(asset('/uploads/imguser/login.jpg')); ?>" <?php endif; ?> alt="Image Description">
                      <div class="text-right"><i style="position: relative;
                        top: -50px;
                        font-size: 20px;
                        cursor: pointer;" onclick="reply(<?php echo e($valcmt->id); ?>)"
                          class="fa fa-times-circle comment-icon-x"></i>
                      </div>
                      <div class="g-mb-15">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0"><?php if(Auth::check()): ?>
                          <?php echo e($info->name); ?>

                          <?php endif; ?></h5>
                      </div>
                      <form action="" method="POST">
                        
                        <?php echo csrf_field(); ?>
                        <div style="margin-top: 15px;">
                          <textarea style="height: 130px; width: 555px" id="content<?php echo e($key); ?>" name="content<?php echo e($key); ?>"
                            required class="form-control u-shadow-v18 g-bg-secondary" placeholder="comment"></textarea>
                          <div style="margin-top: 15px;">
                            <div class="row">
                              <div class="col-md-8">
                              </div>
                              <div class="col-md-4">
                                <button onclick="replycomment(<?php echo e($valcmt->id); ?>,<?php echo e($key); ?>)" type="button"
                                  style="margin-left: 40px;" class="btn btn-primary">Comment</button>
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
                  <div class="media g-mb-30 media-comment" style="padding: 30px 0">
                    <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15"
                      src="<?php echo e(asset('/uploads/imguser/'.$valinfocmt1->avatar)); ?>" alt="Image Description">
                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                      <div class="g-mb-15">
                        <h5 style="font-size: 20px; font-weight: bold;" class="h5 g-color-gray-dark-v1 mb-0">
                          <?php echo e($valinfocmt1->name); ?></h5>
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
                        <form action="" method="POST">
                          <?php echo csrf_field(); ?>
                        <li class="list-inline-item ml-auto">
                          <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="#!">
                            <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                            <button type="button" class="btn btn-link" onclick="repost('replycomment',<?php echo e($valreplycmt->id); ?>)" data-id="">Repost</button>
                          </a>
                        </li>
                      </form>
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
            <div style="display: flex; justify-content: center;">
              <video width="300" height="180" controls>
                <source src="https://youtu.be/_2QbXjLkRug" type="video/mp4">
                <source src="https://youtu.be/_2QbXjLkRug" type="video/ogg">
              </video>
            </div>
            <div style="margin-top: 20px; display: flex; justify-content: center;">
              <a href="https://www.youtube.com/">
                <button style="width: 300px" type="button" class="btn btn-danger"><i class="fab fa-youtube">&nbsp;Đăng
                    ký</i></button>
              </a>
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
                  <a href="https://www.instagram.com/">
                    <button type="button" class="btn btn-primary"><i class="fab fa-instagram"></i>&nbsp;Follow
                      Instagram</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
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
<script type="text/javascript">
  $(document).ready(function(e){
    $(".like").click(function(e){
      var id = document.getElementById('like');
      var post_id = $(this).attr("data-id");
      if(id.style.color === "blue"){
        id.style.color = "red";
        const status = "like";
        likeFunction(status);
      }else{
        if(id.style.color === "red"){
          id.style.color = "blue";
          const status = "disklike";
          likeFunction(status);
        }
      }
      function likeFunction(status) {
        e.preventDefault();
        console.log(post_id);
        var formData = new FormData();
        formData.append('post_id',post_id);
        formData.append('status',status);
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            type:'POST',
            url:"<?php echo e(route('user.get.like')); ?>",
            data: formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(data) {
               
          }
        });
        location.reload();
      }
    });
    
  });
</script>
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
<script>
  $(document).ready(function(e){
      $("#comment").submit(function(e){
        const post_id = $(this).attr("data-id");
        const content = $("#content").val();
        e.preventDefault();
        const formData = new FormData();
        formData.append('post_id',post_id);
        formData.append('content',content);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:"<?php echo e(route('user.post.comment')); ?>",
            data: formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(data) {
              alert(data.error);
            }
        });
        location.reload();
      });
  });
</script>
<script>
  function replycomment(cmt_id,keycmt){
      const content = $("#content"+keycmt).val();
     
      const formData = new FormData();
      formData.append('cmt_id',cmt_id);
      formData.append('content',content);
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:"<?php echo e(route('user.post.replycomment')); ?>",
            data: formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(data) {
              alert(data.error);
            }
        });
        location.reload();
      }
</script>
<script>
  function reply(cmt_id) {
      var x = document.getElementById("reply"+cmt_id);
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    }
</script>
<script>
  function repost(status,id){
    const formData = new FormData();
      formData.append('cmt_id',id);
      formData.append('status',status);
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:"<?php echo e(route('user.post.repostcomment')); ?>",
            data: formData,
            contentType: false,
            processData: false,
            cache:false,
            success:function(data) {
              alert(data.success);
            }
        });
        
  }
</script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
  src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=660344757451291&autoLogAppEvents=1">
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\blog\resources\views/home/blogdetail.blade.php ENDPATH**/ ?>