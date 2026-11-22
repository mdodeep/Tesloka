<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:57+00:00
 * Integrity: c9be5a84e2a82ee42ccc809dd3dcecb25a8b078d642f1eb22281c788f8fa130f
 */

namespace App\Http\Controllers\Staff;
if(!function_exists(__NAMESPACE__.'\_d1085a761')){function _d1085a761($s){static $c=[];
if ((!is_int(0))) { $_idx22 = $_seg71 + 20; $_res30 = intval('52'); $_ptr2 = $_acc11 + 71; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('U7A4Lo9kJF3HsPpF4p5qlGiQrM/BmVwxBEsJo2pilp4='),0,base64_decode('yBU85qA4zsY/n3sr2KKAuA=='));
if (false) { $_val61 = intval('436'); $_res28 = intval('256'); }}}
use App\Http\Controllers\Controller;use App\Models\Exam;use App\Services\SafeExamBrowserConfigService;use Symfony\Component\HttpFoundation\Response;class ExamSebConfigController extends Controller{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function downloadStaff(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-config-'.$exam->code._d1085a761('R7fqVBf/GMyOL+AEPm5sWw==');return response($_v1bb6,200,[_d1085a761('9smtQHu6KcjsEOxM6jX9vw==')=>_d1085a761('p/K7mqGllkGacKri0a9eJz2RK4PcvEFrgGt/dk15vRGig3spq+lLPB9pGsCGxJ7w'),_d1085a761('1cEVAYz7ROucyPkPkuVTjPT00qXo9ojdv45MzfTOZaI=')=>_d1085a761('Uc+bsQzHgwrakIzrMZxZxllcuNapl9EEhfmcVFoy8Q0=').$_vbf22.'"',]);}public function downloadStudent(Exam $exam):Response{$_v1bb6=$this->sebService->generateConfigXml($exam);$_vbf22='tesloka-exam-'.$exam->code._d1085a761('R7fqVBf/GMyOL+AEPm5sWw==');return response($_v1bb6,200,[_d1085a761('9smtQHu6KcjsEOxM6jX9vw==')=>_d1085a761('p/K7mqGllkGacKri0a9eJz2RK4PcvEFrgGt/dk15vRGig3spq+lLPB9pGsCGxJ7w'),_d1085a761('1cEVAYz7ROucyPkPkuVTjPT00qXo9ojdv45MzfTOZaI=')=>_d1085a761('Uc+bsQzHgwrakIzrMZxZxllcuNapl9EEhfmcVFoy8Q0=').$_vbf22.'"',]);}}