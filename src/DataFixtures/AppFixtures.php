<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Book;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $userPasswordHaser;

    public function __construct(UserPasswordHasherInterface $userPasswordHaser)
    {
        $this->userPasswordHaser = $userPasswordHaser;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("user@bookapi.com");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->userPasswordHaser->hashPassword($user, 'password'));
        $manager->persist($user);

        $userAdmin = new User();
        $user->setEmail("admin@bookapi.com");
        $user->setRoles(["ROLE_ADMIN"]);
        $user->setPassword($this->userPasswordHaser->hashPassword($user, 'password'));
        $manager->persist($userAdmin);

        $listAuthor = [];
        for ($i = 0; $i < 10; $i++) {
            $author = new Author();
            $author->setFirstName("Prenom " . $i);
            $author->setLastName("Nom " . $i);
            $manager->persist($author);
            $listAuthor[] = $author;
        }

        for ($i = 0; $i < 20; $i++) {
            $livre = new Book;
            $livre->setTitle('Livre ' . $i);
            $livre->setCoverText('Quatrième de couverture numéro : ' . $i);
            $livre->setAuthor($listAuthor[array_rand($listAuthor)]);
            $manager->persist($livre);
        }

        $manager->flush();
    }
}
