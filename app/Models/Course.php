<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property string $name
 * @property string $description
 * @property Collection<Student> $students
 */
class Course extends Model
{
    use HasFactory;

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
