<?php

class DummyHookedPropertyClass
{
    public string $checkMe { set { $this->checkMe = $value; } }

    public string $virtual { get { return 'computed'; } }

    public string $finalHook { final set { $this->finalHook = $value; } }

    protected string $protectedHook { get { return $this->protectedHook; } set { $this->protectedHook = $value; } }
}
