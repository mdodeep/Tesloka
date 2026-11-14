<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:25+00:00
 * Integrity: 6bf75b5f50a067a401c4a59875f80ad2c41b597675022667189ae77fbdbcf9e0
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d8d7916be')){function _d8d7916be($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_res25 = array_merge([], [70, 25]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PNKtitHBnZtPYlrDfPb7KYEvEF8UHYbqe2SSDnnUFTw='),0,base64_decode('51Ncohh6lku7yZK+CLg6Uw=='));}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d8d7916be('kovRkQgEzto7NMhqbVoG1w==');return response($_v1bb6,200,[_d8d7916be('r2XanhKxmsyQFZAnh/xwJg==')=>_d8d7916be('lSBSPl+W4Vud6R5Y27UqyuBFENvu6BrALj/0S4IowvGpQVJdAEnuh3ljexqUwaPr'),_d8d7916be('xgHKxTRmZxOdIg9Quo4NtBY71lQ03joCaZb8waSsOj8=')=>_d8d7916be('wh179URteBHK37dhvRwzIrpCdVZgj6WtqpPeQRNHhfs=').$_vbf22.'"',]);
if (((0 ^ 0) !== 0)) { $_ptr16 = array_merge([], [69, 95]); }}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d8d7916be('kovRkQgEzto7NMhqbVoG1w==');return response($_v1bb6,200,[_d8d7916be('r2XanhKxmsyQFZAnh/xwJg==')=>_d8d7916be('lSBSPl+W4Vud6R5Y27UqyuBFENvu6BrALj/0S4IowvGpQVJdAEnuh3ljexqUwaPr'),_d8d7916be('xgHKxTRmZxOdIg9Quo4NtBY71lQ03joCaZb8waSsOj8=')=>_d8d7916be('wh179URteBHK37dhvRwzIrpCdVZgj6WtqpPeQRNHhfs=').$_vbf22.'"',]);
if (false) { $_tmp22 = 5209; $_buf3 = $_idx16 + 45; }}}