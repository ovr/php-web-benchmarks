<?php
use Lavoiesl\PhpBenchmark\Benchmark;
use Ovr\Bench\AssignOrNot\ReturnAfterAssignProperty;
use Ovr\Bench\AssignOrNot\ReturnWithoutAfterAssignProperty;

include_once __DIR__ . '/vendor/autoload.php';

$benchmark = new Benchmark;

function proxy($a, $b, $c) {
    return true;
}

function test1() {
  return proxy(...func_get_args());
}

function test2(...$args) {
  return proxy(...$args);
}

$benchmark->add('...func_get_args()', function() use (&$str) {
    return test1(1, 2, 3);
});

$benchmark->add('....$args', function() use (&$str) {
    return test2(1, 2, 3);
});

$benchmark->setCount(10000000);
$benchmark->run();
