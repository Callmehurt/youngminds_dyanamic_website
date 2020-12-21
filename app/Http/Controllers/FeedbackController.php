<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends BaseController
{

    /**
     * @var Feedback
     */
    private $feedback;

    public function __construct(Feedback $feedback)
    {
        parent::__construct();
        $this->feedback = $feedback;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = $this->feedback->where('user_id',Auth::user()->id)->get();
        return view('backend.feedback.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ['bug'=>'Bug/Error','suggestion'=>'Suggestion','feedback'=> 'Feedback'];
        return view('backend.feedback.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        try {
            $value = $request->all();
            $files = $request->attachment;
            $jsonencodefile = [];
            if (!empty($files)) {
                $path = md5(time()) . str_random(6);
                foreach ($files as $file):
                    $extension = $file->getClientOriginalExtension();
                    $fileName = 'feedback' . str_random(10) . '.' . strtolower($extension);
                    $jsonencodefile[] = $path . '/' . $fileName;
                    Storage::putFileAs('public/uploads/feedback/' . $path, $file, $fileName);
                endforeach;
            }
            $value['attachment'] = json_encode($jsonencodefile);
            $value['user_id'] = Auth::user()->id;
            $value['date'] = Carbon::now();
            $data = $this->feedback->create($value);
            if ($data) {
                session()->flash('success', 'Successfully Created!');
                return back();
            } else {
                session()->flash('success', 'Could not be Create!');
                return back();
            }
        } catch (\Exception $e) {
            $e = $e->getMessage();
            session()->flash('error', 'Exception : ' . $e);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $feedback = $this->feedback->where('id',$id)->where('user_id',Auth::user()->id)->first();
            if($feedback){
                return view('backend.feedback.show', compact('feedback'));
            }
            else{
                return back();
            }
        } catch (\Exception $e) {
            $e->getMessage();
            session()->flash('error', 'Something went Wrong!!');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = (int)$id;
            $categories = ['bug'=>'Bug/Error','suggestion'=>'Suggestion','feedback'=> 'Feedback'];
            $edits = $this->feedback->where('id',$id)->where('user_id',Auth::user()->id)->first();
            if (count($edits) > 0) {
                return view('backend.feedback.edit', compact('edits','categories'));
            } else {
                session()->flash('error', 'Id could not be obtained!');
                return back();
            }

        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION :' . $exception);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeedbackRequest $request, $id)
    {
        $id = (int)$id;
        try {
            $feedback = $this->feedback->find($id);
            $value = $request->all();
            if ($feedback) {
                $files = $request->attachment;
                $jsonencodefile = [];
                if (!empty($files)) {
                    $path = md5(time()) . str_random(6);
                    foreach ($files as $file):
                        $extension = $file->getClientOriginalExtension();
                        $fileName = 'feedback' . str_random(10) . '.' . strtolower($extension);
                        $jsonencodefile[] = $path . '/' . $fileName;
                        Storage::putFileAs('public/uploads/feedback/' . $path, $file, $fileName);
                    endforeach;
                }
                $value['attachment'] = json_encode($jsonencodefile);

                $feedback->fill($value)->save();
                session()->flash('success', 'Updated successfully!');
                return redirect(route('feedback.index'));
            } else {

                session()->flash('error', 'No record with given id!');

                return back();
            }
        } catch (\Exception $e) {
            $exception = $e->getMessage();
            session()->flash('error', 'EXCEPTION:' . $exception);

            return back();
        }
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
}
