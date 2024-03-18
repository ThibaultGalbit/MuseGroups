<?php

namespace App\Controller;

use App\Repository\MusegroupeRepository;
use App\Service\ImportGroup;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

#[Route('/api', name: "api_")]
class MusegroupeController extends AbstractController
{
    #[Route('/musegroupe', name: 'app_musegroupe', methods: ['GET'])]
    public function index(): JsonResponse
    {
        return $this->json([
            'cle1' => 'Valeur 1',
            'cle2' => 'Valeur 2',
        ]);
    }

    #[Route('/groups', name: "app_groups_list", methods: 'GET')]
    public function getAllGroups(SerializerInterface $serializer, MusegroupeRepository $repository)
    {
        $groups = $repository->findAll();
        $jsonContent = $serializer->serialize($groups, 'json');
        return new JsonResponse($jsonContent, Response::HTTP_OK, [], true);
    }


    #[Route('/import', name: "csv_import")]
    public function importFromCsv(ImportGroup $importGroupService, #[Autowire('%upload_dir%')] string $uploadDir) : void
    {
        $importGroupService->importGroup($uploadDir."/"."test.csv");
    }
}
