<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use App\Enums\LeadStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('contact')->required(),
                Textarea::make('message')->required()->columnSpanFull(),
                Select::make('status')
                    ->options(LeadStatus::class)
                    ->default(LeadStatus::New)
                    ->required(),
                TextInput::make('source')->default('website'),
                Textarea::make('notes')->columnSpanFull(),
            ]);
    }
}