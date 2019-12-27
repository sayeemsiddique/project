<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body app-home">
        <form action="<?php echo e(route('filter_group')); ?>" method="get">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search">
                </div>
                <div class="col-md-4">
                    <select name="date" id="date" class="form-control">
                        <option value="">All</option>
                        <?php $__currentLoopData = $buffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                    $time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->sent_at)->format('d M Y');
                 ?>
                        <option value="<?php echo e($item->sent_at); ?>"><?php echo e($time); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    
                </div>
                <div class="col-md-4">
                    <select name="group_type" id="select" class="form-control">
                        <option value="">All</option>
                        <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($groups->group_id); ?>"><?php echo e($groups->group_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success">Filter</button>
                </div>
            </div>
        </form>
        <div class="row">
            
            <div class="col-md-12">
                <h2>Recent post sent to buffer</h2>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text </th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $buffer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td>
                            <?php if($item->groupInfo): ?>
                            <?php echo e($item->groupInfo->name); ?>

                            <?php endif; ?>
                            
                        </td>
                        <td>
                            <?php if($item->groupInfo): ?>
                            <?php echo e($item->groupInfo->type); ?>

                            
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($item->accountInfo): ?>
                            <img src="<?php echo e($item->accountInfo->avatar); ?>" alt="">
                            <?php endif; ?>
                            
                        </td>
                        <td><?php echo e($item->post_text); ?></td>
                        <td>
                            <?php 
                                $time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->sent_at)->format('d M Y g:i A');
                             ?>
                            <?php echo e($time); ?>

                        </td>
                      </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    </tbody>
                  </table>
                  <?php echo e($buffer->links()); ?>

            </div>
        </div>
        </div>
        
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>