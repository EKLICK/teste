<?php

namespace App\Exports;

use App\Audits;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Audits::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'user_type',
            'user_id',
            'event',
            'auditable_id',
            'auditable_type',
            'old_values',
            'new_values',
            'url',
            'ip_address',
            'user_agent',
            'tags',
            'created_at',
            'updated_at',
        ];
    }
}
