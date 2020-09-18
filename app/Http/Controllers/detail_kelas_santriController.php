<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdetail_kelas_santriRequest;
use App\Http\Requests\Updatedetail_kelas_santriRequest;
use App\Repositories\detail_kelas_santriRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class detail_kelas_santriController extends AppBaseController
{
    /** @var  detail_kelas_santriRepository */
    private $detailKelasSantriRepository;

    public function __construct(detail_kelas_santriRepository $detailKelasSantriRepo)
    {
        $this->detailKelasSantriRepository = $detailKelasSantriRepo;
    }

    /**
     * Display a listing of the detail_kelas_santri.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        // $detailKelasSantris = $this->detailKelasSantriRepository->paginate(7);
        $data = DB::table('santris')
                ->join('kelas','santris.kelas_id', '=', 'kelas.id')
                ->select('santris.id','santris.no_induk','santris.nm_santri','kelas.kode_kls','kelas.nm_kelas')
                ->get();
        return view('detail_kelas_santris.index')
            ->with(compact('data',$data));
    }
    // public function search(){
    //     $search = $request->get('search');
    //     $detailKelasSantris = \App\Models\detail_kelas_santri::where('nm_santri','like','%'.$search.'%')->paginate(1);
    //     return view('detail_kelas_santris.index')
    //     ->with('detailKelasSantris', $detailKelasSantris);
    // }
    /**
     * Show the form for creating a new detail_kelas_santri.
     *
     * @return Response
     */
    public function create()
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        return view('detail_kelas_santris.create')->with(compact('santris'));
    }

    /**
     * Store a newly created detail_kelas_santri in storage.
     *
     * @param Createdetail_kelas_santriRequest $request
     *
     * @return Response
     */
    public function store(Createdetail_kelas_santriRequest $request)
    {
        $input = $request->all();

        $detailKelasSantri = $this->detailKelasSantriRepository->create($input);

        Flash::success('Detail Kelas Santri Sukses Tersimpan.');

        return redirect(route('detailKelasSantris.index'));
    }

    /**
     * Display the specified detail_kelas_santri.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailKelasSantri = $this->detailKelasSantriRepository->find($id);

        if (empty($detailKelasSantri)) {
            Flash::error('Detail Kelas Santri Tidak Ditemukan....');

            return redirect(route('detailKelasSantris.index'));
        }

        return view('detail_kelas_santris.show')->with('detailKelasSantri', $detailKelasSantri);
    }

    /**
     * Show the form for editing the specified detail_kelas_santri.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $detailKelasSantri = $this->detailKelasSantriRepository->find($id);

        if (empty($detailKelasSantri)) {
            Flash::error('Detail Kelas Santri Tidak Ditemukan....');

            return redirect(route('detailKelasSantris.index'));
        }

        return view('detail_kelas_santris.edit')->with('detailKelasSantri', $detailKelasSantri)->with(compact('santris'));
    }

    /**
     * Update the specified detail_kelas_santri in storage.
     *
     * @param int $id
     * @param Updatedetail_kelas_santriRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetail_kelas_santriRequest $request)
    {
        $detailKelasSantri = $this->detailKelasSantriRepository->find($id);

        if (empty($detailKelasSantri)) {
            Flash::error('Detail Kelas Santri tidak ditemukan');

            return redirect(route('detailKelasSantris.index'));
        }

        $detailKelasSantri = $this->detailKelasSantriRepository->update($request->all(), $id);

        Flash::success('Detail Kelas Santri sukses terupdate.');

        return redirect(route('detailKelasSantris.index'));
    }

    /**
     * Remove the specified detail_kelas_santri from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailKelasSantri = $this->detailKelasSantriRepository->find($id);

        if (empty($detailKelasSantri)) {
            Flash::error('Detail Kelas Santri tidak ditemukan');

            return redirect(route('detailKelasSantris.index'));
        }

        $this->detailKelasSantriRepository->delete($id);

        Flash::success('Detail Kelas Santri sukses ke hapus.');

        return redirect(route('detailKelasSantris.index'));
    }
}
