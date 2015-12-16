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

class User {
    const STATUS_ACTIVE = 'active';

    public $status;
}

$benchmark = new Benchmark;

$user = new User();
$user->status = User::STATUS_ACTIVE;

$benchmark->add('$a == $b',   function() use ($user) {
    return $user->status == User::STATUS_ACTIVE;
});

$benchmark->add('$a === $b',   function() use ($user) {
    return $user->status === User::STATUS_ACTIVE;
});

$benchmark->run(100000000000);
