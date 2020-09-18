<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdetail_nilai_hafalanRequest;
use App\Http\Requests\Updatedetail_nilai_hafalanRequest;
use App\Repositories\detail_nilai_hafalanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class detail_nilai_hafalanController extends AppBaseController
{
    /** @var  detail_nilai_hafalanRepository */
    private $detailNilaiHafalanRepository;

    public function __construct(detail_nilai_hafalanRepository $detailNilaiHafalanRepo)
    {
        $this->detailNilaiHafalanRepository = $detailNilaiHafalanRepo;
    }

    /**
     * Display a listing of the detail_nilai_hafalan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detailNilaiHafalans = $this->detailNilaiHafalanRepository->all();

        return view('detail_nilai_hafalans.index')
            ->with('detailNilaiHafalans', $detailNilaiHafalans);
    }

    /**
     * Show the form for creating a new detail_nilai_hafalan.
     *
     * @return Response
     */
    public function create()
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $nilai_hafalans = \App\Models\nilai_hafalan::pluck('id');
        return view('detail_nilai_hafalans.create')->with(compact('santris','nilai_hafalans'));
    }

    /**
     * Store a newly created detail_nilai_hafalan in storage.
     *
     * @param Createdetail_nilai_hafalanRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nilai_kelancaran.*' => 'required'
        ], [
            'nilai_kelancaran.*' => 'nilai kelancaran harus diisi!'
        ]);

        $input = $request->all();

        collect($input['nilai_kelancaran'])->each(function($value, $key) use ($input) {

            $this->detailNilaiHafalanRepository->create([
                'santri_id' => $key,
                'nilai_hafalan_id' => $input['nilai_hafalan_id'],
                'kelancaran' => $input['nilai_kelancaran'][$key],
                'nilai_huruf' => terbilang($input['nilai_kelancaran'][$key]),
            ]);
         });
        Flash::success('Detail Nilai Hafalan sukses tersimpan...');

        return redirect(route('nilaiHafalans.index'));
    }

    /**
     * Display the specified detail_nilai_hafalan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailNilaiHafalan = $this->detailNilaiHafalanRepository->find($id);

        if (empty($detailNilaiHafalan)) {
            Flash::error('Detail Nilai Hafalan tidak ditemukan');

            return redirect(route('nilaiHafalans.index'));
        }

        return view('detail_nilai_hafalans.show')->with('detailNilaiHafalan', $detailNilaiHafalan);
    }

    /**
     * Show the form for editing the specified detail_nilai_hafalan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $nilai_hafalans = \App\Models\nilai_hafalan::pluck('id');
        $detailNilaiHafalan = $this->detailNilaiHafalanRepository->find($id);

        if (empty($detailNilaiHafalan)) {
            Flash::error('Detail Nilai Hafalan tidak ditemukan');

            return redirect(route('nilaiHafalans.index'));
        }

        return view('detail_nilai_hafalans.edit')->with('detailNilaiHafalan', $detailNilaiHafalan)->with(compact('santris','nilai_hafalans'));
    }

    /**
     * Update the specified detail_nilai_hafalan in storage.
     *
     * @param int $id
     * @param Updatedetail_nilai_hafalanRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $detailNilaiHafalan = $this->detailNilaiHafalanRepository->find($id);

        if (empty($detailNilaiHafalan)) {
            Flash::error('Detail Nilai Hafalan tidak ditemukan');

            return redirect(route('nilaiHafalans.index'));
        }

        $detailNilaiHafalan = $this->detailNilaiHafalanRepository->update($request->all(), $id);

        Flash::success('Detail Nilai Hafalan sukses terupdate.');

        return redirect(route('nilaiHafalans.index'));
    }

    /**
     * Remove the specified detail_nilai_hafalan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailNilaiHafalan = $this->detailNilaiHafalanRepository->find($id);

        if (empty($detailNilaiHafalan)) {
            Flash::error('Detail Nilai Hafalan tidak ditemukan...');

            return redirect(route('nilaiHafalans.index'));
        }

        $this->detailNilaiHafalanRepository->delete($id);

        Flash::success('Detail Nilai Hafalan sukses terdelete.');

        return redirect(route('nilaiHafalans.index'));
    }
}
