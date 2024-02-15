<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RolRepository;
use Illuminate\Http\Request;
use Flash;

class RolController extends AppBaseController
{
    /** @var RolRepository $rolRepository*/
    private $rolRepository;

    public function __construct(RolRepository $rolRepo)
    {
        $this->rolRepository = $rolRepo;
    }

    /**
     * Display a listing of the Rol.
     */
    public function index(Request $request)
    {
        $rols = $this->rolRepository->paginate(10);

        return view('rols.index')
            ->with('rols', $rols);
    }

    /**
     * Show the form for creating a new Rol.
     */
    public function create()
    {
        return view('rols.create');
    }

    /**
     * Store a newly created Rol in storage.
     */
    public function store(CreateRolRequest $request)
    {
        $input = $request->all();

        $rol = $this->rolRepository->create($input);

        Flash::success('Rol saved successfully.');

        return redirect(route('rols.index'));
    }

    /**
     * Display the specified Rol.
     */
    public function show($id)
    {
        $rol = $this->rolRepository->find($id);

        if (empty($rol)) {
            Flash::error('Rol not found');

            return redirect(route('rols.index'));
        }

        return view('rols.show')->with('rol', $rol);
    }

    /**
     * Show the form for editing the specified Rol.
     */
    public function edit($id)
    {
        $rol = $this->rolRepository->find($id);

        if (empty($rol)) {
            Flash::error('Rol not found');

            return redirect(route('rols.index'));
        }

        return view('rols.edit')->with('rol', $rol);
    }

    /**
     * Update the specified Rol in storage.
     */
    public function update($id, UpdateRolRequest $request)
    {
        $rol = $this->rolRepository->find($id);

        if (empty($rol)) {
            Flash::error('Rol not found');

            return redirect(route('rols.index'));
        }

        $rol = $this->rolRepository->update($request->all(), $id);

        Flash::success('Rol updated successfully.');

        return redirect(route('rols.index'));
    }

    /**
     * Remove the specified Rol from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rol = $this->rolRepository->find($id);

        if (empty($rol)) {
            Flash::error('Rol not found');

            return redirect(route('rols.index'));
        }

        $this->rolRepository->delete($id);

        Flash::success('Rol deleted successfully.');

        return redirect(route('rols.index'));
    }
}
