<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Magic\Model;

/**
 * @property-read int $id
 * @property string $name
 * @property Collection<Student> $students
 * @property int|null $students_count
 */
class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
