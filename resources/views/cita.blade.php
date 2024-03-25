@extends('welcome')
@section('content')
{{-- @include('nav') --}}
<form method="post" action="" class="mx-auto mt-6 space-y-6 w-90">
  @csrf
  @isset($schedule)
    @method('put')
  @endisset
  <div>

  </div>
  <div class="pt-3">
    <label for="date" value="Fecha y hora">Fecha y hora</label>
    <input
      placeholder="Fecha y hora"
      type="text"
      name="date"
      id="date"
      disabled
      value="{{ Carbon\Carbon::parse($schedule->date)->format('d/m/Y - H:i');}}"
      required
      class="w-full p-3 rounded-lg focus:outline-none focus:ring focus:ring-blue-400"
    /> 
    @error('email')
      <p><strong>{{$message}}</strong></p>
    @enderror
  </div>
  <div class="pt-3">
    <label for="client" value="Nombre">Ingrese su nombre:</label>
    <input
      placeholder="Nombre completo"
      type="text"
      name="client"
      id="client"
      value="{{ $schedule->client}}"
      required
      class="w-full p-3 rounded-lg focus:outline-none focus:ring focus:ring-blue-400"
    /> 
    @error('client')
      <p><strong>{{$message}}</strong></p>
    @enderror
  </div>
  <div class="pt-3">
    <label for="client" value="Nombre">Ingrese su correo:</label>
    <input
      placeholder="Correo electrónico"
      type="email"
      name="email"
      id="email"
      value="{{ $schedule->email}}"
      required
      class="w-full p-3 rounded-lg focus:outline-none focus:ring focus:ring-blue-400"
    /> 
    @error('email')
      <p><strong>{{$message}}</strong></p>
    @enderror
  </div>
<button
  {{-- type="submit" --}}
  class="inline px-3 py-2 text-blue-400 bg-blue-600 border-2 border-blue-600 rounded-lg cursor-pointer hover:text-blue-200">
  Confirmar
</button>
        
@endsection
  