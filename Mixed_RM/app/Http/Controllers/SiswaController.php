<?php

namespace App\Http\Controllers;

use App\Handler\SiswaHandler;
use App\Repositories\SiswaRepository;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

class SiswaController extends Controller
{
    public function __construct(
        protected SiswaHandler $handler,
        protected SiswaRepository $repo
    ){}
    public function index(){
        return $this->handler->index();
    }
    public function show(string $id){
        return $this->handler->show($id);
    }
    public function store(Request $request){
        try{
            $siswa = $request->validate([
                'nama' => 'required',
                'kelas' => 'required',
                'nilai' => 'required|min:0|max:100'
            ]);
            $this->handler->store($siswa);
            return response()->json([
                'message' => 'data telah ditambahkan',
                'data' => [
                    'nama' => $siswa['nama'],
                'kelas' => $siswa['kelas']
                ]
            ]);
        }
        catch(ValidationException $e){
            throw $e;
        }
    }
    public function update(){}
    public function destroy(){}
}
