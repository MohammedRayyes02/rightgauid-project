<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceQuoteFile extends Model
{
    protected $fillable = [
        'price_quote_id',
        'path',
        'original_name'

    ];

    public function priceQuote(){
        return $this->belongsTo(PriceQuote::class);
    }

    }
