<?php

if (!function_exists('getYoutubeId')) {
    function getYoutubeId($url)
    {
        preg_match(
            '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
            $url,
            $match
        );

        return $match[1] ?? null;
    }
}
