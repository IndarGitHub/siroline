<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createdetail_nilai_keaktifanRequest;
use App\Http\Requests\Updatedetail_nilai_keaktifanRequest;
use App\Repositories\detail_nilai_keaktifanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class detail_nilai_keaktifanController extends AppBaseController
{
    /** @var  detail_nilai_keaktifanRepository */
    private $detailNilaiKeaktifanRepository;

    public function __construct(detail_nilai_keaktifanRepository $detailNilaiKeaktifanRepo)
    {
        $this->detailNilaiKeaktifanRepository = $detailNilaiKeaktifanRepo;
    }

    /**
     * Display a listing of the detail_nilai_keaktifan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detailNilaiKeaktifans = $this->detailNilaiKeaktifanRepository->all();

        return view('detail_nilai_keaktifans.index')
            ->with('detailNilaiKeaktifans', $detailNilaiKeaktifans);
    }

    /**
     * Show the form for creating a new detail_nilai_keaktifan.
     *
     * @return Response
     */
    public function create()
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $nilai_keaktifans = \App\Models\nilai_keaktifan::pluck('kelas_id','id');
        return view('detail_nilai_keaktifans.create')->with(compact('santris','nilai_keaktifans'));
    }

    /**
     * Store a newly created detail_nilai_keaktifan in storage.
     *
     * @param Createdetail_nilai_keaktifanRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nilai_angka_qiroa.*' => 'required',
            'nilai_angka_muhadhoroh.*' => 'required',
            'nilai_angka_diba.*' => 'required',
            'nilai_angka_kelakuan.*' => 'required',
            'nilai_angka_kerajinan.*' => 'required',
            'nilai_angka_kerapian.*' => 'required',
            'ket_sakit.*' => 'required',
            'ket_izin.*' => 'required',
            'tanpa_ket.*' => 'required',
        ], [
            'nilai_angka_qiroa.*' => 'nilai angka qiroa harus diisi!',
            'nilai_angka_muhadhoroh.*' => 'nilai muhadhoroh harus diisi!',
            'nilai_angka_diba.*' => 'nilai diba harus diisi!',
            'nilai_angka_kelakuan.*' => 'nilai kelakuan harus diisi!',
            'nilai_angka_kerajinan.*' => 'nilai kerajianan harus diisi!',
            'nilai_angka_kerapian.*' => 'nilai kerapian harus diisi!',
            'ket_sakit.*' => 'keterangan sakit harus diisi!',
            'ket_izin.*' => 'keterangan izin harus diisi!',
            'tanpa_ket.*' => 'tanpa keterangan harus diisi!',
        ]);
        $input = $request->all();

        collect($input['nilai_angka_qiroa'])->each(function($value, $key) use ($input) {

            $this->detailNilaiKeaktifanRepository->create([
                'santri_id' => $key,
                'nilai_keaktifan_id' => $input['nilai_keaktifan_id'],
                'nilai_angka1' => $input['nilai_angka_qiroa'][$key],
                'qiroatul_quran' => konversiHuruf($input['nilai_angka_qiroa'][$key]),
                'nilai_angka2' => $input['nilai_angka_muhadhoroh'][$key],
                'muhadhoroh' => konversiHuruf($input['nilai_angka_muhadhoroh'][$key]),
                'nilai_angka3' => $input['nilai_angka_diba'][$key],
                'maulid_diba' => konversiHuruf($input['nilai_angka_diba'][$key]),
                'nilai_angka4' => $input['nilai_angka_kelakuan'][$key],
                'kelakuan' => konversiHuruf($input['nilai_angka_kelakuan'][$key]),
                'nilai_angka5' => $input['nilai_angka_kerajinan'][$key],
                'kerajinan' => konversiHuruf($input['nilai_angka_kerajinan'][$key]),
                'nilai_angka6' => $input['nilai_angka_kerapian'][$key],
                'kerapian' => konversiHuruf($input['nilai_angka_kerapian'][$key]),
                'ket_sakit' => $input['ket_sakit'][$key],
                'ket_izin' => $input['ket_izin'][$key],
                'tanpa_ket' => $input['tanpa_ket'][$key]
            ]);
         });

        Flash::success('Detail Nilai Keaktifan sukses tersimpan.');

        return redirect(route('nilaiKeaktifans.index'));
    }

    /**
     * Display the specified detail_nilai_keaktifan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailNilaiKeaktifan = $this->detailNilaiKeaktifanRepository->find($id);

        if (empty($detailNilaiKeaktifan)) {
            Flash::error('Detail Nilai Keaktifan tidak ditemukan');

            return redirect(route('nilaiKeaktifans.index'));
        }

        return view('detail_nilai_keaktifans.show')->with('detailNilaiKeaktifan', $detailNilaiKeaktifan);
    }

    /**
     * Show the form for editing the specified detail_nilai_keaktifan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $nilai_keaktifans = \App\Models\nilai_keaktifan::pluck('kelas_id','id');
        $detailNilaiKeaktifan = $this->detailNilaiKeaktifanRepository->find($id);

        if (empty($detailNilaiKeaktifan)) {
            Flash::error('Detail Nilai Keaktifan tidak ditemukan');

            return redirect(route('nilaiKeaktifans.index'));
        }

        return view('detail_nilai_keaktifans.edit')->with('detailNilaiKeaktifan', $detailNilaiKeaktifan)->with(compact('santris','nilai_keaktifans'));
    }

    /**
     * Update the specified detail_nilai_keaktifan in storage.
     *
     * @param int $id
     * @param Updatedetail_nilai_keaktifanRequest $request
     *
     * @return Response
     */
    public function update($id, Updatedetail_nilai_keaktifanRequest $request)
    {
        $detailNilaiKeaktifan = $this->detailNilaiKeaktifanRepository->find($id);

        if (empty($detailNilaiKeaktifan)) {
            Flash::error('Detail Nilai Keaktifan tidak ditemukan');

            return redirect(route('detailNilaiKeaktifans.index'));
        }

        $detailNilaiKeaktifan = $this->detailNilaiKeaktifanRepository->update($request->all(), $id);

        Flash::success('Detail Nilai Keaktifan sukses terupdate.');

        return redirect(route('nilaiKeaktifans.index'));
    }

    /**
     * Remove the specified detail_nilai_keaktifan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailNilaiKeaktifan = $this->detailNilaiKeaktifanRepository->find($id);

        if (empty($detailNilaiKeaktifan)) {
            Flash::error('Detail Nilai Keaktifan tidak ditemukan');

            return redirect(route('nilaiKeaktifans.index'));
        }

        $this->detailNilaiKeaktifanRepository->delete($id);

        Flash::success('Detail Nilai Keaktifan sukses terhapus.');

        return redirect(route('nilaiKeaktifans.index'));
    }
}
