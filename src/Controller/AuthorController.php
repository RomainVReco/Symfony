<?php

namespace App\Controller;

use App\Entity\Author;
use App\Repository\AuthorRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;

class AuthorController extends AbstractController
{
    #[Route('api/authors', name: 'author', methods:['GET'])]
    public function getAllAuthor(AuthorRepository $authorRepository, SerializerInterface $serializer): JsonResponse
    {
        $authorList = $authorRepository->findAll();
        $jsonAuthorList = $serializer->serialize($authorList, 'json', ['groups' => 'getAuthor']);
        return new JsonResponse($jsonAuthorList, Response::HTTP_OK, [], true);
    }

    #[Route('api/authors/{id}', name:'detailAuthor', methods:['GET'])]
    public function getDetailAuthor(int $id, AuthorRepository $authorRepository, SerializerInterface $serializer): JsonResponse
    {
        $author = $authorRepository->find($id);
        if ($author) {
            $jsonAuthor = $serializer->serialize($author, 'json', ['groups' => 'getAuthor']);
            return new JsonResponse($jsonAuthor, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }

    #[Route('api/authors/{id}', name:'deleteAuthor', methods:['DELETE'])]
    public function deleteAuthor (int $id, AuthorRepository $authorRepository, EntityManagerInterface $em): JsonResponse
    {
        $author = $authorRepository->find($id);
        if ($author) {
            $em->remove($author);
            $em->flush();
            return new JsonResponse(null, Response::HTTP_NO_CONTENT);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }

    #[Route('/api/authors', name:'createAuthor', methods:['POST'])]
    public function createAuthor (Request $request, SerializerInterface $serializer,
    EntityManagerInterface $em, UrlGeneratorInterface $urlGenerator):JsonResponse
    {
        $author = $serializer->deserialize($request->getContent(), Author::class, 'json');
        $em->persist($author);
        $em->flush();

        $jsonAuthor = $serializer->serialize($author, 'json', ['groups' => 'getAuthor']);
        $location = $urlGenerator->generate('detailAuthor', ['id' => $author->getId()], UrlGeneratorInterface::ABSOLUTE_PATH);

        return new JsonResponse($jsonAuthor, Response::HTTP_CREATED, ["Location" => $location], true);
    }

}
