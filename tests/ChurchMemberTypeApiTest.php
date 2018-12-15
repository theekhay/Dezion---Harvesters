<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChurchMemberTypeApiTest extends TestCase
{
    use MakeChurchMemberTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateChurchMemberType()
    {
        $churchMemberType = $this->fakeChurchMemberTypeData();
        $this->json('POST', '/api/v1/churchMemberTypes', $churchMemberType);

        $this->assertApiResponse($churchMemberType);
    }

    /**
     * @test
     */
    public function testReadChurchMemberType()
    {
        $churchMemberType = $this->makeChurchMemberType();
        $this->json('GET', '/api/v1/churchMemberTypes/'.$churchMemberType->id);

        $this->assertApiResponse($churchMemberType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateChurchMemberType()
    {
        $churchMemberType = $this->makeChurchMemberType();
        $editedChurchMemberType = $this->fakeChurchMemberTypeData();

        $this->json('PUT', '/api/v1/churchMemberTypes/'.$churchMemberType->id, $editedChurchMemberType);

        $this->assertApiResponse($editedChurchMemberType);
    }

    /**
     * @test
     */
    public function testDeleteChurchMemberType()
    {
        $churchMemberType = $this->makeChurchMemberType();
        $this->json('DELETE', '/api/v1/churchMemberTypes/'.$churchMemberType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/churchMemberTypes/'.$churchMemberType->id);

        $this->assertResponseStatus(404);
    }
}
