<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ErrorFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tujuan' => 'required',
            'pegawai'=> 'required',
            'jabatan'=> 'required',
            'tujuan_id'=> 'required',
            'kegiatan'=> 'required',
            'tgl_tugas'=> 'required',
        ];
    }

    public function messages(){
        return [
            'tujuan.required' => 'Tujuan Tidak Boleh Kosong',
            'pegawai.required'=> 'Nama Pegawai Tidak Boleh Kosong',
            'jabatan.required'=> 'Jabatan Tidak Boleh Kosong',
            'tujuan_id.required'=> 'Tujuan Tidak Boleh Kosong',
            'kegiatan.required'=> 'Kegiatan Tidak Boleh Kosong',
            'tgl_tugas.required'=> 'Tanggal Tugas Tidak Boleh Kosong',
        ];
    }
}
