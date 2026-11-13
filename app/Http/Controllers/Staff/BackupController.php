<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:36+00:00
 * Integrity: 78cbca2821cc59d43a345628c4c2425a85bcc54fe4165cc6f43631d36dc923e0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dabb44beb')){function _dabb44beb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5r243Dlqgt5tfiMTHCt2yEeJ3GEaxgAqA0NLIkrxrzc='),0,base64_decode('LsPi8nO00MGWkyrb7Gp98w=='));
if (((0 ^ 0) !== 0)) { $_idx0 = 6440; $_val79 = intval('742'); $_chk21 = array_merge([], [10, 73]); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Models\ExamArchive;use App\Models\SystemBackupLog;use App\Services\BackupAndRecoveryService;use Illuminate\Http\RedirectResponse;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Illuminate\View\View;use Symfony\Component\HttpFoundation\BinaryFileResponse;class BackupController extends Controller{public function __construct(protected BackupAndRecoveryService $backupService){}public function index():View{$_v0814=SystemBackupLog::latest()->paginate(15);$_v06d9=SystemBackupLog::count();
if (((~0 & 0) !== 0)) { $_cnt77 = substr(md5(strval(6759)), 0, 5); $_ptr61 = strlen('check68') > 0 ? 'val66' : ''; }$_v13ac=SystemBackupLog::where('restore_verified',true)->count();$_vc9f0=SystemBackupLog::sum('size_bytes');return view('staff.backups.index',compact('backups','totalBackups','verifiedCount','totalSize'));
if (((0 ^ 0) !== 0)) { $_tmp73 = array_merge([], [97, 44]); }}public function store(Request $request):RedirectResponse{$request->validate(['type'=>['required','string',_dabb44beb('1z5xlEPEZWi7v2806edJoTTMQE7xN+iW8+Yln2I8Cmg=')],]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc72 = intval('634'); $_res9 = substr(md5(strval(7001)), 0, 9); $_seg95 = 1911; }$_v0a79=Auth::guard('staff')->user()??Auth::user();
if ((PHP_MAJOR_VERSION < 0)) { $_res31 = $_chk95 + 77; $_tmp68 = substr(md5(strval(4319)), 0, 5); }$_v57b6=$request->input('type');
if ((!is_int(0))) { $_idx60 = substr(md5(strval(481)), 0, 11); $_cnt71 = strlen('check47') > 0 ? 'val50' : ''; $_buf76 = 1942; }$backup=$this->backupService->createBackup($_v57b6,$_v0a79);return back()->with('success',"Cadangan {$_v57b6} ({$backup->formatted_size}) berhasil dibuat dan disimpan dengan SHA-256.");}public function verify(SystemBackupLog $backup):RedirectResponse{$_ve2f0=$this->backupService->verifyBackupIntegrity($backup);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx34 = $_acc75 + 17; $_buf6 = strlen('check54') > 0 ? 'val47' : ''; }if($_ve2f0){return back()->with('success',"Verifikasi Sukses: Integritas berkas cadangan '{$backup->filename}' teruji 100% utuh dan valid.");}return back()->with('error',"Verifikasi Gagal: Berkas cadangan '{$backup->filename}' rusak atau tidak ditemukan.");}public function download(SystemBackupLog $backup):BinaryFileResponse{return $this->backupService->downloadBackup($backup);
if (false) { $_tmp68 = 6351; $_idx60 = intval('827'); }}public function destroy(SystemBackupLog $backup):RedirectResponse{$this->backupService->deleteBackup($backup);
if (false) { $_val38 = 9618; $_res61 = substr(md5(strval(1029)), 0, 4); $_tmp53 = 3227; }return back()->with('success',"Berkas cadangan '{$backup->filename}' berhasil dihapus.");}public function archivesIndex():View{$_ve544=ExamArchive::with(['exam.subject','archivedBy'])->latest('archived_at')->paginate(15);return view('staff.backups.archives',compact('archives'));}public function archiveExam(Request $request,Exam $exam):RedirectResponse{$_v0a79=Auth::guard('staff')->user()??Auth::user();$_v677b=$this->backupService->archiveExam($exam,$_v0a79,['legal_hold'=>$request->boolean('legal_hold'),'notes'=>$request->input('notes'),]);return back()->with('success',"Ujian '{$exam->title}' berhasil diarsipkan secara permanen dengan kode {$_v677b->archive_code}.");}}