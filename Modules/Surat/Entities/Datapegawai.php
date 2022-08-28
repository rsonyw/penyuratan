<?php

namespace Modules\Surat\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Datapegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function newFactory()
    {
        // return \Modules\Surat\Database\factories\DatapegawaiFactory::new();
    }
}
