<?php

/*
 * This file is part of the current project.
 * 
 * (c) ForeverGlory <https://foreverglory.me/>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Glory\Bundle\ContentBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Glory\Bundle\CategoryBundle\Form\Type\CategoryType;

/**
 * Description of ContentFormType
 *
 * @author ForeverGlory <foreverglory@qq.com>
 */
class ContentFormType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
                ->add('title')
                ->add('body', 'ckeditor')
                ->add('category', new CategoryType())
        ;
    }

    public function getName()
    {
        return 'glory_content_form';
    }

}
