@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
                            </div>
                        </div>
                        <hr>

                        <div class="media">
                          <votes-system :model="{{$question}}" name="question"></votes-system>
                            {{-- @include('shared._vote',[
                                'model'=>$question
                            ]) --}}
                            <div class="media-body">
                                {!! $question->body_html !!}
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <user-info :model="{{ $question }}" label = "Asked"></user-info>
                                        {{-- @include('shared._author',[
                                            'model'=>$question,
                                            'label'=>'Asked '
                                        ]) --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($question->answers_count > 0)
            @include('answers._index',[
                'answers'=> $question->answers,
                'answersCount'=> $question->answers_count,
            ])
        @endif

        <div class="col-md-12">
            @include('answers._create')
        </div>

    </div>
@endsection
