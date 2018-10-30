<?php $__env->startSection('title', 'Dashboard - Manage Users'); ?>

<?php $__env->startSection('dashboard'); ?>

<?php $__env->startSection('users'); ?>
    <div class="card">
        <div class="card-header">
        
            <div class="row">

                <div class="col-md-4 ">
                    <div class="mx-auto mt-2">
                        Dashboard - Manage Users
                    </div>
                </div>

                <div class="col-md-8 ">
                    <div class="row ">
                        <div class="col-md-8 offset-md-2 search">
                            <input type="text" class="form-control" autocomplete="off" id="search" placeholder="Seach user here ..." aria-label="Seach user here ..." aria-describedby="basic-addon2">
                        </div>
                        <div class="col-md-2">
                            <a href="" class="btn btn-primary">Add User</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-body">
            <?php if(session('status')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <div class="container">

                <div id="txtHint" class="title-color">
                    <?php echo $__env->make('layouts.dashboard.admin.livesearchajax', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                
            </div>

        </div>
        
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#search").keyup(function(){

                var str=  $("#search").val();
                if(str == "") {
                    $.get( "<?php echo e(asset(url('users/livesearch'))); ?>"); 
                }else {
                    $.get( "<?php echo e(asset(url('users/livesearch?uid='))); ?>"+str, function( data ) {
                        $( "#txtHint" ).html( data ); 
                    });
                }
            });
        }); 
    </script>
<?php echo $__env->yieldSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>