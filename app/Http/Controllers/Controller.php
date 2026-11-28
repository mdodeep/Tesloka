<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:06+00:00
 * Integrity: 32e0f25466affa367976093850edeed3b85af149e9dbcffde22e82e2a079854b
 */

namespace App\Http\Controllers;use Illuminate\Support\Facades\Log;use Throwable;abstract class Controller{protected function safeExceptionMessage(Throwable $e,string $context,string $fallbackMessage,string $separator=': '):string{Log::error($context.': '.$e->getMessage(),['exception'=>$e,]);if(app()->isProduction()){return rtrim($fallbackMessage,': ').'.';}return $fallbackMessage.$separator.$e->getMessage();}}