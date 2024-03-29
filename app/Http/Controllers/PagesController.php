<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Mail;
use Session;
use App\Category;
use Auth;


class PagesController extends Controller{

    public function __construct()
    {
        $this->middleware(['auth','verified'],['only'=>['getContact','postContact']]);
    }

    public function getIndex(){
        #process variable & params
        #talk to the model
        #receive from the model
        #compile or process data from the model if needed
        #pass the data to the correct view
//        $headerPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $oldestPosts = Post::orderBy('created_at', 'desc')->limit(5)->skip(6)->get();
        $posts = Post::orderBy('updated_at', 'desc')->limit(1)->get();
        $categories = Category::All();

//        $cek = auth::check();
//        dd($cek);

        return view('pages.welcome')->withPosts($posts)->withCategories($categories)->withOldest($oldestPosts);
    }

    public function getAbout(){
        // $first = "Fredy";
        // $last = "Gunawan";
        // $full = $first . " " .$last;
        // $mail = "gunawan.fredy97@gmail.com";
        // $data = [];
        // $data["fullname"] = $full;
        // $data["email"] = $mail;
        // return view('pages.about')->withFullname($full)->withEmail($mail);
        return view('pages.about');
    }


    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        $user = Auth::user();
        $this->validate($request,array(
//            'email'=>'required|email',
            'subject'=>'min:3',
            'message'=>'min:10'
        ));

        $data = [
            'email' => $user->email,
//            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        ];

        Mail::send('emails.contact',$data,function($message) use($data){
            $message->from($data['email']);
            $message->to('bloghimti@gmail.com');
            $message->subject($data['subject']);
        });

        Session::flash('success','Your email was sent!');

        return redirect('/');

    }



}
