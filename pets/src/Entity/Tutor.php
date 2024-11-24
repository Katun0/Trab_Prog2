<?php

namespace App\Entity;

use App\Repository\TutorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TutorRepository::class)]
class Tutor extends User
{

    /**
     * @var Collection<int, Animal>
     */
    #[ORM\OneToMany(targetEntity: Animal::class, mappedBy: 'tutor')]
    private Collection $animais;

    public function __construct()
    {
        $this->animais = new ArrayCollection();
    }
<<<<<<< HEAD
=======

>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc
    /**
     * @return Collection<int, Animal>
     */
    public function getAnimais(): Collection
    {
        return $this->animais;
    }

    public function addAnimal(Animal $animal): static
    {
        if (!$this->animais->contains($animal)) {
            $this->animais->add($animal);
            $animal->setTutor($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal): static
    {
        if ($this->animais->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getTutor() === $this) {
                $animal->setTutor(null);
            }
        }

        return $this;
    }
}
