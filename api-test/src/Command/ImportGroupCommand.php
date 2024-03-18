<?php

namespace App\Command;

use App\Entity\Musegroupe;
use App\Repository\MusegroupeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Imagine\Gd\Imagine;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


#[AsCommand(
    name: 'app:import-group',
    description: 'Resized an image',
    hidden: false
)]
class ImportGroupCommand extends Command
{
    private $groupRepository;
    private $em;

    public function __construct(MusegroupeRepository $groupRepository, EntityManagerInterface $em)
    {
        $this->groupRepository = $groupRepository;
        $this->em = $em;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (($fp = fopen("public/uploads/test.csv", "r")) !== FALSE) {
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

        return Command::SUCCESS;
    }
}