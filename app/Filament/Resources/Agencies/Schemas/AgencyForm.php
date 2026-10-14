<?php

namespace App\Filament\Resources\Agencies\Schemas;

use App\Enums\LeadStatus;
use App\Enums\Priority;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AgencyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('company_type')
                    ->required(),
                TextInput::make('instagram_url')
                    ->url()
                    ->default(null),
                TextInput::make('website_url')
                    ->url()
                    ->default(null),
                TextInput::make('location')
                    ->default(null),
                TextInput::make('specialization')
                    ->default(null),
                TextInput::make('followers')
                    ->numeric()
                    ->default(null),
                TextInput::make('website_quality')
                    ->default(null),
                Select::make('priority')
                    ->options(Priority::class)
                    ->default('medium')
                    ->required(),
                Select::make('status')
                    ->options(LeadStatus::class)
                    ->default('new')
                    ->required(),
                DateTimePicker::make('last_contacted_at'),
                DateTimePicker::make('follow_up_at'),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
