<?php

namespace Ovr\Bench\AssignOrNot;

class ReturnAfterAssignProperty
{
    protected $property;

    public function getProperty()
    {
        if (is_null($this->property)) {
            return $this->property = 1;
        }

        return $this->property;
    }
}
