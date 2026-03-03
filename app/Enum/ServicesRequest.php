<?php

namespace App\Enum;

enum ServicesRequest : string 
{
    case Medical_Examination = 'كشف طبي';
    case Medical_Consultation= 'استشارة طبية';
    case Laboratory_Tests = 'تحاليل مخبرية';
    case Rays = 'أشعة';
    case CT_Scan = 'تصوير CT';
    case MRI_Scan= 'تصوير MRI';
    case ECG = 'تخطيط القلب';
    case Physical_Therapy = 'علاج طبيعي';
    case Review= 'متابعة طبيه';
    case Inoculation = 'تطعيم';

    
    public function label(){
        return match($this){
             self::Medical_Examination => 'كشف طبي',
             self::Medical_Consultation => 'استشارة طبية',
             self::Laboratory_Tests => 'تحاليل مخبرية',
             self::Rays => 'أشعة',
             self::CT_Scan => 'تصوير CT',
             self::MRI_Scan => 'تصوير MRI',
             self::ECG => 'تخطيط القلب',
             self::Physical_Therapy => 'علاج طبيعي',
             self::Review => 'متابعة طبيه',
             self::Inoculation => 'تطعيم'
           
        };
    }
    
    public function options(){
      return collect(self::cases())->mapWithKeys(fn($case)=>[
            $case->value => $case->label()
           ])->toArray();
    }
 
   
}
