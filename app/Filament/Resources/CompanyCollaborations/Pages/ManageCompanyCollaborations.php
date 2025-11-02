<?php

namespace App\Filament\Resources\CompanyCollaborations\Pages;

use App\Filament\Resources\CompanyCollaborations\CompanyCollaborationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCompanyCollaborations extends ManageRecords
{
    protected static string $resource = CompanyCollaborationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
