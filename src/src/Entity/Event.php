<?php

declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use App\Repository\EventRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: EventRepository::class)]
#[ApiResource(
    operations       : [
        new Post(denormalizationContext: ['groups' => 'event:write']),
        new Delete(),
        new Put(),
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

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE, nullable: true)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?DateTimeInterface $startDateEvent = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?DateTimeInterface $endDateEvent = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?string $hourTimeSlotStart = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?string $minuteTimeSlotStart = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?string $hourTimeSlotEnd = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?string $minuteTimeSlotEnd = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Groups(['event:list', 'event:item', 'event:write'])]
    private ?int $eventType = null;

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

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getStartDateEvent(): ?DateTimeInterface
    {
        return $this->startDateEvent;
    }

    public function setStartDateEvent(DateTimeInterface $startDateEvent): static
    {
        $this->startDateEvent = $startDateEvent;

        return $this;
    }

    public function getEndDateEvent(): ?DateTimeInterface
    {
        return $this->endDateEvent;
    }

    public function setEndDateEvent(?DateTimeInterface $endDateEvent): static
    {
        $this->endDateEvent = $endDateEvent;

        return $this;
    }

    public function getHourTimeSlotEnd(): ?string
    {
        return $this->hourTimeSlotEnd;
    }

    public function setHourTimeSlotEnd(?string $HourTimeSlotEnd): static
    {
        $this->hourTimeSlotEnd = $HourTimeSlotEnd;

        return $this;
    }

    public function getHourTimeSlotStart(): ?string
    {
        return $this->hourTimeSlotStart;
    }

    public function setHourTimeSlotStart(?string $HourTimeSlotStart): static
    {
        $this->hourTimeSlotStart = $HourTimeSlotStart;

        return $this;
    }

    public function getMinuteTimeSlotEnd(): ?string
    {
        return $this->minuteTimeSlotEnd;
    }

    public function setMinuteTimeSlotEnd(?string $MinuteTimeSlotEnd): static
    {
        $this->minuteTimeSlotEnd = $MinuteTimeSlotEnd;

        return $this;
    }

    public function getMinuteTimeSlotStart(): ?string
    {
        return $this->minuteTimeSlotStart;
    }

    public function setMinuteTimeSlotStart(?string $MinuteTimeSlotStart): static
    {
        $this->minuteTimeSlotStart = $MinuteTimeSlotStart;

        return $this;
    }

    public function getEventType(): ?int
    {
        return $this->eventType;
    }

    public function setEventType(int $EventType): static
    {
        $this->eventType = $EventType;

        return $this;
    }
}
