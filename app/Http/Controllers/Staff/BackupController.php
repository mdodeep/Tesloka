<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:39:28+00:00
 * Integrity: 6a8d7cee511dafadb162bbc7b57792dbf936ef3d7540e180cb5c13f51e9b532e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d59db37a7')){function _d59db37a7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('01B12VojGI8GdqKVSdDfIcK+MoMsx+Zuk7ACSbrg120='),0,base64_decode('G5eMkrgDBzVm2/n5xo+trg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_d59db37a7('dpvwKigL2eVKFwuwel799nxiRdLbT2wOgNNFkbkw65c=')],]);
if (((~0 & 0) !== 0)) { $_tmp84 = substr(md5(strval(7317)), 0, 8); $_val6 = substr(md5(strval(1623)), 0, 12); $_tmp44 = 8834; }$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');$backup=$this->backupService->createBackup($_v57b6,$_v0a79);
if ((!is_int(0))) { $_seg0 = 6501; $_ptr25 = $_res16 + 65; }return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if (((~0 & 0) !== 0)) { $_chk39 = $_val68 + 25; }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);
if (false) { $_acc40 = 873; }}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);
if ((PHP_MAJOR_VERSION < 0)) { $_val89 = strlen('check83') > 0 ? 'val75' : ''; $_tmp48 = strlen('check81') > 0 ? 'val85' : ''; }return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();
if (((0 ^ 0) !== 0)) { $_chk11 = substr(md5(strval(3393)), 0, 7); }$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if (false) { $_chk0 = substr(md5(strval(168)), 0, 15); $_val43 = $_idx12 + 6; }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}