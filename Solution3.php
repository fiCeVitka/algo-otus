<?php

/**
 * Insertion Sort with shift
 */
class Solution3
{
    public function solve(int $n, string $values): string
    {
        $array = explode(' ', $values);

        for ($i = 1; $i < $n; $i++) {
            $k = $array[$i];
            for ($j = $i - 1; $j >= 0 && $array[$j] > $k; $j--) {
                $array[$j + 1] = $array[$j];
            }

            $array[$j + 1] = $k;
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
