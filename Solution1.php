<?php

/**
 * Решение с перебором всех делителей из простых чисел O(N^2)
 */
class Solution1
{
    private array $primes = [2];

    public function solve(int $n)
    {
        if ($n < 2) {
            return 0;
        }

        $counter = 1;
        for ($number = 3; $number <= $n; $number += 2) {
            if ($this->isPrime($number)) {
                $counter++;
                $this->primes[] = $number;
            }
        }

        return $counter;
    }

    private function isPrime(int $value): bool
    {
        $sqrt = sqrt($value);

        for ($i = 0; $this->primes[$i] <= $sqrt; $i++) {
            if ($value % $this->primes[$i] === 0) {
                return false;
            }
        }

        return true;
    }
}
