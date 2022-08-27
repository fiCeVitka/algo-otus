<?php

class App
{
    public function boot($argv)
    {
        $path = $argv[1];
        $solutionFile = $argv[2] ?? 'Solution';

        $solution = new $solutionFile;
        $counter = 0;

        while (true) {
            $in = "test.$counter.in";
            $out = "test.$counter.out";

            if (!file_exists($path . DIRECTORY_SEPARATOR . $in)) {
                break;
            }

            $inFile = fopen($path . DIRECTORY_SEPARATOR . $in, 'rb');
            $outFile = fopen($path . DIRECTORY_SEPARATOR . $out, 'rb');

            $arguments = [];
            while ($argument = fgets($inFile, 4096)) {
                $arguments[] = trim($argument);
            }

            fclose($inFile);
            $expected = trim(fgets($outFile));
            fclose($outFile);

            $timeStart = microtime(true);
            $res = $solution->solve(...$arguments);
            $timeEnd = microtime(true);

            $time = $timeEnd - $timeStart;

            $text = "Test {$counter}: ";
            if ($res == $expected) {
                $text .= "ok (result: {$res}, input: " . implode('; ', $arguments) . ")";;
            } else {
                $text .= "ERROR (expected: {$expected}, actual: {$res}, input: "
                    . implode('; ', $arguments)
                    . ")";
            }

            $text .= " | time {$time}";
            echo $text . PHP_EOL;

            $counter++;
        }
    }
}
