<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Database\Factories\CourseFactory;
use App\Magic\Model;

/**
 * @property-read int $id
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

    protected static function newFactory()
    {
        return CourseFactory::new();
    }
}
