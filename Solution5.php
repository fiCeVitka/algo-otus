<?php

/**
 * Shell Sort
 */
class Solution5
{
    public function solve(int $n, string $values): string
    {
        $array = explode(' ', $values);

        for ($gap = (int)($n / 2); $gap > 0; $gap = (int)($gap / 2)) {
            for ($i = $gap; $i < $n; $i++) {
                for ($j = $i; $j >= $gap && $array[$j - $gap] > $array[$j]; $j -= $gap) {
                    $this->swap($array, $j, $j - $gap);
                }
            }
        }

        return implode(' ', $array);
    }

    private function swap(array &$array, int $x, int $y): void
    {
        $c = $array[$x];
        $array[$x] = $array[$y];
        $array[$y] = $c;
    }
}
