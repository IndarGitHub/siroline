<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKelasRequest;
use App\Http\Requests\UpdateKelasRequest;
use App\Repositories\KelasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KelasController extends AppBaseController
{
    /** @var  KelasRepository */
    private $kelasRepository;

    public function __construct(KelasRepository $kelasRepo)
    {
        $this->kelasRepository = $kelasRepo;
    }

    /**
     * Display a listing of the Kelas.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kelas = $this->kelasRepository->all();

        return view('kelas.index')
            ->with('kelas', $kelas);
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        
        $kelas = \App\Models\Kelas::where('kode_kls','like','%'.$search.'%')
                                    ->orWhere('nm_kelas','like','%'.$search.'%')
                                    ->paginate();
        return view('kelas.index')
        ->with('kelas', $kelas);
    }
    /**
     * Show the form for creating a new Kelas.
     *
     * @return Response
     */
    public function create()
    {
        $gurus = \App\Models\Guru::pluck('name','id');
        return view('kelas.create')->with(compact('gurus'));
    }

    /**
     * Store a newly created Kelas in storage.
     *
     * @param CreateKelasRequest $request
     *
     * @return Response
     */
    public function store(CreateKelasRequest $request)
    {
        $input = $request->all();

        $kelas = $this->kelasRepository->create($input);

        Flash::success('Kelas sukses tersimpan.');

        return redirect(route('kelas.index'));
    }

    /**
     * Display the specified Kelas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kelas = $this->kelasRepository->find($id);

        if (empty($kelas)) {
            Flash::error('Kelas tidak ditemukan');

            return redirect(route('kelas.index'));
        }

        return view('kelas.show')->with('kelas', $kelas);
    }

    /**
     * Show the form for editing the specified Kelas.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kelas = $this->kelasRepository->find($id);
        $gurus = \App\Models\Guru::pluck('name','id');
        if (empty($kelas)) {
            Flash::error('Kelas tidak ditemukan');

            return redirect(route('kelas.index'));
        }

        return view('kelas.edit')->with('kelas', $kelas)->with(compact('gurus'));
    }

    /**
     * Update the specified Kelas in storage.
     *
     * @param int $id
     * @param UpdateKelasRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $kelas = $this->kelasRepository->find($id);

        if (empty($kelas)) {
            Flash::error('Kelas tidak ditemukan');

            return redirect(route('kelas.index'));
        }

        $kelas = $this->kelasRepository->update($request->all(), $id);

        Flash::success('Kelas sukses terupdate.');

        return redirect(route('kelas.index'));
    }

    /**
     * Remove the specified Kelas from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kelas = $this->kelasRepository->find($id);

        if (empty($kelas)) {
            Flash::error('Kelas tidak ditemukan');

            return redirect(route('kelas.index'));
        }

        $this->kelasRepository->delete($id);

        Flash::success('Kelas sukses terhapus.');

        return redirect(route('kelas.index'));
    }
}
