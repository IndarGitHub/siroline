<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdetail_nilai_baca_alquranRequest;
use App\Http\Requests\Updatedetail_nilai_baca_alquranRequest;
use App\Repositories\detail_nilai_baca_alquranRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class detail_nilai_baca_alquranController extends AppBaseController
{
    /** @var  detail_nilai_baca_alquranRepository */
    private $detailNilaiBacaAlquranRepository;

    public function __construct(detail_nilai_baca_alquranRepository $detailNilaiBacaAlquranRepo)
    {
        $this->detailNilaiBacaAlquranRepository = $detailNilaiBacaAlquranRepo;
    }

    /**
     * Display a listing of the detail_nilai_baca_alquran.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detailNilaiBacaAlqurans = $this->detailNilaiBacaAlquranRepository->all();

        return view('detail_nilai_baca_alqurans.index')
            ->with('detailNilaiBacaAlqurans', $detailNilaiBacaAlqurans);
    }

    /**
     * Show the form for creating a new detail_nilai_baca_alquran.
     *
     * @return Response
     */
    public function create()
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $nilai_baca_alqurans = \App\Models\nilai_baca_alquran::pluck('id');
        return view('detail_nilai_baca_alqurans.create')->with(compact('santris','nilai_baca_alqurans'));
    }

    /**
     * Store a newly created detail_nilai_baca_alquran in storage.
     *
     * @param Createdetail_nilai_baca_alquranRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nilai_tajwid.*' => 'required',
            'nilai_kelancaran.*' => 'required',
            'nilai_makhorijul.*' => 'required'
        ], [
            'nilai_tajwid.*' => 'nilai tajwid harus diisi!',
            'nilai_kelancaran.*' => 'nilai kelancaran harus diisi!',
            'nilai_makhorijul.*' => 'nilai makhorijul harus diisi!'
        ]);
        $input = $request->all();

        collect($input['nilai_tajwid'])->each(function($value, $key) use ($input) {

            $this->detailNilaiBacaAlquranRepository->create([
                'santri_id' => $key,
                'nilai_baca_alquran_id' => $input['nilai_baca_alquran_id'],
                'tajwid' => $input['nilai_tajwid'][$key],
                'tajwid_huruf' => terbilang($input['nilai_tajwid'][$key]),
                'kelancaran' => $input['nilai_kelancaran'][$key],
                'kel_huruf' => terbilang($input['nilai_kelancaran'][$key]),
                'makhorijul' => $input['nilai_makhorijul'][$key],
                'makho_huruf' => terbilang($input['nilai_makhorijul'][$key]),
            ]);
         });

        Flash::success('Detail Nilai Baca Alquran sukses tersimpan....');

        return redirect(route('nilaiBacaAlqurans.index'));
    }

    /**
     * Display the specified detail_nilai_baca_alquran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailNilaiBacaAlquran = $this->detailNilaiBacaAlquranRepository->find($id);

        if (empty($detailNilaiBacaAlquran)) {
            Flash::error('Detail Nilai Baca Alquran tidak ditemukan');

            return redirect(route('nilaiBacaAlqurans.index'));
        }


        return view('detail_nilai_baca_alqurans.show')->with('detailNilaiBacaAlquran', $detailNilaiBacaAlquran);
    }

    /**
     * Show the form for editing the specified detail_nilai_baca_alquran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $nilai_baca_alqurans = \App\Models\nilai_baca_alquran::pluck('id');
        $detailNilaiBacaAlquran = $this->detailNilaiBacaAlquranRepository->find($id);

        if (empty($detailNilaiBacaAlquran)) {
            Flash::error('Detail Nilai Baca Alquran tidak ditemukan');

            return redirect(route('nilaiBacaAlqurans.index'));
        }

        return view('detail_nilai_baca_alqurans.edit')->with('detailNilaiBacaAlquran', $detailNilaiBacaAlquran)->with(compact('santris','nilai_baca_alqurans'));
    }

    /**
     * Update the specified detail_nilai_baca_alquran in storage.
     *
     * @param int $id
     * @param Updatedetail_nilai_baca_alquranRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        
        $detailNilaiBacaAlquran = $this->detailNilaiBacaAlquranRepository->find($id);

        if (empty($detailNilaiBacaAlquran)) {
            Flash::error('Detail Nilai Baca Alquran tidak ditemukan');

            return redirect(route('nilaiBacaAlqurans.index'));
        }

        $detailNilaiBacaAlquran = $this->detailNilaiBacaAlquranRepository->update($request->all(), $id);

        Flash::success('Detail Nilai Baca Alquran sukses ter update....');

        return redirect(route('nilaiBacaAlqurans.index'));
    }

    /**
     * Remove the specified detail_nilai_baca_alquran from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailNilaiBacaAlquran = $this->detailNilaiBacaAlquranRepository->find($id);

        if (empty($detailNilaiBacaAlquran)) {
            Flash::error('Detail Nilai Baca Alquran tidak ditemukan');

            return redirect(route('nilaiBacaAlqurans.index'));
        }

        $this->detailNilaiBacaAlquranRepository->delete($id);

        Flash::success('Detail Nilai Baca Alquran sukses ter hapus....');

        return redirect(route('nilaiBacaAlqurans.index'));
    }
}
