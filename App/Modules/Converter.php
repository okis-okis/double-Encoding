<?php

declare(strict_types = 1);

namespace App\Modules;

class Converter
{
    public static function toBinary(int $val): string
    {
        if(is_null($val))
        {
            return 0;
        }

        $result = '';

        while($val>2){
            
            $result = ($val%2 == 0 ? '0' : '1') . $result;

            $val /= 2;
        }

        $result = ($val%2 == 0 ? '0' : '1') . $result;

        while(strlen($result)<8){
            $result = '0' . $result;
        }

        return $result;
    }

    public static function toDecimal(string $val): int
    {
        $result = 0;

        for($i=0; $i<strlen($val); $i++){
            $result += $val[strlen($val)-1-$i] * pow(2, $i);
        }

        return $result;
    }

    public static function toDoubleCode(string $sourceCode): string
    {
        $result = '';

        foreach(str_split($sourceCode) as $num)
            $result = $num . ($num == 1 ? 0 : 1) . $result;
        
        return $result;
    } 

    public static function fromDoubleCode(string $doubleCode): string
    {
        $result = '';
        $arr = str_split($doubleCode);
        for($i=0;$i<strlen($doubleCode);$i+=2)
            $result = $arr[$i] . $result;

        return $result;
    }
}