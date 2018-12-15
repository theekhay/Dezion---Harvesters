<?php

use App\Models\BranchMemberType;
use App\Repositories\BranchMemberTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BranchMemberTypeRepositoryTest extends TestCase
{
    use MakeBranchMemberTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BranchMemberTypeRepository
     */
    protected $branchMemberTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->branchMemberTypeRepo = App::make(BranchMemberTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBranchMemberType()
    {
        $branchMemberType = $this->fakeBranchMemberTypeData();
        $createdBranchMemberType = $this->branchMemberTypeRepo->create($branchMemberType);
        $createdBranchMemberType = $createdBranchMemberType->toArray();
        $this->assertArrayHasKey('id', $createdBranchMemberType);
        $this->assertNotNull($createdBranchMemberType['id'], 'Created BranchMemberType must have id specified');
        $this->assertNotNull(BranchMemberType::find($createdBranchMemberType['id']), 'BranchMemberType with given id must be in DB');
        $this->assertModelData($branchMemberType, $createdBranchMemberType);
    }

    /**
     * @test read
     */
    public function testReadBranchMemberType()
    {
        $branchMemberType = $this->makeBranchMemberType();
        $dbBranchMemberType = $this->branchMemberTypeRepo->find($branchMemberType->id);
        $dbBranchMemberType = $dbBranchMemberType->toArray();
        $this->assertModelData($branchMemberType->toArray(), $dbBranchMemberType);
    }

    /**
     * @test update
     */
    public function testUpdateBranchMemberType()
    {
        $branchMemberType = $this->makeBranchMemberType();
        $fakeBranchMemberType = $this->fakeBranchMemberTypeData();
        $updatedBranchMemberType = $this->branchMemberTypeRepo->update($fakeBranchMemberType, $branchMemberType->id);
        $this->assertModelData($fakeBranchMemberType, $updatedBranchMemberType->toArray());
        $dbBranchMemberType = $this->branchMemberTypeRepo->find($branchMemberType->id);
        $this->assertModelData($fakeBranchMemberType, $dbBranchMemberType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBranchMemberType()
    {
        $branchMemberType = $this->makeBranchMemberType();
        $resp = $this->branchMemberTypeRepo->delete($branchMemberType->id);
        $this->assertTrue($resp);
        $this->assertNull(BranchMemberType::find($branchMemberType->id), 'BranchMemberType should not exist in DB');
    }
}
