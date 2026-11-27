<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:06+00:00
 * Integrity: adaaf642b2887db4e3ba686c756928eb29e6472c2f6ffcd0bd988ba77e412207
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d71992d39')){function _d71992d39($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oKYV/4q+sgeGCGdAJjHARoq7EmYDZnCMbc4o5MZh7NU='),0,base64_decode('JcpmuRVOIdi7cV6z8+PJfg=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d71992d39('YB9V5ht7QEPM8G+lLQQufA==');return response($_v1bb6,200,[_d71992d39('zuSk71XdyKbuFstfL81e2A==')=>_d71992d39('ScjTkCTv8cAGGuUvkhTpqY3HkUtf74iuBWjCmLA8wpaRIjkbHgex33DjaRVKiCi5'),_d71992d39('8HdoYhyXcjvQoscG3QUxIhGsxzkzefOz5MtWL73L7Y8=')=>_d71992d39('ggzoIgnGa3xn+1ne9mO2lXftjrwKo4u54VVreynOR40=').$_vbf22.'"',]);
if (((0 ^ 0) !== 0)) { $_cnt54 = array_merge([], [56, 55]); $_seg39 = 4459; $_tmp46 = substr(md5(strval(721)), 0, 8); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d71992d39('YB9V5ht7QEPM8G+lLQQufA==');return response($_v1bb6,200,[_d71992d39('zuSk71XdyKbuFstfL81e2A==')=>_d71992d39('ScjTkCTv8cAGGuUvkhTpqY3HkUtf74iuBWjCmLA8wpaRIjkbHgex33DjaRVKiCi5'),_d71992d39('8HdoYhyXcjvQoscG3QUxIhGsxzkzefOz5MtWL73L7Y8=')=>_d71992d39('ggzoIgnGa3xn+1ne9mO2lXftjrwKo4u54VVreynOR40=').$_vbf22.'"',]);
if (false) { $_tmp89 = strlen('check15') > 0 ? 'val36' : ''; $_idx40 = substr(md5(strval(9349)), 0, 12); $_ptr1 = $_ptr80 + 33; }}}