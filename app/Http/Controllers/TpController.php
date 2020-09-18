<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTpRequest;
use App\Http\Requests\UpdateTpRequest;
use App\Repositories\TpRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TpController extends AppBaseController
{
    /** @var  TpRepository */
    private $tpRepository;

    public function __construct(TpRepository $tpRepo)
    {
        $this->tpRepository = $tpRepo;
    }

    /**
     * Display a listing of the Tp.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tps = $this->tpRepository->paginate(20);

        return view('tps.index')
            ->with('tps', $tps);
    }
    public function search6(Request $request)
    {
        $search6 = $request->get('search6');
        
        $tps = \App\Models\Tp::where('kode_tp','like','%'.$search6.'%')
        ->orWhere('tipe_pelanggaran','like','%'.$search6.'%')
        ->orWhere('sanksi','like','%'.$search6.'%')
        ->paginate();
        return view('tps.index')
        ->with('tps', $tps);
    }
    /**
     * Show the form for creating a new Tp.
     *
     * @return Response
     */
    public function create()
    {
        return view('tps.create');
    }

    /**
     * Store a newly created Tp in storage.
     *
     * @param CreateTpRequest $request
     *
     * @return Response
     */
    public function store(CreateTpRequest $request)
    {
        $input = $request->all();

        $tp = $this->tpRepository->create($input);

        Flash::success('Tp sukses tersimpan.');

        return redirect(route('tps.index'));
    }

    /**
     * Display the specified Tp.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tp = $this->tpRepository->find($id);

        if (empty($tp)) {
            Flash::error('Tp tidak ditemukan');

            return redirect(route('tps.index'));
        }

        return view('tps.show')->with('tp', $tp);
    }

    /**
     * Show the form for editing the specified Tp.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tp = $this->tpRepository->find($id);

        if (empty($tp)) {
            Flash::error('Tp tidak ditemukan');

            return redirect(route('tps.index'));
        }

        return view('tps.edit')->with('tp', $tp);
    }

    /**
     * Update the specified Tp in storage.
     *
     * @param int $id
     * @param UpdateTpRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $tp = $this->tpRepository->find($id);

        if (empty($tp)) {
            Flash::error('Tp tidak ditemukan');

            return redirect(route('tps.index'));
        }

        $tp = $this->tpRepository->update($request->all(), $id);

        Flash::success('Tp sukses terupdate.');

        return redirect(route('tps.index'));
    }

    /**
     * Remove the specified Tp from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tp = $this->tpRepository->find($id);

        if (empty($tp)) {
            Flash::error('Tp tidak ditemukan');

            return redirect(route('tps.index'));
        }

        $this->tpRepository->delete($id);

        Flash::success('Tp sukses terhapus.');

        return redirect(route('tps.index'));
    }
}
