<?php

namespace App\Domain\Kernel\Interface;

interface CommandBusMiddlewareInterface
{
    public function execute(CommandInterface $command, callable $next): void;
}
