<?php

if (! function_exists('clamp')) {
    function clamp($current, $min, $max) {
        return max($min, min($max, $current));
    }
}

if (! function_exists('currency')) {
    function currency($amount, $zero = 'Free', $prefix = '$') {
        return $amount > 0 ? $prefix . number_format((float) $amount, 2, '.', '')
            : $zero;
    }
}
