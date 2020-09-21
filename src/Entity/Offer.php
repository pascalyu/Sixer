<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Interfaces\OwnUserInterface;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 * @ApiResource(
 *      itemOperations = {
 *          "get",
 *          "put"={
 *              "access_control"="is_granted('IS_AUTHENTICATED_FULLY') and object.getUser() == user "
 *          }
 *      },
 *      collectionOperations = {
 *          "get",
 *          "post"
 *      }
 * )
 *  @Assert\Expression(
 *      
 *     "(this.getPrice() != '0') or (this.getTitle() in ['s','ok']) ",
 *     message="i la valeur est 0 alors ca doi être s ou ok"
 * )
 */
class Offer implements OwnUserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="offers")
     */
    private $user;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * 
     *
     */
    private $title;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     *  @Assert\NotBlank(
     *      
     * )
  
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): self
    {
        $this->price = $price;

        return $this;
    }
}
