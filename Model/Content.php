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

use Symfony\Component\Validator\Constraints as Assert;
use Glory\Bundle\CategoryBundle\Model\CategoryInterface;
use Glory\Bundle\ContentBundle\Model\TagInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Content
 */
class Content implements ContentInterface
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var
     */
    protected $thumb;

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
    protected $tags = array();

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
     * @var UserInterface 
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

    public function setThumb($thumb)
    {
        $this->thumb = $thumb;
        return $this;
    }

    public function getThumb()
    {
        return $this->thumb;
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

    public function setCategory(CategoryInterface $category)
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function addTag(TagInterface $tag)
    {
        $this->tags[$tag->getName()] = $tag;
        return $this;
    }

    public function hasTag($tag)
    {
        return array_key_exists($tag, $this->getTags());
    }

    public function removeTag($tag)
    {
        unset($this->tags[$tag]);
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
        $this->createdTime = $createTime? : time();
        return $this;
    }

    public function getCreatedTime()
    {
        return $this->createdTime;
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

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
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
