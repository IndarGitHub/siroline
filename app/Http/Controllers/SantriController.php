<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSantriRequest;
use App\Http\Requests\UpdateSantriRequest;
use App\Repositories\SantriRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SantriController extends AppBaseController
{
    /** @var  SantriRepository */
    private $santriRepository;

    public function __construct(SantriRepository $santriRepo)
    {
        $this->santriRepository = $santriRepo;
    }

    /**
     * Display a listing of the Santri.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        $santris = $this->santriRepository->paginate(20);      
        
        return view('santris.index')
            ->with('santris', $santris);
    }
    public function search1(Request $request)
    {
        $search1 = $request->get('search1');
        
        $santris = \App\Models\Santri::join('kelas','kelas_id','=','kelas.id')
                                    ->where('no_induk','like','%'.$search1.'%')
                                    ->orWhere('nm_santri','like','%'.$search1.'%')
                                    ->orWhere('tmp_lhr','like','%'.$search1.'%')
                                    ->orWhere('tgl_lhr','like','%'.$search1.'%')
                                    ->orWhere('jk','like','%'.$search1.'%')
                                    ->orWhere('kelas.nm_kelas','like','%'.$search1.'%')
                                    ->orWhere('nm_ayah','like','%'.$search1.'%')
                                    ->orWhere('nm_ibu','like','%'.$search1.'%')
                                    ->orWhere('nm_wali_santri','like','%'.$search1.'%')
                                    ->paginate();
        return view('santris.index')->with('santris', $santris);
    }
    /**
     * Show the form for creating a new Santri.
     *
     * @return Response
     */
    public function create()
    {
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        return view('santris.create')->with(compact('kelas'));
    }

    /**
     * Store a newly created Santri in storage.
     *
     * @param CreateSantriRequest $request
     *
     * @return Response
     */
    public function store(CreateSantriRequest $request)
    {
        $input = $request->all();

        $santri = $this->santriRepository->create($input);

        Flash::success('Santri sukses tersimpan.');

        return redirect(route('santris.index'));
    }

    /**
     * Display the specified Santri.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            Flash::error('Santri tidak ditemukan');

            return redirect(route('santris.index'));
        }

        return view('santris.show')->with('santri', $santri);
    }

    /**
     * Show the form for editing the specified Santri.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            Flash::error('Santri tidak ditemukan');

            return redirect(route('santris.index'));
        }

        return view('santris.edit')->with('santri', $santri)->with(compact('kelas'));
    }

    /**
     * Update the specified Santri in storage.
     *
     * @param int $id
     * @param UpdateSantriRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            Flash::error('Santri tidak ditemukan');

            return redirect(route('santris.index'));
        }

        $santri = $this->santriRepository->update($request->all(), $id);

        Flash::success('Santri sukses terupdate.');

        return redirect(route('santris.index'));
    }

    /**
     * Remove the specified Santri from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $santri = $this->santriRepository->find($id);

        if (empty($santri)) {
            Flash::error('Santri tidak ditemukan');

            return redirect(route('santris.index'));
        }

        $this->santriRepository->delete($id);

        Flash::success('Santri sukses terhapus.');

        return redirect(route('santris.index'));
    }
}
