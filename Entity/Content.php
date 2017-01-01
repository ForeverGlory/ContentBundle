<?php

/*
 * This file is part of the current project.
 * 
 * (c) ForeverGlory <http://foreverglory.me/>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Glory\Bundle\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Glory\Bundle\ContentBundle\Model\Content as BaseContent;

/**
 * Description of Content
 * 
 * @ORM\Entity
 * @ORM\Table("content")
 *
 * @author ForeverGlory <foreverglory@qq.com>
 */
class Content extends BaseContent
{

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="thumb", type="string", length=255, nullable=true)
     */
    protected $thumb;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", length=65535, nullable=true)
     */
    protected $body;

    /**
     * @var 
     * 
     * @ORM\ManyToOne(targetEntity="Glory\Bundle\CategoryBundle\Entity\Category")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(name="content_tag_relation",
     *      joinColumns={@ORM\JoinColumn(name="content_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     */
    protected $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", nullable=true)
     */
    protected $source = '';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=32, nullable=false)
     */
    protected $status = 'unpublished';

    /**
     * @var integer
     *
     * @ORM\Column(name="created_time", type="integer")
     */
    protected $createdTime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="published_time", type="integer", nullable=true)
     */
    protected $publishedTime = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="updated_time", type="integer", nullable=true)
     */
    protected $updatedTime = '0';

    /**
     * @var string
     *  
     * @ORM\Column(name="type", type="string")
     */
    protected $type;

    /**
     * @var user
     * 
     * Must UserInterface Entity
     * 
     * @ORM\ManyToOne(targetEntity="Symfony\Component\Security\Core\User\UserInterface")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

}
