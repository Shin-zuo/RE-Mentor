<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Inter', sans-serif; color: #334155; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #1e3a8a; padding: 20px; border-radius: 12px 12px 0 0; text-align: center; }
        .content { background-color: #f8fafc; padding: 30px; border: 1px solid #e2e8f0; border-radius: 0 0 12px 12px; }
        .footer { font-size: 12px; text-align: center; margin-top: 20px; color: #94a3b8; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2 style="color: white; margin: 0; font-family: serif;">RE-MENTOR</h2>
        </div>
        <div class="content">
            <h3>Hi {{ $enrollment->name }},</h3>
            
            <p>Thanks for applying for <strong>Full Access</strong>!</p>
            
            <p>We have received your payment reference:</p>
            <p style="background: #fff; padding: 10px; border-radius: 6px; font-family: monospace; text-align: center; border: 1px dashed #cbd5e1;">
                {{ $enrollment->payment_reference }}
            </p>

            <p><strong>What happens next?</strong></p>
            <p>Our team will verify your payment (usually within 24 hours). Once verified, you will receive another email with your Google Classroom invitation.</p>
            
            <p>Cheers,<br>The Re-Mentor Team</p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Re-Mentor System. All rights reserved.
        </div>
    </div>
</body>
</html>