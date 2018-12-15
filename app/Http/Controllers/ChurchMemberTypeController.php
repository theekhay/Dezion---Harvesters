<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChurchMemberTypeRequest;
use App\Http\Requests\UpdateChurchMemberTypeRequest;
use App\Repositories\ChurchMemberTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ChurchMemberTypeController extends AppBaseController
{
    /** @var  ChurchMemberTypeRepository */
    private $churchMemberTypeRepository;

    public function __construct(ChurchMemberTypeRepository $churchMemberTypeRepo)
    {
        $this->churchMemberTypeRepository = $churchMemberTypeRepo;
    }

    /**
     * Display a listing of the ChurchMemberType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->churchMemberTypeRepository->pushCriteria(new RequestCriteria($request));
        $churchMemberTypes = $this->churchMemberTypeRepository->all();

        return view('church_member_types.index')
            ->with('churchMemberTypes', $churchMemberTypes);
    }

    /**
     * Show the form for creating a new ChurchMemberType.
     *
     * @return Response
     */
    public function create()
    {
        return view('church_member_types.create');
    }

    /**
     * Store a newly created ChurchMemberType in storage.
     *
     * @param CreateChurchMemberTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateChurchMemberTypeRequest $request)
    {
        $input = $request->all();

        $churchMemberType = $this->churchMemberTypeRepository->create($input);

        Flash::success('Church Member Type saved successfully.');

        return redirect(route('churchMemberTypes.index'));
    }

    /**
     * Display the specified ChurchMemberType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $churchMemberType = $this->churchMemberTypeRepository->findWithoutFail($id);

        if (empty($churchMemberType)) {
            Flash::error('Church Member Type not found');

            return redirect(route('churchMemberTypes.index'));
        }

        return view('church_member_types.show')->with('churchMemberType', $churchMemberType);
    }

    /**
     * Show the form for editing the specified ChurchMemberType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $churchMemberType = $this->churchMemberTypeRepository->findWithoutFail($id);

        if (empty($churchMemberType)) {
            Flash::error('Church Member Type not found');

            return redirect(route('churchMemberTypes.index'));
        }

        return view('church_member_types.edit')->with('churchMemberType', $churchMemberType);
    }

    /**
     * Update the specified ChurchMemberType in storage.
     *
     * @param  int              $id
     * @param UpdateChurchMemberTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChurchMemberTypeRequest $request)
    {
        $churchMemberType = $this->churchMemberTypeRepository->findWithoutFail($id);

        if (empty($churchMemberType)) {
            Flash::error('Church Member Type not found');

            return redirect(route('churchMemberTypes.index'));
        }

        $churchMemberType = $this->churchMemberTypeRepository->update($request->all(), $id);

        Flash::success('Church Member Type updated successfully.');

        return redirect(route('churchMemberTypes.index'));
    }

    /**
     * Remove the specified ChurchMemberType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $churchMemberType = $this->churchMemberTypeRepository->findWithoutFail($id);

        if (empty($churchMemberType)) {
            Flash::error('Church Member Type not found');

            return redirect(route('churchMemberTypes.index'));
        }

        $this->churchMemberTypeRepository->delete($id);

        Flash::success('Church Member Type deleted successfully.');

        return redirect(route('churchMemberTypes.index'));
    }
}
