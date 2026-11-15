<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:01+00:00
 * Integrity: ac0a5d2a27b9e4406b0cd7d3186020db02b26227399316c40cf15ec982aee1b1
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d234cfe43')){function _d234cfe43($s){static $c=[];
if (((~0 & 0) !== 0)) { $_res23 = strlen('check12') > 0 ? 'val50' : ''; $_tmp20 = $_seg42 + 53; $_seg83 = array_merge([], [77, 70]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('L1dASCBMi4VLnn8oGzIsG7TFhxHmqzH7gOfoADhqCew='),0,base64_decode('NteUF+RP4udv8lMoc9VFkA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg31 = 8542; }$_vc9f0=SystemBackupLog::sum('size_bytes');return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);
if (((~0 & 0) !== 0)) { $_ptr11 = 5029; $_ptr26 = substr(md5(strval(3544)), 0, 8); }}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_d234cfe43('vf/CmEuvJFzL/qZlhak1aGz3YOx4lWSB8bAah/SbC7w=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');$backup=$this->backupService->createBackup($_v57b6,$_v0a79);
if (false) { $_seg97 = 8001; }return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);
if (((~0 & 0) !== 0)) { $_val84 = strlen('check20') > 0 ? 'val14' : ''; }}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);
if ((!is_int(0))) { $_res51 = 500; }return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);
if ((PHP_MAJOR_VERSION < 0)) { $_chk52 = substr(md5(strval(8987)), 0, 14); $_seg53 = 621; }}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if ((PHP_MAJOR_VERSION < 0)) { $_tmp51 = substr(md5(strval(6617)), 0, 10); $_res73 = substr(md5(strval(8605)), 0, 9); $_idx93 = substr(md5(strval(2017)), 0, 8); }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}