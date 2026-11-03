<?php

declare(strict_types=1);

namespace Tavaan\Engine\Session\Contracts;

/**
 * قرارداد Session.
 *
 * @see \Tavaan\Engine\Session\Session
 * @api 1.0
 */
interface SessionInterface
{
    /**
     * متد get.
     *
     * @return mixed
     */
    public function get(/* ... */): mixed;

    /**
     * متد put.
     *
     * @return mixed
     */
    public function put(/* ... */): mixed;

    /**
     * متد has.
     *
     * @return mixed
     */
    public function has(/* ... */): mixed;

    /**
     * متد exists.
     *
     * @return mixed
     */
    public function exists(/* ... */): mixed;

    /**
     * متد pull.
     *
     * @return mixed
     */
    public function pull(/* ... */): mixed;

    /**
     * متد forget.
     *
     * @return mixed
     */
    public function forget(/* ... */): mixed;

    /**
     * متد flush.
     *
     * @return mixed
     */
    public function flush(/* ... */): mixed;

    /**
     * متد all.
     *
     * @return mixed
     */
    public function all(/* ... */): mixed;

    /**
     * متد push.
     *
     * @return mixed
     */
    public function push(/* ... */): mixed;

    /**
     * متد increment.
     *
     * @return mixed
     */
    public function increment(/* ... */): mixed;

    /**
     * متد flash.
     *
     * @return mixed
     */
    public function flash(/* ... */): mixed;

    /**
     * متد reflash.
     *
     * @return mixed
     */
    public function reflash(/* ... */): mixed;

    /**
     * متد keep.
     *
     * @return mixed
     */
    public function keep(/* ... */): mixed;

    /**
     * متد regenerate.
     *
     * @return mixed
     */
    public function regenerate(/* ... */): mixed;

    /**
     * متد migrate.
     *
     * @return mixed
     */
    public function migrate(/* ... */): mixed;

    /**
     * متد invalidate.
     *
     * @return mixed
     */
    public function invalidate(/* ... */): mixed;

    /**
     * متد id.
     *
     * @return mixed
     */
    public function id(/* ... */): mixed;

    /**
     * متد token.
     *
     * @return mixed
     */
    public function token(/* ... */): mixed;
}