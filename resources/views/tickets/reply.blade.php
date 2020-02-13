<div class="card">
    <div class="card-body">
        <div>
            <form action="{{ route('ticket.comment') }}" method="POST" class="form">
                {!! csrf_field() !!}
                <input type="hidden" name="id_ticket" value="{{ $ticket->id }}">

                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    <textarea rows="5" id="comment" class="form-control" name="comment"></textarea>

                    @if ($errors->has('comment'))
                        <span class="help-block">
                           <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
