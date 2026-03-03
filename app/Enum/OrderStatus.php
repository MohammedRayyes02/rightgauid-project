<?php

namespace App\Enum;

enum OrderStatus: string{
    case UnderProgress = 'Under progress';
    case Finished = 'Finished';

 public static function default(){
    return self::UnderProgress;
 } 
 
 
    public function label(){

return match($this){
    self::UnderProgress =>'قيد التقدم',
    self::Finished =>'تم الانتهاء'

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