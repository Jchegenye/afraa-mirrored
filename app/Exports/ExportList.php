<?php

namespace Afraa\Exports;

use Afraa\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Afraa\Legibra\ReusableCodes\Dashboard\RetrieveModels;


class ExportList implements FromCollection, WithHeadings
{

    use RetrieveModels;

    public function collection()
    {
        
        return User::all();
        // $user_type = "delegate";
        // return $this->RetrieveDelegates();
    }
    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Created At',
            'Updated At',
        ];
    }
}