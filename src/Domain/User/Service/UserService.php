<?php
declare(strict_types=1);

namespace App\Domain\User\Service;

use App\Domain\Dto\UserSearchFilter;
use App\Domain\User\Dto\SearchResult;
use App\Domain\User\Entity\User;
use App\Domain\User\Interface\UserCreateCommandInterface;
use App\Domain\User\Interface\UserCreateInterface;
use App\Domain\User\Interface\UserFetchInterface;
use App\Domain\User\Interface\UserInterface;
use App\Domain\User\Interface\UserSearchFilterInterface;
use App\Domain\User\Interface\UserSearchInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

class UserService implements UserCreateInterface, UserFetchInterface, UserSearchInterface
{
    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    )
    {
    }

    public function create(UserCreateCommandInterface $command): UserInterface
    {
        $entity = new User(
            null,
            $command->getEmail(),
            $command->getPassword(),
            $command->getName(),
        );
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }

    public function getById(int $id): ?User
    {
        return $this->entityManager->getRepository(User::class)->find($id);
    }

    public function getByEmail(string $email): ?User
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
    }

    public function search(UserSearchFilterInterface $filter): SearchResult
    {
        $builder = $this->entityManager->getRepository(User::class)->createQueryBuilder('u');
        $builder->where(
            $builder->expr()->andX(
                [
                    $builder->expr()->in('u.id', $filter->getIds()),
                    $builder->expr()->like('u.email', $filter->getEmail()),
                    $builder->expr()->like('u.name', $filter->getName()),
                ]
            )
        );
        $builder->setFirstResult($filter->getOffset());
        $builder->setMaxResults($filter->getLimit());

        $paginator = new Paginator($builder->getQuery());

        return new SearchResult(
            $paginator->getQuery()->execute(),
            $paginator->count(),
        );
    }
}
