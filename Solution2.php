<?php

/**
 * Решение через решето Эратосфена O(N * log log N)
 */
class Solution2
{
    private array $isNotPrime = [];

    public function solve(int $n)
    {
        if ($n < 2) {
            return 0;
        }

        $sqrt = (int)sqrt($n);

        $counter = 1;
        for ($number = 3; $number <= $n; $number += 2) {
            if (array_key_exists($number, $this->isNotPrime)) {
                continue;
            }

            $counter++;

            // нет смысла дальше проверять, и так все числа уже установлены
            if ($number > $sqrt) { continue; }

            // увеличиваем i на $number * 2, чтобы избегать сравнения с четными числами
            // вместо проверки установки для 3 (6, 9, 12, 15), ставим (9, 15 и тд.)
            for ($i = $number * $number; $i <= $n; $i += 2 * $number) {
                $this->isNotPrime[$i] = true;
            }
        }

        return $counter;
    }
}
