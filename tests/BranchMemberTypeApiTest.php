<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BranchMemberTypeApiTest extends TestCase
{
    use MakeBranchMemberTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBranchMemberType()
    {
        $branchMemberType = $this->fakeBranchMemberTypeData();
        $this->json('POST', '/api/v1/branchMemberTypes', $branchMemberType);

        $this->assertApiResponse($branchMemberType);
    }

    /**
     * @test
     */
    public function testReadBranchMemberType()
    {
        $branchMemberType = $this->makeBranchMemberType();
        $this->json('GET', '/api/v1/branchMemberTypes/'.$branchMemberType->id);

        $this->assertApiResponse($branchMemberType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBranchMemberType()
    {
        $branchMemberType = $this->makeBranchMemberType();
        $editedBranchMemberType = $this->fakeBranchMemberTypeData();

        $this->json('PUT', '/api/v1/branchMemberTypes/'.$branchMemberType->id, $editedBranchMemberType);

        $this->assertApiResponse($editedBranchMemberType);
    }

    /**
     * @test
     */
    public function testDeleteBranchMemberType()
    {
        $branchMemberType = $this->makeBranchMemberType();
        $this->json('DELETE', '/api/v1/branchMemberTypes/'.$branchMemberType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/branchMemberTypes/'.$branchMemberType->id);

        $this->assertResponseStatus(404);
    }
}
