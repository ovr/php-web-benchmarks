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

$benchmark->add('for1',   function() {
    for ($i = 0; $i < 100000; $i++) {

    }
});

$benchmark->add('for2',   function() {
    for ($i = 0; $i < 100000; ++$i) {

    }
});

$benchmark->add('while',   function() {
    $i = 0;

    while ($i < 100000) {
        $i++;
    }
});

$benchmark->add('while2',   function() {
    $i = 0;

    while ($i < 100000) {
        ++$i;
    }
});

$benchmark->setCount(1000);
$benchmark->run();
