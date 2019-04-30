<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank( message = "Vous devez saisir un nom" )
     * @Assert\Length(min ="2", minMessage="Votre nom doit faire minimum {{ limit }} caractères")
     */
    private $name;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\GreaterThan("today", message="La date de début doit être dans le futur.")
     */
    private $start_at;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Assert\GreaterThan("today", message="La date de début doit être dans le futur.")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lientinker;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *  @Assert\Length(
     *      min = 20,
     *      max = 200,
     *      minMessage = "Votre description doit contenir au moins {{ limit }} caractères",
     *      maxMessage = "Votre description doit contenir au maximum {{ limit }} caractères")
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     * @Assert\GreaterThan("today")
     */
    private $deadline_at;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Type(
     *     type="float", message="Vous devez saisir un prix valide")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\File(
     *     maxSize = "1024k",
     *     mimeTypes = {"application/pdf", "application/x-pdf", "application/jpg", "application/png", "application/jpeg"},
     *     mimeTypesMessage = "Please upload a valid PDF")
     */
    private $picture;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $width;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $length;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $height;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Picture", mappedBy="project", orphanRemoval=true)
     */
    private $pictures;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="project")
     */
    private $users;


    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->start_at;
    }

    public function setStartAt(\DateTimeInterface $start_at): self
    {
        $this->start_at = $start_at;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getLientinker(): ?string
    {
        return $this->lientinker;
    }

    public function setLientinker(?string $lientinker): self
    {
        $this->lientinker = $lientinker;

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

    public function getDeadlineAt(): ?\DateTimeInterface
    {
        return $this->deadline_at;
    }

    public function setDeadlineAt(?\DateTimeInterface $deadline_at): self
    {
        $this->deadline_at = $deadline_at;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height): self
    {
        $this->height = $height;

        return $this;
    }


    /**
     * @return Collection|Picture[]
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos[] = $photo;
            $photo->setProject($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->contains($photo)) {
            $this->photos->removeElement($photo);
            // set the owning side to null (unless already changed)
            if ($photo->getProject() === $this) {
                $photo->setProject(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addProject($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeProject($this);
        }

        return $this;
    }
}
