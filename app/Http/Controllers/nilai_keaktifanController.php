<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createnilai_keaktifanRequest;
use App\Http\Requests\Updatenilai_keaktifanRequest;
use App\Repositories\nilai_keaktifanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Auth;
use Response;

class nilai_keaktifanController extends AppBaseController
{
    /** @var  nilai_keaktifanRepository */
    private $nilaiKeaktifanRepository;

    public function __construct(nilai_keaktifanRepository $nilaiKeaktifanRepo)
    {
        $this->nilaiKeaktifanRepository = $nilaiKeaktifanRepo;
    }

    /**
     * Display a listing of the nilai_keaktifan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nilaiKeaktifans = $this->nilaiKeaktifanRepository->all();
        $wakelKeaktifan = DB::table('gurus')
        ->join('kelas','gurus.id','=','kelas.guru_id')
        ->join('users','gurus.name','=','users.name')
        ->select('gurus.id')
        ->where('gurus.name','=',Auth::user()->name)
        ->value('gurus.id');

        return view('nilai_keaktifans.index')
            ->with('nilaiKeaktifans', $nilaiKeaktifans)
            ->with('wakelKeaktifan',$wakelKeaktifan);
    }

    /**
     * Show the form for creating a new nilai_keaktifan.
     *
     * @return Response
     */
    public function create()
    {
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        $semesters = \App\Models\Semester::pluck('semester','id');
        return view('nilai_keaktifans.create')->with(compact('kelas','semesters'));
    }

    /**
     * Store a newly created nilai_keaktifan in storage.
     *
     * @param Createnilai_keaktifanRequest $request
     *
     * @return Response
     */
    public function store(Createnilai_keaktifanRequest $request)
    {
        $input = $request->all();

        $nilaiKeaktifan = $this->nilaiKeaktifanRepository->create($input);

        Flash::success('Nilai Keaktifan sukses tersimpan.');

        return redirect(route('nilaiKeaktifans.index'));
    }

    /**
     * Display the specified nilai_keaktifan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nilaiKeaktifan = $this->nilaiKeaktifanRepository->findWithDetail($id);

        if (empty($nilaiKeaktifan)) {
            Flash::error('Nilai Keaktifan tidak ditemukan');

            return redirect(route('nilaiKeaktifans.index'));
        }

        return view('nilai_keaktifans.show')->with('nilaiKeaktifan', $nilaiKeaktifan);
    }

    /**
     * Show the form for editing the specified nilai_keaktifan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kelas = \App\Models\Kelas::pluck('nm_kelas','id');
        $semesters = \App\Models\Semester::pluck('semester','id');
        $nilaiKeaktifan = $this->nilaiKeaktifanRepository->find($id);

        if (empty($nilaiKeaktifan)) {
            Flash::error('Nilai Keaktifan tidak ditemukan');

            return redirect(route('nilaiKeaktifans.index'));
        }

        return view('nilai_keaktifans.edit')->with('nilaiKeaktifan', $nilaiKeaktifan)->with(compact('kelas','semesters'));
    }

    /**
     * Update the specified nilai_keaktifan in storage.
     *
     * @param int $id
     * @param Updatenilai_keaktifanRequest $request
     *
     * @return Response
     */
    public function update($id, Updatenilai_keaktifanRequest $request)
    {
        $nilaiKeaktifan = $this->nilaiKeaktifanRepository->find($id);

        if (empty($nilaiKeaktifan)) {
            Flash::error('Nilai Keaktifan tidak ditemukan');

            return redirect(route('nilaiKeaktifans.index'));
        }

        $nilaiKeaktifan = $this->nilaiKeaktifanRepository->update($request->all(), $id);

        Flash::success('Nilai Keaktifan sukses terupdate.');

        return redirect(route('nilaiKeaktifans.index'));
    }

    /**
     * Remove the specified nilai_keaktifan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nilaiKeaktifan = $this->nilaiKeaktifanRepository->find($id);

        if (empty($nilaiKeaktifan)) {
            Flash::error('Nilai Keaktifan tidak ditemukan');

            return redirect(route('nilaiKeaktifans.index'));
        }

        $this->nilaiKeaktifanRepository->delete($id);

        Flash::success('Nilai Keaktifan sukses terhapus.');

        return redirect(route('nilaiKeaktifans.index'));
    }
}
