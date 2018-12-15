<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBranchMemberTypeRequest;
use App\Http\Requests\UpdateBranchMemberTypeRequest;
use App\Repositories\BranchMemberTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BranchMemberTypeController extends AppBaseController
{
    /** @var  BranchMemberTypeRepository */
    private $branchMemberTypeRepository;

    public function __construct(BranchMemberTypeRepository $branchMemberTypeRepo)
    {
        $this->branchMemberTypeRepository = $branchMemberTypeRepo;
    }

    /**
     * Display a listing of the BranchMemberType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->branchMemberTypeRepository->pushCriteria(new RequestCriteria($request));
        $branchMemberTypes = $this->branchMemberTypeRepository->all();

        return view('branch_member_types.index')
            ->with('branchMemberTypes', $branchMemberTypes);
    }

    /**
     * Show the form for creating a new BranchMemberType.
     *
     * @return Response
     */
    public function create()
    {
        return view('branch_member_types.create');
    }

    /**
     * Store a newly created BranchMemberType in storage.
     *
     * @param CreateBranchMemberTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateBranchMemberTypeRequest $request)
    {
        $input = $request->all();

        $branchMemberType = $this->branchMemberTypeRepository->create($input);

        Flash::success('Branch Member Type saved successfully.');

        return redirect(route('branchMemberTypes.index'));
    }

    /**
     * Display the specified BranchMemberType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $branchMemberType = $this->branchMemberTypeRepository->findWithoutFail($id);

        if (empty($branchMemberType)) {
            Flash::error('Branch Member Type not found');

            return redirect(route('branchMemberTypes.index'));
        }

        return view('branch_member_types.show')->with('branchMemberType', $branchMemberType);
    }

    /**
     * Show the form for editing the specified BranchMemberType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $branchMemberType = $this->branchMemberTypeRepository->findWithoutFail($id);

        if (empty($branchMemberType)) {
            Flash::error('Branch Member Type not found');

            return redirect(route('branchMemberTypes.index'));
        }

        return view('branch_member_types.edit')->with('branchMemberType', $branchMemberType);
    }

    /**
     * Update the specified BranchMemberType in storage.
     *
     * @param  int              $id
     * @param UpdateBranchMemberTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBranchMemberTypeRequest $request)
    {
        $branchMemberType = $this->branchMemberTypeRepository->findWithoutFail($id);

        if (empty($branchMemberType)) {
            Flash::error('Branch Member Type not found');

            return redirect(route('branchMemberTypes.index'));
        }

        $branchMemberType = $this->branchMemberTypeRepository->update($request->all(), $id);

        Flash::success('Branch Member Type updated successfully.');

        return redirect(route('branchMemberTypes.index'));
    }

    /**
     * Remove the specified BranchMemberType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $branchMemberType = $this->branchMemberTypeRepository->findWithoutFail($id);

        if (empty($branchMemberType)) {
            Flash::error('Branch Member Type not found');

            return redirect(route('branchMemberTypes.index'));
        }

        $this->branchMemberTypeRepository->delete($id);

        Flash::success('Branch Member Type deleted successfully.');

        return redirect(route('branchMemberTypes.index'));
    }
}
