
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@stop

@section('calendar')


    <div class="panel panel-default">
        <div class="panel-heading">Kalender</div>

        <div class="panel-body">
            {!! $calendar->calendar() !!}
        </div>
    </div>

@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}

@stop



