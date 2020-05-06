<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Lesson;
use App\Model\Tag;
use App\Model\TagLesson;
use App\Model\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends CommController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Lesson::get();
        //标签数据

        return view('admin.lesson.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tag::get();


        return view('admin.lesson.create',compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lesson $leseson)
    {
        $leseson['title'] = $request['title'];
        $leseson['introduce'] = $request['introduce'];
        $leseson['preview'] = $request['preview'];
        $leseson['iscommend'] = $request['iscommend'];
        $leseson['ishot'] = $request['ishot'];
        $leseson['click'] = $request['click'];
        $leseson->save();

        $videos = json_decode($request['videos'],true);

        foreach($videos as $video){
            $leseson->videos()->create([
                "title" => $video['title'],
                "path" => $video['path'],
                ]
            );
        }

        return redirect('/admin/lesson');
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
        $lesson = Lesson::find($id);
        $videos = json_encode($lesson->Videos()->get()->toArray(),JSON_UNESCAPED_UNICODE);
        // dd($videos);

        $tag = Tag::get();

        return view('admin.lesson.edit',compact('lesson','videos',"tag"));
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
        $leseson = Lesson::find($id);

        $leseson['title'] = $request['title'];
        $leseson['introduce'] = $request['introduce'];
        $leseson['preview'] = $request['preview'];
        $leseson['iscommend'] = $request['iscommend'];
        $leseson['ishot'] = $request['ishot'];
        $leseson['click'] = $request['click'];
        $leseson->save();

        $tag_lesson = TagLesson::where([['tag_id',$request['tag']],['lesson_id',$id]])->get();


        if (count($tag_lesson) == 0){
            $tag_lesson = TagLesson::created();
            $tag_lesson['tag_id'] = $request['tag'];
            $tag_lesson['lesson_id'] = $id;

            $tag_lesson->save();
        }

        $tag_lesson['tag_id'] = $request['tag'];


        Video::where('lesson_id',$id)->delete();
        $videos = json_decode($request['videos'],true);

        foreach($videos as $video){
            $leseson->videos()->create([
                "title" => $video['title'],
                "path" => $video['path'],
                ]
            );
        }

        return redirect('/admin/lesson');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::destroy($id);
        Video::where('lesson_id',$id)->delete();
        return $this->success("删除成功");
    }
}
