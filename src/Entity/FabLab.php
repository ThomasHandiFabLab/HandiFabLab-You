<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FabLabRepository")
 */
class FabLab
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank( message = "Vous devez saisir un nom." )
     * @Assert\Length(
     *      min = 3,
     *      max = 33,
     *      minMessage = "Votre nom doit contenir au moins {{ limit }} caractères",
     *      maxMessage = "Votre nom doit contenir au maximum {{ limit }} caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Assert\NotBlank( message = "Vous devez saisir une adresse." )
     * @Assert\Length(
     *      min = 8,
     *      max = 255,
     *      minMessage = "Votre adresse doit contenir au moins {{ limit }} caractères",
     *      maxMessage = "Votre adresse doit contenir au maximum {{ limit }} caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lienaddress;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;
    /**
     * @Assert\Type(
     *     type="float",
     *     message="Vous devez saisir un code postale valide."
     * )
     * @ORM\Column(type="float", nullable=true)
     */
    private $cp;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbProject;

    /**
     * @Assert\NotBlank( message = "Vous devez saisir un numéro de téléphone." )
     * @Assert\Length(
     *      min = 10,
     *      max = 12,
     *      minMessage = "Votre adresse doit contenir au moins {{ limit }} caractères",
     *      maxMessage = "Votre adresse doit contenir au maximum {{ limit }} caractères contenant +33"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $phonenumber;

    /**
     * @Assert\Email(
     *     message = "L'email '{{ value }}' n'est pas valide.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Project", mappedBy="fablab")
     */
    private $projects;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="fablab")
     */
    private $users;

    public function __construct()
    {
        $this->projects = new ArrayCollection();
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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getLienaddress(): ?string
    {
        return $this->lienaddress;
    }

    public function setLienaddress(string $lienaddress): self
    {
        $this->lienaddress = $lienaddress;

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

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getNbProject(): ?int
    {
        return $this->nbProject;
    }

    public function setNbProject(int $nbProject): self
    {
        $this->nbProject = $nbProject;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(int $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

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

    /**
     * @return Collection|Project[]
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Project $project): self
    {
        if (!$this->projects->contains($project)) {
            $this->projects[] = $project;
            $project->setFablab($this);
        }

        return $this;
    }

    public function removeProject(Project $project): self
    {
        if ($this->projects->contains($project)) {
            $this->projects->removeElement($project);
            // set the owning side to null (unless already changed)
            if ($project->getFablab() === $this) {
                $project->setFablab(null);
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
            $user->addFablab($this);
        }
        
        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeFablab($this);
        }

        return $this;
    }
    public function __toString() {
        return $this->name;
    }
}
