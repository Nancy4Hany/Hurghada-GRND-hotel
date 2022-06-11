<?php

class Helper{
    public static function snake2camel($str, $with_spaces = false)
    {
        $str = ucwords(str_replace('_', ' ', $str));
        if(!$with_spaces){
            $str = str_replace(' ', '', $str);
        }
        return $str;
    }
}



















