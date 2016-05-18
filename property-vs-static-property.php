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


class EventLoop {
    static public $instance;
}

EventLoop::$instance = new EventLoop();

class A {
  protected $ev;

  public function __construct(EventLoop $ev)
  {
      $this->ev = $ev;
  }

  public function test()
  {
    return $this->ev;
  }
}

class B {
    public function test()
    {
      return EventLoop::$instance;
    }
}

$aInstance = new A(new EventLoop());
$benchmark->add('without-static-normal-injection',   function() use ($aInstance) {
    return $aInstance->test();
});

$bInstance = new B();
$benchmark->add('with-static-global-state',  function() use ($bInstance) {
    return $bInstance->test();
});

$benchmark->setCount(10000000);
$benchmark->run();
