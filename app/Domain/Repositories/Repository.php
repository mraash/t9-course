<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @phpstan-template TModel of Model
 */
abstract class Repository
{
    private Model $model;

    /**
     * @phpstan-param TModel $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create new instance of repositories model.
     *
     * @phpstan-return TModel
     */
    protected function model(): Model
    {
        /** @phpstan-var TModel */
        $model = new (get_class($this->model));

        return $model;
    }

    /**
     * Start building a query.
     *
     * @phpstan-return Builder<TModel>
     */
    protected function query(): Builder
    {
        return $this->model()->query();
    }
}
