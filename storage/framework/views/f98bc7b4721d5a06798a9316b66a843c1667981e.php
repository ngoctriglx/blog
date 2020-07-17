
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
                    <li><a href="#a" data-toggle="tab"><button type="button" class="btn btn-primary" style="margin-right: 10px">Comment</button></a></li>
                    <li><a href="#b" data-toggle="tab"><button type="button" class="btn btn-primary">Replycomment</button></a></li>
                 </ul>
                 
                 <div class="tab-content">
                    <div class="tab-pane active" id="a">
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
                                            <form action="<?php echo e(route('admin.post.delete.cmt')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="comment" value="replycomment">
                                                <input type="hidden" name="id" value="<?php echo e($valcmt->id); ?>">
                                                <button type="submit" 
                                                class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <div><?php echo e($replycomment->links()); ?></div>
                        </div>
                    </div>
                    <div class="tab-pane" id="b">
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
                                            <form action="<?php echo e(route('admin.post.delete.cmt')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="comment" value="comment">
                                                <input type="hidden" name="id" value="<?php echo e($valcmt->id); ?>">
                                                <button type="submit" 
                                                class="btn btn-danger">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
    
                            </table>
                            <div><?php echo e($comment->links()); ?></div>
                        </div>

                    </div>
                 </div>
           
            
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\blog\resources\views/admin/comment.blade.php ENDPATH**/ ?>