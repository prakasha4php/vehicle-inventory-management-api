<?php
/**
 * CurrencyHandler Test
 *
 * @author Nik Spijkerman <nikspijkerman@gmail.com>
 * @package api
 * @category test
 * @since 2015.05.29
 */
namespace ApiBundle\Tests\Handler;

use ApiBundle\Form\CurrencyType;
use Mockery as m;
use ApiBundle\Handler\CurrencyHandler;
use IMS\CommonBundle\Entity\Currency;
use Knp\Bundle\PaginatorBundle\Pagination\SlidingPagination;
use Symfony\Component\HttpFoundation\Request;

class CurrencyHandlerTest extends BaseTestHandler
{
    public function setUp()
    {
        $this->className = 'IMS\CommonBundle\Entity\Currency';
        $this->repoName = 'Doctrine\ORM\EntityRepository';

        parent::setUp();
    }

    public function testGetList()
    {
        $request = $this->createQueryRequest(10, 1, 'field1', 0);

        $handler = new CurrencyHandler($this->em, $this->className);
        $handler->setFormFactory($this->formFactory);

        $paginator = $this->createPaginator(10, 1);

        $handler->setPaginator($paginator);

        $list = $handler->getList($request);

        $this->assertInstanceOf(SlidingPagination::class, $list);

    }

    public function testGetOneById()
    {
        $this->repo
            ->shouldReceive('find')->with(1)->andReturn(new Currency());

        $handler = new CurrencyHandler($this->em, $this->className);
        $handler->setFormFactory($this->formFactory);

        $entity = $handler->getOneById(1);

        $this->assertInstanceOf($this->className, $entity);
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testGetOneByIdThrowsExceptionWhenNull()
    {
        $this->repo
            ->shouldReceive('find')->with(1)->andReturn(null);

        $handler = new CurrencyHandler($this->em, $this->className);
        $handler->setFormFactory($this->formFactory);

        $entity = $handler->getOneById(1);
    }

    public function testGetOneBy()
    {
        $this->repo
            ->shouldReceive('findOneBy')->with(['column' => 'value'])->andReturn(new Currency());

        $handler = new CurrencyHandler($this->em, $this->className);
        $handler->setFormFactory($this->formFactory);

        $entity = $handler->getOneBy('column', 'value');

        $this->assertInstanceOf($this->className, $entity);
    }

    /**
     * @expectedException \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function testGetOneByThrowsExceptionWhenNull()
    {
        $this->repo
            ->shouldReceive('findOneBy')->with(['column' => 'value'])->andReturn(null);

        $handler = new CurrencyHandler($this->em, $this->className);
        $handler->setFormFactory($this->formFactory);

        $entity = $handler->getOneBy('column', 'value');
    }


    /**
     * @expectedException \BadMethodCallException
     */
    public function testPost()
    {
        $handler = new CurrencyHandler($this->em, $this->className);
        $handler->setFormFactory($this->formFactory);
        $handler->post(m::mock(Request::class));
    }


    /**
     * @expectedException \BadMethodCallException
     */
    public function testPatch()
    {
        $handler = new CurrencyHandler($this->em, $this->className);
        $handler->setFormFactory($this->formFactory);
        $handler->patch(1, m::mock(Request::class));
    }


    /**
     * @expectedException \BadMethodCallException
     */
    public function testPut()
    {
        $handler = new CurrencyHandler($this->em, $this->className);
        $handler->setFormFactory($this->formFactory);
        $handler->put(1, m::mock(Request::class));
    }


    /**
     * @expectedException \BadMethodCallException
     */
    public function testDelete()
    {
        $handler = new CurrencyHandler($this->em, $this->className);
        $handler->setFormFactory($this->formFactory);
        $handler->delete(1);
    }

}
