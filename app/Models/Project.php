<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Project extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    /**
     * Relation avec l'utilisateur propriétaire du projet
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec les tickets
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
   
}
