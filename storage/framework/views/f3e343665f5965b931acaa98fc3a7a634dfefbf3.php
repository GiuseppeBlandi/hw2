

<?php $__env->startSection('title', 'TuttoF1 | Accedi'); ?>

<?php $__env->startSection('content'); ?>
<section>
      <div>
        <h1>Accedi</h1>
        <h2>Inserisci le tue credenziali</h2>
      </div>

      <form name='login' method='post' autocomplete="off" action="<?php echo e(url('login')); ?>">
        <?php echo csrf_field(); ?>
        <div class="username">
        <div><label for='username'>Nome utente</label></div>
            <div><input type='text' name='username' placeholder="Inserire lettere e numeri" value="<?php echo e(old('username')); ?>"></div>
        </div>
        <div class="password">
        <div><label for='password'>Password</label></div>
            <div><input type='password' placeholder="Min. 8 caratteri" name='password' ></div>
        </div>
        <div class="remember">
            <div><input type='checkbox' name='remember' value="1" ></div>
            <div><label for='remember'>Ricorda l'accesso</label></div>
        </div>
        <div>
            <input type='submit' value="Accedi">
        </div>
    </form>
    <div class="signup">Non hai un account? <a href='<?php echo e(url("register")); ?>'>Iscriviti</a>
</section>   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tutto_F1\resources\views/login.blade.php ENDPATH**/ ?>