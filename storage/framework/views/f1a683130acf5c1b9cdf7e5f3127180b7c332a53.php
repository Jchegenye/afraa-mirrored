<table id="txtHint" class="table table-striped title-color">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Permission</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php $__currentLoopData = $usersSearch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index +1); ?></td>
                <td><?php echo e($user->name); ?></td>
                <td><a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a></td>
                <td><?php echo e($user->role); ?></td>
                <td>
                    <div class="truncate-ellipsis">
                        <?php $__currentLoopData = json_decode($user->permission); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php $__currentLoopData = $allpermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allpermission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($allpermission->machine_name === $permission): ?>
                                    
                                <span class="badge badge-light">
                                    <?php echo e($allpermission->name); ?>

                                </span>
                                
                                <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </td>
                <td>
                    <?php if($user->verified === 1): ?>
                        Verified
                    <?php else: ?>
                        Not Verified
                    <?php endif; ?>
                </td>
                <td>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                        <label class="btn btn-success btn-sm active">
                            <a href="" title="Edit" style="color:#fff; text-decoration:none;">Edit
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </label>
                        <label class="btn btn-primary btn-sm">
                            <a href="" title="Lock /Unlock" style="color:#fff;  text-decoration:none;">Lock
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </a>
                        </label>
                        <label class="btn btn-danger btn-sm">
                            <a href="" title="Delete" style="color:#fff; text-decoration:none;">Delete
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </a>
                        </label>
                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>

    <tr>
        <td colspan="5" >
            Showing from <?php echo $usersSearch->firstItem(); ?> to <?php echo $usersSearch->lastItem(); ?> of <?php echo $usersSearch->total(); ?> entries
        </td>
        <td colspan="2" class="text-right"><?php echo $usersSearch->links(); ?></td>
    </tr>
</table>