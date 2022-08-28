<?php

/**
 * Фибонначи через матрицу
 */
class Solution3
{
    public function solve(int $n): float
    {
        $matrix = new Matrix();

        if ($n === 0) {
            return 0;
        }

        if ($n < 2) {
            return $matrix->leftTop();
        }

        $matrix = $this->pow($matrix, $n);

        return floor($matrix->rightBottom());
    }

    public function pow(Matrix $value, int $power): Matrix
    {
        $result = new Matrix();
        $d = $value;

        if ($power % 2 === 1) {
            $result->multiply($d);
        }

        while ($power > 0) {
            $power = (int)floor($power / 2);
            $d->multiply($d);

            if ($power % 2 === 1) {
                $result->multiply($d);
            }
        }

        return $result;
    }

}
