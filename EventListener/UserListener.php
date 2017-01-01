<?php

/*
 * This file is part of the current project.
 * 
 * (c) ForeverGlory <http://foreverglory.me/>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Glory\Bundle\ContentBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Glory\Bundle\ContentBundle\GloryContentEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @author ForeverGlory <foreverglory@qq.com>
 */
class UserListener implements EventSubscriberInterface
{

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public static function getSubscribedEvents()
    {
        return array(
            GloryContentEvents::PRE_CONTENT => 'onPreContent',
            GloryContentEvents::POST_CONTENT => 'onPostContent'
        );
    }

    public function onPreContent(GetResponseUserEvent $event)
    {
        
    }

    public function onPostContent(GetResponseUserEvent $event)
    {
        
    }

}
