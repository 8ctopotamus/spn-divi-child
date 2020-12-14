<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
            <div class="supplier-header">
                
                <div class="head-right">     
                    <div class="title"><?php the_title(); ?></div>
                    <div class="address">
                    <?php the_field('c_address_1'); ?>
                    <?php the_field('c_address_2'); ?>
                    </div>
                    <div class="phone-num">
                    <?php the_field('c_phone'); ?>
                    </div>
                    <div class="website">
                    <?php the_field('website'); ?>
                    </div>
                </div>
                <div class="head-mid">
                    <div class="social icons">
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/fb.png" href="<?php the_field('dealer_fb'); ?>"></a>
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/tw.png" href="<?php the_field('dealer_tw'); ?>"></a>
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/inst.png" href="<?php the_field('insta_url'); ?>""></a>
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/yt.png" href="<?php the_field('dealer_yt'); ?>"></a>
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/lkin.png" href="<?php the_field('dealer_lki'); ?>"></a>
                    </div>
                </div>
                <div class="head-left">
                    <?php if (get_field('logo') ): ?>
                    <div class="logoimg"><img src="\wp-content\themes\divi-child\images\<?php the_field('logo') ?>"/>
                    </div>
                    <?php else: ?>
                    <div class="logo_url"><img src="<?php the_field('logo_url') ?>"/>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (get_field('youtube_video_id') ): ?> 
            <div class="youtube-embed clear">
                <iframe width="535" height="280" src="https://www.youtube.com/embed/<?php the_field('youtube_video_id');?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php endif; ?>        
            </div>
            <div class="overview-txt"> Company Overview </div>
            <div class="overview">
            <?php the_field('dealer_description'); ?>
            </div>
            <?php if (get_field('youtube_list_id') ): ?> 
            <div class="youtube-playlist-embed">
            <iframe width="535" height="280" src="https://www.youtube.com/embed/videoseries?list=<?php the_field('youtube_list_id');?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <?php endif; ?>  
            <?php if (get_field('description') ): ?>
            <div class="feature-txt"> Features </div>
            <div class="description">
            <?php the_field('description'); ?>
            </div>
            <?php endif; ?> 
            <div class="google_map">
            <?php the_field('dealer_map'); ?>
            </div>
        </div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php

get_footer();
