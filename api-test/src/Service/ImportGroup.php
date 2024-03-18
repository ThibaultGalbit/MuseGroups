<?php

namespace App\Service;

use App\Entity\Musegroupe;
use App\Repository\MusegroupeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class ImportGroup
{
    private $groupRepository;
    private $em;

    public function __construct(MusegroupeRepository $groupRepository, EntityManagerInterface $em)
    {
        $this->groupRepository = $groupRepository;
        $this->em = $em;
    }

    public function importGroup(string $filename)
    {
        if (($fp = fopen($filename, "r")) !== FALSE) {
            fgetcsv($fp);
            while (($row = fgetcsv($fp, 1000, ",")) !== FALSE) {

                if ($this->groupRepository->findOneBy(['groupName' => [$row[0]]])) {
                    continue;
                }

                $group = new Musegroupe();
                $group->setGroupName($row[0]);
                $group->setOrigin($row[1]);
                $group->setCity($row[2]);
                $group->setStartDate($row[3]);
                if ($row[4] !== "") {
                    $group->setSeparateYear($row[4]);
                }
                $group->setFounder($row[5]);
                if ($row[6] !== "") {
                    $group->setMembers($row[6]);
                }
                $group->setStyle($row[7]);
                $group->setPresentation($row[8]);


                $this->em->persist($group);

            }
            $this->em->flush();
            fclose($fp);
        }
    }

}