<?php
/**
 * This template responsible for creating custom excerpt
 */

function custom_locummeds_excerpt($text, $length)
{
    $length = abs((int)$length);
    if(strlen($text) > $length) {
       $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
    }
    return($text);
}