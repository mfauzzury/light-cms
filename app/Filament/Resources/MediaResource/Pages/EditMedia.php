<?php

namespace App\Filament\Resources\MediaResource\Pages;

use App\Filament\Resources\MediaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedia extends EditRecord
{
    protected static string $resource = MediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load custom properties into form fields
        $data['custom_properties.alt'] = $this->record->getCustomProperty('alt');
        $data['custom_properties.caption'] = $this->record->getCustomProperty('caption');

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Save alt text and caption as custom properties
        $customProperties = $this->record->custom_properties ?? [];

        if (isset($data['custom_properties.alt'])) {
            $customProperties['alt'] = $data['custom_properties.alt'];
            unset($data['custom_properties.alt']);
        }

        if (isset($data['custom_properties.caption'])) {
            $customProperties['caption'] = $data['custom_properties.caption'];
            unset($data['custom_properties.caption']);
        }

        $data['custom_properties'] = $customProperties;

        return $data;
    }
}
