<?php

namespace AppBundle\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User\User;
use AppBundle\Entity\User\Role;
use AppBundle\Form\User\UserType;

/**
 * User contoller for admin page.
 *
 * @author homelleon
 */
class UserAdminController extends Controller {

    /**
     * Renders page with users' list.
     * 
     * @Route("/admin/users", name="admin_users")
     * @return string
     */
    public function showListAction() {
        $users = $this->getDoctrine()
                ->getRepository(User::class)
                ->findAll();
        return $this->render(':Admin\User:users.html.twig', [
                    'users' => $users
        ]);
    }

    /**
     * Renders page with form to create new user. <br>Redirects to users' list
     * page.
     * 
     * @Route("/admin/users/create", name="user_create")
     */
    public function createAction(Request $request) {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();
            $role = $this->getDoctrine()
                    ->getRepository(Role::class)
                    ->findOneBy([
                'name' => 'user'
            ]);

            $user->setRole($role);

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('admin_users');
        }

        return $this->render(':Admin\User:user_create.html.twig', [
                    'form' => $form->createView(),
                    'user' => $user
        ]);
    }

    /**
     * Deletes user from data base. Redirects to users' list page.
     * <p>NOTE: Use it cearfully! Can't turn user back after deleting.
     * 
     * @Route("/admin/users/delete/{id}", name="admin_users_delete") 
     * @param integer $id
     */
    public function deleteAction(int $id) {
        $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->find($id);

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($user);
        $manager->flush();

        return $this->redirectToRoute('admin_users');
    }

}
