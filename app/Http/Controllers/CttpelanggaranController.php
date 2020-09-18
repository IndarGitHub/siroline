<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCttpelanggaranRequest;
use App\Http\Requests\UpdateCttpelanggaranRequest;
use App\Repositories\CttpelanggaranRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Auth;
use Response;

class CttpelanggaranController extends AppBaseController
{
    /** @var  CttpelanggaranRepository */
    private $cttpelanggaranRepository;

    public function __construct(CttpelanggaranRepository $cttpelanggaranRepo)
    {
        $this->cttpelanggaranRepository = $cttpelanggaranRepo;
    }

    /**
     * Display a listing of the Cttpelanggaran.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cttpelanggarans = $this->cttpelanggaranRepository->paginate(20);
        $ctt1 = DB::table('cttpelanggarans')
        ->join('santris','santris.id','=','cttpelanggarans.santri_id')
        ->select('cttpelanggarans.id','cttpelanggarans.santri_id','santris.nm_santri','cttpelanggarans.tgl','cttpelanggarans.tp_id',
        'cttpelanggarans.catatan_pengasuh')
        ->where('santris.nm_wali_santri','=',Auth::user()->name)
        ->get();
        // dd($ctt1);

        return view('cttpelanggarans.index')
            ->with('cttpelanggarans', $cttpelanggarans)
            ->with('ctt1', $ctt1);
    }

    /**
     * Show the form for creating a new Cttpelanggaran.
     *
     * @return Response
     */
    public function create()
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $tps = \App\Models\Tp::pluck('tipe_pelanggaran','id');
        return view('cttpelanggarans.create')->with(compact('santris'))->with(compact('tps'));
    }

    /**
     * Store a newly created Cttpelanggaran in storage.
     *
     * @param CreateCttpelanggaranRequest $request
     *
     * @return Response
     */
    public function store(CreateCttpelanggaranRequest $request)
    {
        $input = $request->all();

        $cttpelanggaran = $this->cttpelanggaranRepository->create($input);
        
        Flash::success('Catatan Pelanggaran Sukses Tersimpan.');

        return redirect(route('cttpelanggarans.index'));
    }

    /**
     * Display the specified Cttpelanggaran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cttpelanggaran = $this->cttpelanggaranRepository->find($id);

        if (empty($cttpelanggaran)) {
            Flash::error('Cttpelanggaran tidak ditemukan');

            return redirect(route('cttpelanggarans.index'));
        }

        return view('cttpelanggarans.show')->with('cttpelanggaran', $cttpelanggaran);
    }

    /**
     * Show the form for editing the specified Cttpelanggaran.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $santris = \App\Models\Santri::pluck('nm_santri','id');
        $tps = \App\Models\Tp::pluck('tipe_pelanggaran','id');
        $cttpelanggaran = $this->cttpelanggaranRepository->find($id);

        if (empty($cttpelanggaran)) {
            Flash::error('Cttpelanggaran tidak ditemukan');

            return redirect(route('cttpelanggarans.index'));
        }

        return view('cttpelanggarans.edit')->with('cttpelanggaran', $cttpelanggaran)->with(compact('santris'))->with(compact('tps'));
    }

    /**
     * Update the specified Cttpelanggaran in storage.
     *
     * @param int $id
     * @param UpdateCttpelanggaranRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $cttpelanggaran = $this->cttpelanggaranRepository->find($id);

        if (empty($cttpelanggaran)) {
            Flash::error('Cttpelanggaran tidak ditemukan');

            return redirect(route('cttpelanggarans.index'));
        }

        $cttpelanggaran = $this->cttpelanggaranRepository->update($request->all(), $id);

        Flash::success('Catatan Pelanggaran Sukses Terupdate.');

        return redirect(route('cttpelanggarans.index'));
    }

    /**
     * Remove the specified Cttpelanggaran from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cttpelanggaran = $this->cttpelanggaranRepository->find($id);

        if (empty($cttpelanggaran)) {
            Flash::error('Cttpelanggaran tidak ditemukan');

            return redirect(route('cttpelanggarans.index'));
        }

        $this->cttpelanggaranRepository->delete($id);

        Flash::success('Catatan Pelanggaran Sukses Terhapus.');

        return redirect(route('cttpelanggarans.index'));
    }
    public function tatibPdf(){
        $filename = '\file\tatib.pdf';
        $path = public_path($filename);
        return Response::make(file_get_contents($path), 200, [

            'Content-Type'
        => 'application/pdf',
        
           
        'Content-Disposition' => 'inline; filename="'.$filename.'"'
        
        ]);
        // $pdf = \PDF::loadView(public_path().'\tatib.pdf');

        // return $pdf->stream('tatib.pdf');
    }
}
