<?php

declare(strict_types=1);

class Matrix
{
    private array $values = [[1, 1], [1, 0]];
    public static $counter = 0;

    public function leftTop(): float
    {
        return $this->values[0][0];
    }

    public function leftBottom(): float
    {
        return $this->values[0][1];
    }

    public function rightTop(): float
    {
        return $this->values[1][0];
    }

    public function rightBottom(): float
    {
        return $this->values[1][1];
    }

    public function multiply(Matrix $matrix)
    {
        $leftTop = $this->leftTop() * $matrix->leftTop() + $this->rightTop() * $matrix->leftBottom();
        $rightTop = $this->leftTop() * $matrix->rightTop() + $this->rightTop() * $matrix->rightBottom();
        $leftBottom = $this->leftBottom() * $matrix->leftTop() + $this->rightBottom() * $matrix->leftBottom();
        $rightBottom = $this->leftBottom() * $matrix->rightTop() + $this->rightBottom() * $matrix->rightBottom();

        $this->values = [[$leftTop, $rightTop], [$leftBottom, $rightBottom]];

        self::$counter++;

//        if (self::$counter === 3) {
//            var_dump($this->values);
//            die();
//        }

    }
}
