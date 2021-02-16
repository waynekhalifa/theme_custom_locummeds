<?php
/**
 * This template for creating social media share
 */

$job_post = "https://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
<ul class="social-sharings">
    <li><a href="https://www.facebook.com/sharer.php?u=<?php echo $job_post; ?>" target="_blank" rel="nofollow" class="facebook"><?php _e('Share', 'custom-locummeds'); ?></a></li>
    <li><a href="https://twitter.com/share?url=<?php echo $job_post; ?>" target="_blank" rel="nofollow" class="twitter"><?php _e('Tweet', 'custom-locummeds'); ?></a></li>
    <li><a href="https://plus.google.com/share?url=<?php echo $job_post; ?>" target="_blank" rel="nofollow" class="google"><?php _e('Google', 'custom-locummeds'); ?></a></li>
</ul>