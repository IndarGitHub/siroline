<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateraporRequest;
use App\Http\Requests\UpdateraporRequest;
use App\Repositories\raporRepository;
use App\Repositories\detail_nilai_baca_alquranRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Cttpelanggaran;
use Illuminate\Http\Request;
// use App\Models\detail_nilai_hafalans;
use Flash;
use DB;
use Auth;
use Response;
use Carbon;

class raporController extends AppBaseController
{
    /** @var  raporRepository */
    private $raporRepository;

    public function __construct(raporRepository $raporRepo)
    {
        $this->raporRepository = $raporRepo;
    }

    /**
     * Display a listing of the rapor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // $rapors = $this->raporRepository->all();
        $data = DB::table('detail_nilai_hafalans')
        ->join('santris','detail_nilai_hafalans.santri_id', '=', 'santris.id')
        ->join('nilai_hafalans','detail_nilai_hafalans.nilai_hafalan_id', '=', 'nilai_hafalans.id')
        ->join('kelas','nilai_hafalans.kelas_id', '=', 'kelas.id')
        ->join('semesters','nilai_hafalans.semester_id', '=', 'semesters.id')
        ->select('santris.no_induk','santris.nm_santri', 'kelas.nm_kelas', 'semesters.semester','semesters.thn_ajaran')
        ->where('santris.nm_wali_santri','=',Auth::user()->name)
        ->get();
        $dataDetail = DB::table('detail_nilai_hafalans')
        ->join('santris','detail_nilai_hafalans.santri_id', '=', 'santris.id')
        ->join('nilai_hafalans','detail_nilai_hafalans.nilai_hafalan_id', '=', 'nilai_hafalans.id')
        ->join('kelas','nilai_hafalans.kelas_id', '=', 'kelas.id')
        ->join('semesters','nilai_hafalans.semester_id', '=', 'semesters.id')
        ->select('santris.id as santri_id','kelas.id','semesters.id','santris.no_induk','santris.nm_santri','kelas.nm_kelas','semesters.semester','semesters.thn_ajaran')
        ->get();
        $raporWakel = DB::table('detail_nilai_hafalans')
        ->join('santris','detail_nilai_hafalans.santri_id', '=', 'santris.id')
        ->join('nilai_hafalans','detail_nilai_hafalans.nilai_hafalan_id', '=', 'nilai_hafalans.id')
        ->join('kelas','nilai_hafalans.kelas_id', '=', 'kelas.id')
        ->join('semesters','nilai_hafalans.semester_id', '=', 'semesters.id')
        ->join('gurus','kelas.guru_id', '=', 'gurus.id')
        ->select('santris.id as santri_id','kelas.id','semesters.id','santris.no_induk','santris.nm_santri','kelas.nm_kelas','semesters.semester','semesters.thn_ajaran')
        ->where('gurus.name','=',Auth::user()->name)
        ->get();
        // dd($raporWakel);
        return view('rapors.index')
        ->with(compact('data',$data))
        ->with(compact('dataDetail',$dataDetail))
        ->with(compact('raporWakel',$raporWakel));

            
    }

    /**
     * Show the form for creating a new rapor.
     *
     * @return Response
     */
    public function create()
    {
        $detail_nilai_ujian_tulis = \App\Models\detail_nilai_ujian_tulis::pluck('santri_id','id');
        $detail_mapels = \App\Models\Detail_Mapel::pluck('mapel_id','id');
        $detail_nilai_hafalans = \App\Models\detail_nilai_hafalan::pluck('santri_id','id');
        $detail_nilai_baca_alqurans = \App\Models\detail_nilai_baca_alquran::pluck('santri_id','id');
        $detail_nilai_keaktifans = \App\Models\detail_nilai_keaktifan::pluck('santri_id','id');
        return view('rapors.create')->with(compact('detail_nilai_ujian_tulis','detail_mapels','detail_nilai_hafalans','detail_nilai_baca_alqurans','detail_nilai_keaktifans'));
    }

    /**
     * Store a newly created rapor in storage.
     *
     * @param CreateraporRequest $request
     *
     * @return Response
     */
    public function store(CreateraporRequest $request)
    {
        $input = $request->all();

        $rapor = $this->raporRepository->create($input);

        Flash::success('Rapor saved successfully.');

        return redirect(route('rapors.index'));
    }

