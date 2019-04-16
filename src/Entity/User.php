<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="text")
     */
    private $roles;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberprojects;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberprojectsrequest;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phonenumber;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Project", inversedBy="users")
     */
    private $project;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FabLab", inversedBy="users")
     */
    private $fablab;

    public function __construct()
    {
        $this->project = new ArrayCollection();
        $this->fablab = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getNumberprojects(): ?int
    {
        return $this->numberprojects;
    }

    public function setNumberprojects(?int $numberprojects): self
    {
        $this->numberprojects = $numberprojects;

        return $this;
    }

    public function getNumberprojectsrequest(): ?int
    {
        return $this->numberprojectsrequest;
    }

    public function setNumberprojectsrequest(?int $numberprojectsrequest): self
    {
        $this->numberprojectsrequest = $numberprojectsrequest;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getPhonenumber(): ?int
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(?int $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * @return Collection|Project[]
     */
    public function getProject(): Collection
    {
        return $this->project;
    }

    public function addProject(Project $project): self
    {
        if (!$this->project->contains($project)) {
            $this->project[] = $project;
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->project->contains($project)) {
            $this->project->removeElement($project);
        }

        return $this;
    }

    /**
     * @return Collection|FabLab[]
     */
    public function getFablab(): Collection
    {
        return $this->fablab;
    }

    public function addFablab(FabLab $fablab): self
    {
        if (!$this->fablab->contains($fablab)) {
            $this->fablab[] = $fablab;
        }

        return $this;
    }

    public function removeFablab(FabLab $fablab): self
    {
        if ($this->fablab->contains($fablab)) {
            $this->fablab->removeElement($fablab);
        }

        return $this;
    }
}
