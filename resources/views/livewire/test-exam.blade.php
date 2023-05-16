<div class="row">
    <div class="col-md-12">
        @if ($currentStep > count($questions))
            <h1>Thank you for completing the Test!</h1>
            <button wire:click="$set('currentStep', 1)">Start Over</button>
        @else
            <div class="card">
                <div class="card-header">
                    <h5>Question {{ $currentStep }}</h5>
                </div>
                <div class="card-body">
                    <p>{!! $questions[$currentStep - 1]->question ?? 'Question Not Set' !!}</p>
                    @php $choices = $questions[$currentStep - 1]->choices; @endphp
                    {{-- <input type="text" wire:model="answers.{{ $questions[$currentStep - 1]->id }}"> --}}
                    <ul class="list-unstyled">
                        @foreach ($choices as $key => $value)
                            <li>
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="choices" value="{{ $key }}">
                                        {{ $value }}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <div class="card-footer">
                    <div class="float-start float-lg-end">
                        @if ($currentStep > 1)
                            <button class="btn btn-secondary" wire:click="$set('currentStep', {{$currentStep}} - 1)"><i
                                    class="bi bi-chevron-double-left"></i> Previous</button>
                        @endif
                        @if ($currentStep < count($questions))
                            <button class="btn btn-primary" wire:click="$set('currentStep', {{$currentStep}} + 1)">Next <i
                                    class="bi bi-chevron-double-right"></i></button>
                        @endif
                        @if ($currentStep == count($questions))
                            <button class="btn btn-success" wire:click="submit">Submit</button>
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
