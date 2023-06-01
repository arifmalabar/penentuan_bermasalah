<?php

namespace App\ServiceData;
use App\Http\Requests\StorePelanggaranRequest;
use App\Http\Requests\UpdatePelanggaranRequest;
use App\Repos\PelanggaranRepos;
use Illuminate\Support\Facades\Auth;

class PelanggaranService
{
    private PelanggaranRepos $pelanggaranRepos;
    public function __construct($model)
    {
        $this->pelanggaranRepos = new PelanggaranRepos($model);
    }
    public function handlerGetDataPelanggaran($nisn)
    {
        return $this->pelanggaranRepos->getAllData($nisn);
    }
    public function handlerInsertDataPelanggaran(StorePelanggaranRequest $request)
    {
        $data = $request->validated();
        $data['NIP'] = Auth::guard('guru')->user()->NIP;

        $data['tanggal_pelanggaran'] = date('Y-m-d h:i:s');
        $this->pelanggaranRepos->simpanData($data);
    }
    public function handlerUpdateDataPelanggaran(UpdatePelanggaranRequest $request)
    {

    }
    public function handlerDeletePelanggaran($id)
    {

    }
}
