@extends('main')
@section('title','| Contact')
@section('content')
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <h1>Contact Me</h1>
                <div class="form-area">  
        <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
                    <h3 style="margin-bottom: 25px; text-align: center;">Contact Form</h3>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
					</div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Message" maxlength="200" rows="7"></textarea>
                    </div>
        <button type="submit" value="Send Message" id="submit" name="submit" class="btn btn-primary pull-right">Submit Form</button>
        </form>
    </div>
            </div>
        </div><!-- end row -->
        
@endsection
