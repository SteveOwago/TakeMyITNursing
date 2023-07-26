<div class="row">
    <div class="col-md-12">
        @if ($currentStep > count($questions))
            <div class="text-center card col-md-8 offset-2">
                <h2 class="text-center">Thank you for completing the Test!</h2>
                <a href="{{ route('admin.tests.students.results',[auth()->user()->id]) }}" wire:click="$set('currentStep', 1)"
                    class="btn btn-sm btn-success">Click to Check Your Results</a>
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    <h5>Question {{ $currentStep }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <p>{!! $questions[$currentStep - 1]->question ?? 'Question Not Set' !!}</p>
                    </div>
                    <div class="row">
                        @php $choices = $questions[$currentStep - 1]->choices; @endphp
                        {{-- <input type="text" wire:model="answers.{{ $questions[$currentStep - 1]->id }}"> --}}
                        <ul class="list-unstyled">
                            @foreach ($choices as $key => $value)
                                <li>
                                    <div class="form-group">
                                        <label>
                                            {{ str_replace('choice_', '', $key) }}&nbsp;:&nbsp; <input type="radio"
                                                name="choices" value="{{ $key }}"
                                                wire:model="answers.{{ $questions[$currentStep - 1]->id }}">
                                            {{ $value }}
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col md-6">
                            <strong>Answer</strong>
                            <div class="answer-area" id="answerArea">
                                {!! $questions[$currentStep - 1]->answer !!}
                            </div>
                            <br>
                            <button class="btn btn-sm btn-info show-indicator" onclick="showAnswer()">Click to
                                show</button><br>
                            <strong>Short Answer Explanation</strong>
                            <div class="answer-area" id="shortAnswerArea">
                                {!! $questions[$currentStep - 1]->short_answer !!}
                            </div>
                            <br>
                            <button class="btn btn-sm btn-warning show-indicator" onclick="showShortAnswer()">Click to
                                show</button>
                        </div>

                        {{-- Check if user is premium user or is Admin or has test management permission --}}
                        <div class="col md-6">
                            <strong>Full Answer Explanation</strong>
                            <div class="answer-area" id="fullAnswerArea">
                                {!! $questions[$currentStep - 1]->full_answer !!}
                            </div>
                            <br>
                            <button class="btn btn-sm btn-primary show-indicator" onclick="showFullAnswer()">Click to
                                show</button><br>
                            <strong>Answer Resource Link</strong>
                            <div class="answer-area" id="answerResourceArea">
                                <a href="{{ $questions[$currentStep - 1]->answer_resource }}" target="_blank"
                                    rel="noopener noreferrer">{{ $questions[$currentStep - 1]->answer_resource }}</a>
                            </div>
                            <br>
                            <button class="btn btn-sm btn-success show-indicator" onclick="showAnswerResource()">Click
                                to show</button>
                        </div>

                    </div>

                </div>
                <div class="card-footer">
                    <div class="float-start float-lg-end">
                        @if ($currentStep > 1)
                            <button class="btn btn-secondary"
                                wire:click="$set('currentStep', {{ $currentStep }} - 1)"><i
                                    class="bi bi-chevron-double-left"></i> Previous</button>&nbsp;
                        @endif
                        @if ($currentStep < count($questions))
                            <button class="btn btn-primary"
                                wire:click="$set('currentStep', {{ $currentStep }} + 1)">Next <i
                                    class="bi bi-chevron-double-right"></i></button>&nbsp;
                        @endif
                        @if ($currentStep == count($questions))
                            <button class="btn btn-success"
                                wire:click="submit({{ $questions }},{{ $studentTestID }})">Submit</button>
                        @endif
                    </div>
                </div>
                @push('scripts')
                    <script>
                        document.addEventListener('livewire:load', function() {
                            Livewire.hook('message.processed', (message, component) => {
                                if (message.updateQueue.hasOwnProperty('currentStep')) {
                                    component.set('currentStep', @this.currentStep);
                                }
                            });
                        });
                    </script>
                @endpush
            </div>

        @endif
    </div>

</div>
