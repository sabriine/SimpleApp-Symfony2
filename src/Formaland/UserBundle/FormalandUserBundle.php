<?php

namespace Formaland\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class FormalandUserBundle extends Bundle
{
    public function getParent()
   {
        return 'FOSUserBundle';
    }
}
