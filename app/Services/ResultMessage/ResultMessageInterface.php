<?php

namespace App\Services\ResultMessage;

interface ResultMessageInterface
{
    public function add(string $actionName, string $message): void;

    public function get(string $actionName): array;

    public function getAndClear(string $actionName): array;
}
