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
            $resText = (string)$res;
            if (strlen($resText) > 20) {
                $resText = substr($resText, 0, 20) . '...';
            }

            if ((string)$res === (string)$expected) {
                $text .= "ok (result: {$resText}, input: " . implode('; ', $arguments) . ")";;
            } else {
                $expectedText = $expected;
                if (strlen($expectedText) > 20) {
                    $expectedText = substr($expectedText, 0, 20) . '...';
                }

                $text .= "ERROR (expected: {$expectedText}, actual: {$resText}, input: "
                    . implode('; ', $arguments)
                    . ")";
            }

            $text .= " | time {$time}";
            echo $text . PHP_EOL;

            $counter++;
        }
    }

    private function formatMemory(int $value): string
    {
        if ($value < 1024) {
            return $value.' bytes';
        }

        if ($value < 1048576) {
            return round($value / 1024, 2) . ' kilobytes';
        }

        return round($value/1048576,2).' megabytes';
    }
}
