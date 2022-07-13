

<?php $__env->startSection('title', 'TuttoF1 | Home'); ?>
    
<?php $__env->startSection('script'); ?>
<script src='<?php echo e(asset("js/home.js")); ?>' defer></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel='stylesheet' href='<?php echo e(asset("css/home.css")); ?>'>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

        <section class='races'>
        <div class='last_race'></div> 
            <div class='next_race'></div>    
        </section>
        
        <main>
            <section id="feed">
            <template id="post_template">
                <article class="post">
                    <div class="userinfo">
                        <div class="names">
                            <a>
                                <div class="name"></div>
                                <div class="username"></div>
                            </a>
                        </div>
                        <div class="time"></div>
                    </div>
                    <div class="content"></div>
                    <div class="actions">
                        <div class="like"><span></span></div>
                        <div class="comment"><span></span></div> 
                    </div>
                    <div class="comments">
                            <div class="past_messages"></div>
                            <div class="comment_form">
                                <form autocomplete="off">
                                    <input type="text" name="comment" maxlength="254" placeholder="Scrivi un commento..." required="required">
                                    <input type="submit">
                                    <input type="hidden" name="post_id">
                                </form>
                        </div>
                    </div>
                </article>
            </section>
            </template>
        </main>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.feed', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tutto_F1\resources\views/home.blade.php ENDPATH**/ ?>