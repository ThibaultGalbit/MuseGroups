<?php

namespace App\Controller;

use App\Entity\Musegroupe;
use App\Repository\MusegroupeRepository;
use App\Service\ImportGroup;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

#[Route('/api', name: "api_")]
class MusegroupeController extends AbstractController
{
    #[Route('/', name: 'app_musegroupe', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('test.html.twig');
    }

    #[Route('/groups', name: "app_groups_list", methods: 'GET')]
    public function getAllGroups(SerializerInterface $serializer, MusegroupeRepository $repository)
    {
        $groups = $repository->findAll();
        $jsonContent = $serializer->serialize($groups, 'json');
        return new JsonResponse($jsonContent, Response::HTTP_OK, [], true);
    }

    #[Route('/group/{id}', name: "app_group", methods: 'GET')]
    public function getGroup(Musegroupe $musegroupe, SerializerInterface $serializer, MusegroupeRepository $repository)
    {
        $group = $repository->find($musegroupe);
        $jsonContent = $serializer->serialize($group, 'json');
        return new JsonResponse($jsonContent, Response::HTTP_OK, [], true);
    }


    #[Route('/import', name: "csv_import")]
    public function importFromCsv(Request $request, ImportGroup $importGroupService, #[Autowire('%upload_dir%')] string $uploadDir) : void
    {
        //Récuperer le fichier

        //Convertir xslx en csv

        //Import
        $importGroupService->importGroup($uploadDir."/"."test.csv");
    }
}
