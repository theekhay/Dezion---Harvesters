<?php

use Faker\Factory as Faker;
use App\Models\BranchMemberType;
use App\Repositories\BranchMemberTypeRepository;

trait MakeBranchMemberTypeTrait
{
    /**
     * Create fake instance of BranchMemberType and save it in database
     *
     * @param array $branchMemberTypeFields
     * @return BranchMemberType
     */
    public function makeBranchMemberType($branchMemberTypeFields = [])
    {
        /** @var BranchMemberTypeRepository $branchMemberTypeRepo */
        $branchMemberTypeRepo = App::make(BranchMemberTypeRepository::class);
        $theme = $this->fakeBranchMemberTypeData($branchMemberTypeFields);
        return $branchMemberTypeRepo->create($theme);
    }

    /**
     * Get fake instance of BranchMemberType
     *
     * @param array $branchMemberTypeFields
     * @return BranchMemberType
     */
    public function fakeBranchMemberType($branchMemberTypeFields = [])
    {
        return new BranchMemberType($this->fakeBranchMemberTypeData($branchMemberTypeFields));
    }

    /**
     * Get fake data of BranchMemberType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBranchMemberTypeData($branchMemberTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $branchMemberTypeFields);
    }
}
