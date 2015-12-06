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

$benchmark->add('with-return',   function() {
    $class = new ReturnAfterAssignProperty;
    $class->getProperty();
});
$benchmark->add('without-return',  function() {
    $class = new ReturnWithoutAfterAssignProperty;
    $class->getProperty();
});

$benchmark->setCount(10000000);
$benchmark->run();
