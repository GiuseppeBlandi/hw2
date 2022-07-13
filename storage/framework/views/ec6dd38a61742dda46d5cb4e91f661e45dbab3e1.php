

<?php $__env->startSection('title', 'TuttoF1 | Crea Post'); ?>

<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset("js/create.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href='<?php echo e(asset("css/create.css")); ?>'>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


<section class="crea_post">
    <div>
        <h3>Pubblica qualcosa</h3>
        <form class="invia_post " autocomplete="off" method='post' action="<?php echo e(url('create_post')); ?>">
            <?php echo csrf_field(); ?>
            <textarea type="text" name="text"  id="text_area"></textarea>
            <span class="hidden" class="errore">Inserire un testo</span>
            <input type="submit" value="Crea post" id="submit" disabled>                
        </form>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tutto_F1\resources\views/create.blade.php ENDPATH**/ ?>