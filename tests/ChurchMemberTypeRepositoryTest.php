<?php

use App\Models\ChurchMemberType;
use App\Repositories\ChurchMemberTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChurchMemberTypeRepositoryTest extends TestCase
{
    use MakeChurchMemberTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ChurchMemberTypeRepository
     */
    protected $churchMemberTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->churchMemberTypeRepo = App::make(ChurchMemberTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateChurchMemberType()
    {
        $churchMemberType = $this->fakeChurchMemberTypeData();
        $createdChurchMemberType = $this->churchMemberTypeRepo->create($churchMemberType);
        $createdChurchMemberType = $createdChurchMemberType->toArray();
        $this->assertArrayHasKey('id', $createdChurchMemberType);
        $this->assertNotNull($createdChurchMemberType['id'], 'Created ChurchMemberType must have id specified');
        $this->assertNotNull(ChurchMemberType::find($createdChurchMemberType['id']), 'ChurchMemberType with given id must be in DB');
        $this->assertModelData($churchMemberType, $createdChurchMemberType);
    }

    /**
     * @test read
     */
    public function testReadChurchMemberType()
    {
        $churchMemberType = $this->makeChurchMemberType();
        $dbChurchMemberType = $this->churchMemberTypeRepo->find($churchMemberType->id);
        $dbChurchMemberType = $dbChurchMemberType->toArray();
        $this->assertModelData($churchMemberType->toArray(), $dbChurchMemberType);
    }

    /**
     * @test update
     */
    public function testUpdateChurchMemberType()
    {
        $churchMemberType = $this->makeChurchMemberType();
        $fakeChurchMemberType = $this->fakeChurchMemberTypeData();
        $updatedChurchMemberType = $this->churchMemberTypeRepo->update($fakeChurchMemberType, $churchMemberType->id);
        $this->assertModelData($fakeChurchMemberType, $updatedChurchMemberType->toArray());
        $dbChurchMemberType = $this->churchMemberTypeRepo->find($churchMemberType->id);
        $this->assertModelData($fakeChurchMemberType, $dbChurchMemberType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteChurchMemberType()
    {
        $churchMemberType = $this->makeChurchMemberType();
        $resp = $this->churchMemberTypeRepo->delete($churchMemberType->id);
        $this->assertTrue($resp);
        $this->assertNull(ChurchMemberType::find($churchMemberType->id), 'ChurchMemberType should not exist in DB');
    }
}
