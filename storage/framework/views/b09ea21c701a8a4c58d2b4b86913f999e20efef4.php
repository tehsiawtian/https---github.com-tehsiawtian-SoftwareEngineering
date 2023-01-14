

<?php $__env->startSection('content'); ?>
<style>
/* Body */
body {
    background-color: #212763;
}

p{
  font-size: 18px;
  text-align: left;
  font-weight: bold;
  margin-bottom: 5px;
}

.bold{
  font-size: 18px;
  font-weight:bold
}

/* form */
#container{
  background-color: #fff;
  margin: auto;
  border-radius:30px;
  padding: 50px 35px 20px;
  box-shadow: 10px 10px 50px rgba(0,0,0,0.4);
  width: 75%;
  margin-bottom: 30px;
}

#bgcon {
    text-align: center;
    padding: 2%;
}

#bgcon h1 {
    font-size: 6vw;
    font-weight: bold;
    color: #fff;
}

.btn.btn-primary {
  background: #f7db1b;
  border: 1px solid #f7db1b;
  color: #000;
  font-weight: bold;
  box-shadow: 0 0 10px rgba(0,0,0,0.4);
}

.btn {
  cursor: pointer;
  border-radius: 40px;
  -webkit-box-shadow: none;
  box-shadow: none;
  font-size: 16px;
  text-transform: uppercase;
  padding: 10px;
  width:70%;
}

.btn.btn-primary:hover{
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
  transform: scale(1.1);
}

</style>
<body>
    <!-- header -->
    <div id="bg1">
        <div id="bgcon" class="text-center">
            <h1 class="mb-5">#Feedback</h1>
        </div>
    </div>

    <div id=container>
        <!--Title-->
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1><?php echo e(Str::title(auth()->user()->roles->first()->name)); ?> Case Feedback</h1>
                </div>
            </div>
        </div>

        <form method="post" action="<?php echo e(route('helpdesk')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <!--Dropdown button-->
            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', ['staff', 'student'])): ?>
                <?php if(@$edit): ?>
                    <div class="container text-center">
                        <div class="row mb-3">
                            <div class="col-5"></div>
                            <div class="col-5"></div>
                            <div class="col">
                                <?php if(auth()->user()->hasRole('staff')): ?>
                                    <select name="status" class="form-select border border-2 border-secondary" aria-label="Default select example">
                                        <option selected disabled>Please select your status</option>
                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($s->status_id); ?>" <?php echo e(@$case->status_id == $s->status_id ? 'selected':''); ?>><?php echo e($s->status_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                <?php else: ?>
                                    <input type="text" class="form-control border border-2 border-secondary" value="<?php echo e(@$case->status->status_name); ?>" disabled>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!--Assign and Complaint type-->
            <div class="container text-center">
                <div class="row">
                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'helpdesk')): ?>
                        <input type="hidden" name="helpdesk_caseid" value="<?php echo e(@$case->case_id); ?>">
                        <div class="col">
                            <p>Assign to</p>
                            <select name="department" class="form-select mt-1 border border-2 border-secondary" aria-label="Default select example">
                                <option selected disabled>Please select your department</option>
                                <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($d->department_id); ?>" <?php echo e(@$case->department_id == $d->department_id ? 'selected':''); ?>><?php echo e($d->department_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php endif; ?>

                    <div class="col">
                        <p>Complaint Type</p>
                        <?php if(@$edit): ?>
                            <input type="text" class="form-control border border-2 border-secondary" value="<?php echo e(@$case->complaint->complaint_name); ?>" disabled>
                        <?php else: ?>
                            <select name="complaint" class="form-select mt-1 border border-2 border-secondary" aria-label="Default select example">
                                <option selected disabled>Please select your complaint</option>
                                <?php $__currentLoopData = $complaint; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($c->complaint_id); ?>" <?php echo e(@$case->complaint_id == $c->complaint_id ? 'selected':''); ?>><?php echo e($c->complaint_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!--Description-->
            <div class="container text-center">
                <div class="row mt-3">
                    <div class="col">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label bold">Description</label>
                            <textarea name="complaint_desc" class="form-control border border-2 border-secondary" id="exampleFormControlTextarea1" rows="12" value="" <?php echo e(@$edit ? 'disabled':''); ?>><?php echo e(@$case->complaint_desc); ?></textarea>
                        </div>
                    </div>
                <div>
            </div>

            <!--Video and Photo-->
            <?php if(@!$edit): ?>
                <div class="container text-center">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label bold">Relevant Photo and Video</label>
                                <input type="file" name="student_file" class="form-control border border-2 border-secondary" id="formFileMultiple">
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            <?php endif; ?>

            <!--Comment and Review-->
            <?php if(@$edit): ?>
                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', ['staff', 'student'])): ?>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label bold">Comment/Review</label>
                                    <textarea name="staff_comment" class="form-control border border-2 border-secondary"
                                        id="exampleFormControlTextarea1" rows="12" <?php echo e(auth()->user()->hasRole('student') ? 'disabled':''); ?>><?php echo e(@$case->complaint_comment); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <!--supporting docs-->
            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'staff')): ?>
                <input type="hidden" name="staff_caseid" value="<?php echo e(@$case->case_id); ?>">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label bold">Supporting Docs (If any)</label>
                                <input name="staff_file" class="form-control border border-2 border-secondary" type="file"id="formFileMultiple" multiple>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
            <?php endif; ?>

            <!--Remark-->
            <?php if(@$edit): ?>
                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', ['staff', 'student'])): ?>
                    <div class="container text-center">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label bold">Remark for Internal</label>
                                    <textarea name="remark" class="form-control border border-2 border-secondary"
                                        id="exampleFormControlTextarea1" rows="12" <?php echo e(auth()->user()->hasRole('student') ? 'disabled':''); ?>><?php echo e(@$case->complaint_remark); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <!--Submit-->
            <div class="container text-center mt-4">
                <div class="row mb-5">
                    <div class="col-5"></div>
                    <div class="col-2">
                        <?php if(@$edit): ?>
                            <?php if(auth()->user()->hasRole('student')): ?>
                                <a href="<?php echo e(route('home')); ?>" class="btn btn-primary">Back</a>
                            <?php else: ?>
                                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            <?php endif; ?>
                        <?php else: ?>
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        <?php endif; ?>
                    </div>
                    <div class="col-5"></div>
                </div>
            </div>
        </form>
    </div>
</body>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\amazingphp\Assignment\resources\views/helpdesk.blade.php ENDPATH**/ ?>