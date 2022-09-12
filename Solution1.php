<?php

/**
 * Решение возведения в степень через степень двойки с домножением со сложностью O(log N + N/2) = O(N)
 */
class Solution1
{
    public function solve(float $value, int $power)
    {
        $delPower = $power;
        $curPower = 1;
        $curValue = $value;

        $values = [];

        while ($delPower > 0) {
            if ($curPower * 2 > $delPower) {
                $values[] = $curValue;

                $delPower -= $curPower;

                $curValue = $value;
                $curPower = 1;
            }

            $curValue *= $curValue;
            $curPower *= 2;
        }

        $result = 1;

        foreach ($values as $item) {
            $result *= $item;
        }

        return round($result, 11);
    }
}
