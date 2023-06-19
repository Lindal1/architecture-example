<?php

namespace App\Domain\Kernel\Interface;

interface CommandHandlerInterface
{
    public function supports(CommandInterface $command): bool;

    public function execute(CommandInterface $command): void;
}