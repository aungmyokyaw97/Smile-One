<?
namespace Amk\SmileOne\Facades;

use Illuminate\Support\Facades\Facade;

class SmileOne extends Facade {


    protected static function getFacadeAccessor() { 
        return \Amk\SmileOne\SmileOne::class; 
    }

}