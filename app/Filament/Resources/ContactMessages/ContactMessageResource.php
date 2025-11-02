<?php

namespace App\Filament\Resources\ContactMessages;

use BackedEnum;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use App\Models\ContactMessage;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components\Toggle;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContactMessages\Pages\ManageContactMessages;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $recordTitleAttribute = 'ContactMessage';
    protected static ?int $navigationSort = 6;

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('message')->columnSpan(12),
                IconEntry::make('is_read')
                    ->trueColor('info')
                    ->falseColor('warning'),
                TextEntry::make('created_at')->label('Created At')->dateTime('d M Y, h:i A')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('ContactMessage')
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                IconColumn::make('is_read')
                    ->boolean(),
            ])->defaultSort('id', 'desc')
            ->recordActions([
                ViewAction::make(),
                Action::make('change_status')
                    ->label('Mark as read')
                    ->icon('heroicon-m-envelope')
                    ->color('primary')
                    ->action(function (ContactMessage $record) {
                        $record->update([
                            'is_read' => true,
                        ]);
                        Notification::make()
                            ->title('Marked as Read')
                            ->body("Enquiry from {$record->name} has been marked as read.")
                            ->success()
                            ->send();
                    })
                    ->visible(
                        fn(ContactMessage $record) =>
                        !$record->is_read
                    )
                    ->requiresConfirmation(),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageContactMessages::route('/'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
