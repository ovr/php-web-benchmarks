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

$benchmark->add('md5', function() {
    md5("test");
});

$benchmark->add('sha1', function() {
    sha1("test");
});

$benchmark->add('sha256', function() {
    hash("sha256", "test");
});

$benchmark->add('sha384', function() {
    hash("sha384", "test");
});

$benchmark->add('sha512', function() {
    hash("sha512", "test");
});

$benchmark->add('haval128,3', function() {
    hash("haval128,3", "test");
});

$benchmark->add('haval160,3', function() {
    hash("haval160,3", "test");
});

$benchmark->add('haval192,3', function() {
    hash("haval192,3", "test");
});

$benchmark->add('haval224,3', function() {
    hash("haval224,3", "test");
});

$benchmark->add('haval256,3', function() {
    hash("haval256,3", "test");
});

$benchmark->add('haval256,5', function() {
    hash("haval256,5", "test");
});

$benchmark->add('whirlpool', function() {
    hash("whirlpool", "test");
});

$benchmark->add('gost', function() {
    hash("gost", "test");
});

$benchmark->setCount(1000000);
$benchmark->run();
