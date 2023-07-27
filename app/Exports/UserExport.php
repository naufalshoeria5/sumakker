<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;

class UserExport implements FromQuery, ShouldAutoSize, WithMapping, WithHeadings, WithColumnFormatting, WithEvents
{
    /**
     * Get data by chunks.
     *
     * @return $user
     */
    public function query()
    {
        $user = User::query()
            ->orderBy('name', 'asc');

        return $user;
    }

    /**
     * Create heading.
     */
    public function headings(): array
    {
        return [
            'Kode User',
            'Nama Lengkap',
            'Email',
            'Username',
        ];
    }

    /**
     * Mapping data.
     */
    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->username
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

                $event->sheet->getStyle('A1:D1')->applyFromArray($style);
            },
        ];
    }
}
