
<?php $__env->startSection('title','Quản lý thành viên'); ?>
<?php $__env->startSection('content'); ?>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="row">
                <div class="col-10">
                    <h3><strong>Bài viết</strong></h3>
                </div>
                <div class="col-2">
                    <a class="f_pc" href="<?php echo e(route('admin.get.add')); ?>">
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
       
                    <div class="form-row">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Tên thành viên</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Tên</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valcmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $valinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($valcmt->user_id == $valinfo->user_id): ?>
                                    <tr>
                                        <th scope="row"><?php echo e($key); ?></th>
                                        <td><?php echo e($valinfo->name); ?></td>
                                        <td><?php echo e($valcmt->content); ?>o</td>
                                        <td><?php echo e($valcmt->repost); ?></td>
                                        <td><?php echo e($valcmt->id); ?></td>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
    function myDeletepost(subtitle,id1){
        var subtitle;
        var id = id1;
        var result = confirm("Bạn có muốn xóa "+subtitle+" ?");
        if (result == true) {
            window.location.href = "http://localhost/blog/public/admin/delete/"+id
          }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\blog\resources\views/admin/comment.blade.php ENDPATH**/ ?>