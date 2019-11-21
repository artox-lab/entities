<?php
/**
 * State counter
 *
 * @author Denis Ptushko <d.ptushko@artox.com>
 */

declare(strict_types=1);

namespace ArtoxLab\Entities;

class StateCounter
{
    /**
     * Counter
     *
     * @var int
     */
    protected $count;

    /**
     * StateCounter constructor.
     *
     * @param int $count
     */
    public function __construct(int $count = 0)
    {
        $this->count = $count;
    }

    /**
     * Increase counter
     *
     * @param int $n
     */
    public function incr(int $n = 1): void
    {
        $this->count += $n;
    }

    /**
     * Decrease counter
     *
     * @param int $n
     */
    public function decr(int $n = 1): void
    {
        $this->count -= $n;
    }

    /**
     * Return counter
     *
     * @return int
     */
    public function get(): int
    {
        return $this->count;
    }

}
