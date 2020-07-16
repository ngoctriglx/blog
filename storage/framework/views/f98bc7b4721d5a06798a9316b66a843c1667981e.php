
<?php $__env->startSection('title','Quản lý thành viên'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="row">
                <div class="col-10">
                    <h3><strong>Bài viết</strong></h3>
                </div>
                
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <!-- <h5 class="card-title">
                    Bootstrap 4 Form Validation
                </h5> -->
            <ul class="nav nav-tabs">
                <li><a href="#nav-comment" data-toggle="tab">Comment</a></li>
                <li><a href="#nav-replycomment" data-toggle="tab">Replycomment</a></li>
            </ul>
            <div class="tab-content">
                <div class="form-row" id="nav-comment">
                   
                        <table class="table">
                            
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên người dùng</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Repost</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <form action="" method="POST">
                                <?php echo csrf_field(); ?>
                            <tbody>
                                <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valcmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($valcmt->user_id == $valinfo->user_id): ?>
                                <tr>
                                    <th scope="row"><?php echo e($key); ?></th>
                                    <td><?php echo e($valinfo->name); ?></td>
                                    <td><?php echo e($valcmt->content); ?></td>
                                    <td><?php echo e($valcmt->repost); ?></td>
                                    <td>

                                        <button type="button" onclick="myDeletecmt('comment',<?php echo e($valcmt->id); ?>)"
                                            class="btn btn-danger">Xóa</button>

                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </form>
                        </table>
                        <div><?php echo e($comment->links()); ?></div>
                </div>
            </div>
            <div class="tab-content">
                <div class="form-row" id="nav-replycomment">
                   
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên người dùng</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Repost</th>
                                    <th scope="col">Xóa</th>
                                </tr>
                            </thead>
                            <form action="" method="POST">
                                <?php echo csrf_field(); ?>
                            <tbody>
                                <?php $__currentLoopData = $replycomment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valcmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($valcmt->user_id == $valinfo->user_id): ?>
                                <tr>
                                    <th scope="row"><?php echo e($key); ?></th>
                                    <td><?php echo e($valinfo->name); ?></td>
                                    <td><?php echo e($valcmt->content); ?></td>
                                    <td><?php echo e($valcmt->repost); ?></td>
                                    <td>
                                        <button type="button" onclick="myDeletecmt('replycomment',<?php echo e($valcmt->id); ?>)"
                                            class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </form>
                        </table>
                        <div><?php echo e($replycomment->links()); ?></div>
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

<script>
    function myDeletecmt(status,id) {
            var result = confirm("Bạn có muốn xóa ?");
            if (result == true) {
                var formData = new FormData();
                formData.append('id',id);
                formData.append('status',status);
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type:'POST',
                    url:"<?php echo e(route('admin.post.delete.cmt')); ?>",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache:false,
                    success:function(data) {
                        alert(data.success);
                    }
                });
                location.reload();
            }
        }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\blog\resources\views/admin/comment.blade.php ENDPATH**/ ?>