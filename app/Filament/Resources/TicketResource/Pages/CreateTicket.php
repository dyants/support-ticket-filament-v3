<?php

namespace App\Filament\Resources\TicketResource\Pages;

use App\Filament\Resources\TicketResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // error merah pada id disebabkan oleh laravel versi terbaru yang mengharuskan penulisan auth()->id() bukan auth()->user()->id(). tidak ada perubahan fungsi
        $data['assigned_by'] = auth()->id();

        return $data;
    }
}
