<?php $__env->startSection('sidebar'); ?>
                
    <ul class="list-unstyled">
        <li>
            <a href="<?php echo e(url('/dashboard/admin')); ?>">Dashboard</a> 
        </li>
        <li>
            <a href="<?php echo e(url('/dashboard/users')); ?>">Users</a> 
        </li>
        <li>
            <a href="<?php echo e(url('/dashboard/roles')); ?>">Roles</a>
        </li>
        <li>
            <a href="<?php echo e(url('/dashboard/permissions')); ?>">Permissions</a>
        </li>
    </ul>

<?php echo $__env->yieldSection(); ?>