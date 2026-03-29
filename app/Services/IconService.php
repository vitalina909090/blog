<?php

namespace App\Services;

class IconService
{
    public function getForType(string $type): string
    {
        return match($type) {
            'success' => 'bi-check-circle-fill',
            'danger' => 'bi-radioactive-fill',
            'warning' => 'bi-exclamation-circle-fill',
            default => 'bi-info-circle-fill',
        };
    }

    public function getForFile(string $extension): string
    {
        return match($extension) {
            'pdf' => 'bi-file-pdf-fill',
            'doc', 'docx' => 'bi-file-word-fill',
            'jpg', 'jpeg', 'png' => 'bi-file-image-fill',
            default => 'bi-info-circle-fill',
        };
    }
}
