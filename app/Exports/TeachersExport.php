<?php

namespace App\Exports;

use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Nette\Schema\Schema;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TeachersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teacher::all();
    }

    public function headings(): array{
        $columns = \Illuminate\Support\Facades\Schema::getColumnListing('teachers');
        return $columns;
    }

//    public function headings(): array
//    {
//        return [
//            'id',
//            'name',
//            'email',
//            'subject_id',
//            'created_at',
//            'updated_at',
//        ];
//    }
}
