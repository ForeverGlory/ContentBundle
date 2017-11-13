<?php

/*
 * This file is part of the current project.
 * 
 * (c) ForeverGlory <http://foreverglory.me/>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Glory\Bundle\ContentBundle\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

/**
 * Description of ContentType
 *
 * @author ForeverGlory
 */
class ContentType extends AbstractResourceType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('title', TextType::class,[
                    'label' => 'sylius.ui.title'
                ])
                ->add('description', TextareaType::class,[
                    'label' => 'sylius.ui.description'
                ])
                ->add('body', CKEditorType::class, [
                    'config_name' => 'description',
                    'required' => false,
                    'label' => 'sylius.ui.content',
                ])
                ->add('enabled', CheckboxType::class, [
                    'required' => false,
                    'label' => 'sylius.form.product.enabled',
                ])
        ;
    }

    public function getBlockPrefix()
    {
        return 'glory_content';
    }

}
