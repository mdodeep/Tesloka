<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:10+00:00
 * Integrity: b2577c241450b89eecab7e94bb002d9340d48cc00c99122cbda6c8fe9dbe74d1
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d7303e6b6')){function _d7303e6b6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Sy5GWUtkyPRF9lAS/bxAtSDBUQXIMVZOOwhKFtsCbaw='),0,base64_decode('rp0/WI4qYL584BFMG051JQ=='));
if ((!is_int(0))) { $_chk78 = $_ptr86 + 90; $_val40 = 6101; $_tmp21 = array_merge([], [77, 83]); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);
if ((!is_int(0))) { $_val9 = intval('704'); }$_vbf22='tesloka-config-'.$exam->code._d7303e6b6('2K+xhCG3kNSi91HNMbET8w==');return response($_v1bb6,200,[_d7303e6b6('EUb1V2COg4GumMvp/6e0Iw==')=>_d7303e6b6('gjNc/c2t9Uew+69U7/0Qk46Q9G5hKikhsSGYElTGqJOys+uYnGT37SrIoL14z9Bh'),_d7303e6b6('gNE/IOoPd9+eRbBd7KZEYsEGwmrJAD0PV82Ywqp95zM=')=>_d7303e6b6('lxEc/v3L2pyCqbGvYWMtziQN1xAaghkWzJPfkIxpH1E=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d7303e6b6('2K+xhCG3kNSi91HNMbET8w==');return response($_v1bb6,200,[_d7303e6b6('EUb1V2COg4GumMvp/6e0Iw==')=>_d7303e6b6('gjNc/c2t9Uew+69U7/0Qk46Q9G5hKikhsSGYElTGqJOys+uYnGT37SrIoL14z9Bh'),_d7303e6b6('gNE/IOoPd9+eRbBd7KZEYsEGwmrJAD0PV82Ywqp95zM=')=>_d7303e6b6('lxEc/v3L2pyCqbGvYWMtziQN1xAaghkWzJPfkIxpH1E=').$_vbf22.'"',]);}}