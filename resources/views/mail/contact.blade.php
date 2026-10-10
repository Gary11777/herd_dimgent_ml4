<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Contact form message</title>
    </head>
    <body style="margin: 0; padding: 0; background-color: #f4f4f5; font-family: Arial, Helvetica, sans-serif;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color: #f4f4f5; padding: 32px 16px;">
            <tr>
                <td align="center">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width: 560px; background-color: #ffffff; border-radius: 12px; padding: 32px;">
                        <tr>
                            <td>
                                <h1 style="margin: 0 0 24px; font-size: 20px; line-height: 28px; color: #18181b;">
                                    New contact form message
                                </h1>
                                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 24px; font-size: 14px; line-height: 22px; color: #3f3f46;">
                                    <tr>
                                        <td style="padding: 4px 0; color: #71717a; width: 90px;">Name</td>
                                        <td style="padding: 4px 0; font-weight: bold; color: #18181b;">{{ $senderName }}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 4px 0; color: #71717a;">Email</td>
                                        <td style="padding: 4px 0; font-weight: bold; color: #18181b;">{{ $senderEmail }}</td>
                                    </tr>
                                    @if ($subjectLine)
                                        <tr>
                                            <td style="padding: 4px 0; color: #71717a;">Subject</td>
                                            <td style="padding: 4px 0; font-weight: bold; color: #18181b;">{{ $subjectLine }}</td>
                                        </tr>
                                    @endif
                                </table>
                                <div style="border-top: 1px solid #e4e4e7; padding-top: 16px; font-size: 14px; line-height: 22px; color: #3f3f46; white-space: pre-line;">{{ $messageBody }}</div>
                                <p style="margin: 24px 0 0; font-size: 12px; line-height: 18px; color: #a1a1aa;">
                                    This message was sent from the contact form on the Dimgent Technologies website.
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
