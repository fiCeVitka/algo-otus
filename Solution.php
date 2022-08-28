<?php

/**
 * Фибонначи через рекурсию
 */
class Solution
{
    private array $cache = [];

    public function solve(float $n)
    {
        if ($n === .0) {
            return 0;
        }

        if ($n <= 2) {
            return 1;
        }

        if (array_key_exists($n, $this->cache)) {
            return $this->cache[$n];
        }

        $this->cache[$n] = $this->solve($n - 1) + $this->solve($n - 2);

        return $this->cache[$n];
    }
}
