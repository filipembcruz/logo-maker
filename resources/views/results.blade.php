@extends('layouts.app')


@section('content')

<main-card title="Your results" subtitle="Click on the chosen logo to download a PNG file.<br>
    If you didn’t like any of the results, just click “Generate more”.">
</main-card>
<body-card colsm="8" colmd="8">
    <logo-card></logo-card>
    
    <v-form class="mx-5 mt-8 px-2">
        <v-btn href="{{ route('home') }}" class="font-weight-medium px-5" color="#3F51B5" style="letter-spacing: 0.75px;" elevation=0 text>GO BACK</v-btn>
        <v-btn class="float-right font-weight-medium px-5" color="#3F51B5" style="letter-spacing: 0.75px;" elevation=0 dark>GENERATE MORE</v-btn>
    </v-form>
</body-card>
@endsection

<style>
    @media only screen and (min-width: 600px) {
        .form-welcome {
            padding: 1rem 5rem 2.5rem;
        }
    }
</style>