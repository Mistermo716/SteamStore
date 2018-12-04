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

if (! function_exists('checked')) {
    function checked($expected, $value, $type = 'checked') {
        $values = collect($value);
        $values = $values->map(function ($v) {
            return $v instanceof \Illuminate\Database\Eloquent\Model ? $v->id : $v;
        });

        return $values->contains($expected) ? ' '.$type : '';
    }
}

if (! function_exists('selected')) {
    function selected($expected, $value) {
        return checked($expected, $value, 'selected');
    }
}
