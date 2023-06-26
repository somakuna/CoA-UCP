<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'sqlid';

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

}
