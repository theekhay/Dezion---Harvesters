<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateChurchMemberTypeAPIRequest;
use App\Http\Requests\API\UpdateChurchMemberTypeAPIRequest;
use App\Models\ChurchMemberType;
use App\Repositories\ChurchMemberTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ChurchMemberTypeController
 * @package App\Http\Controllers\API
 */

class ChurchMemberTypeAPIController extends AppBaseController
{
    /** @var  ChurchMemberTypeRepository */
    private $churchMemberTypeRepository;

    public function __construct(ChurchMemberTypeRepository $churchMemberTypeRepo)
    {
        $this->churchMemberTypeRepository = $churchMemberTypeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/churchMemberTypes",
     *      summary="Get a listing of the ChurchMemberTypes.",
     *      tags={"ChurchMemberType"},
     *      description="Get all ChurchMemberTypes",
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
     *                  @SWG\Items(ref="#/definitions/ChurchMemberType")
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
        $this->churchMemberTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->churchMemberTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $churchMemberTypes = $this->churchMemberTypeRepository->all();

        return $this->sendResponse($churchMemberTypes->toArray(), 'Church Member Types retrieved successfully');
    }

    /**
     * @param CreateChurchMemberTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/churchMemberTypes",
     *      summary="Store a newly created ChurchMemberType in storage",
     *      tags={"ChurchMemberType"},
     *      description="Store ChurchMemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ChurchMemberType that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ChurchMemberType")
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
     *                  ref="#/definitions/ChurchMemberType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateChurchMemberTypeAPIRequest $request)
    {
        $input = $request->all() ;

        $churchMemberTypes = $this->churchMemberTypeRepository->create($input + ['created_by' => 1]);

        return $this->sendResponse( $churchMemberTypes->toArray(), 'Church Member Type saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/churchMemberTypes/{id}",
     *      summary="Display the specified ChurchMemberType",
     *      tags={"ChurchMemberType"},
     *      description="Get ChurchMemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ChurchMemberType",
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
     *                  ref="#/definitions/ChurchMemberType"
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
        /** @var ChurchMemberType $churchMemberType */
        $churchMemberType = $this->churchMemberTypeRepository->findWithoutFail($id);

        if (empty($churchMemberType)) {
            return $this->sendError('Church Member Type not found');
        }

        return $this->sendResponse($churchMemberType->toArray(), 'Church Member Type retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateChurchMemberTypeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/churchMemberTypes/{id}",
     *      summary="Update the specified ChurchMemberType in storage",
     *      tags={"ChurchMemberType"},
     *      description="Update ChurchMemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ChurchMemberType",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ChurchMemberType that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ChurchMemberType")
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
     *                  ref="#/definitions/ChurchMemberType"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateChurchMemberTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var ChurchMemberType $churchMemberType */
        $churchMemberType = $this->churchMemberTypeRepository->findWithoutFail($id);

        if (empty($churchMemberType)) {
            return $this->sendError('Church Member Type not found');
        }

        $churchMemberType = $this->churchMemberTypeRepository->update($input, $id);

        return $this->sendResponse($churchMemberType->toArray(), 'ChurchMemberType updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/churchMemberTypes/{id}",
     *      summary="Remove the specified ChurchMemberType from storage",
     *      tags={"ChurchMemberType"},
     *      description="Delete ChurchMemberType",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ChurchMemberType",
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
        /** @var ChurchMemberType $churchMemberType */
        $churchMemberType = $this->churchMemberTypeRepository->findWithoutFail($id);

        if (empty($churchMemberType)) {
            return $this->sendError('Church Member Type not found');
        }

        $churchMemberType->delete();

        return $this->sendResponse($id, 'Church Member Type deleted successfully');
    }
}
