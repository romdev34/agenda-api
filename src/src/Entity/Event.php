<?php

namespace App\Entity;

use ApiPlatform\Metadata\Post;
use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ApiResource(
    operations: [
        new Post(denormalizationContext: ['groups' => 'event:write']),
        new Get(normalizationContext: ['groups' => 'event:item']),
        new GetCollection(normalizationContext: ['groups' => 'event:list'])
    ],
    paginationEnabled: false,
)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['event:list', 'event:item'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?string $details = null;

    #[ORM\Column]
    #[Gedmo\Timestampable]
    #[Groups(['event:list', 'event:item'])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column]
    #[Gedmo\Timestampable(on: 'create')]
    #[Groups(['event:list', 'event:item'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?\DateTimeInterface $start_date_event = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?\DateTimeInterface $end_date_event = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?int $priority = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): static
    {
        $this->details = $details;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

//    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
//    {
//        $this->updatedAt = $updatedAt;
//
//        return $this;
//    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

//    public function setCreatedAt(\DateTimeImmutable $createdAt): static
//    {
//        $this->createdAt = $createdAt;
//
//        return $this;
//    }

    public function getStartDateEvent(): ?\DateTimeInterface
    {
        return $this->start_date_event;
    }

    public function setStartDateEvent(\DateTimeInterface $start_date_event): static
    {
        $this->start_date_event = $start_date_event;

        return $this;
    }

    public function getEndDateEvent(): ?\DateTimeInterface
    {
        return $this->end_date_event;
    }

    public function setEndDateEvent(?\DateTimeInterface $end_date_event): static
    {
        $this->end_date_event = $end_date_event;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): static
    {
        $this->priority = $priority;

        return $this;
    }
}
