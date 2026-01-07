<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $patient = new Patient();
            $patient->setNom("Nom$i");
            $patient->setPrenom("Prenom$i");
            $patient->setAdresse("$i rue de la Santé, 75000 Paris");
            $patient->setTelephone("7700000" . str_pad($i, 2, '0', STR_PAD_LEFT));
            $patient->setLogin("patient$i");
            $patient->setPwd("pass123");
            $patient->setIsDelete(false);
            $patient->setCreateAt(new \DateTimeImmutable());
            $patient->setUpdateAt(new \DateTimeImmutable());

            $manager->persist($patient);
        }

        $manager->flush();
    }
}
