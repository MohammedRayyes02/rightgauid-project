<?php

namespace App\Enum;

enum LastTest : string
{
    case Today = 'اليوم';
    case Yesterday = 'الأمس';
    case LastWeek = 'الأسبوع الفائت';
    case YearAgo = 'منذ سنة';
    case LongTimeAgo = 'منذ مدة طويلة';     


   public function label(){
    return match($this){
      self::Today => 'اليوم',
      self::Yesterday => 'الأمس',
      self::LastWeek => 'الأسبوع الفائت',
      self::YearAgo => 'منذ سنة',
      self::LongTimeAgo => 'منذ مدة طويلة',    

    };
   } 

    public function options(){
      return collect(self::cases())->mapWithKeys(fn($case)=>[
            $case->value => $case->label()
             ])->toArray();
    }


   }
