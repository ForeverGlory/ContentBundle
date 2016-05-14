<?php

/*
 * (c) ForeverGlory <http://foreverglory.me/>
 * 
 * For the full copyright and license information, please view the LICENSE
 */

namespace Glory\Bundle\ContentBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Content
 */
class Content
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var 
     */
    protected $category;

    /**
     * @var 
     */
    protected $tags;

    /**
     * @var string
     */
    protected $source = '';

    /**
     * @var string
     */
    protected $status = 'unpublished';

    /**
     * @var integer
     */
    protected $createdTime;

    /**
     * @var integer
     */
    protected $publishedTime;

    /**
     * @var integer
     */
    protected $updatedTime;

    /**
     * @ORM\ManyToOne(targetEntity="UserInterface")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function addTag($tag)
    {
        $this->tags[] = $tag;
        return $this;
    }

    public function removeTag($tag)
    {
        return $this;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function setCreatedTime($createTime = 0)
    {
        $this->createTime = $createTime? : time();
        return $this;
    }

    public function getCreatedTime()
    {
        return $this->createTime;
    }

    public function setPublishedTime($publishedTime = 0)
    {
        $this->publishedTime = $publishedTime? : time();
        return $this;
    }

    public function getPublishedTime()
    {
        return $this->publishedTime;
    }

    public function setUpdatedTime($updatedTime = 0)
    {
        $this->updatedTime = $updatedTime? : time();
        return $this;
    }

    public function getUpdatedTime()
    {
        return $this->updatedTime;
    }

    public function setUser(UserInterface $user)
    {
        $this->user = $user;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

}
