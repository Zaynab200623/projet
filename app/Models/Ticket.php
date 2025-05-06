<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'title', 'description', 'priority', 'status', 'project_id', 'assigned_to'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}


