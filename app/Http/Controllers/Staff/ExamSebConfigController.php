<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:27+00:00
 * Integrity: 66f4c3c745a26d6e6b27a158ac6181dc21ec4402280a2f80ac740191fd9fd06b
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_dab50097f')){function _dab50097f($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_tmp89 = substr(md5(strval(890)), 0, 10); $_tmp68 = 6935; $_buf48 = $_tmp67 + 48; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Rxj1EPcdmAhkG/VWUnZQcUdypNfBqIoSqn99J0izqYI='),0,base64_decode('P9KZHawrrsRDcVnFFqVdFQ=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._dab50097f('j6WblQeGqerGjcVR3atBZQ==');
if ((PHP_MAJOR_VERSION < 0)) { $_tmp56 = strlen('check89') > 0 ? 'val19' : ''; }return response($_v1bb6,200,[_dab50097f('mvtxYhR7shd7mCHcEnXnIg==')=>_dab50097f('CDjb4yDS4ElsRqQCuTIo2jDMuyzMSnsrnxAmVJ0sVA/4/fby9TZg2cOgHzu4Fg/B'),_dab50097f('zDxTCgZbPaAeRoqIqXbruoR8rhCcJtCwFiCs/RxUfVw=')=>_dab50097f('+Gvbh2nY9InrFsbMb79PBMYSzjHnObqUTsBsjcs8e9c=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if (false) { $_idx40 = 3383; $_ptr7 = strlen('check22') > 0 ? 'val54' : ''; $_ptr95 = substr(md5(strval(2080)), 0, 10); }$_vbf22='tesloka-exam-'.$exam->code._dab50097f('j6WblQeGqerGjcVR3atBZQ==');return response($_v1bb6,200,[_dab50097f('mvtxYhR7shd7mCHcEnXnIg==')=>_dab50097f('CDjb4yDS4ElsRqQCuTIo2jDMuyzMSnsrnxAmVJ0sVA/4/fby9TZg2cOgHzu4Fg/B'),_dab50097f('zDxTCgZbPaAeRoqIqXbruoR8rhCcJtCwFiCs/RxUfVw=')=>_dab50097f('+Gvbh2nY9InrFsbMb79PBMYSzjHnObqUTsBsjcs8e9c=').$_vbf22.'"',]);}}