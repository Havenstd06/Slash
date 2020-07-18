<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'urls';

    protected $primaryKey = 'id';

    protected $fillable = [
        'original',
        'short'
    ];
}
