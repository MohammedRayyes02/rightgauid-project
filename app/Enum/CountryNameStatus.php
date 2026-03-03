<?php

namespace App\Enum;

enum CountryNameStatus: string{
    case Algeria = 'Algeria';
    case Iraq = 'Iraq';
    case Egypt = 'Egypt';
    case Canada = 'Canada';
    case USA = 'USA';
    case UK = 'UK';
    case Palestine = 'Palestine';
    case Kuwait = 'Kuwait';
    case SaudiArabia ='Saudi Arabia';
    case UAE = 'UAE';
    case Sweden = 'Sweden';
    case Tunisia = 'Tunisia';
    case Sudan = 'Sudan';
    case Spain = 'Spain';
    case Colombia = 'Colombia';
    case Argentina = 'Argentina';
    case Yemen = 'Yemen';
    case Oman = 'Oman';
    case Jordan = 'Jordan';
    case Brazil = 'Brazil';
    case Australia= 'Australia';
    case India = 'India';
    case China = 'China';
    case Russia = 'Russia';
    case Indonesia= 'Indonesia';
    case Turkey = 'Turkey';
    case Morocco = 'Morocco';
    case Somalia = 'Somalia';
    case Qatar = 'Qatar';
    case Bahrain = 'Bahrain';
    case Korea = 'Korea' ;
    case Germany = 'Germany';
    case France = 'France';
    case Netherlands = 'Netherlands';
    case Belgium = 'Belgium';
    case Sirya ='Sirya';
    case Lobnan ='Lobnan';


public function label(){

return match($this){
    self::Algeria =>'الجزائر',
    self::Iraq =>'العراق',
    self::Egypt => 'مصر',
    self::Canada =>'كندا',
    self::USA =>'أمريكا',
    self::UK =>'بريطانيا',
    self::Palestine =>'فلسطين',
    self::Kuwait =>'الكويت',
    self::SaudiArabia => 'السعودية',
    self::UAE =>'الإمارات',
    self::Sweden =>'السويد',
    self::Tunisia =>'تونس',
    self::Sudan =>'السودان',
    self::Spain =>'اسبانيا',
    self::Colombia => 'كولوبيا',
    self::Argentina =>'الأرجنتين',
    self::Yemen =>'اليمن',
    self::Oman =>'عمان',
    self::Jordan =>'الأردن',
    self::Brazil =>'البرازيل',
    self::Australia => 'أستراليا',
    self::India =>'الهند',
    self::China =>'الصين',
    self::Russia =>'روسيا',
    self::Indonesia =>'اندونيسيا',
    self::Morocco =>'المغرب',
    self::Turkey => 'تركيا',
    self::Somalia =>'الصومال',
    self::Qatar =>'قطر',
    self::Bahrain =>'البحرين',
    self::Korea =>'كوريا',
    self::Germany => 'ألمانيا',
    self::France =>'فرنسا',
    self::Netherlands =>'هولندا',
    self::Belgium =>'بلجيكا',
    self::Sirya =>'سوربا',
    self::Lobnan =>'لبنان'
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