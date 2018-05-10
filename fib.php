<?php

class Fibonacci {
    public function getFib($n) {
        if (intval($n) === 0) {
            return 0;
        }
        if (intval($n) === 1) {
            return [0];
        }
        $fib = [0,1];
        for ($i=1; $i<intval($n)-1; $i++) {
            $fib[] = $fib[$i] + $fib[$i-1];
        }
        return $fib;
    }
}