@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profile Information</h1>
        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Profile Picture:</strong> {{ $profile->profile_picture }}</p>
        <p><strong>Industry:</strong> {{ $profile->industry }}</p>
        <p><strong>Address:</strong> {{ $profile->address }}</p>
        <p><strong>Contact Information:</strong> {{ $profile->contact_information }}</p>
    </div>
@endsection