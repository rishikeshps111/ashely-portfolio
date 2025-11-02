<?php

namespace App\Filament\Resources\Testimonials;

use BackedEnum;
use Filament\Tables\Table;
use App\Models\Testimonial;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Resource;
use Filament\Actions\DeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Forms\Components\Radio;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\Testimonials\Pages\ManageTestimonials;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    protected static ?string $recordTitleAttribute = 'Testimonial';
    protected static ?int $navigationSort = 3;



    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('business_name')
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull()
                    ->rows(5),
                FileUpload::make('image')
                    ->disk('public')
                    ->image()
                    ->imageEditor(),
                Radio::make('is_active')
                    ->label('Status')
                    ->inline()
                    ->inlineLabel(false)
                    ->default(true)
                    ->options([
                        true => 'Active',
                        false => 'Inactive'
                    ]),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('business_name'),
                TextEntry::make('message')->columnSpan(12),
                ImageEntry::make('image_url')
                    ->label('Image'),
                IconEntry::make('is_active')
                    ->boolean()->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Testimonial')
            ->columns([
                ImageColumn::make('image_url')
                    ->label('Image')
                    ->rounded(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('business_name')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Status'),
            ])->defaultSort('id', 'desc')
            ->filters([
                SelectFilter::make('is_active')
                    ->options([
                        '1' => 'Active',
                        '0' => 'InActive'
                    ])->label('Status')
            ], layout: FiltersLayout::Modal)
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageTestimonials::route('/'),
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
