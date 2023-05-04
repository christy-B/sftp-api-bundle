<?php
namespace Wynd\ApiBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Wynd\ApiBundle\DependencyInjection\WyndApiExtension;

class WyndApiBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $ext = new WyndApiExtension([],$container);

    }
}