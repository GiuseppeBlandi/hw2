

<?php $__env->startSection('title', 'TuttoF1 | Profile'); ?>
    
<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href='<?php echo e(asset("css/profile.css")); ?>' >
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
        
<main >
    <article class="profile">
        <div><span class='info'>Nome: </span><?php echo e($user['name']); ?></div>
        <div><span class='info'>Cognome: </span><?php echo e($user['surname']); ?></div>
        <div><span class='info'>E-mail: </span><?php echo e($user['email']); ?></div>
        <div><span class='info'>Username: </span><?php echo e($user['username']); ?></div>
        <div><span class='info'>Numero di post: </span><?php echo e($user['nposts']); ?></div>        
    </article>
</main >
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tutto_F1\resources\views/profile.blade.php ENDPATH**/ ?>