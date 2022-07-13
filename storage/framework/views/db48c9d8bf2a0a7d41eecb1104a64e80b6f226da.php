<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo.png')); ?>">
    <link rel='stylesheet' href='<?php echo e(asset("css/login.css")); ?>'>
    <?php echo $__env->yieldContent('script'); ?>
    
</head>
<body>

            <?php echo $__env->yieldContent('content'); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\tutto_F1\resources\views/layouts/guest.blade.php ENDPATH**/ ?>