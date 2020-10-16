@extends('master')

@section('main')
<div class="container-fluid">
    <script>
// Get the input field

// Execute a function when the user releases a key on the keyboard
        document.addEventListener("keyup", function (event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("friend_added").click();
            }
        });
    </script>
    @if ($user)
    {{ Form::model($user, array('method'=>'PATCH', 'route'=> array('users.update', $user->id)))  }}
    <img src="https://chart.googleapis.com/chart?chs=400x400&cht=qr&&chld=H&chl={{ $user->user_code }}" alt="QR code" class="img-fluid">
    <p>
    <p>   
        {{ Form::submit('Request Sent Show Next', array('id'=>'friend_added','class'=>'btn  btn-success btn-lg','name'=>'friend_added', 'value'=>'friend_added')) }}
    <p>
    <p>
        {{ Form::submit('This is an Invalid Friend Code', array('class'=>'btn  btn-danger','name'=>'friend_faulty', 'value'=>'friend_faulty','onclick'=>"if(!confirm('Are you sure to report as invalid?')){return false;};")) }}
    <h4> You have reported {{ number_format($total_friends) }} friend requests out of {{ number_format($total_codes) }} available Friend Codes </h4>
    {{ Form::close() }}
    @else
    There are no more Friend Codes
    @endif
</div>    
@stop {{-- End of section main --}}