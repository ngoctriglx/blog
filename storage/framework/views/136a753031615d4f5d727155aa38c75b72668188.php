
<?php $__env->startSection('title','Bài viết'); ?>
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
                                    <th scope="col">#</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Người đăng bài</th>
                                    <th scope="col">Nội dung</th>
                                    <th scope="col">Bình luận</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col">Xử lí</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $valpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($key); ?></th>
                                    <td><?php echo e($valpost->sub_title); ?></td>
                                    <td><?php echo e($valpost->author); ?>o</td>
                                    <td><?php echo e($valpost->content); ?></td>
                                    <td>1</td>
                                    <td><?php echo e($valpost->updated_at); ?></td>
                                    <td>
                                        <a class="f_pc" href="<?php echo e(route('home.get.blogdetail',['id'=>$valpost->id,'title'=>$valpost->title])); ?>">
                                            <button type="button" class="btn btn-success">
                                                Chi tiết
                                            </button>
                                        </a>
                                        <a class="f_pc" href="<?php echo e(route('admin.get.edit',$valpost->id)); ?>">
                                            <button type="button" class="btn btn-info">Sửa</button>
                                        </a>
                                            <button type="button" onclick="myDeletepost('<?php echo e($valpost->sub_title); ?>',<?php echo e($valpost->id); ?>)" class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\blog\resources\views/admin/post.blade.php ENDPATH**/ ?>