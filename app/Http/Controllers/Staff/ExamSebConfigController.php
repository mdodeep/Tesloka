<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:48+00:00
 * Integrity: 40a7628a067f020e4fd2c57f4a5841387dc6e2eb74ae871d3629e6fddb576e35
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_de5b307ee')){function _de5b307ee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('gTBuUP9m2emSesqqzsnAY+dJe1xFJbq8s2WR1qlsX/k='),0,base64_decode('kLPwwh/5rG7WOPyU31IRrw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._de5b307ee('ntNLEWPQxMFp0dtyj+OJQg==');return response($_v1bb6,200,[_de5b307ee('A07Si/wm/LieNn3ryzweoQ==')=>_de5b307ee('n2BGwKSAt0XCtU+U7SQNX/GqU/pnvFBDi3GjarwnAM/7TRoS8H5W6hyw/YT/en4X'),_de5b307ee('uIGTyAzp+PKBvgai8p2JnKkWbTScwjDR/RwydwPH8Nw=')=>_de5b307ee('KYlOum0YZyZVYQu15HkcAoRK4590Cr1O1lXf9BUOA54=').$_vbf22.'"',]);
if ((!is_int(0))) { $_buf10 = 7178; $_seg67 = 2503; $_val92 = $_acc72 + 39; }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._de5b307ee('ntNLEWPQxMFp0dtyj+OJQg==');return response($_v1bb6,200,[_de5b307ee('A07Si/wm/LieNn3ryzweoQ==')=>_de5b307ee('n2BGwKSAt0XCtU+U7SQNX/GqU/pnvFBDi3GjarwnAM/7TRoS8H5W6hyw/YT/en4X'),_de5b307ee('uIGTyAzp+PKBvgai8p2JnKkWbTScwjDR/RwydwPH8Nw=')=>_de5b307ee('KYlOum0YZyZVYQu15HkcAoRK4590Cr1O1lXf9BUOA54=').$_vbf22.'"',]);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res53 = array_merge([], [53, 40]); $_seg57 = $_chk8 + 62; $_buf78 = substr(md5(strval(3676)), 0, 16); }}}