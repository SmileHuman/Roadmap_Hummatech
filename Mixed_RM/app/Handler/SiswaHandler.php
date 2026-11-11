<?php
namespace App\Handler;

use App\Service\SiswaService;

class SiswaHandler{
    public function __construct(
        protected SiswaService $service
    ){}
    public function index(){
        return $this->service->index();
        
    }
    public function show(string $id){
        return $this->service->show($id);
    }
    public function store(array $siswa){
        return $this->service->store($siswa);
    }
    public function update(){}
    public function destroy(){}
}