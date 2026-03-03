<?php

namespace App\Enum;

enum SuggestedDepartments : string
{
    case Gynecology = 'طب النساء';
    case Cardiology = 'أمراض القلب';
    case kidney_diseases = 'أمراض الكلى';
    case Ear_Nose_Throat = 'أنف و أذن , حنجرة';
    case Respiratory_System_Diseases = 'أمراض الجهاز التنفسي';
    case teeth = 'الأسنان';
    case eyes = 'العيون';
    case bones = 'العظام';
    case Digestive_System_Diseases = 'أمراض الجهاز الهضمي' ;
    case nerves = 'الأعصاب';




public function label(){

return match($this){
    self::Gynecology => 'طب النساء',
    self::Cardiology => 'أمراض القلب',
    self::kidney_diseases => 'أمراض الكلى',
    self::Ear_Nose_Throat => 'أنف و أذن , حنجرة',
    self::Respiratory_System_Diseases => 'أمراض الجهاز التنفسي',
    self::teeth => 'الأسنان',
    self::eyes => 'العيون',
    self::bones => 'العظام',
    self::Digestive_System_Diseases => 'أمراض الجهاز الهضمي' ,
    self::nerves => 'الأعصاب',

};

}


    public function options(){
     
      return collect(self::cases())->mapWithKeys(fn($case)=>[
             $case->value => $case->label()
              ])->toArray();
    }



    }
