<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    protected $fillable=['horairedebut','horairefin','Validation','Comment','Commentaire','idusers'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

