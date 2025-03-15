<?php

namespace controllers;

use entity\Invoice;
use entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function showUsers(): array
    {
        return $this->entityManager
            ->getRepository(User::class)
            ->findAll();
    }

    public function addUser(string $email, string $fullName, bool $isActive): void
    {
        $user = new User();
        $user->setEmail($email);
        $user->setFullName($fullName);
        $user->setIsActive($isActive);
        $user->setCreatedAt(new \DateTime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function deleteUser(int $userId): void
    {
        $user = $this->entityManager
            ->getRepository(User::class)
            ->find($userId);

        if ($user) {
            $this->entityManager->remove($user);
            $this->entityManager->flush();
        }
    }

    public function showMoneyUser(): array
    {
        return $this->entityManager
            ->getRepository(Invoice::class)
            ->findAll();
    }
}