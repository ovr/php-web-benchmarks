<?php
/**
 * Created by PhpStorm.
 * User: ovr
 * Date: 06.12.15
 * Time: 22:26
 */

use Lavoiesl\PhpBenchmark\Benchmark;
use Ovr\Bench\AssignOrNot\ReturnAfterAssignProperty;
use Ovr\Bench\AssignOrNot\ReturnWithoutAfterAssignProperty;

include_once __DIR__ . '/vendor/autoload.php';

$benchmark = new Benchmark;

$benchmark->add('(bool) 1', function() use (&$serialized) {
    return (bool) 1;
});

$benchmark->add('boolval(1)', function() use (&$serialized) {
    return boolval(1);
});

$benchmark->setCount(1000000);
$benchmark->run();
