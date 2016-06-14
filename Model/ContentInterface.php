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

use Glory\Bundle\CategoryBundle\Model\CategoryInterface;
use Glory\Bundle\ContentBundle\Model\TagInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 *
 * @author ForeverGlory <foreverglory@qq.com>
 */
interface ContentInterface
{

    public function setId($id);

    public function getId();

    public function setTitle($title);

    public function getTitle();

    public function setDescription($description);

    public function getDescription();

    public function setThumb($thumb);

    public function getThumb();

    public function setBody($body);

    public function getBody();

    public function setCategory(CategoryInterface $category);

    public function getCategory();

    public function addTag(TagInterface $tag);

    public function hasTag($tag);

    public function removeTag($tag);

    public function setTags($tags);

    public function getTags();

    public function setSource($source);

    public function getSource();

    public function setCreatedTime($createTime = 0);

    public function getCreatedTime();

    public function setPublishedTime($publishedTime = 0);

    public function getPublishedTime();

    public function setUpdatedTime($updatedTime = 0);

    public function getUpdatedTime();

    public function setUser(UserInterface $user);

    public function getUser();
}
