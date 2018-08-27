<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Process;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Process controller.
 *
 * @Route("process")
 */
class ProcessController extends Controller
{
    /**
     * Lists all process entities.
     *
     * @Route("/", name="process_index")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request)
    {
        $begin = null;
        $end = null;
        $em = $this->getDoctrine()->getManager();

        if ($request->getMethod() == 'POST') {

            $begin = $request->request->get('begin');
            $end = $request->request->get('end');

            $processes = $em->getRepository('AppBundle:Process')
                ->filterByDate($begin, $end);
        } else {
            $processes = $em->getRepository('AppBundle:Process')->findAll();
        }


        return $this->render('process/index.html.twig', array(
            'processes' => $processes,
            'search' => ['begin' => $begin, 'end' => $end]
        ));
    }

    /**
     * Creates a new process entity.
     *
     * @Route("/new", name="process_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $process = new Process();
        $form = $this->createForm('AppBundle\Form\ProcessType', $process);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($process);
            $em->flush();

            return $this->redirectToRoute('process_show', array('id' => $process->getId()));
        }

        return $this->render('process/new.html.twig', array(
            'process' => $process,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a process entity.
     *
     * @Route("/{id}", name="process_show")
     * @Method("GET")
     */
    public function showAction(Process $process)
    {
        $deleteForm = $this->createDeleteForm($process);

        return $this->render('process/show.html.twig', array(
            'process' => $process,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing process entity.
     *
     * @Route("/{id}/edit", name="process_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Process $process)
    {
        $deleteForm = $this->createDeleteForm($process);
        $editForm = $this->createForm('AppBundle\Form\ProcessType', $process);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('process_edit', array('id' => $process->getId()));
        }

        return $this->render('process/edit.html.twig', array(
            'process' => $process,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a process entity.
     *
     * @Route("/{id}", name="process_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Process $process)
    {
        $form = $this->createDeleteForm($process);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($process);
            $em->flush();
        }

        return $this->redirectToRoute('process_index');
    }

    /**
     * Creates a form to delete a process entity.
     *
     * @param Process $process The process entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Process $process)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('process_delete', array('id' => $process->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
