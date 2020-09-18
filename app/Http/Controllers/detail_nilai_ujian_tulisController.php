<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdetail_nilai_ujian_tulisRequest;
use App\Http\Requests\Updatedetail_nilai_ujian_tulisRequest;
use App\Repositories\detail_nilai_ujian_tulisRepository;
use App\Http\Controllers\AppBaseController;
use App\Helpers\AngkaTerbilang;
use Illuminate\Http\Request;
use DB;
use Flash;
use Response;

class detail_nilai_ujian_tulisController extends AppBaseController
{
    /** @var  detail_nilai_ujian_tulisRepository */
    private $detailNilaiUjianTulisRepository;

    public function __construct(detail_nilai_ujian_tulisRepository $detailNilaiUjianTulisRepo)
    {
        $this->detailNilaiUjianTulisRepository = $detailNilaiUjianTulisRepo;
    }

    /**
     * Display a listing of the detail_nilai_ujian_tulis.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detailNilaiUjianTulis = $this->detailNilaiUjianTulisRepository->all();

        return view('detail_nilai_ujian_tulis.index')
            ->with('detailNilaiUjianTulis', $detailNilaiUjianTulis);
    }

    /**
     * Show the form for creating a new detail_nilai_ujian_tulis.
     *
     * @return Response
     */
    public function create()
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $detail_mapels = \App\Models\Detail_Mapel::pluck('mapel_id','id');
        return view('detail_nilai_ujian_tulis.create')->with(compact('santris','detail_mapels'));
    }

    /**
     * Store a newly created detail_nilai_ujian_tulis in storage.
     *
     * @param Createdetail_nilai_ujian_tulisRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nilai_angka.*' => 'required'
        ], [
            'nilai_angka.*' => 'nilai angka harus diisi!'
        ]);
        $input = $request->all();
        // dd($input);
        collect($input['nilai_angka'],$input['detail_mapel_id'])->each(function($value, $key) use ($input) {
            $this->detailNilaiUjianTulisRepository->create([
                'santri_id' => $input['santri_id'][$key],
                'detail_mapel_id' => $input['detail_mapel_id'][$key],
                'nilai_angka' => $input['nilai_angka'][$key],
                'nilai_huruf' => terbilang($input['nilai_angka'][$key]),
            ]);
         });

        Flash::success('Detail Nilai Ujian Tulis sukses tersimpan.');

        return redirect(route('nilaiUjianTulis.index'));
    }

    /**
     * Display the specified detail_nilai_ujian_tulis.
     *
     * @param int $idiya
     *
     * @return Response
     */
    public function show($id)
    {
        $detailNilaiUjianTulis = $this->detailNilaiUjianTulisRepository->find($id);

        if (empty($detailNilaiUjianTulis)) {
            Flash::error('Detail Nilai Ujian Tulis tidak ditemukan');

            return redirect(route('detailNilaiUjianTulis.index'));
        }

        return view('detail_nilai_ujian_tulis.show')->with('detailNilaiUjianTulis', $detailNilaiUjianTulis);
    }

    /**
     * Show the form for editing the specified detail_nilai_ujian_tulis.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $detail_mapels = \App\Models\Detail_Mapel::pluck('id');
        $detailNilaiUjianTulis = $this->detailNilaiUjianTulisRepository->find($id);

        if (empty($detailNilaiUjianTulis)) {
            Flash::error('Detail Nilai Ujian Tulis tidak ditemukan');

            return redirect(route('nilaiUjianTulis.index'));
        }

        return view('detail_nilai_ujian_tulis.edit')->with('detailNilaiUjianTulis', $detailNilaiUjianTulis)->with(compact('santris','detail_mapels'));
    }

    /**
     * Update the specified detail_nilai_ujian_tulis in storage.
     *
     * @param int $id
     * @param Updatedetail_nilai_ujian_tulisRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetail_nilai_ujian_tulisRequest $request)
    {
        $detailNilaiUjianTulis = $this->detailNilaiUjianTulisRepository->find($id);

        if (empty($detailNilaiUjianTulis)) {
            Flash::error('Detail Nilai Ujian Tulis tidak ditemukan');

            return redirect(route('detailNilaiUjianTulis.index'));
        }

        $detailNilaiUjianTulis = $this->detailNilaiUjianTulisRepository->update($request->all(), $id);

        Flash::success('Detail Nilai Ujian Tulis sukses terupdate.');

        return redirect(route('nilaiUjianTulis.index'));
    }

    /**
     * Remove the specified detail_nilai_ujian_tulis from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailNilaiUjianTulis = $this->detailNilaiUjianTulisRepository->find($id);

        if (empty($detailNilaiUjianTulis)) {
            Flash::error('Detail Nilai Ujian Tulis tidak ditemukan');

            return redirect(route('nilaiUjianTulis.index'));
        }

        $this->detailNilaiUjianTulisRepository->delete($id);

        Flash::success('Detail Nilai Ujian Tulis sukses terhapus.');

        return redirect(route('nilaiUjianTulis.index'));
    }
}