    /**
     * Display the specified rapor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rapor = $this->raporRepository->find($id);
        
        if (empty($rapor)) {
            Flash::error('Rapor not found');

            return redirect(route('rapors.index'));
        }

        return view('rapors.show')->with('rapor', $rapor);
    }

    /**
     * Show the form for editing the specified rapor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detail_nilai_ujian_tulis = \App\Models\detail_nilai_ujian_tulis::pluck('santri_id','id');
        $detail_mapels = \App\Models\Detail_Mapel::pluck('mapel_id','id');
        $detail_nilai_hafalans = \App\Models\detail_nilai_hafalan::pluck('santri_id','id');
        $detail_nilai_baca_alqurans = \App\Models\detail_nilai_baca_alquran::pluck('santri_id','id');
        $detail_nilai_keaktifans = \App\Models\detail_nilai_keaktifan::pluck('santri_id','id');
        $rapor = $this->raporRepository->find($id);

        if (empty($rapor)) {
            Flash::error('Rapor not found');

            return redirect(route('rapors.index'));
        }

        return view('rapors.edit')->with('rapor', $rapor)->with(compact('detail_nilai_ujian_tulis','detail_mapels','detail_nilai_hafalans','detail_nilai_baca_alqurans','detail_nilai_keaktifans'));
    }

    /**
     * Update the specified rapor in storage.
     *
     * @param int $id
     * @param UpdateraporRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateraporRequest $request)
    {
        $rapor = $this->raporRepository->find($id);

        if (empty($rapor)) {
            Flash::error('Rapor not found');

            return redirect(route('rapors.index'));
        }

        $rapor = $this->raporRepository->update($request->all(), $id);

        Flash::success('Rapor updated successfully.');

        return redirect(route('rapors.index'));
    }

    /**
     * Remove the specified rapor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rapor = $this->raporRepository->find($id);

        if (empty($rapor)) {
            Flash::error('Rapor not found');

            return redirect(route('rapors.index'));
        }

        $this->raporRepository->delete($id);

        Flash::success('Rapor deleted successfully.');

        return redirect(route('rapors.index'));
    }
    public function pdf($santriId = null){
        if(Auth::user()->akses == 'admin' && Auth::user()->akses == 'walikelas')
            $santriId = Auth::id();
        
        $dataHafalan = DB::table('detail_nilai_hafalans')
        ->join('santris','santris.id','=','detail_nilai_hafalans.santri_id')
        ->join('nilai_hafalans','nilai_hafalans.id','=','detail_nilai_hafalans.nilai_hafalan_id')
        ->join('users','users.name','=','santris.nm_wali_santri')
        ->join('kelas','kelas.id','=','nilai_hafalans.kelas_id')
        ->join('gurus','gurus.id','=','kelas.guru_id')
        ->join('semesters','semesters.id','=','nilai_hafalans.semester_id')
        ->where('santris.nm_wali_santri','=',Auth::user()->name)
        ->get();
        $dataTulis = DB::table('detail_nilai_ujian_tulis')
        ->join('santris','detail_nilai_ujian_tulis.santri_id', '=', 'santris.id')
        ->join('detail_mapels','detail_nilai_ujian_tulis.detail_mapel_id', '=', 'detail_mapels.id')
        ->join('nilai_ujian_tulis','detail_mapels.nilai_ujian_tulis_id', '=', 'nilai_ujian_tulis.id')
        ->join('mapels','detail_mapels.mapel_id', '=', 'mapels.id')
        ->join('kelas','nilai_ujian_tulis.kelas_id', '=', 'kelas.id')
        ->join('semesters','nilai_ujian_tulis.semester_id', '=', 'semesters.id')
        ->where('santris.nm_wali_santri','=',Auth::user()->name)
        ->get();
        $dataAlquran = DB::table('detail_nilai_baca_alqurans')
        ->join('santris','santris.id','=','detail_nilai_baca_alqurans.santri_id')
        ->join('nilai_baca_alqurans','nilai_baca_alqurans.id','=','detail_nilai_baca_alqurans.nilai_baca_alquran_id')
        ->join('users','users.name','=','santris.nm_wali_santri')
        ->join('kelas','kelas.id','=','nilai_baca_alqurans.kelas_id')
        ->join('semesters','semesters.id','=','nilai_baca_alqurans.semester_id')
        ->where('santris.nm_wali_santri','=',Auth::user()->name)
        ->get();
        $dataKeaktifan = DB::table('detail_nilai_keaktifans')
        ->join('santris','santris.id','=','detail_nilai_keaktifans.santri_id')
        ->join('nilai_keaktifans','nilai_keaktifans.id','=','detail_nilai_keaktifans.nilai_keaktifan_id')
        ->join('users','users.name','=','santris.nm_wali_santri')
        ->join('kelas','kelas.id','=','nilai_keaktifans.kelas_id')
        ->join('semesters','semesters.id','=','nilai_keaktifans.semester_id')
        ->where('santris.nm_wali_santri','=',Auth::user()->name)
        ->get();

        $dataHafalan1 = DB::table('detail_nilai_hafalans')
        ->join('santris','santris.id','=','detail_nilai_hafalans.santri_id')
        ->join('nilai_hafalans','nilai_hafalans.id','=','detail_nilai_hafalans.nilai_hafalan_id')
        ->join('users','users.name','=','santris.nm_wali_santri')
        ->join('kelas','kelas.id','=','nilai_hafalans.kelas_id')
        ->join('gurus','gurus.id','=','kelas.guru_id')
        ->join('semesters','semesters.id','=','nilai_hafalans.semester_id')
        // ->select('detail_nilai_hafalans.id','santris.nm_santri','detail_nilai_hafalans.kelancaran',
        // 'santris.tmp_lhr','santris.tgl_lhr','santris.no_induk','kelas.nm_kelas','detail_nilai_hafalans.nilai_huruf')
        // ->where('detail_nilai_hafalans.id','detail_nilai_hafalans.id')
        ->where('santris.id','=',$santriId)
        ->get();
        // dd($dataHafalan1);
        $dataTulis1 = DB::table('detail_nilai_ujian_tulis')
        ->join('santris','detail_nilai_ujian_tulis.santri_id', '=', 'santris.id')
        ->join('detail_mapels','detail_nilai_ujian_tulis.detail_mapel_id', '=', 'detail_mapels.id')
        ->join('nilai_ujian_tulis','detail_mapels.nilai_ujian_tulis_id', '=', 'nilai_ujian_tulis.id')
        ->join('mapels','detail_mapels.mapel_id', '=', 'mapels.id')
        ->join('kelas','nilai_ujian_tulis.kelas_id', '=', 'kelas.id')
        ->join('semesters','nilai_ujian_tulis.semester_id', '=', 'semesters.id')
        // ->where('santris.id','=','detail_nilai_ujian_tulis.santri_id')
        ->where('santris.id','=',$santriId)
        ->get();
        $dataAlquran1 = DB::table('detail_nilai_baca_alqurans')
        ->join('santris','santris.id','=','detail_nilai_baca_alqurans.santri_id')
        ->join('nilai_baca_alqurans','nilai_baca_alqurans.id','=','detail_nilai_baca_alqurans.nilai_baca_alquran_id')
        ->join('kelas','kelas.id','=','nilai_baca_alqurans.kelas_id')
        ->join('semesters','semesters.id','=','nilai_baca_alqurans.semester_id')
        // ->where('santris.id','=','detail_nilai_baca_alqurans.santri_id')
        ->where('santris.id','=',$santriId)
        ->get();
        $dataKeaktifan1 = DB::table('detail_nilai_keaktifans')
        ->join('santris','santris.id','=','detail_nilai_keaktifans.santri_id')
        ->join('nilai_keaktifans','nilai_keaktifans.id','=','detail_nilai_keaktifans.nilai_keaktifan_id')
        ->join('kelas','kelas.id','=','nilai_keaktifans.kelas_id')
        ->join('semesters','semesters.id','=','nilai_keaktifans.semester_id')
        // ->where('santris.id','=','pdetail_nilai_keaktifans.santri_id')
        ->where('santris.id','=',$santriId)
        ->get();
        
        $total_santri = DB::table('santris')
        ->join('kelas','kelas.id','=','santris.kelas_id')
        // ->where('santris.kelas_id','=','kelas.id')
        ->get();
                // dd($dataTulis1);
        $pdf = \PDF::loadView('pdf',[
            'dataHafalan'=>$dataHafalan,
            'dataTulis'=>$dataTulis,
            'dataAlquran'=>$dataAlquran,
            'dataKeaktifan'=>$dataKeaktifan,
            'dataHafalan1'=>$dataHafalan1,
            'dataTulis1'=>$dataTulis1,
            'dataAlquran1'=>$dataAlquran1,
            'dataKeaktifan1'=>$dataKeaktifan1,
            'total_santri'=>$total_santri,
            // 'detailNilaiBacaAlqurans'=>$detailNilaiBacaAlqurans
        ])
        ->setPaper('legal', 'potrait');
        // ->SetFont('Lateef','',16)
        // ->Cell(190,10,"Lateef : مادراساه ديننيياه ووستهو الءهيداياه");

        return $pdf->stream('rapors.pdf')
        ;
    }
}