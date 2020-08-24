<?php

namespace App\DataFixtures;

use App\Entity\CompetencesData;
use App\Entity\Competencesprog;
use App\Entity\Diplomes;
use App\Entity\Email;
use App\Entity\Experiences;
use App\Entity\Personnes;
use App\Entity\Reseaux;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PersonneFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i=1;$i<=5;$i++){
            $personne=new Personnes();
            $personne->SetNom('MUGIRANEZA')
            ->SetPrenom('OSCAR')
            ->SetProfession('DATA ANALYST, DÉVELOPPEUR D\'APPLICATIONS')
            ->SetCvpdf('fichier-5f43a3bf439eb.pdf')
            ->SetApropos('Actuellement en 2e année d\'un Master Informatique décisionnelle, je suis titulaire d\'une licence en génie logiciel.')
            ->SetAge(23)
            ->SetEmail('o.mugiraneza@elitech.education')
            ->SetTelephone('+33 7 58 18 87 67')
            ->SetAdresse('45 Bis Boulevard Jourdan, Paris 75014')
            ->SetLangues('Anglais, français, Ewe, Chinois(en cours d\'apprentissage)')
            ->SetPortrait('fichier-5f43a3bf4bdb4.jpeg');
            $manager->persist($personne);
            $manager->flush();
            for($cpt=1;$cpt<=5;$cpt++){
                $email=new Email();
                $email->setDescription('email personnel')
                    ->setLibelle('mugiranezao@gmail.com')
                    ->setPersonnes($personne);
                $manager->persist($email);
                $manager->flush();
            }
            for($cpt=1;$cpt<=5;$cpt++){
                $diplome=new Diplomes();
                $diplome->setDescription('MASTER')
                    ->setLibelle('Master management de projet informatique spécialisation BIG-DATA (Formation en cours)')
                    ->setMoisdebut('Septembre')
                    ->setAnneedebut('2017')
                    ->setMoisfin(null)
                    ->setAnneefin(null)
                    ->setEntreprise('ELITECH')
                    ->setPersonne($personne);
                $manager->persist($diplome);
                $manager->flush();
            }
            for($cpt=1;$cpt<=2;$cpt++){
                $comptetence=new CompetencesData();
                $comptetence ->setLibelle('TALEND')
                    ->setNiveau('80')
                    ->setPersonne($personne);
                $manager->persist($comptetence);
                $manager->flush();
            }
            for($cpt=1;$cpt<=2;$cpt++){
                $comptetence=new Competencesprog();
                $comptetence ->setLibelle('SYMFONY')
                    ->setNiveau('80')
                    ->setPersonne($personne);
                $manager->persist($comptetence);
                $manager->flush();
            }
            for($cpt=1;$cpt<=2;$cpt++){
                $exp=new Experiences();
                $exp ->setLibelle('Développeur d\'applications (Stage)')
                    ->setMoisdebut('Septembre')
                    ->setAnneedebut('2017')
                    ->setMoisfin(null)
                    ->setAnneefin(null)
                    ->setEntreprise('ELITECH')
                    ->setVille(null)
                    ->setDescription('Thème de stage: Mise en place d\'un module d\'analyse financière pour le scoring.')
                    ->setPersonne($personne);
                $manager->persist($exp);
                $manager->flush();
            }
            for($cpt=1;$cpt<=1;$cpt++){
                $reseau=new Reseaux();
                $reseau ->setLibelle('linkedIn')
                    ->setIcon('fa fa-linkedin')
                    ->setLien('https://www.linkedin.com/in/oscar-mugiraneza/')
                    ->setIcon('fa fa-linkedin')
                    ->setStyles('cc-linkedin btn btn-link')
                    ->setPersonne($personne);
                $manager->persist($reseau);
                $manager->flush();
            }

        }
    }
}
