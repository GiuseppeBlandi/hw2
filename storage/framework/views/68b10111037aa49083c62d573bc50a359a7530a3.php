

<?php $__env->startSection('title', 'TuttoF1 | Classifiche'); ?>
    
<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset("js/classifiche.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href='<?php echo e(asset("css/classifiche.css")); ?>'>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('content'); ?>

<section id="form" >
      <form class="invia_dati" >
        <select name ='tipo' id='tipo'>
          <option value='piloti'>Classifica Piloti</option>
          <option value='costruttori'>Classifica costruttori</option>
      </select>
      <br>
      <br>
      <span class="insert">Inserisci anno (dal 1950 al corrente)</span>
    <input type="text" id="pilota" placeholder="Inserisci anno">
    <input type="submit" id="search" value="Cerca">
    </form>
</section>

<section id="piloti" >
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tutto_F1\resources\views/classifiche.blade.php ENDPATH**/ ?>