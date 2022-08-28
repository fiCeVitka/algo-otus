<?php

/**
 * Фибонначи через формулу золотого сечения
 */
class Solution2
{
    public function solve(int $n): float
    {
        $fi = (1 + sqrt(5)) / 2;

        $value = $this->pow($fi, $n) / sqrt(5) + 0.5;

        return floor($value);
    }

    public function pow(float $value, int $power)
    {
        $result = 1;
        $d = $value;

        if ($power % 2 === 1) {
            $result *= $d;
        }

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
