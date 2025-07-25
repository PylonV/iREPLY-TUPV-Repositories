@extends('layout.dashboard')

@section('title', 'Applicants')

@section('content')
    <div>
        <h1>Applicants</h1>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ route('applicants.store') }}" method="POST" class="w-90">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>
            <button type="submit">Submit</button>
        </form>
        <livewire:applicants-table :applicants="$list" />
    </div>
@endsection
