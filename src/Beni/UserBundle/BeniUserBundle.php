<?php

namespace Beni\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BeniUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
