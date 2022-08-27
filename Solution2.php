<?php

/**
 * Решение возведения в степень через двоичное разложение степени со сложностей O(log N)
 */
class Solution2
{
    public function solve(float $value, int $power)
    {
        $result = 1;
        $d = $value;

        while ($power > 0) {
            $power = (int)floor($power / 2);
            $d *= $d;

            if ($power % 2 === 1) {
                $result *= $d;
            }
        }

        return round($result, 11);
    }
}
