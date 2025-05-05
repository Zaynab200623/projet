<?php

// App\Models\Client.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{
    protected $fillable = ['user_id', 'name'];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}

}
