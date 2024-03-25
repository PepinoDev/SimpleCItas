@extends('welcome')
@section('content')

<div class="flex flex-col justify-center p-4 m-4 bg-white rounded-md w-80">
@foreach ($schedules as $schedule)
        
    <a href="{{ route('cita', $schedule->id) }}" class="block p-8 m-8 font-bold text-center text-black w-80">
        
      <span>
        {{ Carbon\Carbon::parse($schedule->date)->format('d/m H:i')}}  -  -
      </span>
      <span>
        {{$schedule->professional['name']}} - 
      </span>
      <span>
        {{$schedule->professional['specialty']}}
      </span>
    </a>
    @endforeach    
</div>


@endsection