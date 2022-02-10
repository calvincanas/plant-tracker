@extends('layout')

@section('content')
    <table class="table-auto w-full text-sm" id="table-for-plants">
  <thead>
    <tr>
      <th>Name</th>
      <th>Species</th>
      <th>Watering Instructions</th>
      <th>Photo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($plants as $plant)
        <tr>
            <td>{{ $plant->name  }}</td>
            <td>{{ $plant->species  }}</td>
            <td>{{ $plant->watering_instructions  }}</td>
            <td><img width="200" height="auto" src="{{ asset('storage/' . $plant->photo_name)  }}" alt="{{ $plant->name }}" ></td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection
