<?php

namespace App\Exports;

use App\Models\Letter;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class LetterExport implements FromQuery, ShouldAutoSize, WithMapping, WithHeadings, WithColumnFormatting, WithEvents
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
    /**
     * Get data by chunks.
     *
     * @return $letter
     */
    public function query()
    {
        $letter = Letter::query()
            ->filter($this->request)
            ->orderBy('date', 'asc');

        return $letter;
    }

    /**
     * Create heading.
     */
    public function headings(): array
    {
        return [
            'Kode Surat',
            'Kode Agenda',
            'Tipe',
            'Tanggal',
            'Dari',
            'Perihal',
            'Unit / Staff',
            'Jenis Surat',
            'Url File'
        ];
    }

    /**
     * Mapping data.
     */
    public function map($letter): array
    {
        return [
            $letter->code,
            $letter->code_agenda,
            $letter->status,
            Carbon::parse($letter->date)->format('d F Y'),
            $letter->from,
            $letter->regarding,
            $letter->unit ? $letter->unit->name : '-',
            $letter->letterType ? $letter->letterType->name : '-',
            $letter->getFirstMediaUrl('letter')
        ];
    }

    /**
     * Set format each column.
     */
    public function columnFormats(): array
    {
        return [];
    }

    /**
     * Add style.
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $style = [
                    'font' => [
                        'bold' => true,
                    ],

                    'alignment' => [
                        'vertical' => 'center',
                        'horizontal' => 'center',
                    ],
                ];

                $event->sheet->getStyle('A1:I1')->applyFromArray($style);
            },
        ];
    }
}
