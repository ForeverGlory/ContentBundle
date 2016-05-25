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
 * @ORM\MappedSuperclass
 * @author ForeverGlory <foreverglory@qq.com>
 */
class Tag extends Category
{

    /**
     * Parent
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $parent = null;

    /**
     * Contents
     * @ORM\OneToMany(targetEntity="Content", inversedBy="tags")
     */
    protected $contents = array();

}
