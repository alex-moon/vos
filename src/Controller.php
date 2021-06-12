<?php

namespace Vos;

class Controller
{
    /** @var Vos */
    protected $vos;

    public function __construct(Vos $vos)
    {
        $this->vos = $vos;
    }
}
