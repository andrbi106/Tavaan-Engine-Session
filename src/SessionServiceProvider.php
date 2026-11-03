<?php

declare(strict_types=1);

namespace Tavaan\Engine\Session;

use Tavaan\Core\Contracts\Container\ContainerInterface;
use Tavaan\Core\Contracts\Config\RepositoryInterface as ConfigRepository;
use Tavaan\Engine\Session\Contracts\SessionInterface;
use Tavaan\Core\Provider\ServiceProvider;

/**
 * SessionServiceProvider — ثبت سرویس‌های موتور Session.
 */
final class SessionServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function register(): void
    {
        $this->app->singleton(SessionInterface::class, function (ContainerInterface $app) {
            /** @var ConfigRepository $config */
            $config = $app->get(ConfigRepository::class);
            return new Session($config);
        });
    }

    /**
     * {@inheritdoc}
     */
    public function boot(): void
    {
        // ثبت Facade
        $this->app->instance('session', $this->app->get(SessionInterface::class));

        // ثبت commandها
        $this->commands[] = \Tavaan\Engine\Session\Console\Session_clearCommand::class;

        // ثبت درایورها (در صورت نیاز)
        // درایورها به‌صورت lazy در زمان استفاده ساخته می‌شوند.

    }

    /**
     * {@inheritdoc}
     */
    public function provides(): array
    {
        return [
            SessionInterface::class,
            'session',
        ];
    }
}