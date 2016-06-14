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

$benchmark->add('rand', function() {
    rand(0, getrandmax());
});

$benchmark->add('mt_rand', function() {
    mt_rand(0, getrandmax());
});

$benchmark->add('random_int', function() {
    random_int(0, getrandmax());
});

$benchmark->add('phpd-utils-crypt', function() {
    $gen = false;

    \PHPDaemon\Utils\Crypt::randomInts(1, function ($result) use (&$gen) {
        $gen = true;
    });

    while (!$gen) {}
});

$benchmark->setCount(100000);
$benchmark->run();
