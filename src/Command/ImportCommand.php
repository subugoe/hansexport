<?php

namespace App\Command;

use App\Entity\Hans;
use Doctrine\ORM\EntityManagerInterface;
use Goutte\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportCommand extends Command
{
    /**
     * @var string
     */
    private $listViewUrl;

    /**
     * @var string
     */
    private $detailViewUrl;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    protected function configure()
    {
        $this->setName('app:import');
    }

    public function setListViewUrl(string $listViewUrl)
    {
        $this->listViewUrl = $listViewUrl;
    }

    public function setDetailViewUrl(string $detailViewUrl)
    {
        $this->detailViewUrl = $detailViewUrl;
    }

    /**
     * @required
     */
    public function setDoctrine(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $client = new Client();
        $crawler = $client->request('GET', $this->listViewUrl);
        $crawler = $crawler->filter('OL > LI');

        foreach ($crawler as $domElement) {
            $hans = new Hans();
            $hansId = $this->getHansId($domElement->firstChild->getAttribute('href'));

            $hans
                ->setHansId($hansId)
                ->setTitle($domElement->textContent)
                ->setContent($this->getDetails($hansId))
                ->setKalliope($this->getKalliopeIds($hansId));

            $this->entityManager->persist($hans);
            $this->entityManager->flush();

            $output->writeln($domElement->textContent.' '.$hansId);
        }
    }

    private function getDetails(int $hansId): string
    {
        $client = new Client();
        $crawler = $client->request('GET', sprintf('%s%s', $this->detailViewUrl, $hansId));
        $crawler = $crawler->filterXPath('//div[@class="hans_record"]');

        $content = '';

        foreach ($crawler as $domElement) {
            $content = $domElement->textContent;
        }

        return $content;
    }

    private function getKalliopeIds(int $hansId): array
    {
        $client = new Client();
        $crawler = $client->request('GET', sprintf('%s%s', $this->detailViewUrl, $hansId));
        $crawler = $crawler->filterXPath('//div[@class="hans_kopf"]');

        $content = [];

        foreach ($crawler as $domElement) {
            if ($domElement->firstChild->hasAttributes()) {
                $link = $domElement->firstChild->getAttribute('href');
                $request = $client->request('GET', $link);
                if (!strpos($request->html(), 'frameset')) {
                    $kalliopeLink = $request->selectLink('neuen Permalink')->link()->getUri();
                    $crawler = $client->request('GET', $kalliopeLink)->filterXPath('//div[@class="hitga"]');
                    foreach ($crawler as $links) {
                        $content[] = $links->getAttribute('id');
                    }
                }
            }
        }

        return $content;
    }

    private function getHansId(string $link): int
    {
        return (int) explode('reccheck=', $link)[1];
    }
}
