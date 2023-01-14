

<?php $__env->startSection('content'); ?>
<style>
.containers {
  max-width: 100%;
  background-color: #212763;
  margin: auto;
  padding: 100px 30px 129px;
}

.logo {
  margin-bottom: 56px;
}

.logo img {
  width: 60%;
}

h1 {
  color: white;
}

.form-group {
  position: relative;
  margin-bottom: 15px;
}

.form-control {
  background: transparent;
  border: none;
  font-size: 18px;
  height: 50px;
  color: white;
  border: 1px solid transparent;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 40px;
  padding: 15px 20px 17px;
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

.form-control:hover,
.form-control:focus {
  background: transparent;
  outline: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  color: white;
  border-color: rgba(255, 255, 255, 0.4);
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
}

.btn.btn-primary:hover{
  box-shadow: 0 0 30px rgba(0,0,0,0.4);
  transform: scale(1.05);
}

.btn-link:hover{
  transform: scale(1.05);
}

/* Checkbox */
.form-check-label{
  cursor:pointer;
}

.form-check-label:hover{
  transform: scale(1.05);
}

.checkbox-primary {
  color: #fff;
}

.checkbox-wrap {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 18px;
  font-weight: 500;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.checkbox-wrap input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "\f0c8";
  font-family: "FontAwesome";
  position: absolute;
  color: rgba(255, 255, 255, 0.1);
  font-size: 20px;
  margin-top: -4px;
  -webkit-transition: 0.3s;
  -o-transition: 0.3s;
  transition: 0.3s;
}

.checkbox-wrap input:checked~.checkmark:after {
  display: block;
  content: "\f14a";
  font-family: "FontAwesome";
  color: rgba(0, 0, 0, 0.2);
}

.checkbox-primary {
  color: #fff;
}

.checkbox-primary input:checked~.checkmark:after {
  color: #f7db1b;
}

.text-md-right {
  text-align: right !important;
}

.form-group a{
  font-size: 18px;
  text-decoration: none;
  transition: 0.5s;
}
</style>
<div class="containers">
  <div class="row justify-content-center">
    <div class="col-md-6 text-center mb-5">
        <div class="logo"><img src="../images/neweralogo.png"></div>
        <h1 class="mt-5">LOGIN</h1>
    </div>
  </div>
  <div class="row justify-content-center mt-4">
        <div class="col-md-6 col-lg-3">
            <div class="p-0">
                    <form method="POST" class="signin-form" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <div>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Email">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="Password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <div class="form-group mb-1">
                          <button type="submit" class="form-control btn btn-primary submit mb-2">
                              <?php echo e(__('Login')); ?>

                          </button>
                          <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link text-white" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot Your Password?')); ?>

                                    </a>
                                <?php endif; ?>
                        </div>
                        <div class="row mb-3 ms-1">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label text-white fs-6 text" for="remember">
                                        <?php echo e(__('Remember Me')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>  
                        <!-- Original -->
                        <!-- <div class="row mb-0">
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit">
                                    <?php echo e(__('Login')); ?>

                                </button>

                                <?php if(Route::has('password.request')): ?>
                                    <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                        <?php echo e(__('Forgot Your Password?')); ?>

                                    </a>
                                <?php endif; ?>
                            </div>
                        </div> -->
                    </form>
                </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\amazingphp\Assignment\resources\views/auth/login.blade.php ENDPATH**/ ?>