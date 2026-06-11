<?php

namespace App\Services;

use Illuminate\Support\Facades\App;

class TranslationService
{
    /**
     * Translates a string based on the current locale.
     * Note: In a production app, this would integrate with a translation API (like DeepL or Google Translate).
     */
    public function translate(string $text): string
    {
        $locale = App::getLocale();

        if ($locale === 'en') {
            return $text;
        }

        // Demo mapping for demonstration purposes
        if ($locale === 'id') {
            return "[Terjemahan ID]: " . $text;
        }
        
        if ($locale === 'ja') {
            return "[翻訳 JA]: " . $text;
        }

        return $text;
    }
}
