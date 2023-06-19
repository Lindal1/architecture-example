<?php

namespace App\Domain\Kernel\Interface;

interface CommandBusInterface
{
    public function execute(CommandInterface $command): void;
}