@extends('layouts.app')


@section('content')

<main-card title="Welcome to our Logo Maker"
    subtitle="Type your company name, and a keyword about your business.<br>We will generate logos based on the information given.">
</main-card>
    <body-card colsm="8" colmd="6">
        <v-form class="form-welcome">
            <v-text-field class="mb-3" label="Company Name" placeholder="Your company's name" style="border-radius: 0;"
                rounded outlined></v-text-field>
            <combobox class="mb-3"></combobox>
            <v-btn href="{{ route('results') }}" class="float-right font-weight-medium px-5" color="#C0CA33" elevation=0 dark>SUBMIT</v-btn>
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