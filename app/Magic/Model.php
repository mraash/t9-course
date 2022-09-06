<?php

/**
 * This class is needed only for describing model magic methods in phpdoc.
**/

declare(strict_types=1);

namespace App\Magic;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * @method static Builder where(string $column, mixed $operandOrValue, mixed $value = null)
 * @method Builder where(string $column, mixed $operandOrValue, mixed $value = null)
 */
abstract class Model extends EloquentModel
{
}
