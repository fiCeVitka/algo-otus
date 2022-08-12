<?php

class Solution
{
    public function solve(int $n)
    {
        $sum = [];

        for ($i = 1; $i <= $n; $i++) {
            $sum[$i] ??= [];

            for ($j = 0; $j <= 9*$i; $j++) {
                if ($i === 1) {
                    $sum[$i][$j] = 1;
                    continue;
                }

                for ($k = 0; $k <= 9; $k++) {
                    @
                    $sum[$i][$j] += ($sum[$i - 1][$j - $k] ?? 0);
                }


            }
        }

        return array_reduce($sum[$n], fn ($res, $value) => $res + $value * $value, 0);
    }
}
