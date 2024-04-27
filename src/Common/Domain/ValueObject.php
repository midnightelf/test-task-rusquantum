<?php

namespace Src\Common\Domain;

use JsonSerializable;

abstract class ValueObject implements JsonSerializable
{
    abstract public function __toString(): string;
}
