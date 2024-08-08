<?php

namespace App\State;

use ApiPlatform\Doctrine\Orm\State\CollectionProvider;
use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Doctrine\Orm\State\ItemProvider;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Entity\User;
use Symfony\Component\DependencyInjection\Attribute\Autowire;



class UserStateProvider implements ProviderInterface
{
    public function __construct(
        #[Autowire(service: ItemProvider::class)] private ProviderInterface $itemProvider,
        #[Autowire(service: CollectionProvider::class)] private ProviderInterface $collectionProvider,
    )
    {}
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if($operation instanceof CollectionOperationInterface) {
            return $this->collectionProvider->provide($operation, $uriVariables, $context);
        }
        return $this->itemProvider->provide($operation, $uriVariables, $context);
    }
}
