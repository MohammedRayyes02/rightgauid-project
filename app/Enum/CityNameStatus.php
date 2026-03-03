<?php

namespace App\Enum;

enum CityNameStatus: string{
    case Istambul = 'istambul';
    case Trabzon = 'trabzon';
    case Anqara = 'anqara';
    case Azmer = 'azmer';
    case Antalia = 'antalia';
    case Galata = 'galata';


public function label(){

return match($this){
    self::Istambul =>'اسطنبول',
    self::Trabzon =>'طرابزون',
    self::Anqara => 'أنقرة',
    self::Antalia =>'أنطاليا',
    self::Azmer =>'أزمير',
    self::Galata =>'جالطة',

};

}

public static function options(){

    return collect(self::cases())
    ->mapWithKeys(fn($case)=>[
        $case->value => $case->label()
    
        ])->toArray();
} 


}

?>