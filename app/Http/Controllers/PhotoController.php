<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PhotoRepository;
use Illuminate\Http\Request;
use Flash;

class PhotoController extends AppBaseController
{
    /** @var PhotoRepository $photoRepository*/
    private $photoRepository;

    public function __construct(PhotoRepository $photoRepo)
    {
        $this->photoRepository = $photoRepo;
    }

    /**
     * Display a listing of the Photo.
     */
    public function index(Request $request)
    {
        $photos = $this->photoRepository->paginate(10);

        return view('photos.index')
            ->with('photos', $photos);
    }

    /**
     * Show the form for creating a new Photo.
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created Photo in storage.
     */
    public function store(CreatePhotoRequest $request)
    {
        // Obtener todos los campos del formulario
        $input = $request->all();

        // Obtener el archivo cargado desde el formulario
        if ($request->hasFile('product_url_image_path')) {
            $archivo = $request->file('product_url_image_path');

            // Generar un nombre único para el archivo
            $nombreOriginal =  $archivo->getClientOriginalName();
            $extensionOriginal = $archivo->getClientOriginalExtension();
            $id_usuario = auth()->id();
            $fileName = "{$id_usuario}_{$nombreOriginal}";

            // Mover el archivo a la carpeta de destino
            $archivo->move(public_path('selected_product_Images'), $fileName);

            // Actualizar el campo url en el arreglo $input
            $input['url'] = 'selected_product_Images/' . $fileName;
        }

        // Crear la foto en la base de datos
        $photo = $this->photoRepository->create($input);

        Flash::success('Photo saved successfully.');

        return redirect(route('photos.index'));


    }

    /**
     * Display the specified Photo.
     */
    public function show($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        return view('photos.show')->with('photo', $photo);
    }

    /**
     * Show the form for editing the specified Photo.
     */
    public function edit($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        return view('photos.edit')->with('photo', $photo);
    }

    /**
     * Update the specified Photo in storage.
     */
    public function update($id, UpdatePhotoRequest $request)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');
            return redirect(route('photos.index'));
        }

        $input = $request->all();

        // Obtener la URL existente
        $existingUrl = $photo->url;

        // Verificar si se ha cargado un nuevo archivo
        if ($request->hasFile('product_url_image_path')) {
            $archivo = $request->file('product_url_image_path');
            $nombreOriginal =  $archivo->getClientOriginalName();
            $extensionOriginal = $archivo->getClientOriginalExtension();
            $id_usuario = auth()->id();
            $fileName = "{$id_usuario}_{$nombreOriginal}";
            $archivo->move(public_path('selected_product_Images'), $fileName);

            // Crear la nueva URL
            $newUrl = 'selected_product_Images/' . $fileName;

            // Actualizar la URL solo si es diferente a la existente
            if ($existingUrl !== $newUrl) {
                $input['url'] = $newUrl;
                // Actualizar el modelo con los nuevos datos
                
            }
            else{
                $input['url'] = $newUrl;
            }
        }

        $photo->update($input);

        Flash::success('Photo updated successfully.');
        return redirect(route('photos.index'));
    }

    /**
     * Remove the specified Photo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $photo = $this->photoRepository->find($id);

        if (empty($photo)) {
            Flash::error('Photo not found');

            return redirect(route('photos.index'));
        }

        $this->photoRepository->delete($id);

        Flash::success('Photo deleted successfully.');

        return redirect(route('photos.index'));
    }
}
