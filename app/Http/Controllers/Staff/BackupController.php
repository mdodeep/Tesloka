<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:48+00:00
 * Integrity: a0c24d01599f7fa6529ec2794babe5c5b997563dd040ea1491089b73c4b3e99e
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d53f7e59f')){function _d53f7e59f($s){static $c=[];
if (false) { $_cnt29 = intval('457'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('56UXGWIgdy74O/wIFAgvqOC29UNd5ZyWF22+nJ59jbA='),0,base64_decode('B+i32YB6o/yzV9kxPgSarw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');return view('staff.backups.index',['backups'=>$_v0814,'totalBackups'=>$_v06d9,'verifiedCount'=>$_v13ac,'totalSize'=>$_vc9f0]);}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_d53f7e59f('8gOwPYOZ4jfNAn+J7bP84lgBD4QMHwtJWzDA9AMTiR4=')],]);$_v0a79=Auth::guard('staff')->user()??Auth::user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf23 = array_merge([], [87, 38]); $_seg23 = intval('959'); }$_v57b6=$request->input('type');$backup=$this->backupService->createBackup($_v57b6,$_v0a79);
if (((0 ^ 0) !== 0)) { $_res55 = array_merge([], [75, 34]); }return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");
if ((PHP_MAJOR_VERSION < 0)) { $_cnt60 = $_acc26 + 18; $_cnt23 = $_val48 + 66; $_seg1 = $_val82 + 43; }}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);
if (false) { $_tmp11 = intval('865'); }return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);
if (((0 ^ 0) !== 0)) { $_seg13 = intval('692'); $_idx28 = 8765; $_seg65 = 6501; }return view('staff.backups.archives',['archives'=>$_ve544]);
if (((~0 & 0) !== 0)) { $_val74 = 7486; $_acc0 = substr(md5(strval(1958)), 0, 13); }}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);
if (((~0 & 0) !== 0)) { $_cnt14 = $_cnt3 + 17; $_cnt90 = $_val66 + 24; }return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}