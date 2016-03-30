<?php

namespace Glory\Bundle\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface as User;

/**
 * Content
 *
 * @ORM\Table(name="content")
 * @ORM\Entity
 */
class Content
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb", type="string", length=255, nullable=false)
     */
    private $thumb;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", length=65535, nullable=true)
     */
    private $body;

    /**
     * @var 
     */
    private $category;

    /**
     * @var 
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=1024, nullable=true)
     */
    private $source = '';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=32, nullable=false)
     */
    private $status = 'unpublished';

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="createdTime", type="integer")
     */
    private $createdTime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="published_time", type="integer", nullable=true)
     */
    private $publishedTime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="updatedTime", type="integer", nullable=true)
     */
    private $updatedTime = '0';
    

}
