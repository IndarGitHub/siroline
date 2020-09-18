<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createnilai_hafalanRequest;
use App\Http\Requests\Updatenilai_hafalanRequest;
use App\Repositories\nilai_hafalanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Auth;
use Response;

class nilai_hafalanController extends AppBaseController
{
    /** @var  nilai_hafalanRepository */
    private $nilaiHafalanRepository;

    public function __construct(nilai_hafalanRepository $nilaiHafalanRepo)
    {
        $this->nilaiHafalanRepository = $nilaiHafalanRepo;
    }

    /**
     * Display a listing of the nilai_hafalan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nilaiHafalans = $this->nilaiHafalanRepository->all();
        $nilaiHafalans1 = DB::table('nilai_hafalans')->select('id')->pluck('id');
        $cekTombolDetailNilaiHafalan = DB::table('detail_nilai_hafalans')
        // ->join('nilai_hafalans','nilai_hafalans.id','=','detail_nilai_hafalans.nilai_hafalan_id')
        ->select('nilai_hafalan_id')
        // ->select(DB::raw('count("nilai_hafalan_id") as count'))
        ->groupBy('nilai_hafalan_id')
        ->pluck('nilai_hafalan_id')
        ;
        // dd($cekTombolDetailNilaiHafalan);
        $nilai_hafalan = \DB::table('nilai_hafalans')->where('id','1')->get();
        
        $detail_nilai_hafalan = \DB::table('detail_nilai_hafalans')->where('nilai_hafalan_id','1')->pluck('nilai_hafalan_id');
        
        $wakel = DB::table('gurus')
        ->join('kelas','gurus.id','=','kelas.guru_id')
        ->join('users','gurus.name','=','users.name')
        ->select('gurus.id')
        ->where('gurus.name','=',Auth::user()->name)
        ->value('gurus.id');

        return view('nilai_hafalans.index')
            ->with('nilaiHafalans', $nilaiHafalans)
            ->with('nilaiHafalans1', $nilaiHafalans1)
            ->with('wakel',$wakel)
            ->with('cekTombolDetailNilaiHafalan',$cekTombolDetailNilaiHafalan)
            ;
    }

    /**
     * Show the form for creating a new nilai_hafalan.
     *
     * @return Response
     */
    public function create()
    {
        $semesters = \App\Models\Semester::pluck('semester','id');
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        return view('nilai_hafalans.create')->with(compact('semesters','kelas'));
    }

    /**
     * Store a newly created nilai_hafalan in storage.
     *
     * @param Createnilai_hafalanRequest $request
     *
     * @return Response
     */
    public function store(Createnilai_hafalanRequest $request)
    {
        $input = $request->all();

        $nilaiHafalan = $this->nilaiHafalanRepository->create($input);

        Flash::success('Nilai Hafalan sukses terhapus.');

        return redirect(route('nilaiHafalans.index'));
    }

    /**
     * Display the specified nilai_hafalan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nilaiHafalan = $this->nilaiHafalanRepository->findWithDetail($id);
        // dd($nilaiHafalan);
        if (empty($nilaiHafalan)) {
            Flash::error('Nilai Hafalan tidak ditemukan');

            return redirect(route('nilaiHafalans.index'));
        }

        return view('nilai_hafalans.show')->with('nilaiHafalan', $nilaiHafalan);
    }

    /**
     * Show the form for editing the specified nilai_hafalan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $semesters = \App\Models\Semester::pluck('semester','id');
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        $nilaiHafalan = $this->nilaiHafalanRepository->find($id);

        if (empty($nilaiHafalan)) {
            Flash::error('Nilai Hafalan tidak ditemukan');

            return redirect(route('nilaiHafalans.index'));
        }

        return view('nilai_hafalans.edit')->with('nilaiHafalan', $nilaiHafalan)->with(compact('semesters','kelas'));
    }

    /**
     * Update the specified nilai_hafalan in storage.
     *
     * @param int $id
     * @param Updatenilai_hafalanRequest $request
     *
     * @return Response
     */
    public function update($id, Updatenilai_hafalanRequest $request)
    {
        $nilaiHafalan = $this->nilaiHafalanRepository->find($id);

        if (empty($nilaiHafalan)) {
            Flash::error('Nilai Hafalan tidak ditemukan');

            return redirect(route('nilaiHafalans.index'));
        }

        $nilaiHafalan = $this->nilaiHafalanRepository->update($request->all(), $id);

        Flash::success('Nilai Hafalan sukses terupdate.');

        return redirect(route('nilaiHafalans.index'));
    }

    /**
     * Remove the specified nilai_hafalan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nilaiHafalan = $this->nilaiHafalanRepository->find($id);

        if (empty($nilaiHafalan)) {
            Flash::error('Nilai Hafalan tidak ditemukan');

            return redirect(route('nilaiHafalans.index'));
        }

        $this->nilaiHafalanRepository->delete($id);

        Flash::success('Nilai Hafalan sukses terhapus.');

        return redirect(route('nilaiHafalans.index'));
    }

    public function tombol($id)
    {   

        // $cekTombol = \DB::table('nilai_hafalans')->where('nilai_hafalan_id',$id)->first();
        // $tombol_sekarang = $cekTombol->tombol;

        // if($tombol_sekarang == 1) {
        //     \DB::table('nilai_hafalans')->where('nilai_hafalan_id',$id)->update([
        //         'tombol'=> 0
        //     ]);
        // }else{
        //     \DB::table('nilai_hafalans')->where('nilai_hafalan_id',$id)->update([
        //         'tombol'=> 1
        //     ]);
        // }

        // return redirect('nilaiHafalans/tombol');
        return view('tombol');
    }

}
