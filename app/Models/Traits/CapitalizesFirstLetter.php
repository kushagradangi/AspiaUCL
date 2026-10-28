<?php

namespace App\Models\Traits;

trait CapitalizesFirstLetter
{
    /**
     * Intercept property access to format strings dynamically without touching the database.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (!is_string($value) || $value === '') {
            return $value;
        }

        if ($this->shouldSkipAttributeCapitalization($key)) {
            return $value;
        }

        return $this->formatFirstLetterOfFirstWord($value);
    }

    /**
     * Ensure array and JSON representations (e.g. toArray, toJson, API responses)
     * also reflect the formatted values dynamically without altering database records.
     *
     * @return array
     */
    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();

        foreach ($attributes as $key => $value) {
            if (is_string($value) && $value !== '' && !$this->shouldSkipAttributeCapitalization($key)) {
                $attributes[$key] = $this->formatFirstLetterOfFirstWord($value);
            }
        }

        return $attributes;
    }

    /**
     * Check if the attribute should be skipped from capitalization.
     */
    protected function shouldSkipAttributeCapitalization(string $key): bool
    {
        static $skippedKeys = [
            'id',
            'control_id',
            'domain_id',
            'framework_id',
            'requirement_id',
            'domain_code',
            'framework_code',
            'slug',
            'version',
            'display_order',
            'official_source_url',
            'url',
            'email',
            'created_at',
            'updated_at',
            'deleted_at',
            'remember_token',
            'password',
        ];

        if (in_array($key, $skippedKeys, true)) {
            return true;
        }

        if (str_ends_with($key, '_id') || str_ends_with($key, '_url') || str_ends_with($key, '_code')) {
            return true;
        }

        return false;
    }

    /**
     * Format the string so that:
     * 1. The first letter of the first word is capitalized.
     * 2. The second word and other words remain untouched.
     * 3. For any cell containing multiple data items separated by comma (,) or semicolon (;),
     *    the exact same logic is applied to each item.
     */
    public function formatFirstLetterOfFirstWord(string $value): string
    {
        if (trim($value) === '') {
            return $value;
        }

        // Do not alter URLs or email addresses
        if (preg_match('#^(https?://|mailto:|ftp://)#i', trim($value))) {
            return $value;
        }

        // Delimiters:
        // - Semicolons (;)
        // - Commas (,)
        // - Newlines (\r\n or \n)
        $pattern = '/([;,]|\r\n|\n)/u';

        $parts = preg_split($pattern, $value, -1, PREG_SPLIT_DELIM_CAPTURE);

        if ($parts === false || count($parts) <= 1) {
            return $this->capitalizeFirstLetterSegment($value);
        }

        $result = '';
        foreach ($parts as $index => $part) {
            // Odd indexes are the captured delimiters
            if ($index % 2 === 1) {
                $result .= $part;
            } else {
                // Even indexes are the text segments
                $result .= $this->capitalizeFirstLetterSegment($part);
            }
        }

        return $result;
    }

    /**
     * Capitalize only the first letter (\p{L}) of the first word in a segment,
     * leaving leading whitespace/symbols, second words, and all subsequent text untouched.
     */
    protected function capitalizeFirstLetterSegment(string $segment): string
    {
        return preg_replace_callback('/^\P{L}*(\p{L})/u', function (array $matches) {
            return mb_strtoupper($matches[0], 'UTF-8');
        }, $segment);
    }
}
