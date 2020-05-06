<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\SecurityController;
use App\Entity\Post;

class PostController extends AbstractController
{
    /**
     * @Route("/posts/{id}", name="post_show")
     */
    public function show($id)
    {
        // get a Post object - e.g. query for it
        $post = new Post;

        // check for "view" access: calls all voters
        $this->denyAccessUnlessGranted('view', $post);

		return new Response(
            '<html><body>PostController show response </body></html>'
        );
	}

    /**
     * @Route("/posts/{id}/edit", name="post_edit")
     */
    public function edit($id)
    {
        // get a Post object - e.g. query for it
        $post = new Post;

        // check for "edit" access: calls all voters
        $this->denyAccessUnlessGranted('edit', $post);

		return new Response(
            '<html><body>PostController edit response </body></html>'
        );    }
}
