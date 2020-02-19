<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>
<body>
<p>
    {{ $comment->comment }}
</p>

---
<p>Replied by: {{ $user->name }}</p>

<p>Title: {{ $ticket->name }}</p>
<p>Ticket ID: {{ $ticket->d }}</p>
<p>Status: {{ $ticket->status->name }}</p>

<p>
     You can view the ticket at any time at {{ url('ticket/'. $ticket->id) }}
</p>

</body>
</html>
