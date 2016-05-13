<?php
/**
 * Created by PhpStorm.
 * User: ovr
 * Date: 06.12.15
 * Time: 22:26
 */

namespace Test;

use Lavoiesl\PhpBenchmark\Benchmark;
use Ovr\Bench\AssignOrNot\ReturnAfterAssignProperty;
use Ovr\Bench\AssignOrNot\ReturnWithoutAfterAssignProperty;

include_once __DIR__ . '/vendor/autoload.php';


class FnHodler {
  static public function test()
  {
    return 1;
  }
}

function test()
{
  return 1;
}

$benchmark = new Benchmark;

$benchmark->add('Test\\FnHodler::test', function() use (&$serialized) {
   \Test\FnHodler::test();
});

$benchmark->add('Test\\test', function() use (&$serialized) {
   \Test\test();
});

$benchmark->setCount(10000000);
$benchmark->run();
