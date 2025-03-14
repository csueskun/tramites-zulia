<?php

if (!function_exists('expandAbbreviation')) {
    function expandAbbreviation($abbr)
    {
        $dictionary = config('abbreviations');
        return $dictionary[$abbr] ?? $abbr; // Return original text if not found
    }
}