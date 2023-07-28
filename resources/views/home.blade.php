@extends('layout.layout')
@section('title', 'home')
@section('content')

<h2>Home</h2>

@if ($pessoas->count() > 0)

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>cpf</th>
            <th>actions</th>
        </tr>
    </thead>
    @foreach ($pessoas as $pessoa)
        <tbody>
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$pessoa->name}}</td>
                <td>{{$pessoa->email}}</td>
                <td>{{$pessoa->cpf}}</td>
                <td>
                    <a href="{{route('edit', $pessoa->id)}}">Edit</a>
                    <form action="{{route('destroy', $pessoa->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    @endforeach
</table>
@else
<h3>
    Não há pessoas cadastradas, <a href="{{route('create')}}">cadastre já!</a>
</h3>
@endif
@endsection
