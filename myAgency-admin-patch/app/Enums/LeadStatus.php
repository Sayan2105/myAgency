<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum LeadStatus: string implements HasLabel, HasColor
{
    case New = 'new';
    case Contacted = 'contacted';
    case Replied = 'replied';
    case Meeting = 'meeting';
    case Won = 'won';
    case Lost = 'lost';

    public function getLabel(): string
    {
        return match ($this) {
            self::Meeting => 'Meeting booked',
            default => ucfirst($this->value),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::New => 'gray',
            self::Contacted => 'info',
            self::Replied => 'warning',
            self::Meeting => 'primary',
            self::Won => 'success',
            self::Lost => 'danger',
        };
    }
}
