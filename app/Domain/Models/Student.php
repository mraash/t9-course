<?php

declare(strict_types=1);

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Database\Factories\StudentFactory;
use App\Magic\Model;

/**
 * @property-read int $id
 * @property string $first_name
 * @property string $last_name
 * @property Group $group
 * @property Collection<Course> $courses
 */
class Student extends Model
{
    use HasFactory;

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    protected static function newFactory()
    {
        return StudentFactory::new();
    }
}
