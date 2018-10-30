<?php $__env->startSection('sidebar'); ?>

    <?php if(Auth::user()->role == 'admin'): ?>

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

    <?php elseif(Auth::user()->role == 'delegate'): ?>

        <ul class="list-unstyled">
            <li>
                <a href="<?php echo e(url('/dashboard/delegate/')); ?>">Dashboard</a> 
            </li>
            <li>
                <a href="<?php echo e(url('/dashboard/delegates/programe')); ?>">Programmes</a> 
            </li>
        </ul>

    <?php elseif(Auth::user()->role == 'manager'): ?>

        <ul class="list-unstyled">
            <li>
                <a href="<?php echo e(url('/dashboard/manager/')); ?>">Dashboard</a> 
            </li>
            <li>
                <a href="<?php echo e(url('/dashboard/delegates/example')); ?>">manager Example </a> 
            </li>
        </ul>
    
    <?php elseif(Auth::user()->role == 'exibitor'): ?>

        <ul class="list-unstyled">
            <li>
                <a href="<?php echo e(url('/dashboard/exibitor/')); ?>">Dashboard</a> 
            </li>
            <li>
                <a href="<?php echo e(url('/dashboard/delegates/example')); ?>">exibitor Example </a> 
            </li>
        </ul>

    <?php elseif(Auth::user()->role == 'speaker'): ?>

        <ul class="list-unstyled">
            <li>
                <a href="<?php echo e(url('/dashboard/speaker/')); ?>">Dashboard</a> 
            </li>
            <li>
                <a href="<?php echo e(url('/dashboard/delegates/example')); ?>">speaker Example</a> 
            </li>
        </ul>

    <?php elseif(Auth::user()->role == 'author'): ?>

        <ul class="list-unstyled">
            <li>
                <a href="<?php echo e(url('/dashboard/author/')); ?>">Dashboard</a> 
            </li>
            <li>
                <a href="<?php echo e(url('/dashboard/delegates/example')); ?>">author Example</a> 
            </li>
        </ul>

    <?php endif; ?>

<?php echo $__env->yieldSection(); ?>