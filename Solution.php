<?php

/**
 * Решение с перебором всех делителей простых чисел O(N^2)
 */
class Solution
{
    public function solve(int $n)
    {
        $counter = 0;
        for ($number = 2; $number <= $n; $number++) {
            if ($this->isPrime($number)) {
                $counter++;
            }
        }

        return $counter;
    }

    private function isPrime(int $value): bool
    {
        if ($value === 2) {
            return true;
        }

        if ($value % 2 === 0) {
            return false;
        }

        $sqrt = sqrt($value);

        for ($i = 3; $i <= $sqrt; $i += 2) {
            if ($value % $i === 0) {
                return false;
            }
        }

        return true;
    }
}
