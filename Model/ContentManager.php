<?php

/*
 * This file is part of the current project.
 * 
 * (c) ForeverGlory <http://foreverglory.me/>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Glory\Bundle\ContentBundle\Model;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Glory\Bundle\ContentBundle\Model\ContentInterface;

/**
 * Description of ContentManager
 *
 * @author ForeverGlory <foreverglory@qq.com>
 */
class ContentManager
{

    /**
     * @var ContainerInterface 
     */
    protected $container;
    protected $class;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function setClass($class)
    {
        $this->class = $class;
        return $this;
    }

    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return ContentInterface
     */
    public function createContent()
    {
        $class = $this->getClass();
        return new $class();
    }

    /**
     * 查找
     * 
     * @param array $criteria
     * @return ContentInterface
     */
    public function findContent($criteria)
    {
        $repository = $this->getDoctrine()->getRepository($this->getClass());
        if (is_numeric($criteria)) {
            return $repository->find($criteria);
        }
        return $repository->findOneBy($criteria);
    }

    /**
     * 查找's
     * 
     * @param array $criteria
     * @param array $orderBy
     * @param type $limit
     * @param type $offset
     * @return ContentInterface[]|null
     */
    public function findContents(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $repository = $this->getDoctrine()->getRepository($this->getClass());
        return $repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    public function updateContent(ContentInterface $content, $andFlush = true)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($content);
        if ($andFlush) {
            $em->flush();
        }
    }
    
    public function deleteContent(ContentInterface $content)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($content);
        $em->flush();
    }

    /**
     * Shortcut to return the Doctrine Registry service.
     *
     * @return Registry
     *
     * @throws \LogicException If DoctrineBundle is not available
     */
    protected function getDoctrine()
    {
        if (!$this->container->has('doctrine')) {
            throw new \LogicException('The DoctrineBundle is not registered in your application.');
        }

        return $this->container->get('doctrine');
    }

}
