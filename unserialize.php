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

function bench($value, $n = 1000000) {
    $benchmark = new Benchmark;

    $encoded = serialize($value);
    $benchmark->add('unserialize',   function() use (&$encoded) {
        @unserialize($encoded);
    });

    $encoded = json_encode($value);
    $benchmark->add('json_decode',   function() use (&$encoded) {
        json_decode($encoded);
    });

    if (function_exists('bin_decode')) {
        $encoded = bin_encode($value);
        $benchmark->add('bin_decode',   function() use (&$encoded) {
            bin_decode($encoded);
        });
    }

    if (function_exists('bson_decode')) {
        $encoded = bson_encode($value);
        $benchmark->add('bson_decode',   function() use (&$encoded) {
            bson_decode($encoded);
        });
    }

    if (function_exists('msgpack_pack')) {
        $encoded = msgpack_pack($value);
        $benchmark->add('msgpack_unpack',   function() use (&$encoded) {
            msgpack_unpack($encoded);
        });
    }

    if (function_exists('igbinary_unserialize')) {
        $encoded = igbinary_serialize($value);
        $benchmark->add('igbinary_unserialize',   function() use (&$encoded) {
            igbinary_unserialize($encoded);
        });
    }

    $benchmark->setCount($n);
    $benchmark->run();
}

echo "Unserialize Array " . PHP_EOL;
bench([
    'test' => 1,
    'test2' => true,
    'test3' => false,
    'test4' => 123456789,
    'test5' => 123456789.0,
    'test6' => [1,2,3,4,5,6,7,8,9]
]);

$class = new \stdClass();
$class->property1 = true;
$class->property2 = false;
$class->property3 = "test string";
$class->property4 = 1;
$class->property5 = 1.0;

echo PHP_EOL . "Unserialize stdClass " . PHP_EOL;
bench($class);

echo PHP_EOL . "Unserialize Array with 10000 integer(s)" . PHP_EOL;
bench(range(1, 10000), 1000);
