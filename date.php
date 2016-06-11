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

$benchmark->add("date('Y')",   function() {
  return date('Y');
});

class_exists(Twig_Extension_Core::class, true);

$loader = new Twig_Loader_Filesystem(__DIR__ . '/twig');
$twig = new Twig_Environment($loader, []);

$benchmark->add("Twig {{ 'now' | date('Y') | raw }}", function() use ($twig) {
  return twig_date_format_filter($twig, "now", "Y");
});

$benchmark->setCount(10000);
$benchmark->run();
