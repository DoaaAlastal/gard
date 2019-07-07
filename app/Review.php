<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['user_id','course_id','rate'];
    public static $rules =[
        'rate'=> 'required',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }


    public static function saveReview($attribute){
        $review =new Review();
        $review->user_id = $attribute['user'];
        $review->course_id =$attribute['course'];
        $review->rate = $attribute['rate'];
        $review->created_at =date('Y-m-d H:i:s');
        if ($review->save())
        {
            $sum = Review::where('course_id',$attribute['course'])->sum('rate');
            $count = Review::where('course_id',$attribute['course'])->count();
            $avg= $sum / $count ;
            $course = Course::where('id',$attribute['course'])->first();
            $course->reviews = $avg;
            $course->save();
            return redirect()->back();
        }
    }

}
