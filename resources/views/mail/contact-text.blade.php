New contact form message
========================

Name: {{ $senderName }}
Email: {{ $senderEmail }}
@if ($subjectLine)
Subject: {{ $subjectLine }}
@endif

Message:
{{ $messageBody }}

--
This message was sent from the contact form on the Dimgent Technologies website.
