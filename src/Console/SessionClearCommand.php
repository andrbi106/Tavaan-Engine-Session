<?php

declare(strict_types=1);

namespace Tavaan\Engine\Session\Console;

use Tavaan\Core\Contracts\Console\CommandInterface;

/**
 * session:clear command.
 */
final class SessionClearCommand implements CommandInterface
{
    public function name(): string
    {
        return 'session:clear';
    }

    public function description(): string
    {
        return 'Run session:clear (TODO: fill description).';
    }

    public function handle(array $args = []): int
    {
        // TODO: پیاده‌سازی command مطابق مستندات.
        return 0;
    }
}
