<?php

use Faker\Factory as Faker;
use App\Models\ChurchMemberType;
use App\Repositories\ChurchMemberTypeRepository;

trait MakeChurchMemberTypeTrait
{
    /**
     * Create fake instance of ChurchMemberType and save it in database
     *
     * @param array $churchMemberTypeFields
     * @return ChurchMemberType
     */
    public function makeChurchMemberType($churchMemberTypeFields = [])
    {
        /** @var ChurchMemberTypeRepository $churchMemberTypeRepo */
        $churchMemberTypeRepo = App::make(ChurchMemberTypeRepository::class);
        $theme = $this->fakeChurchMemberTypeData($churchMemberTypeFields);
        return $churchMemberTypeRepo->create($theme);
    }

    /**
     * Get fake instance of ChurchMemberType
     *
     * @param array $churchMemberTypeFields
     * @return ChurchMemberType
     */
    public function fakeChurchMemberType($churchMemberTypeFields = [])
    {
        return new ChurchMemberType($this->fakeChurchMemberTypeData($churchMemberTypeFields));
    }

    /**
     * Get fake data of ChurchMemberType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeChurchMemberTypeData($churchMemberTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $churchMemberTypeFields);
    }
}
