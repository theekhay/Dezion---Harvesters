<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBranchMemberTypeAPIRequest;
use App\Http\Requests\API\UpdateBranchMemberTypeAPIRequest;
use App\Models\BranchMemberType;
use App\Repositories\BranchMemberTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Http\Controllers\API\ChurchMemberTypeAPIController;

/**
 * Class BranchMemberTypeController
 * @package App\Http\Controllers\API
 */

class BranchMemberTypeAPIController extends AppBaseController
{
    /** @var  BranchMemberTypeRepository */
    private $branchMemberTypeRepository;

    public function __construct(BranchMemberTypeRepository $branchMemberTypeRepo)
    {
        $this->branchMemberTypeRepository = $branchMemberTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/branchMemberTypes",
     *      summary="Get a listing of the BranchMemberTypes.",
     *      tags={"BranchMemberType"},
     *      description="Get all BranchMemberTypes",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/BranchMemberType")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->branchMemberTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->branchMemberTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $branchMemberTypes = $this->branchMemberTypeRepository->all();

        return $this->sendResponse($branchMemberTypes->toArray(), 'Branch Member Types retrieved successfully');
    }

    /**
     * @param CreateBranchMemberTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/branchMemberTypes",
     *      summary="Store a newly created BranchMemberType in storage",
     *      tags={"BranchMemberType"},
     *      description="Store BranchMemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BranchMemberType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BranchMemberType")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/BranchMemberType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateBranchMemberTypeAPIRequest $request)
    {
        $input = $request->all();
        $branchMemberTypes = $this->branchMemberTypeRepository->create($input);
        return $this->sendResponse($branchMemberTypes->toArray(), 'Branch Member Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/branchMemberTypes/{id}",
     *      summary="Display the specified BranchMemberType",
     *      tags={"BranchMemberType"},
     *      description="Get BranchMemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BranchMemberType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/BranchMemberType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var BranchMemberType $branchMemberType */
        $branchMemberType = $this->branchMemberTypeRepository->findWithoutFail($id);

        if (empty($branchMemberType)) {
            return $this->sendError('Branch Member Type not found');
        }

        return $this->sendResponse($branchMemberType->toArray(), 'Branch Member Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateBranchMemberTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/branchMemberTypes/{id}",
     *      summary="Update the specified BranchMemberType in storage",
     *      tags={"BranchMemberType"},
     *      description="Update BranchMemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BranchMemberType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="BranchMemberType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/BranchMemberType")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/BranchMemberType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateBranchMemberTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var BranchMemberType $branchMemberType */
        $branchMemberType = $this->branchMemberTypeRepository->findWithoutFail($id);

        if (empty($branchMemberType)) {
            return $this->sendError('Branch Member Type not found');
        }

        $branchMemberType = $this->branchMemberTypeRepository->update($input, $id);

        return $this->sendResponse($branchMemberType->toArray(), 'BranchMemberType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/branchMemberTypes/{id}",
     *      summary="Remove the specified BranchMemberType from storage",
     *      tags={"BranchMemberType"},
     *      description="Delete BranchMemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of BranchMemberType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var BranchMemberType $branchMemberType */
        $branchMemberType = $this->branchMemberTypeRepository->findWithoutFail($id);

        if (empty($branchMemberType)) {
            return $this->sendError('Branch Member Type not found');
        }

        $branchMemberType->delete();

        return $this->sendResponse($id, 'Branch Member Type deleted successfully');
    }
}
