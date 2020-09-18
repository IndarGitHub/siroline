<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMapelRequest;
use App\Http\Requests\UpdateMapelRequest;
use App\Repositories\MapelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MapelController extends AppBaseController
{
    /** @var  MapelRepository */
    private $mapelRepository;

    public function __construct(MapelRepository $mapelRepo)
    {
        $this->mapelRepository = $mapelRepo;
    }

    /**
     * Display a listing of the Mapel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mapels = $this->mapelRepository->paginate(20);

        return view('mapels.index')
            ->with('mapels', $mapels);
    }
    public function search2(Request $request)
    {
        $search2 = $request->get('search2');
        
        $mapels = \App\Models\Mapel::where('kode_mapel','like','%'.$search2.'%')
                                    ->orWhere('nm_mapel','like','%'.$search2.'%')
                                    ->join('gurus','guru_id','=', 'gurus.id')
                                    ->orWhere('gurus.name','like','%'.$search2.'%')
                                    ->join('kelas','kelas_id','=','kelas.id')
                                    ->orWhere('kelas.nm_kelas','like','%'.$search2.'%')
                                    ->paginate();
        return view('mapels.index')
        ->with('mapels', $mapels);
    }
    /**
     * Show the form for creating a new Mapel.
     *
     * @return Response
     */
    public function create()
    {
        $gurus = \App\Models\Guru::pluck('name','id');
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        return view('mapels.create')->with(compact('gurus','kelas'));
    }

    /**
     * Store a newly created Mapel in storage.
     *
     * @param CreateMapelRequest $request
     *
     * @return Response
     */
    public function store(CreateMapelRequest $request)
    {
        $input = $request->all();

        $mapel = $this->mapelRepository->create($input);

        Flash::success('Mapel sukses tersimpan.');

        return redirect(route('mapels.index'));
    }

    /**
     * Display the specified Mapel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mapel = $this->mapelRepository->find($id);

        if (empty($mapel)) {
            Flash::error('Mapel tidak ditemukan');

            return redirect(route('mapels.index'));
        }

        return view('mapels.show')->with('mapel', $mapel);
    }

    /**
     * Show the form for editing the specified Mapel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gurus = \App\Models\Guru::pluck('name','id');
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        $mapel = $this->mapelRepository->find($id);

        if (empty($mapel)) {
            Flash::error('Mapel tidak ditemukan');

            return redirect(route('mapels.index'));
        }

        return view('mapels.edit')->with('mapel', $mapel)->with(compact('gurus','kelas'));
    }

    /**
     * Update the specified Mapel in storage.
     *
     * @param int $id
     * @param UpdateMapelRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $mapel = $this->mapelRepository->find($id);

        if (empty($mapel)) {
            Flash::error('Mapel tidak ditemukan');

            return redirect(route('mapels.index'));
        }

        $mapel = $this->mapelRepository->update($request->all(), $id);

        Flash::success('Mapel sukses terupdate.');

        return redirect(route('mapels.index'));
    }

    /**
     * Remove the specified Mapel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mapel = $this->mapelRepository->find($id);

        if (empty($mapel)) {
            Flash::error('Mapel tidak ditemukan');

            return redirect(route('mapels.index'));
        }

        $this->mapelRepository->delete($id);

        Flash::success('Mapel sukses terhapus.');

        return redirect(route('mapels.index'));
    }
}
