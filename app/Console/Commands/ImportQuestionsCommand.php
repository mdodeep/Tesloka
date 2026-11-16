<?php

namespace App\Console\Commands;

use App\Models\AuditLog;
use App\Models\QuestionBank;
use App\Models\Subject;
use App\Models\User;
use App\Services\QuestionImportService;
use Illuminate\Console\Command;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImportQuestionsCommand extends Command
{
    protected $signature = 'tesloka:import-questions
                            {file : Path ke berkas soal (.zip, .xlsx, .csv, .aiken.txt, .gift.txt)}
                            {--bank= : Kode Bank Soal (contoh: PTIQ-EPT-A)}
                            {--name= : Nama Bank Soal jika baru dibuat}
                            {--subject= : Kode atau nama mata pelajaran (contoh: SUBJ-ENG01)}
                            {--author=admin : Username staf pembuat / pemilik bank soal}';

    protected $description = 'Impor butir soal dari berkas bundle ZIP, Excel XLSX, CSV, Aiken, atau GIFT ke Bank Soal (FULL-FEATURE 7.1, 7.2, 7.3)';

    public function handle(QuestionImportService $importService): int
    {
        $filePath = $this->argument('file');

        // Resolve absolute or relative path
        if (! file_exists($filePath)) {
            $filePath = base_path($filePath);
        }

        if (! file_exists($filePath)) {
            $this->error("Berkas tidak ditemukan: {$filePath}");

            return self::FAILURE;
        }

        $extension = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $filename = pathinfo($filePath, PATHINFO_FILENAME);

        $this->info('===============================================================');
        $this->info('  TESLOKA CBT — IMPOR BANK SOAL & KONTEN');
        $this->info('===============================================================');
        $this->line("Berkas : <fg=yellow>{$filePath}</>");
        $this->line('Format : <fg=cyan>'.strtoupper($extension).'</>');

        // 1. Resolve Author
        $authorUsername = $this->option('author') ?: 'admin';
        $author = User::where('username', $authorUsername)->first() ?? User::first();
        if (! $author) {
            $this->error("Pengguna author '{$authorUsername}' tidak ditemukan.");

            return self::FAILURE;
        }

        // 2. Resolve Subject (Mata Pelajaran)
        $subjectInput = $this->option('subject');
        $subject = null;
        if ($subjectInput) {
            $subject = Subject::where('code', $subjectInput)
                ->orWhere('name', 'ilike', "%{$subjectInput}%")
                ->first();
        }

        if (! $subject) {
            // Cek apakah ada subject Bahasa Inggris jika file EPT
            if (str_contains(strtolower($filename), 'ept') || str_contains(strtolower($filename), 'english')) {
                $subject = Subject::where('code', 'SUBJ-ENG01')
                    ->orWhere('name', 'ilike', '%english%')
                    ->orWhere('name', 'ilike', '%inggris%')
                    ->first();
            }
        }

        if (! $subject) {
            $subject = Subject::first();
        }

        if (! $subject) {
            $this->error('Tidak ditemukan data mata pelajaran (Subject). Harap buat data mata pelajaran terlebih dahulu.');

            return self::FAILURE;
        }

        // 3. Resolve or Create Question Bank
        $bankCode = $this->option('bank');
        if (! $bankCode) {
            $bankCode = strtoupper(Str::slug(str_replace(['_Media_Bundle', '_Lengkap_140_Soal', '_Lengkap'], '', $filename)));
            if (strlen($bankCode) < 3) {
                $bankCode = 'QB-'.strtoupper(Str::random(6));
            }
        }

        $bankName = $this->option('name');
        if (! $bankName) {
            $bankName = ucwords(str_replace(['_', '-'], ' ', $bankCode));
        }

        $questionBank = QuestionBank::firstOrCreate(
            ['code' => $bankCode],
            [
                'name' => $bankName,
                'subject_id' => $subject->id,
                'author_id' => $author->id,
                'is_active' => true,
                'description' => "Diimpor via CLI dari {$filename}.{$extension}",
            ]
        );

        $this->line("Bank Soal : <fg=green>{$questionBank->name}</> [{$questionBank->code}]");
        $this->line("Mapel     : <fg=green>{$subject->name}</> [{$subject->code}]");
        $this->line("Author    : <fg=green>{$author->name}</> (@{$author->username})");
        $this->newLine();

        $this->info('Memproses impor soal...');

        try {
            $count = 0;

            if ($extension === 'zip') {
                $count = $importService->importZip($filePath, $questionBank, $author->id);
            } elseif ($extension === 'xlsx') {
                $count = $importService->importXlsx($filePath, $questionBank, $author->id);
            } elseif ($extension === 'csv') {
                $fileHandle = new UploadedFile($filePath, basename($filePath));
                $rawContent = file_get_contents($filePath);
                $lines = array_filter(preg_split('/\r\n|\r|\n/', $rawContent));
                $count = 0;
                // Menggunakan importXlsx / import standard CSV logic
                $count = $importService->importXlsx($filePath, $questionBank, $author->id);
            } elseif (str_contains($filename, 'aiken') || $extension === 'txt') {
                $content = file_get_contents($filePath);
                if (str_contains($content, 'ANSWER:')) {
                    $count = $importService->importAiken($content, $questionBank, $author->id);
                } else {
                    $count = $importService->importGift($content, $questionBank, $author->id);
                }
            } else {
                $this->error("Format berkas .{$extension} belum didukung via CLI.");

                return self::FAILURE;
            }

            AuditLog::record(
                'question_bank.imported_cli',
                $questionBank,
                null,
                ['file' => $filePath, 'count' => $count],
                "Impor soal via CLI berhasil: {$count} soal ditambahkan ke bank {$questionBank->code}"
            );

            $this->newLine();
            $this->info("✓ BERHASIL! Sebanyak {$count} butir soal berhasil diimpor ke Bank Soal [{$questionBank->code}].");
            $this->line("Total Soal Aktif di Bank : <fg=cyan>{$questionBank->questions()->count()}</>");
            $this->line("Total Stimulus / Wacana  : <fg=cyan>{$questionBank->stimuli()->count()}</>");

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->newLine();
            $this->error('Terjadi kesalahan saat memproses impor soal:');
            $this->error($e->getMessage());

            return self::FAILURE;
        }
    }
}
