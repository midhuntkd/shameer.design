<?php

use CodeIgniter\HTTP\Files\UploadedFile;

if (!function_exists('normalizeUploadSubFolder')) {
    function normalizeUploadSubFolder(string $subFolder = ''): string
    {
        return trim(str_replace('\\', '/', $subFolder), '/');
    }
}

if (!function_exists('getPublicUploadBasePath')) {
    function getPublicUploadBasePath(): string
    {
        $documentRoot = isset($_SERVER['DOCUMENT_ROOT']) ? trim((string) $_SERVER['DOCUMENT_ROOT']) : '';

        if ($documentRoot !== '') {
            return rtrim(str_replace('\\', '/', $documentRoot), '/') . '/uploads/';
        }

        // Fallback for environments where DOCUMENT_ROOT is unavailable.
        // Shared hosting should primarily use DOCUMENT_ROOT/public_html.
        return rtrim(str_replace('\\', '/', ROOTPATH . 'public'), '/') . '/uploads/';
    }
}

if (!function_exists('ensureUploadDirectory')) {
    function ensureUploadDirectory(string $subFolder = ''): string
    {
        $normalizedSubFolder = normalizeUploadSubFolder($subFolder);
        $targetPath = getPublicUploadBasePath();

        if ($normalizedSubFolder !== '') {
            $targetPath .= $normalizedSubFolder . '/';
        }

        if (!is_dir($targetPath)) {
            mkdir($targetPath, 0755, true);
        }

        return $targetPath;
    }
}

if (!function_exists('moveUploadedFile')) {
    function moveUploadedFile(UploadedFile $file, string $subFolder = ''): ?string
    {
        if (!$file->isValid() || $file->hasMoved()) {
            return null;
        }

        $normalizedSubFolder = normalizeUploadSubFolder($subFolder);
        $targetPath = ensureUploadDirectory($normalizedSubFolder);
        $newName = $file->getRandomName();
        $file->move($targetPath, $newName);

        $relativePath = 'uploads/';
        if ($normalizedSubFolder !== '') {
            $relativePath .= $normalizedSubFolder . '/';
        }

        return $relativePath . $newName;
    }
}

if (!function_exists('getAbsoluteUploadPath')) {
    function getAbsoluteUploadPath(string $relativePath): ?string
    {
        $normalizedPath = ltrim(str_replace('\\', '/', trim($relativePath)), '/');
        if ($normalizedPath === '') {
            return null;
        }

        if (strpos($normalizedPath, 'uploads/') !== 0) {
            return null;
        }

        $suffix = substr($normalizedPath, strlen('uploads/'));

        return getPublicUploadBasePath() . $suffix;
    }
}

if (!function_exists('removeUploadedFile')) {
    function removeUploadedFile(?string $relativePath): void
    {
        if (empty($relativePath)) {
            return;
        }

        $absolutePath = getAbsoluteUploadPath($relativePath);
        if ($absolutePath !== null && is_file($absolutePath)) {
            @unlink($absolutePath);
        }
    }
}
