<?php

/**
 * Фибонначи через формулу золотого сечения
 */
class Solution2
{

    public function solve(int $n)
    {
        bcscale(13);

        $fi = bcdiv(bcadd(1, bcsqrt(5)),2);

        $del = bcdiv($this->pow($fi, $n), sqrt(5));
        $value = bcadd($del, 0.5);

        return bcdiv($value, 1, 0);
    }

    public function pow(float $value, int $power)
    {
        $result = 1;
        $d = $value;

        if ($power % 2 === 1) {
            $result = bcmul($result, $d);
        }

        while ($power > 0) {
            $power = (int)floor($power / 2);
            $d = bcmul($d, $d);

            if ($power % 2 === 1) {
                $result = bcmul($result, $d);
            }
        }

        return $result;
    }
}
