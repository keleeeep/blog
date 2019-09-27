@extends('main')
@section('title','| Kontak')
@section('content')
       <div class="single-box">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="mt-5">Hubungi Admin</h1>
                <div class="form-area">  
                    <form action="{{ url('contact') }}" method="POST">
                        {{ csrf_field() }}
                                <h3 style="margin-bottom: 25px; text-align: center;">Formulir Kontak</h3>
                                {{--<div class="form-group">--}}
                                    {{--<input type="text" class="form-control" id="email" name="email" placeholder="Email" required value="{{$comment->email = $user->email;}}">--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Judul" required>
                                </div>
                                <div class="form-group">
                                <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Pesan" maxlength="200" rows="7"></textarea>
                                </div>
                    <button type="submit" value="Send Message" id="submit" name="submit" class="btn btn-primary pull-right">Kirim Pesan</button>
                    </form>
                 </div>
            </div>
        </div><!-- end row -->
       </div>
@endsection
