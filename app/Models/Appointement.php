<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    protected $fillable=['horairedebut','horairefin','Validation','Commentaire','idusers'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

