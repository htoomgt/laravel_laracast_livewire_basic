
<div class="container-fluid" style="padding: 30px 20px;">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-wrapper">
                @if(isset($successMessage))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success ! </strong> {{ $successMessage }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" wire:click="$set('successMessage', null)">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form wire:submit.prevent="submitForm" action="{{route('send_contact_message')}}" method="POST">
                    @csrf
                    <!-- inputs -->
                    <div class="form-group">
                        <label class="sr-only" for="name">Name</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            </div>
                            <input wire:model="name" type="text" name="name" class="form-control @error('name') error @enderror" id="name" placeholder="Name" value="{{old('name')}}">
                            @error('name')
                                <div class="col-12 mt-1 error-message"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            </div>
                            <input type="email" wire:model="email" name="email" class="form-control @error('email') error @enderror" id="email" placeholder="Email">
                            @error('email')
                                <div class="col-12 mt-1 error-message"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="subject">Subject</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            </div>
                            <input type="text" wire:model="subject" name="subject" class="form-control @error('subject') error @enderror" id="subject" placeholder="Subject">
                            @error('subject')
                                <div class="col-12 mt-1 error-message"> {{ $message }} </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="message">Message</label>
                        <textarea class="form-control @error('message') error @enderror" wire:model="message" name="message" id="message" rows="6"
                            placeholder="Message"></textarea>
                        @error('message')
                            <div class="col-12 mt-1 error-message"> {{ $message }} </div>
                        @enderror
                    </div>

                    <!-- buttons -->
                    <div class="btn-group pull-right" role="group">
                        <button type="reset" class="btn btn-default">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Reset
                        </button>
                        <button type="submit" class="inline-flex items-center btn btn-primary submit disabled:opacity-50 pl-3 pr-3">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>

                            <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // $('#name').dispatchEvent(new Event('input'));
    });
</script>
