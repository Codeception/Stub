<?php

declare(strict_types=1);

trait ResetMocks
{
    protected function resetMockObjects()
    {
        $refl = new ReflectionObject($this);
        while (!$refl->hasProperty('mockObjects')) {
            $refl = $refl->getParentClass();
        }
        $prop = $refl->getProperty('mockObjects');
        $prop->setValue($this, array());
    }
}