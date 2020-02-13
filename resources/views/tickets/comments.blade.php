<div class="card">
    <div class="card-body">
        <div class="timeline">
        @foreach ($ticket->comments as $comment)
            <div>
                <i class="fas fa-comments bg-yellow"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> {{ $comment->created_at->format('Y-m-d') }}</span>
                    <h3 class="timeline-header">
                        @if(Auth::user()->id == $comment->id_user)
                            <b>You</b> commented on this ticket
                        @else
                            <b>{{ $comment->user->name }}</b> commented on this ticket
                        @endif
                    </h3>
                    <div class="timeline-body">
                        <p>{{ $comment->comment }}</p>

                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>

