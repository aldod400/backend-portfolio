<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message from Your Portfolio</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            line-height: 1.6;
            color: #222;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #eaf2fb;
        }
        .email-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 32px;
            box-shadow: 0 4px 24px rgba(0,40,120,0.08);
        }
        .header {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            padding: 24px;
            border-radius: 10px 10px 0 0;
            margin: -32px -32px 32px -32px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        .timestamp {
            color: #6b7280;
            font-size: 15px;
            text-align: center;
            margin: 18px 0;
        }
        .message-info {
            background-color: #f1f5f9;
            border-left: 4px solid #2563eb;
            padding: 18px;
            margin: 24px 0;
            border-radius: 0 6px 6px 0;
        }
        .info-row {
            margin: 12px 0;
            display: flex;
            align-items: center;
        }
        .info-label {
            font-weight: 600;
            color: #2563eb;
            margin-right: 12px;
            min-width: 90px;
        }
        .info-value {
            flex: 1;
        }
        .message-content {
            background-color: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 22px;
            margin: 24px 0;
            white-space: pre-wrap;
            line-height: 1.8;
            font-size: 16px;
        }
        .btn {
            display: inline-block;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            color: #fff;
            padding: 14px 28px;
            text-decoration: none;
            border-radius: 6px;
            margin: 12px 0;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 2px 8px rgba(37,99,235,0.08);
            transition: background 0.2s;
        }
        .btn:hover {
            background: linear-gradient(135deg, #1e40af 0%, #2563eb 100%);
        }
        .footer {
            text-align: center;
            margin-top: 36px;
            padding-top: 22px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>New Contact Message Received</h1>
        </div>

        <div class="timestamp">
            📅 Sent at: {{ $contactMessage->created_at->format('Y-m-d H:i:s') }}
        </div>

        <div class="message-info">
            <div class="info-row">
                <span class="info-label">👤 Name:</span>
                <span class="info-value">{{ $contactMessage->name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">✉️ Email:</span>
                <span class="info-value">
                    <a href="mailto:{{ $contactMessage->email }}" style="color: #2563eb; text-decoration: none;">
                        {{ $contactMessage->email }}
                    </a>
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">📋 Subject:</span>
                <span class="info-value">{{ $contactMessage->subject }}</span>
            </div>
        </div>

        <h3 style="color: #2563eb; margin-bottom: 16px;">💬 Message Content:</h3>
        <div class="message-content">{{ $contactMessage->message }}</div>

        <div style="text-align: center; margin: 36px 0;">
            <a href="mailto:{{ $contactMessage->email }}?subject=Re: {{ $contactMessage->subject }}" class="btn" style="color: #fff;">
            📧 Reply to Message
            </a>
        </div>

        <div class="footer">
            <p>This message was automatically sent from your portfolio contact form.</p>
            <p>Please do not reply directly to this email. Use the "Reply to Message" button above.</p>
        </div>
    </div>
</body>
</html>
