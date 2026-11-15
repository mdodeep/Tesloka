<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:47:59+00:00
 * Integrity: 2d8789fb056f0dd4f3ab7f2d193dd1817a8fc3535dc158a91a74506114fa66be
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dc3d960b0')){function _dc3d960b0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('fmDz/jGOIjeLJV3KB+JtfxGv0UsPvGvB89YEcDkZ6sE='),0,base64_decode('F/opnx49pXk1pSQRmR+JSg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();
if (((0 ^ 0) !== 0)) { $_idx87 = $_val62 + 85; $_idx80 = 688; }$_vc9f0=SystemBackupLog::sum('size_bytes');return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_dc3d960b0('t+wAaj/NYx0OuSrpYvM/EKfdKm30i+DBYzeDhuKywR0=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx6 = strlen('check1') > 0 ? 'val42' : ''; }$_v57b6=$request->input('type');$backup=$this->backupService->createBackup($_v57b6,$_v0a79);
if ((PHP_MAJOR_VERSION < 0)) { $_val78 = array_merge([], [45, 52]); $_idx70 = 8714; }return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if (false) { $_chk75 = array_merge([], [41, 78]); $_idx14 = strlen('check10') > 0 ? 'val66' : ''; $_tmp2 = $_cnt91 + 29; }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");
if (((~0 & 0) !== 0)) { $_seg7 = substr(md5(strval(4290)), 0, 10); }}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',['archives'=>$_ve544]);}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if (((0 ^ 0) !== 0)) { $_buf24 = 5195; $_chk97 = array_merge([], [48, 4]); }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}