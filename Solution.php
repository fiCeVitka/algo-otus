<?php

/**
 * Bubble Sort
 */
class Solution
{
    public function solve(int $n, string $values): string
    {
        $array = explode(' ', $values);

        for ($i = 1; $i < $n; $i++) {
            for ($j = 0; $j < $n - $i; $j++) {
                if ($array[$j] > $array[$j + 1]) {
                    $this->swap($array, $j, $j + 1);
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
