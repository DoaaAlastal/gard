<?php

namespace App\Http\Controllers\SharedControllers;

use Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers= Newsletter::getMembers();
        return view('admin.newsletter.subscribers',compact('subscribers'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (! Newsletter::isSubscribed($request->email)){
            Newsletter::subscribePending($request->email);
            if(app()->getlocale()=='en'){ $msg = 'Check Your Email For Complete';}
            else{$msg = 'يرجى التحقق من البريد الالكتروني لاتمام العملية';}
            toastr( $msg,  'success');
            return redirect()->back();
        }
        if(app()->getlocale()=='en'){ $msg = 'Sorry You Are Already Subscribed';}
        else{$msg = 'البريد الالكتروني مشترك سابقاً معنا ';}
        toastr( $msg,  'error');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function unsubscribe($email)
    {
        if(Newsletter::subscribe($email)){
            toastr( 'Successful Newsletter Unsubscribe ',  'error',  'NewsLetter');
            return redirect()->back();
        }

    }
}
