<?php

/*
 * This file is part of the current project.
 * 
 * (c) ForeverGlory <http://foreverglory.me/>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Glory\Bundle\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Glory\Bundle\ContentBundle\Form\Type\ContentFormType;

/**
 * Description of AdminController
 *
 * @author ForeverGlory <foreverglory@qq.com>
 */
class AdminController extends Controller
{

    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $sql = 'select content from ' . $this->getContentManager()->getClass() . ' content';
        $query = $em->createQuery($sql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $request->query->getInt('page', 1), 20
        );

        return $this->render('GloryContentBundle:Admin:list.html.twig', [
                    'pagination' => $pagination
        ]);
    }

    public function createAction(Request $request)
    {
        $contentManager = $this->getContentManager();
        $content = $contentManager->createContent();
        $form = $this->createForm('glory_content_form', $content);
        //$form = $this->createForm(ContentFormType::class, $content);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $contentManager->updateContent($content);
            return $this->redirectToRoute('glory_content_admin');
        }
        return $this->render('GloryContentBundle:Admin:create.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    public function editAction(Request $request, $id)
    {
        $contentManager = $this->get('glory_content.content_manager');
    }

    public function deleteAction(Request $request, $id)
    {
        $contentManager = $this->getContentManager();
        $content = $this->getContentOrThrow($id);
        $contentManager->deleteContent($content);
        return $this->redirectToRoute('glory_content_admin');
    }

    protected function getContentOrThrow($id)
    {
        $contentManager = $this->getContentManager();
        $content = $contentManager->findContent($id);
        if (!$content) {
            throw $this->createNotFoundException('Content Not Found');
        }
        return $content;
    }

    protected function getContentManager()
    {
        return $this->get('glory_content.content_manager');
    }

}
