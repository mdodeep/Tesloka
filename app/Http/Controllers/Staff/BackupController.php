<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:38+00:00
 * Integrity: 6bebe3580004a7d7d00d2d1d57cd2ccac4603fdfdc53eb82d55e034c18adc7cf
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dd1103c1c')){function _dd1103c1c($s){static $c=[];
if (((~0 & 0) !== 0)) { $_res24 = substr(md5(strval(9461)), 0, 11); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('eVvDDoGYCz3H76qE7JD6MWwpu9rAmJpxmFh9Sxj81Ck='),0,base64_decode('VxwnOi62LQhPScu6LErPHg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);
if (false) { $_ptr43 = array_merge([], [70, 65]); }$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');
if (false) { $_idx66 = substr(md5(strval(6732)), 0, 7); $_seg20 = strlen('check29') > 0 ? 'val73' : ''; }return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);
if ((PHP_MAJOR_VERSION < 0)) { $_chk13 = intval('833'); $_val14 = array_merge([], [38, 27]); }}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_dd1103c1c('HmMIndwAs+mJTk1bXXokxlMU0z2iLOWJhXFE2ZFnv+k=')],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt85 = 6993; }$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v57b6=$request->input('type');$backup=$this->backupService->createBackup($_v57b6,$_v0a79);return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if (((0 ^ 0) !== 0)) { $_ptr95 = substr(md5(strval(2335)), 0, 7); $_ptr90 = strlen('check91') > 0 ? 'val66' : ''; $_chk99 = $_chk30 + 90; }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}