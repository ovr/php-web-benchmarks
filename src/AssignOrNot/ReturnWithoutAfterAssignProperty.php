<?php
/**
 * Created by PhpStorm.
 * User: ovr
 * Date: 06.12.15
 * Time: 22:13
 */

namespace Ovr\Bench\AssignOrNot;

class ReturnWithoutAfterAssignProperty
{
    protected $property;

    public function getProperty()
    {
        if (is_null($this->property)) {
            $this->property = 1;
        }

        return $this->property;
    }
}
