<?php

namespace App\Exports;

use App\Models\InfoRequests;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class InfoRequestsExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return InfoRequests::select('type', 'name', 'area', 'budget', 'time_to_call', 'phone', 'notes', 'created_at')->get();
    }

    /**
    * @var InfoRequests $infoRequest
    */
    public function map($infoRequest): array
    {
        return [
            $infoRequest->type,
            $infoRequest->name,
            $infoRequest->area,
            $infoRequest->budget,
            $infoRequest->time_to_call,
            $infoRequest->phone,
            $infoRequest->notes,
            $infoRequest->created_at->format('d-m-Y')
        ];
    }
}
