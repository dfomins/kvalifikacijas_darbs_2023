<?php

namespace App\Exports\WorkShowExport;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use App\Models\Work;

use Carbon\Carbon;

class UserWorkShowExport implements FromQuery, WithHeadings, WithMapping, WithTitle, WithColumnWidths, WithStyles
{
    use Exportable;

    public function __construct($userobj, $qstart_date, $qend_date, $user, $worksum)
    {
        $this->userobj = $userobj;
        $this->qstart_date = $qstart_date;
        $this->qend_date = $qend_date;
        $this->user = $user;
        $this->worksum = $worksum;
        $this->date = Carbon::parse($qstart_date)->format('d/m/Y'). ' - ' .Carbon::parse($qend_date)->format('d/m/Y');
    }

    public function headings(): array
    {
        return [
            [
                'Vārds, uzvārds',
            ],
            [
                $this->user->fname,
                $this->user->lname,
            ],
            [],
            [
                'Darba objekti',
            ],
            [
                implode(',', $this->userobj),
            ],
            [],
            [
                'Periods'
            ],
            [
                $this->date,
            ],
            [],
            [
                'Stundu kopsumma',
            ],
            [
                $this->worksum,
            ],
            [],
            [
                'Atskaites ID',
                'Datums',
                'Stundas',
            ]
        ];
    }

    public function map($work): array
    {
        return [
            [
                $work->work_id,
                $work->date,
                $work->hours,
            ],
        ];
    }

    public function title(): string
    {
        return $this->date;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25,
            'B' => 15,
            'C' => 15,       
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            'A14:C1000' => ['font' => ['italic' => true]],
            '2' => ['font' => ['italic' => true]],
            'A4' => ['font' => ['bold' => true, 'size' => 12]],
            'A5' => ['font' => ['italic' => true]],
            'A7' => ['font' => ['bold' => true, 'size' => 12]],
            'A8' => ['font' => ['italic' => true]],
            '10' => ['font' => ['bold' => true, 'size' => 12]],
            'A11' => ['font' => ['italic' => true]],
            '13' => ['font' => ['bold' => true, 'size' => 12]],
            'A1' => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }

    public function query()
    {
        return Work::orderBy('date', 'asc')->whereBetween('date', [$this->qstart_date, $this->qend_date])->where('user_id', $this->user->id);
    }
}
