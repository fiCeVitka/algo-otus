<?php

/**
 * Insertion Sort with binary search
 */
class Solution4
{
    public function solve(int $n, string $values): string
    {
        $array = explode(' ', $values);

        for ($i = 1; $i < $n; $i++) {
            $k = $array[$i];
            $p = $this->binarySearch($array, $k, 0, $i - 1);
            for ($j = $i - 1; $j >= $p; $j--) {
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


    private function binarySearch(array &$array, int &$element, int $left, int $right)
    {
        if ($right <= $left) {
            if ($element > $array[$left]) {
                return $left + 1;
            }

            return $left;
        }

        $mid = (int)(($left + $right) / 2);

        if ($element === $array[$mid]) { // non-stable
            return $mid + 1;
        }

        if ($element > $array[$mid]) {
            return $this->binarySearch($array, $element, $mid + 1, $right);
        }

        return $this->binarySearch($array, $element, $left, $mid - 1);
    }
}
