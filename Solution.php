<?php

/**
 * Решение возведения в степень со сложностей O(n)
 */
class Solution
{
    public function solve(float $value, int $power)
    {
        $result = 1;

        for ($i = 0; $i < $power; $i++) {
            $result *= $value;
        }

        return round($result, 11);
    }
}
