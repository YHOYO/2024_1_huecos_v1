<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhotodetalleRequest;
use App\Http\Requests\UpdatePhotodetalleRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PhotodetalleRepository;
use Illuminate\Http\Request;
use Flash;

class PhotodetalleController extends AppBaseController
{
    /** @var PhotodetalleRepository $photodetalleRepository*/
    private $photodetalleRepository;

    public function __construct(PhotodetalleRepository $photodetalleRepo)
    {
        $this->photodetalleRepository = $photodetalleRepo;
    }

    /**
     * Display a listing of the Photodetalle.
     */
    public function index(Request $request)
    {
        $photodetalles = $this->photodetalleRepository->paginate(10);

        return view('photodetalles.index')
            ->with('photodetalles', $photodetalles);
    }

    /**
     * Show the form for creating a new Photodetalle.
     */
    public function create()
    {
        return view('photodetalles.create');
    }

    /**
     * Store a newly created Photodetalle in storage.
     */
    public function store(CreatePhotodetalleRequest $request)
    {
        $input = $request->all();

        $photodetalle = $this->photodetalleRepository->create($input);

        Flash::success('Photodetalle saved successfully.');

        return redirect(route('photodetalles.index'));
    }

    /**
     * Display the specified Photodetalle.
     */
    public function show($id)
    {
        $photodetalle = $this->photodetalleRepository->find($id);

        if (empty($photodetalle)) {
            Flash::error('Photodetalle not found');

            return redirect(route('photodetalles.index'));
        }

        return view('photodetalles.show')->with('photodetalle', $photodetalle);
    }

    /**
     * Show the form for editing the specified Photodetalle.
     */
    public function edit($id)
    {
        $photodetalle = $this->photodetalleRepository->find($id);

        if (empty($photodetalle)) {
            Flash::error('Photodetalle not found');

            return redirect(route('photodetalles.index'));
        }

        return view('photodetalles.edit')->with('photodetalle', $photodetalle);
    }

    /**
     * Update the specified Photodetalle in storage.
     */
    public function update($id, UpdatePhotodetalleRequest $request)
    {
        $photodetalle = $this->photodetalleRepository->find($id);

        if (empty($photodetalle)) {
            Flash::error('Photodetalle not found');

            return redirect(route('photodetalles.index'));
        }

        $photodetalle = $this->photodetalleRepository->update($request->all(), $id);

        Flash::success('Photodetalle updated successfully.');

        return redirect(route('photodetalles.index'));
    }

    /**
     * Remove the specified Photodetalle from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $photodetalle = $this->photodetalleRepository->find($id);

        if (empty($photodetalle)) {
            Flash::error('Photodetalle not found');

            return redirect(route('photodetalles.index'));
        }

        $this->photodetalleRepository->delete($id);

        Flash::success('Photodetalle deleted successfully.');

        return redirect(route('photodetalles.index'));
    }
}
