<?php

namespace App\Test\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private OrderRepository $repository;
    private string $path = '/order/crud/';
    private EntityManagerInterface $manager;

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Order::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Order index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'order[CreateAt]' => 'Testing',
            'order[Fullname]' => 'Testing',
            'order[PhoneNumber]' => 'Testing',
            'order[Address]' => 'Testing',
            'order[Message]' => 'Testing',
        ]);

        self::assertResponseRedirects('/order/crud/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Order();
        $fixture->setCreateAt(new \DateTimeImmutable);
        $fixture->setFullname('My Title');
        $fixture->setPhoneNumber('My Title');
        $fixture->setAddress('My Title');
        $fixture->setMessage('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Order');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Order();
        $fixture->setCreateAt(new \DateTimeImmutable);
        $fixture->setFullname('My Title');
        $fixture->setPhoneNumber('My Title');
        $fixture->setAddress('My Title');
        $fixture->setMessage('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'order[CreateAt]' => 'Something New',
            'order[Fullname]' => 'Something New',
            'order[PhoneNumber]' => 'Something New',
            'order[Address]' => 'Something New',
            'order[Message]' => 'Something New',
        ]);

        self::assertResponseRedirects('/order/crud/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getCreateAt());
        self::assertSame('Something New', $fixture[0]->getFullname());
        self::assertSame('Something New', $fixture[0]->getPhoneNumber());
        self::assertSame('Something New', $fixture[0]->getAddress());
        self::assertSame('Something New', $fixture[0]->getMessage());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Order();
        $fixture->setCreateAt(new \DateTimeImmutable);
        $fixture->setFullname('My Title');
        $fixture->setPhoneNumber('My Title');
        $fixture->setAddress('My Title');
        $fixture->setMessage('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/order/crud/');
    }
}
