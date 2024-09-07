<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personals'; // Ensure this matches your table name

    protected $fillable = ['type', 'description']; // Allow mass assignment

    // Define the relationship with the User model
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'personality_type_id'); // Use 'personality_type_id' if that's the FK column in 'users' table
    }
}