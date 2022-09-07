<?php

namespace App\Services\ResultMessage;

use Illuminate\Http\Request;


class ResultMessage implements ResultMessageInterface
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function add(string $actionName, string $message): void
    {
        $this->request->session()->flash($actionName, $message);
    }

    public function get(string $actionName): array
    {
        return (array)$this->request->session()->get($actionName);
    }

    public function getAndClear(string $actionName): array
    {
        return [];
    }
}
