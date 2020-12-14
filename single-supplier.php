<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
            <div class="supplier-header">
                
                <div class="head-right">     
                    <div class="title"><?php the_title(); ?></div>
                    <div class="address">
                    <?php the_field('address'); ?>
                    <?php the_field('address_2'); ?>
                    </div>
                    <div class="phone-num">
                    <?php the_field('phone_number'); ?>
                    </div>
                    <div class="website">
                    <?php the_field('website'); ?>
                    </div>
                </div>
                <div class="head-mid">
                    <div class="social icons">
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/fb.png" href="<?php the_field('facebook_url'); ?>"></a>
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/tw.png" href="<?php the_field('twitter_url'); ?>"></a>
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/inst.png" href="<?php the_field('insta_url'); ?>""></a>
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/yt.png" href="<?php the_field('youtube_url'); ?>"></a>
                    <img class="ico" src="<?php get_home_url() ?>/wp-content/uploads/2020/09/lkin.png" href="<?php the_field('linkedin_url'); ?>"></a>
                    </div>
                </div>
                <div class="head-left">
                    <div class="logoimg"><img src="\wp-content\themes\divi-child\images\<?php the_field('logo') ?>"/>
                    </div>
                </div>
            </div>
            <div class="featured-img">
            <img src="<?php the_field('featured_image'); ?>" />
            </div>
            <div class="overview-txt"> Company Overview </div>
            <button class="custom-link">View & Compare</button>
            <div class="overview">
            <?php the_field('overview'); ?>
            </div>
            <?php if (get_field('description') ): ?>  
            <div class="feature-txt"> Features </div>
            <div class="description">
            <?php the_field('description'); ?>
            </div>
            <?php endif; ?>
            <div class="double-wide">
            <?php if (get_field('youtube_video_id') ): ?> 
            <div class="youtube-embed clear">
                <div class="more-txt">Learn More</div>
                <iframe width="535" height="280" src="https://www.youtube.com/embed/<?php the_field('youtube_video_id');?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php endif; ?>        
            </div>
            
            <div class="google_map">
            <div class="map-txt">Location</div>
            <?php the_field('dealer_map'); ?>
            </div>
            </div>
            <div class="plow-compare"><img src="<?php get_home_url()?>/wp-content/uploads/2020/08/comparebanner.jpg"></div>  
            </div>
        </div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php

get_footer();
