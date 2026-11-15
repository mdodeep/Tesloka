<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:24+00:00
 * Integrity: a5fe8a6e13561eb216092d910b450fccbd45b4e76c28683aa463ab9bb44335d2
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_db9255793')){function _db9255793($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gn2I7rEgHR3OQ+m7x1y92SqA14k8UQKRKTjEyac3zMg='),0,base64_decode('hTBQXSLCvKOkeW9ezVqJzA=='));
if ((!is_int(0))) { $_seg6 = substr(md5(strval(3901)), 0, 6); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');
if ((PHP_MAJOR_VERSION < 0)) { $_seg26 = array_merge([], [8, 11]); $_ptr41 = array_merge([], [99, 60]); $_ptr54 = $_buf54 + 76; }return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_db9255793('oTPXtGGR3zhQYE1Umrhmu0BMEPOpZyc5PZoDd3f5hjI=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');$backup=$this->backupService->createBackup($_v57b6,$_v0a79);
if (false) { $_seg68 = strlen('check1') > 0 ? 'val24' : ''; $_ptr91 = 9087; }return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);
if (((~0 & 0) !== 0)) { $_seg30 = intval('827'); $_val64 = 770; $_idx87 = substr(md5(strval(1130)), 0, 8); }}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp35 = intval('257'); }}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr89 = $_seg58 + 20; $_ptr73 = 7697; }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}