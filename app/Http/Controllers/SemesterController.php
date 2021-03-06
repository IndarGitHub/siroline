<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Repositories\SemesterRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Response;

class SemesterController extends AppBaseController
{
    /** @var  SemesterRepository */
    private $semesterRepository;

    public function __construct(SemesterRepository $semesterRepo)
    {
        $this->semesterRepository = $semesterRepo;
    }

    /**
     * Display a listing of the Semester.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $semesters = $this->semesterRepository->paginate(20);

        return view('semesters.index')
            ->with('semesters', $semesters);
    }
    public function search5(Request $request)
    {
        $search5 = $request->get('search5');
        
        $semesters = \App\Models\Semester::where('semester','like','%'.$search5.'%')
                                        ->orWhere('thn_ajaran','like','%'.$search5.'%')
                                        ->paginate();
        return view('semesters.index')
        ->with('semesters', $semesters);
    }
    /**
     * Show the form for creating a new Semester.
     *
     * @return Response
     */
    public function create()
    {
        return view('semesters.create');
    }

    /**
     * Store a newly created Semester in storage.
     *
     * @param CreateSemesterRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $semester = $this->semesterRepository->create($input);

        Flash::success('Semester sukses tersimpan.');

        return redirect(route('semesters.index'));
    }

    /**
     * Display the specified Semester.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            // Flash::error('Semester tidak ditemukan');

            return redirect(route('semesters.index'));
        }

        return view('semesters.show')->with('semester', $semester);
    }

    /**
     * Show the form for editing the specified Semester.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            // Flash::error('Semester tidak ditemukan');

            return redirect(route('semesters.index'));
        }

        return view('semesters.edit')->with('semester', $semester);
    }

    /**
     * Update the specified Semester in storage.
     *
     * @param int $id
     * @param UpdateSemesterRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSemesterRequest $request)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            // Flash::error('Semester tidak ditemukan');

            return redirect(route('semesters.index'));
        }

        $semester = $this->semesterRepository->update($request->all(), $id);

        Flash::success('Semester sukses tersimpan.');

        return redirect(route('semesters.index'));
    }

    /**
     * Remove the specified Semester from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $semester = $this->semesterRepository->find($id);

        if (empty($semester)) {
            Flash::error('Semester tidak ditemukan');

            return redirect(route('semesters.index'));
        }

        $this->semesterRepository->delete($id);

        Flash::success('Semester sukses terhapus.');

        return redirect(route('semesters.index'));
    }
    public function status($id){

        // $hasActive = \DB::table('semesters')->where('status', 1)->first();
        // if($hasActive) {
        //     Flash::error('Ada semester yang aktif.');
        //     return back();
        // }
       
        // $data = \DB::table('semesters')->where('id',$id)->update([
        //     'status' => 1
        // ]);
        $data = \DB::table('semesters')->where('id',$id)->first();
        $status_sekarang = $data->status;

        if($status_sekarang == 1) {
            \DB::table('semesters')->where('id',$id)->update([
                'status'=> 0
            ]);
        }else{
            \DB::table('semesters')->where('id',$id)->update([
                'status'=> 1
            ]);
        }
        
        Flash::success('sukses','Status berhasil diubah');
        // dd($status_sekarang);
        
        return redirect('semesters/status');
        // dd($data);
    }
}
