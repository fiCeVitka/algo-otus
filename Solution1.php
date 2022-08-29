<?php

/**
 * Фибонначи итеративно
 */
class Solution1
{
    public function solve(int $n)
    {
        $numbers = [0, 1, 1];

        for ($i = 3; $i <= $n; $i++) {
            $numbers[$i] = bcadd($numbers[$i - 1], $numbers[$i - 2]);
        }

        return $numbers[$n];
    }
}
