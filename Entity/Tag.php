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
use Glory\Bundle\CategoryBundle\Entity\Category;
use Glory\Bundle\ContentBundle\Entity\Content;

/**
 * Description of Tag
 *
 * @ORM\Entity
 * @ORM\Table("content_tag")
 * 
 * @author ForeverGlory <foreverglory@qq.com>
 */
class Tag extends Category
{
    /**
     * Contents
     * @ORM\ManyToMany(targetEntity="Content", inversedBy="tags")
     * @ORM\JoinTable(name="content_tags_relation",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    //protected $contents = array();

}
