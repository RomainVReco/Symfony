<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class BookController extends AbstractController
{
    #[Route('/api/books', name:'book', methods:['GET'])]
    public function getAllBooks(BookRepository $bookRepository, SerializerInterface $serializer): JsonResponse
    {
        $bookList = $bookRepository->findAll();

        $jsonBookList = $serializer->serialize($bookList, 'json', ['groups' => 'getBooks']);
        return new JsonResponse($jsonBookList, Response::HTTP_OK, [], true);
    }

    #[Route('/api/books/{id}', name:'detailBook', methods:['GET'])]
    public function getDetailBook(int $id, SerializerInterface $serializer, BookRepository $bookRepository) {
        $book = $bookRepository->find($id);
        if($book) {
            $jsonBook = $serializer->serialize($book, 'json', ['groups' => 'getBooks']);
            return new JsonResponse($jsonBook, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }

    #[Route('/api/books/{id}', name:'deleteBook', methods:['DELETE'])]
    public function deleteBook (int $id, BookRepository $bookRepository, EntityManagerInterface $em): JsonResponse
    {
        $book = $bookRepository->find($id);
        if ($book) {
            $em->remove($book);
            $em->flush();
            return new JsonResponse(null, Response::HTTP_NO_CONTENT);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }    
}
