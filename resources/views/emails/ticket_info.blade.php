<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Suppor Ticket Information</title>
</head>
<body>
    <p>
        Thank you {{ ucfirst($user->name) }} for contacting our support team. A support ticket has been opened for you. You will be notified when a response is made by email. The details of your ticket are shown below:
    </p>

    <p>Title: {{ $ticket->name }}</p>
    <p>Category: {{ $ticket->category->name }}</p>
    <p>Priority: {{ $ticket->priority->name }}</p>
    <p>Status: {{ $ticket->status->name }}</p>
    <p>Type: {{ $ticket->type->name }}</p>

    <p>
        You can view the ticket at any time at {{ url('/mytickets/'. $ticket->id) }}
    </p>

</body>
</html>
