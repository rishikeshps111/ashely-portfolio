<?php

namespace App\Filament\Resources\ContactMessages\Pages;

use Filament\Actions\CreateAction;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Resources\Pages\ManageRecords;
use App\Filament\Resources\ContactMessages\ContactMessageResource;
use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Builder;

class ManageContactMessages extends ManageRecords
{
    protected static string $resource = ContactMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()->badge(ContactMessage::count()),
            'Unread' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_read', false))
                ->badge(ContactMessage::where('is_read', false)->count()),
            'Read' => Tab::make()
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_read', true))
                ->badge(ContactMessage::where('is_read', true)->count()),
        ];
    }
}
