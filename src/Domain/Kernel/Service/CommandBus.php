<?php
declare(strict_types=1);

namespace App\Domain\Kernel\Service;

use App\Domain\Kernel\Exception\NotImplementedException;
use App\Domain\Kernel\Interface\CommandBusInterface;
use App\Domain\Kernel\Interface\CommandHandlerInterface;
use App\Domain\Kernel\Interface\CommandInterface;

class CommandBus implements CommandBusInterface
{
    private const NOT_IMPLEMENTED = 'handler is not implemented for command %s';

    public function __construct(
        /** @var CommandHandlerInterface[] */
        private readonly array $handlers,
    )
    {
    }

    public function execute(CommandInterface $command): void
    {
        foreach ($this->handlers as $handler) {
            if ($handler->supports($command)) {
                $handler->execute($command);
            }
        }

        throw new NotImplementedException(
            sprintf(self::NOT_IMPLEMENTED, get_class($command))
        );
    }
}
