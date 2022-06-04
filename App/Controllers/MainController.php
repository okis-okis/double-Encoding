<?php

declare(strict_types = 1);

namespace App\Controllers;

require_once "App\View.php";
require_once 'App\\Modules\\Converter.php';
require_once 'App\\Modules\\ConnectionLine.php';
require_once 'App\\Modules\\Generator.php';
require_once 'App\\Errors\\ValueException.php';

use App\View;
use App\Modules\Converter;
use App\Modules\Generator;
use App\Errors\ValueException;
use App\Modules\ConnectionLine;

class Main
{
    public function index()
    {

        if(isset($_POST['valueTest'])){
            try{
                $_POST['countRightAnswers'] = 0;

                $value = (int) $_POST['countTest'];

                $parametrs[] = $this->test($value);

            }catch(\Exception $e){
                $_POST['errors'] = $e->getMessage(); 
            }
        }

        if(isset($_POST['autoTest'])){
            $parametrs = [];
            
            $_POST['countRightAnswers'] = 0;

            foreach(Generator::generate() as $value){
                try{

                    $parametrs[] = $this->test($value);
                }catch(\Exception $e){
                    $_POST['errors'] = $e->getMessage(); 
                }
            }
        }
        
        return View::make('index', $parametrs)->render();
    }

    private function test($value): array
    {
        try{
            if($value <80 || $value > 200){
                throw new ValueException();
            }

            $param['value']         = $value;

            $param['binValue']      = Converter::toBinary($value);
            
            $param['doubleCode']    = Converter::toDoubleCode($param['binValue']);

            $param['noiseCode']     = ConnectionLine::addNoise($param['doubleCode']);

            $param['checkCode']     = ConnectionLine::checkNoise($param['noiseCode']);

            $param['fromDoubleCode']= Converter::fromDoubleCode($param['doubleCode']);

            $param['decValue']      = Converter::toDecimal($param['fromDoubleCode']);

            $param['result']        = $value == $param['decValue'] ? 'Correct result' : 'Wrong result';

            $_POST['countRightAnswers']++;

            return $param;

        }catch(\Exception $e){
            $_POST['errors'] = $e->getMessage(); 
        }

        return [];
    }
}