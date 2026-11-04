<?php
declare(strict_types=1);

namespace Tavaan\Engine\Session;

/**
 * Session — مدیریت session کاربر.
 *
 * این کلاس ذخیره و بازیابی دادهٔ session را برعهده دارد.
 */
final class Session
{
    /** @var array<string, mixed> */
    private array $data = [];

    private bool $started = false;

    public function __construct(
        private readonly string $name = 'tavaan_session',
        private readonly int $lifetime = 7200,
    ) {}

    public function start(): void
    {
        if ($this->started) {
            return;
        }
        if (session_status() === PHP_SESSION_NONE) {
            session_name($this->name);
            session_set_cookie_params(['lifetime' => $this->lifetime]);
            session_start();
        }
        $this->data = &$_SESSION;
        $this->started = true;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $this->start();
        return $this->data[$key] ?? $default;
    }

    public function set(string $key, mixed $value): void
    {
        $this->start();
        $this->data[$key] = $value;
    }

    public function has(string $key): bool
    {
        $this->start();
        return array_key_exists($key, $this->data);
    }

    public function forget(string $key): void
    {
        $this->start();
        unset($this->data[$key]);
    }

    public function flush(): void
    {
        $this->start();
        $this->data = [];
    }

    public function all(): array
    {
        $this->start();
        return $this->data;
    }

    /**
     * تولید CSRF token و ذخیره در session.
     */
    public function token(): string
    {
        $token = $this->get('_token');
        if ($token === null) {
            $token = bin2hex(random_bytes(32));
            $this->set('_token', $token);
        }
        return $token;
    }

    /**
     * بررسی CSRF token.
     */
    public function validateToken(string $token): bool
    {
        return hash_equals($this->token(), $token);
    }

    /**
     * ID فعلی session.
     */
    public function id(): string|false
    {
        return session_id();
    }

    /**
     * regenerate session ID (برای جلوگیری از session fixation).
     */
    public function regenerate(): bool
    {
        return session_regenerate_id(true);
    }
}
