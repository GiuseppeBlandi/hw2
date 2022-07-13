<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo.png')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script type="text/javascript">
    const CSFR_TOKEN = '<?php echo e(csrf_token()); ?>';
    </script>
    <?php echo $__env->yieldContent('style'); ?>
    <?php echo $__env->yieldContent('script'); ?>
</head>
<html>
    <body>
       <nav>  
           
            <a href='<?php echo e(url("home")); ?>' class="home">
                <img src="images/home.png" class="hidden">
                <span class="tutto">Tutto</span> <span class="f1">F1</span>
            </a> 
            
            <a href='<?php echo e(url("create")); ?>' class="nav_content">
                <span>Crea post</span>
                <div class="nuovo_post"> </div>
            </a>
            
            <a href='<?php echo e(url("classifiche")); ?>' class="nav_content">
                <span>Classifiche</span>
                <div class="classifiche_image"></div>
            </a>
           
            <a href='<?php echo e(url("profile")); ?>' class="nav_content">
                <span><?php echo e($user['name']); ?></span>
               <div class="profile_image"></div>
            </a>

            <a href='<?php echo e(url("logout")); ?>' class="logout" >
                <div class="logout_image"></div>
                <span class="log">Log</span> <span class="out">out</span>
            </a>    
        
        </nav>
        
        <?php echo $__env->yieldContent('content'); ?>

        <footer>
        <div>
            Creato da Giuseppe Blandi <br>
            1000001403
        </div>
    </footer>
    <body>
<html>
<?php /**PATH C:\xampp\htdocs\tutto_F1\resources\views/layouts/feed.blade.php ENDPATH**/ ?>