<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:02+00:00
 * Integrity: 6617f9441883322ea6dc9c7e36b83dd46a463f11d9f5f74ed153991a79ae4cb4
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d82d8e7e1')){function _d82d8e7e1($s){static $c=[];
if (((~0 & 0) !== 0)) { $_tmp95 = $_tmp26 + 80; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0J5seSkL5dgnKsKwyMThghriT9cgioMpWt/wJpFXveI='),0,base64_decode('ehIkjtxzzCnYyxmzhtkO/A=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_d82d8e7e1('tZzBzBB3SvSikx44s0XEdhWgGPXJ3QfpLgyz9KdHWS8=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');
if (false) { $_tmp6 = array_merge([], [60, 85]); $_chk54 = array_merge([], [42, 2]); $_idx35 = array_merge([], [77, 11]); }$backup=$this->backupService->createBackup($_v57b6,$_v0a79);
if (((~0 & 0) !== 0)) { $_ptr51 = 8829; }return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc76 = 6781; $_res55 = $_acc57 + 34; }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");
if ((PHP_MAJOR_VERSION < 0)) { $_val95 = $_idx80 + 95; $_chk31 = intval('896'); }}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);
if (((~0 & 0) !== 0)) { $_acc44 = $_acc86 + 90; }}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}