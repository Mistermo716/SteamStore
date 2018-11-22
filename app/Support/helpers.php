<?php

if (! function_exists('clamp')) {
    function clamp($current, $min, $max) {
        return max($min, min($max, $current));
    }
}
