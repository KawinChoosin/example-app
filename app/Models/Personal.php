<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    
    protected $table = 'personals'; // Ensure this matches your table name
    
    protected $fillable = ['type', 'description']; // Allow mass assignment
    public function users()
{
    return $this->belongsToMany(User::class);
}

}
