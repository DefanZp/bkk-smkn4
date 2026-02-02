<?php

namespace App\Services;

use App\Models\Application;
use App\Exports\ApplicationsExport;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;

class ApplicationExportService
{
    public function exportToZip(Collection $applications, string $vacancyName, string $companyName): string
    {
        // 1. Buat folder temporary
        $timestamp = now()->format('YmdHis');
        $slugVacancy = str()->slug($vacancyName) ?: 'lowongan';
        $slugCompany = str()->slug($companyName) ?: 'perusahaan';
        
        $folderName = 'exports' . DIRECTORY_SEPARATOR . $timestamp . '_' . $slugVacancy;
        $basePath = storage_path('app' . DIRECTORY_SEPARATOR . $folderName);
        $dokumenPath = $basePath . DIRECTORY_SEPARATOR . 'Dokumen';
        
        // Buat direktori
        if (!is_dir($basePath)) {
            mkdir($basePath, 0755, true);
        }
        if (!is_dir($dokumenPath)) {
            mkdir($dokumenPath, 0755, true);
        }

        // 2. Generate Excel (menggunakan forward slash untuk Storage facade)
        $excelStoragePath = 'exports/' . $timestamp . '_' . $slugVacancy . '/Rekap_Kandidat.xlsx';
        Excel::store(new ApplicationsExport($applications), $excelStoragePath, 'local');

        // 3. Copy CV & Sertifikat
        foreach ($applications as $app) {
            $user = $app->user;
            if (!$user) continue;

            $safeName = str()->slug($user->nisn . '_' . $user->full_name) ?: 'user';

            // Copy CV
            if (!empty($user->CVuser)) {
                $cvSourcePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $user->CVuser));
                if (file_exists($cvSourcePath)) {
                    $ext = pathinfo($user->CVuser, PATHINFO_EXTENSION) ?: 'pdf';
                    $cvDestPath = $dokumenPath . DIRECTORY_SEPARATOR . 'CV_' . $safeName . '.' . $ext;
                    copy($cvSourcePath, $cvDestPath);
                }
            }

            // Copy Sertifikat
            if (!empty($user->certificate)) {
                $certSourcePath = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $user->certificate));
                if (file_exists($certSourcePath)) {
                    $ext = pathinfo($user->certificate, PATHINFO_EXTENSION) ?: 'pdf';
                    $certDestPath = $dokumenPath . DIRECTORY_SEPARATOR . 'Sertifikat_' . $safeName . '.' . $ext;
                    copy($certSourcePath, $certDestPath);
                }
            }
        }

        // 4. Buat ZIP
        $zipFileName = 'Lamaran_' . $slugCompany . '_' . $slugVacancy . '_' . now()->format('Ymd') . '.zip';
        $zipPath = $basePath . DIRECTORY_SEPARATOR . $zipFileName;

        $this->createZip($basePath, $zipPath);

        // Verifikasi ZIP ada
        if (!file_exists($zipPath)) {
            throw new \Exception("ZIP file gagal dibuat: $zipPath");
        }

        return $zipPath;
    }

    protected function createZip(string $sourceDir, string $zipPath): void
    {
        $zip = new ZipArchive();
        
        $result = $zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        if ($result !== true) {
            throw new \Exception("Gagal membuat ZIP. Error code: $result");
        }

        // Cari semua file di direktori
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($sourceDir, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        $fileCount = 0;
        foreach ($iterator as $file) {
            if ($file->isFile() && !str_ends_with($file->getFilename(), '.zip')) {
                $filePath = $file->getRealPath();
                $relativePath = str_replace($sourceDir . DIRECTORY_SEPARATOR, '', $filePath);
                $zip->addFile($filePath, $relativePath);
                $fileCount++;
            }
        }

        // Jika tidak ada file, tambahkan file placeholder
        if ($fileCount === 0) {
            $zip->addFromString('README.txt', 'Tidak ada dokumen CV atau Sertifikat yang ditemukan untuk kandidat terpilih.');
        }

        $zip->close();
    }
}