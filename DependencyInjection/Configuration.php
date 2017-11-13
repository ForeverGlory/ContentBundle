<?php

/*
 * This file is part of the current project.
 * 
 * (c) ForeverGlory <http://foreverglory.me/>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Glory\Bundle\ContentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Sylius\Bundle\ResourceBundle\SyliusResourceBundle;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Sylius\Component\Resource\Factory\Factory;
use Glory\Bundle\ContentBundle\Model\Content;
use Glory\Bundle\ContentBundle\Model\ContentInterface;
use Glory\Bundle\ContentBundle\Form\Type\ContentType;
use Sylius\Bundle\GridBundle\Doctrine\ORM\Driver as DoctrineORMDriver;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('glory_content');

        $rootNode
            ->children()
                ->scalarNode('driver')->defaultValue(SyliusResourceBundle::DRIVER_DOCTRINE_ORM)->end()
            ->end()
        ;
        
        $this->addResourcesSection($rootNode);
        $this->addGridsSection($rootNode);

        return $treeBuilder;
    }
    
    /**
     * @param ArrayNodeDefinition $node
     * @see Sylius\Bundle\ResourcesBundle\DependencyInjection\Configuration->addResourcesSection()
     */
    private function addResourcesSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('resources')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('content')
                            ->addDefaultsIfNotSet()
                            ->children()
                                ->variableNode('options')->end()
                                ->arrayNode('classes')
                                    ->addDefaultsIfNotSet()
                                    ->children()
                                        ->scalarNode('model')->defaultValue(Content::class)->cannotBeEmpty()->end()
                                        ->scalarNode('interface')->defaultValue(ContentInterface::class)->cannotBeEmpty()->end()
                                        ->scalarNode('controller')->defaultValue(ResourceController::class)->end()
                                        ->scalarNode('factory')->defaultValue(Factory::class)->end()
                                        ->scalarNode('form')->defaultValue(ContentType::class)->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
    
     /**
      * @param ArrayNodeDefinition $node
      * @see Sylius\Bundle\GridBundle\DependencyInjection\Configuration->addGridsSection()
     */
    private function addGridsSection(ArrayNodeDefinition $node): void
    {
        $node
            ->children()
                ->arrayNode('grids')
                    ->useAttributeAsKey('code')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('extends')->cannotBeEmpty()->end()
                            ->arrayNode('driver')
                                ->addDefaultsIfNotSet()
                                ->children()
                                    ->scalarNode('name')->cannotBeEmpty()->defaultValue(DoctrineORMDriver::NAME)->end()
                                    ->arrayNode('options')
                                        ->performNoDeepMerging()
                                        ->prototype('variable')->end()
                                        ->defaultValue([])
                                    ->end()
                                ->end()
                            ->end()
                            ->arrayNode('sorting')
                                ->performNoDeepMerging()
                                ->useAttributeAsKey('name')
                                ->prototype('enum')->values(['asc', 'desc'])->cannotBeEmpty()->end()
                            ->end()
                            ->arrayNode('limits')
                                ->performNoDeepMerging()
                                ->prototype('integer')->end()
                                ->defaultValue([10, 25, 50])
                            ->end()
                            ->arrayNode('fields')
                                ->useAttributeAsKey('name')
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode('type')->isRequired()->cannotBeEmpty()->end()
                                        ->scalarNode('label')->cannotBeEmpty()->end()
                                        ->scalarNode('path')->cannotBeEmpty()->end()
                                        ->scalarNode('sortable')->end()
                                        ->scalarNode('enabled')->defaultTrue()->end()
                                        ->scalarNode('position')->defaultValue(100)->end()
                                        ->arrayNode('options')
                                            ->performNoDeepMerging()
                                            ->prototype('variable')->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->arrayNode('filters')
                                ->useAttributeAsKey('name')
                                ->prototype('array')
                                    ->children()
                                        ->scalarNode('type')->isRequired()->cannotBeEmpty()->end()
                                        ->scalarNode('label')->cannotBeEmpty()->end()
                                        ->scalarNode('enabled')->defaultTrue()->end()
                                        ->scalarNode('template')->end()
                                        ->scalarNode('position')->defaultValue(100)->end()
                                        ->arrayNode('options')
                                            ->performNoDeepMerging()
                                            ->prototype('variable')->end()
                                        ->end()
                                        ->arrayNode('form_options')
                                            ->performNoDeepMerging()
                                            ->prototype('variable')->end()
                                        ->end()
                                        ->variableNode('default_value')->end()
                                    ->end()
                                ->end()
                            ->end()
                            ->arrayNode('actions')
                                ->useAttributeAsKey('name')
                                ->prototype('array')
                                    ->useAttributeAsKey('name')
                                    ->prototype('array')
                                        ->children()
                                            ->scalarNode('type')->isRequired()->end()
                                            ->scalarNode('label')->end()
                                            ->scalarNode('enabled')->defaultTrue()->end()
                                            ->scalarNode('icon')->end()
                                            ->scalarNode('position')->defaultValue(100)->end()
                                            ->arrayNode('options')
                                                ->performNoDeepMerging()
                                                ->prototype('variable')->end()
                                            ->end()
                                        ->end()
                                    ->end()
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }

}
