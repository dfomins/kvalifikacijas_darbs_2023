<?php

namespace App\Exports\WorkShowExport;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\Work;

class AdminWorkShowExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct($qstart_date, $qend_date, $user_filter, $worksum)
    {
        $this->qstart_date = $qstart_date;
        $this->qend_date = $qend_date;
        $this->user_filter = $user_filter;
        $this->worksum = $worksum;
    }

    public function map($work): array
    {
        return [
            [
                $work->work_id,
                $work->users->fname,
                $work->users->lname,
                $work->date,
                $work->hours,
            ],
        ];
    }

    public function headings(): array
    {
        return [
            'Darba ID',
            'Vārds',
            'Uzvārds',
            'Datums',
            'Stundas',
        ];
    }

    public function query()
    {
        return Work::orderBy('date', 'asc')->whereBetween('date', [$this->qstart_date, $this->qend_date])->where('user_id', $this->user_filter);
    }
}
