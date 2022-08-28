<?php

namespace Modules\Surat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Surat\Database\factories\SuratmasukFactory;

class Suratmasuk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        // return SuratmasukFactory::new();
    }
}
