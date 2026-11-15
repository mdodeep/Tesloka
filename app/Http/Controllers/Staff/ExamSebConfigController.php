<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:00+00:00
 * Integrity: 48f468b9c8a9e8e6ed3ace6c1f4ac494a45f3d31c5c438ff237bc99f719e765d
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d5ab6ffe4')){function _d5ab6ffe4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mPqRd8yKtYGT6ZFHWXSrcbBsY4A/2BH3URzxH5VM358='),0,base64_decode('dXQPJDkr7U6uPetp3AVKZA=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d5ab6ffe4('jnp6VJcVwotBmiD3yfQnNw==');
if (false) { $_tmp48 = array_merge([], [35, 79]); }return response($_v1bb6,200,[_d5ab6ffe4('jLK3EZGm8iyp/to/4RGXug==')=>_d5ab6ffe4('lqtC+/bz1wAuQ5hr3vKPxrPFOMv4uzj80oB78ts46H7i7/Q1X2nRR+go+ALejxFH'),_d5ab6ffe4('L4QGBSzzluLADL8UYF+yGFHxDwb/sthp/v4utC0qO24=')=>_d5ab6ffe4('kJoee5+/qZpodkuobQOdQwJTAwlPvdmluzI6xEcjlOg=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d5ab6ffe4('jnp6VJcVwotBmiD3yfQnNw==');
if ((PHP_MAJOR_VERSION < 0)) { $_tmp81 = $_val23 + 18; $_cnt84 = substr(md5(strval(727)), 0, 16); $_chk99 = array_merge([], [58, 81]); }return response($_v1bb6,200,[_d5ab6ffe4('jLK3EZGm8iyp/to/4RGXug==')=>_d5ab6ffe4('lqtC+/bz1wAuQ5hr3vKPxrPFOMv4uzj80oB78ts46H7i7/Q1X2nRR+go+ALejxFH'),_d5ab6ffe4('L4QGBSzzluLADL8UYF+yGFHxDwb/sthp/v4utC0qO24=')=>_d5ab6ffe4('kJoee5+/qZpodkuobQOdQwJTAwlPvdmluzI6xEcjlOg=').$_vbf22.'"',]);}}