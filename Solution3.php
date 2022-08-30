<?php

/**
 * Фибонначи через матрицу
 */
class Solution3
{
    public function solve(int $n): string
    {
        bcscale(13);

        $matrix = new Matrix();

        if ($n === 0) {
            return 0;
        }

        if ($n < 2) {
            return $matrix->leftTop();
        }

        $matrix = $this->pow($matrix, $n);

        return bcdiv($matrix->rightBottom(), 1, 0);
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
