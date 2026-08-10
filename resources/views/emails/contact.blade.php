<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
</head>
<body>
    <h2>New Contact Message</h2>

    <p><strong>Name:</strong> {{ $name }}</p>

    <p><strong>Email:</strong> {{ $email }}</p>

    <p><strong>Subject:</strong> {{ $subject }}</p>

    <p><strong>Message:</strong></p>

    <p>{{ $contactMessage }}</p>

    <p>
        Thanks,<br>
        {{ config('app.name') }}
    </p>
</body>
</html>