<?php

namespace App\Controller;

use App\Entity\Disaster;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FemaApiController extends AbstractController
{
    private mixed $repository;
    private EntityManagerInterface $em;

    public function __construct(
        EntityManagerInterface $entityManager,
        private HttpClientInterface $client
    ) {
        define('FEMA_API_DISASTERS_URL', $_SERVER['FEMA_API_DISASTERS_URL']);
        define('DEFAULT_COUNT', $_SERVER['DEFAULT_COUNT']);
        $this->em = $entityManager;
        $this->repository = $this->em->getRepository(Disaster::class);
    }

    #[Route('/femaapi', name: 'app_fema_api')]
    public function index(): Response
    {
        return $this->render('fema_api/index.html.twig', [
            'controller_name' => 'FemaApiController',
        ]);
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/femaapi/fetch-new-items', name: 'fetch_new_items')]
    public function fetchNewItems(): void
    {
        $latestDisasterNumber = $this->repository->findLatestDisasterNumber();
        $this->fetchItemsUsingDisasterNumber($latestDisasterNumber, DEFAULT_COUNT);
    }

    /**
     * Returns ID of the latest Disaster entry
     *
     * @param int $disasterNumber
     * @param int $count
     * @return array
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     */
    public function fetchItemsUsingDisasterNumber(int $disasterNumber, int $count): array
    {
        $parameters = [];

        // greater than disaster number
        $parameters[] = '$filter=disasterNumber ge ' . $disasterNumber;

        // top
        $parameters[] = '$top=' . $count;

        // order by
        $parameters[] = '$orderby=disasterNumber asc';

        $parametersFormatted = '?' . implode('&', $parameters);

        $response = $this->client->request(
            'GET',
            FEMA_API_DISASTERS_URL . $parametersFormatted
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}
