@extends('layouts.app')


@section('content')

<main-card title="Welcome to our Logo Maker"
    subtitle="Type your company name, and a keyword about your business.<br>We will generate logos based on the information given.">
</main-card>

<body-card colsm="8" colmd="6">
    <main-form url="{{ route('results') }}"></main-form>
</body-card>
@endsection

<style>
    @media only screen and (min-width: 600px) {
        .form-welcome {
            padding: 1rem 5rem 2.5rem;
        }
    }
</style>