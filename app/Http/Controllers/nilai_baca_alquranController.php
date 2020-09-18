<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createnilai_baca_alquranRequest;
use App\Http\Requests\Updatenilai_baca_alquranRequest;
use App\Repositories\nilai_baca_alquranRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Auth;
use Response;

class nilai_baca_alquranController extends AppBaseController
{
    /** @var  nilai_baca_alquranRepository */
    private $nilaiBacaAlquranRepository;

    public function __construct(nilai_baca_alquranRepository $nilaiBacaAlquranRepo)
    {
        $this->nilaiBacaAlquranRepository = $nilaiBacaAlquranRepo;
    }

    /**
     * Display a listing of the nilai_baca_alquran.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nilaiBacaAlqurans = $this->nilaiBacaAlquranRepository->all();
        $wakelAlquran = DB::table('gurus')
        ->join('kelas','gurus.id','=','kelas.guru_id')
        ->join('users','gurus.name','=','users.name')
        ->select('gurus.id')
        ->where('gurus.name','=',Auth::user()->name)
        ->value('gurus.id');

        return view('nilai_baca_alqurans.index')
            ->with('nilaiBacaAlqurans', $nilaiBacaAlqurans)
            ->with('wakelAlquran',$wakelAlquran);
    }

    /**
     * Show the form for creating a new nilai_baca_alquran.
     *
     * @return Response
     */
    public function create()
    {
        $semesters = \App\Models\Semester::pluck('semester','id');
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        return view('nilai_baca_alqurans.create')->with(compact('semesters','kelas'));
    }

    /**
     * Store a newly created nilai_baca_alquran in storage.
     *
     * @param Createnilai_baca_alquranRequest $request
     *
     * @return Response
     */
    public function store(Createnilai_baca_alquranRequest $request)
    {
        $input = $request->all();

        $nilaiBacaAlquran = $this->nilaiBacaAlquranRepository->create($input);

        Flash::success('Nilai Baca Alquran sukses tersimpan.');

        return redirect(route('nilaiBacaAlqurans.index'));
    }

    /**
     * Display the specified nilai_baca_alquran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nilaiBacaAlquran = $this->nilaiBacaAlquranRepository->findWithDetail($id);

        if (empty($nilaiBacaAlquran)) {
            Flash::error('Nilai Baca Alquran tidak ditemukan');

            return redirect(route('nilaiBacaAlqurans.index'));
        }

        return view('nilai_baca_alqurans.show')->with('nilaiBacaAlquran', $nilaiBacaAlquran);
    }

    /**
     * Show the form for editing the specified nilai_baca_alquran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $semesters = \App\Models\Semester::pluck('semester','id');
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        $nilaiBacaAlquran = $this->nilaiBacaAlquranRepository->find($id);

        if (empty($nilaiBacaAlquran)) {
            Flash::error('Nilai Baca Alquran tidak ditemukan');

            return redirect(route('nilaiBacaAlqurans.index'));
        }

        return view('nilai_baca_alqurans.edit')->with('nilaiBacaAlquran', $nilaiBacaAlquran)->with(compact('semesters','kelas'));
    }

    /**
     * Update the specified nilai_baca_alquran in storage.
     *
     * @param int $id
     * @param Updatenilai_baca_alquranRequest $request
     *
     * @return Response
     */
    public function update($id, Updatenilai_baca_alquranRequest $request)
    {
        $nilaiBacaAlquran = $this->nilaiBacaAlquranRepository->find($id);

        if (empty($nilaiBacaAlquran)) {
            Flash::error('Nilai Baca Alquran not found');

            return redirect(route('nilaiBacaAlqurans.index'));
        }

        $nilaiBacaAlquran = $this->nilaiBacaAlquranRepository->update($request->all(), $id);

        Flash::success('Nilai Baca Alquran sukses terupdate.');

        return redirect(route('nilaiBacaAlqurans.index'));
    }

    /**
     * Remove the specified nilai_baca_alquran from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nilaiBacaAlquran = $this->nilaiBacaAlquranRepository->find($id);

        if (empty($nilaiBacaAlquran)) {
            Flash::error('Nilai Baca Alquran tidak ditemukan');

            return redirect(route('nilaiBacaAlqurans.index'));
        }

        $this->nilaiBacaAlquranRepository->delete($id);

        Flash::success('Nilai Baca Alquran sukses terhapus.');

        return redirect(route('nilaiBacaAlqurans.index'));
    }
}
