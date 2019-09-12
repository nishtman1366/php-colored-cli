<?php


namespace nishtman\ColoredCli;


class Cli
{
    public static function setColor($string, $foreground = null, $background = null)
    {
        $colors = new Colors();
        $finalString = '';
        if (key_exists($foreground, $colors->foreground_colors)) {
            $foregroundColor = $colors->foreground_colors[$foreground];
            $finalString .= "\033[" . $foregroundColor . "m";
        }
        if (key_exists($background, $colors->background_colors)) {
            $backgroundColor = $colors->background_colors[$background];
            $finalString .= "\033[" . $backgroundColor . "m";
        }
        $finalString .= $string . "\033[0m";
        return $finalString;
    }

    public static function alert($string)
    {
        return static::setColor($string, 'red');
    }

}