<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Create new instance of repositories model.
     */
    protected function model(): Model
    {
        return new (get_class($this->model));
    }
}
