<?php

abstract class AttributesClass
{
    abstract public function getDisplayAttributes(): string;

    abstract public function getParams($initialParams): array;
}
