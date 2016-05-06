<?php
use Lavoiesl\PhpBenchmark\Benchmark;
use Ovr\Bench\AssignOrNot\ReturnAfterAssignProperty;
use Ovr\Bench\AssignOrNot\ReturnWithoutAfterAssignProperty;

include_once __DIR__ . '/vendor/autoload.php';

$benchmark = new Benchmark;


$str = '';
for ($i = 0; $i < 1024; ++$i) {
    $str .= chr(mt_rand(0, 255));
}
$benchmark->add('substr($str, 512, 32)', function() use (&$str) {
    return substr($str, 512, 32);
});

$benchmark->add('mb_substr($str, 512, 32, \'8bit\')', function() use (&$str) {
    return mb_substr($str, 512, 32, '8bit');
});

$benchmark->setCount(1000000);
$benchmark->run();
