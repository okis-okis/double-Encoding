<?php

declare(strict_types = 1);

namespace App\Modules;

class ConnectionLine
{
    public static function addNoise(string $code): string
    {
        
        $errorPos = rand(0, strlen($code)-1);

        $result = '';

        $count = 0;

        foreach(str_split($code) as $num){
            if($errorPos == $count){

                $result .= ($num == '1') ? '0' : '1';

                $count++;

                continue;
            }

            $result .= $num;

            $count++;
        }

        return $result;
    }

    public static function checkNoise(string $code): string
    {
        if(strlen($code)%2 != 0){
            return '<p style="color:red">' . $code . '</p>';
        }

        $arr = str_split($code);

        $result = '';

        for($i = 0; $i < strlen($code); $i+=2){
            if($arr[$i] == $arr[$i+1]){
                $result .= '<span style="color:red">' . $arr[$i] . $arr[$i+1]. '</span>';
                continue;
            }
            $result .= $arr[$i] . $arr[$i+1];
        }

        return $result;
    }
}