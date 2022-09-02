<?php

/**
 * Insertion Sort
 */
class Solution2
{
    public function solve(int $n, string $values): string
    {
        $array = explode(' ', $values);

        for ($i = 1; $i < $n; $i++) {
            for ($j = $i - 1; $j >= 0 && $array[$j] > $array[$j + 1]; $j--) {
                $this->swap($array, $j, $j + 1);
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
