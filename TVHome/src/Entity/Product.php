<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    //#[ORM\GeneratedValue]
    #[ORM\Column]

    private ?string $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 10)]
    private ?int $price = null;

    #[ORM\OneToMany(mappedBy: 'Product', targetEntity: OrderItem::class)]
    private Collection $OderItem;

    #[ORM\Column]
    private ?int $Quantity = null;

    public function __construct()
    {
        $this->OderItem = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, OrderItem>
     */
    public function getOderItem(): Collection
    {
        return $this->OderItem;
    }

    public function addOderItem(OrderItem $oderItem): static
    {
        if (!$this->OderItem->contains($oderItem)) {
            $this->OderItem->add($oderItem);
            $oderItem->setProduct($this);
        }

        return $this;
    }

    public function removeOderItem(OrderItem $oderItem): static
    {
        if ($this->OderItem->removeElement($oderItem)) {
            // set the owning side to null (unless already changed)
            if ($oderItem->getProduct() === $this) {
                $oderItem->setProduct(null);
            }
        }

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): static
    {
        $this->Quantity = $Quantity;

        return $this;
    }
}
