<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidReturnException;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @param array<string,mixed> $headers
     */
    public function makeResponse(string $content, int $status = 200, array $headers = []): Response
    {
        /** @var Response */
        return response($content, $status, $headers);
    }

    /**
     * @param array<string,mixed> $data
     */
    public function makeView(string $viewPath, array $data = []): View
    {
        /** @var View */
        return view($viewPath, $data);
    }
}
