{{-- Premium Blade template placeholder --}}
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $subject ?? 'Newsletter' }}</title>
<style>
body{margin:0;background:#0d0d0d;color:#f5f2ec;font-family:Georgia,serif}
.wrapper{max-width:600px;margin:30px auto;background:#181818;border:1px solid #2e2e2e}
.header{padding:30px;text-align:center;border-bottom:1px solid #2e2e2e}
.logo{font-size:34px;color:#e8e4dc}
.tag{font:700 11px Arial,sans-serif;letter-spacing:4px;color:#888;text-transform:uppercase}
.body{padding:40px}
h1{font-weight:400;color:#e8e4dc}
p{line-height:1.8;color:#ccc}
.btn{display:inline-block;padding:14px 28px;background:#f5f2ec;color:#111;text-decoration:none;margin:30px 0}
.footer{padding:25px;text-align:center;border-top:1px solid #2e2e2e;color:#888;font:12px Arial,sans-serif}
</style>
</head>
<body>
<div class="wrapper">
<div class="header">
<div class="logo">Colin <em>Reardon</em></div>
<div class="tag">AUTHOR OF DARK FICTION</div>
</div>
<div class="body">
<p>Hello {{ $subscriber->name }},</p>
<h1>{{ $subject ?? 'Newsletter' }}</h1>
<p>{!! nl2br(e($messageBody)) !!}</p>
<p style="text-align:center"><a href="#" class="btn">VISIT WEBSITE</a></p>
<p>Thank you for being a valued subscriber.</p>
</div>
<div class="footer">
© {{ date('Y') }} Colin Reardon. All rights reserved.<br>
You're receiving this email because you subscribed to our newsletter.
</div>
</div>
</body>
</html>
