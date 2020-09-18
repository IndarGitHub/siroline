<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDetail_MapelRequest;
use App\Http\Requests\UpdateDetail_MapelRequest;
use App\Repositories\Detail_MapelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Detail_MapelController extends AppBaseController
{
    /** @var  Detail_MapelRepository */
    private $detailMapelRepository;

    public function __construct(Detail_MapelRepository $detailMapelRepo)
    {
        $this->detailMapelRepository = $detailMapelRepo;
    }

    /**
     * Display a listing of the Detail_Mapel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detailMapels = $this->detailMapelRepository->all();

        return view('detail_mapels.index')
            ->with('detailMapels', $detailMapels);
    }

    /**
     * Show the form for creating a new Detail_Mapel.
     *
     * @return Response
     */
    public function create()
    {
        $nilai_ujian_tulis = \App\Models\nilai_ujian_tulis::pluck('kelas_id','id');
        $mapels = \App\Models\Mapel::pluck('nm_mapel','id');
        return view('detail_mapels.create')->with(compact('nilai_ujian_tulis','mapels'));
    }

    /**
     * Store a newly created Detail_Mapel in storage.
     *
     * @param CreateDetail_MapelRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $detailMapel = $this->detailMapelRepository->create($input);

        Flash::success('Detail  Mapel sukses tersimpan....');

        return redirect(route('nilaiUjianTulis.index'));
    }

    /**
     * Display the specified Detail_Mapel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailMapel = $this->detailMapelRepository->findWithDetail($id);
        if (empty($detailMapel)) {
            Flash::error('Detail  Mapel tidak ditemukan');

            return redirect(route('nilaiUjianTulis.index'));
        }
        
        return view('detail_mapels.show')->with('detailMapel', $detailMapel);
    }

    /**
     * Show the form for editing the specified Detail_Mapel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id_kelas, $id)
    {
        $nilai_ujian_tulis = \App\Models\nilai_ujian_tulis::pluck('id');
        $mapels = \App\Models\Mapel::pluck('nm_mapel','id');
        $detailMapel = $this->detailMapelRepository->find($id);
        $datasantri = \App\Models\Santri::where('kelas_id', $id_kelas)->get();

        if (empty($detailMapel)) {
            Flash::error('Detail  Mapel tidak ditemukan');

            return redirect(route('nilaiUjianTulis.index'));
        }

        return view('detail_mapels.edit')->with('detailMapel', $detailMapel)->with(compact('nilai_ujian_tulis','mapels'))->with(compact('datasantri'));
    }

    /**
     * Update the specified Detail_Mapel in storage.
     *
     * @param int $id
     * @param UpdateDetail_MapelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetail_MapelRequest $request)
    {
        $detailMapel = $this->detailMapelRepository->find($id);

        if (empty($detailMapel)) {
            Flash::error('Detail  Mapel tidak ditemukan');

            return redirect(route('nilaiUjianTulis.index'));
        }

        $detailMapel = $this->detailMapelRepository->update($request->all(), $id);

        Flash::success('Detail  Mapel sukses ter update.');

        return redirect(route('nilaiUjianTulis.index'));
    }

    /**
     * Remove the specified Detail_Mapel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailMapel = $this->detailMapelRepository->find($id);

        if (empty($detailMapel)) {
            Flash::error('Detail  Mapel tidak ditemukan');

            return redirect(route('detailMapels.index'));
        }

        $this->detailMapelRepository->delete($id);

        Flash::success('Detail  Mapel sukses ter hapus....');

        return redirect(route('nilaiUjianTulis.index'));
    }
}
