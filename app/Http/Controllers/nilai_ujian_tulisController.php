<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createnilai_ujian_tulisRequest;
use App\Http\Requests\Updatenilai_ujian_tulisRequest;
use App\Repositories\nilai_ujian_tulisRepository;
use App\Repositories\MapelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Flash;
use Auth;
use Response;

class nilai_ujian_tulisController extends AppBaseController
{
    /** @var  nilai_ujian_tulisRepository */
    private $nilaiUjianTulisRepository;

    public function __construct(nilai_ujian_tulisRepository $nilaiUjianTulisRepo)
    {
        $this->nilaiUjianTulisRepository = $nilaiUjianTulisRepo;
    }

    /**
     * Display a listing of the nilai_ujian_tulis.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nilaiUjianTulis = $this->nilaiUjianTulisRepository->all();
        $gurus = DB::table('nilai_ujian_tulis')
        ->join('detail_mapels','detail_mapels.nilai_ujian_tulis_id','nilai_ujian_tulis.id')
        ->join('mapels','mapels.id','detail_mapels.mapel_id')
        // ->where('mapels.guru_id',Auth::user()->id)
        ->select('nilai_ujian_tulis.kelas_id','detail_mapels.mapel_id','mapels.guru_id')
        ->groupBy('kelas_id','mapel_id','guru_id')
        // ->value('kelas.nm_kelas')
        ->get()
        // ->value('gurus.id')
        ;
        // dd($gurus);
        return view('nilai_ujian_tulis.index')
            ->with('nilaiUjianTulis', $nilaiUjianTulis)
            ->with('gurus', $gurus)
            ;
    }

    /**
     * Show the form for creating a new nilai_ujian_tulis.
     *
     * @return Response
     */
    public function create()
    {
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        $semesters = \App\Models\Semester::pluck('semester','id');
        return view('nilai_ujian_tulis.create')->with(compact('kelas','semesters'));
    }

    /**
     * Store a newly created nilai_ujian_tulis in storage.
     *
     * @param Createnilai_ujian_tulisRequest $request
     *
     * @return Response
     */
    public function store(Createnilai_ujian_tulisRequest $request)
    {
        $input = $request->all();

        $nilaiUjianTulis = $this->nilaiUjianTulisRepository->create($input);

        Flash::success('Nilai Ujian Tulis sukses tersimpan.');

        return redirect(route('nilaiUjianTulis.index'));
    }

    /**
     * Display the specified nilai_ujian_tulis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nilaiUjianTulis = $this->nilaiUjianTulisRepository->findWithDetail($id);

        // $data = DB::table('mapels')
        // ->join('kelas','mapels.kelas_id', '=', 'kelas.id')
        // ->select('mapels.id','mapels.nm_mapel')
        // ->get();

        $gurus = DB::table('gurus')
        ->join('mapels','gurus.id','=','mapels.guru_id')
        ->join('users','gurus.name','=','users.name')
        ->select('gurus.id')
        ->where('gurus.name','=',Auth::user()->name)
        ->value('gurus.id');

        if (empty($nilaiUjianTulis)) {
            Flash::error('Nilai Ujian Tulis tidak ditemukan');

            return redirect(route('nilaiUjianTulis.index'));
        }

        return view('nilai_ujian_tulis.show')
        ->with('nilaiUjianTulis', $nilaiUjianTulis)
        ->with('gurus', $gurus);
        // ->with('data', $data)
    }

    /**
     * Show the form for editing the specified nilai_ujian_tulis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        $semesters = \App\Models\Semester::pluck('semester','id');
        $nilaiUjianTulis = $this->nilaiUjianTulisRepository->find($id);

        if (empty($nilaiUjianTulis)) {
            Flash::error('Nilai Ujian Tulis tidak ditemukan');

            return redirect(route('nilaiUjianTulis.index'));
        }

        return view('nilai_ujian_tulis.edit')->with('nilaiUjianTulis', $nilaiUjianTulis)->with(compact('kelas','semesters'));
    }

    /**
     * Update the specified nilai_ujian_tulis in storage.
     *
     * @param int $id
     * @param Updatenilai_ujian_tulisRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $nilaiUjianTulis = $this->nilaiUjianTulisRepository->find($id);

        if (empty($nilaiUjianTulis)) {
            Flash::error('Nilai Ujian Tulis tidak ditemukan');

            return redirect(route('nilaiUjianTulis.index'));
        }

        $nilaiUjianTulis = $this->nilaiUjianTulisRepository->update($request->all(), $id);

        Flash::success('Nilai Ujian Tulis sukses terupdate.');

        return redirect(route('nilaiUjianTulis.index'));
    }

    /**
     * Remove the specified nilai_ujian_tulis from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nilaiUjianTulis = $this->nilaiUjianTulisRepository->find($id);

        if (empty($nilaiUjianTulis)) {
            Flash::error('Nilai Ujian Tulis tidak ditemukan');

            return redirect(route('nilaiUjianTulis.index'));
        }

        $this->nilaiUjianTulisRepository->delete($id);

        Flash::success('Nilai Ujian Tulis sukses terhapus.');

        return redirect(route('nilaiUjianTulis.index'));
    }

}
