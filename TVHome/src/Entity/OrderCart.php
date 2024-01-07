<?php

namespace App\Entity;

use App\Repository\OrderCartRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderCartRepository::class)]
class OrderCart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'OrderRef', targetEntity: OrderItem::class,  cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $Item;

    #[ORM\Column(length: 255)]
    private ?string $Status = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updateAt = null;

    public function __construct()
    {
        $this->Item = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, OrderItem>
     */
    public function getItem(): Collection
    {
        return $this->Item;
    }

    public function addItem(OrderItem $item): static
    {
        foreach ($this->getItem() as $existingItem) {
            // The item already exists, update the quantity
            if ($existingItem->equals($item)) {
                $existingItem->setQuantity(
                    $existingItem->getQuantity() + $item->getQuantity()
                );
                return $this;
            }
        }
    
        $this->Item[] = $item;
        $item->setOrderRef($this);
    
        return $this;
    }

    public function removeItem(OrderItem $item): self
    {
        foreach ($this->getItem() as $item) {
            $this->removeItem($item);
        }
    
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->Status;
    }

    public function setStatus(string $Status): static
    {
        $this->Status = $Status;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): static
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\DateTimeImmutable $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Tổng tiền.
     *
     * @return float
     */
    public function getTotal(): int
    {
        $total = 0;

        foreach ($this->getItem() as $item) {
            $total += $item->getTotal();
        }

        return $total;
    }
}
