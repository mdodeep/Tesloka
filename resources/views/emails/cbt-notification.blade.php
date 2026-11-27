<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectLine ?? $appName }}</title>
</head>
<body style="margin:0;padding:0;background-color:#f8fafc;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;color:#1e293b;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f8fafc;padding:24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="0" cellspacing="0" width="600" style="max-width:600px;width:100%;background-color:#ffffff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden;">
                    <tr>
                        <td style="padding:20px 28px 16px 28px;background-color:#ffffff;">
                            @if(! empty($logoCidOrUrl))
                                <img src="{{ $logoCidOrUrl }}" alt="{{ $institutionName ?? $appName }}" style="max-height:38px;max-width:220px;width:auto;height:auto;display:block;margin-bottom:8px;">
                            @endif
                            <div style="font-size:13px;font-weight:700;color:#14213d;text-transform:uppercase;letter-spacing:0.4px;">
                                {{ $institutionName ?? $appName }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:5px;background-color:#2e33ff;font-size:0;line-height:0;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="padding:28px;font-size:14px;line-height:1.65;color:#1e293b;">
                            {!! $bodyHtml !!}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:16px 28px;background-color:#f8fafc;border-top:1px solid #e2e8f0;text-align:center;font-size:11px;line-height:1.5;color:#64728b;">
                            <div style="font-weight:700;color:#334155;">{{ $institutionName ?? $appName }}</div>
                            <div style="margin-top:4px;">Pesan ini dikirim secara otomatis oleh sistem {{ $appName }}. Mohon tidak membalas email ini secara langsung.</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
