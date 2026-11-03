<?php
declare(strict_types=1);
namespace Tavaan\Engine\Http\Session;

final class Session
{
    private array $data = [];
    private string $id = '';
    private bool $started = false;
    private array $flash = [];

    public function __construct(private readonly array $config = []) {}

    public function start(): void { $this->started = true; $this->id = bin2hex(random_bytes(16)); if (session_status() === PHP_SESSION_NONE) session_start(); $this->data = &$_SESSION; }
    public function isStarted(): bool { return $this->started; }
    public function getId(): string { return $this->id; }
    public function get(string $key, mixed $default = null): mixed { return $this->data[$key] ?? $default; }
    public function set(string $key, mixed $value): void { $this->data[$key] = $value; }
    public function has(string $key): bool { return isset($this->data[$key]); }
    public function remove(string $key): void { unset($this->data[$key]); }
    public function all(): array { return $this->data; }
    public function flush(): void { $this->data = []; }
    public function regenerate(bool $destroy = false): void { if (session_status() === PHP_SESSION_ACTIVE) { session_regenerate_id($destroy); $this->id = session_id() ?: ''; } }
    public function flash(string $key, mixed $value): void { $this->data['__flash__'][$key] = $value; }
    public function getFlash(string $key, mixed $default = null): mixed { $v = $this->data['__flash__'][$key] ?? $default; return $v; }
    public function reflash(): void { if (isset($this->data['__flash__'])) { foreach ($this->data['__flash__'] as $k => $v) { $this->data['__flash__next'][$k] = $v; } } }
    public function keepFlash(array $keys): void { foreach ($keys as $k) { if (isset($this->data['__flash__'][$k])) { $this->data['__flash__next'][$k] = $this->data['__flash__'][$k]; } } }
    public function clearFlash(): void { if (isset($this->data['__flash__'])) { unset($this->data['__flash__']); } if (isset($this->data['__flash__next'])) { $this->data['__flash__'] = $this->data['__flash__next']; unset($this->data['__flash__next']); } }
    public function token(): string { if (!isset($this->data['_token'])) { $this->data['_token'] = bin2hex(random_bytes(16)); } return $this->data['_token']; }
    public function verifyToken(string $token): bool { return hash_equals($this->token(), $token); }
    public function save(): void { if (session_status() === PHP_SESSION_ACTIVE) { $this->clearFlash(); } }
}

final class SessionServiceProvider
{
    private ?Session $session = null;
    public function __construct(private readonly array $config = []) {}
    public function register(): void { $this->session = new Session($this->config); }
    public function boot(): void { $this->session?->start(); }
    public function provides(): array { return [Session::class]; }
    public function getSession(): Session { if ($this->session === null) $this->register(); return $this->session; }

    /**
     * exists
     */
    public function exists(/* ... */): mixed
    {
        return $this->count() > 0;
    }
    /**
     * forget
     */
    public function forget(/* ... */): mixed
    {
        unset($this->listeners[$event]);
    }
    /**
     * id
     */
    public function id(/* ... */): mixed
    {
        return $this->user['id'] ?? null;
    }
    /**
     * increment
     */
    public function increment(/* ... */): mixed
    {
        $this->connection->update('UPDATE ' . $this->table . ' SET ' . $column . ' = ' . $column . ' + ?', [$amount]); return $this;
    }
    /**
     * invalidate
     */
    public function invalidate(/* ... */): mixed
    {
        // TODO: Implement per docs.
        return null;
    }
    /**
     * keep
     */
    public function keep(/* ... */): mixed
    {
        // TODO: Implement per docs.
        return null;
    }
    /**
     * migrate
     */
    public function migrate(/* ... */): mixed
    {
        // TODO: Implement per docs.
        return null;
    }
    /**
     * pull
     */
    public function pull(/* ... */): mixed
    {
        // TODO: Implement per docs.
        return null;
    }
    /**
     * push
     */
    public function push(/* ... */): mixed
    {
        return $this->save();
    }
    /**
     * put
     */
    public function put(/* ... */): mixed
    {
        return $this->call("PUT", $uri, $data);
    }
}
