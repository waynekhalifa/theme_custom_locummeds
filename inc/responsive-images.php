<?php 
/**
 * This template for displaying responsize images sizes
 */
function responsive_thumbnail($image_id, $img) {
    $img_small = wp_get_attachment_image_url( $image_id, $img . '-mobile' );
    $img_medium = wp_get_attachment_image_url( $image_id, $img . '-tablet' );
    $img_large = wp_get_attachment_image_url( $image_id, $img . '-desktop' );
    $img_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
    echo 
    '<picture>
        <source srcset="'. $img_large .'" media="(min-width: 1200px)">
        <source srcset="'. $img_medium .'" media="(min-width: 768px)">
        <img srcset="'. $img_small .'"  alt="'. $img_alt .'">
    </picture>';
}