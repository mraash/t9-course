<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property Collection<Student> $students
 */
class Group extends Model
{
    use HasFactory;

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
