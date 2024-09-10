@extends('main')

@section('title', '| Contact')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white text-center">
                    <h2>Contact Me</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ url('contact') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label ">Email</label>
                            <input type="email" class="form-control " id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label ">Subject</label>
                            <input type="text" class="form-control " id="subject" name="subject" required>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label ">Message</label>
                            <textarea class="form-control " id="message" name="message" rows="9" required>Type your message here...</textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark mx-auto">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
