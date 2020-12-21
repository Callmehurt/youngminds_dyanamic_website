<?php

namespace App\Http\Controllers\Backend\page;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pages\PageRequest;
use App\Http\Requests\Pages\PageUpdateRequest;
use App\Models\Page;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repository\Pages\PageRepository;

class PageController extends BaseController
{
    private $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        parent::__construct();
        $this->pageRepository = $pageRepository;
    }

    public function index(){
        $pages = $this->pageRepository->all();
        return view('backend.newPage.index', compact('pages'));
    }

    public function upload(Request $request){
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('uploads/images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('uploads/images/'. $fileName);
            $msg = 'Uploaded';
            $response = "
                        <script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>
                        ";
            @header('Content-type: text/html; charset-utf-8');
            echo $response;

        }
    }

    public function store(PageRequest $request)
    {
        try{
            $page = Page::create([
                'page_name' => $request['page_name'],
                'page_title' => $request['page_title'],
                'page_content' => $request['page_content'],
                'added_by_user' => Auth::user()->id,
                'slug' => SlugService::createSlug(Page::class, 'slug', $request['page_name']),
            ]);
            if($page){
                session()->flash('success','Menu successfully created');
                return redirect(route('page.index'));
            }else{
                session()->flash('error','Menu could not be created');
                return back();
            }
        }catch (\Exception $e){
            $e = $e->getMessage();
            session()->flash('error','Exception : '.$e);
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $id=(int)$id;
            $edits=$this->pageRepository->findById($id);
            if(!empty($edits)){
                $pages=$this->pageRepository->all();
                return view('backend.newPage.edit',compact('pages','edits'));
            }else{
                session()->flash('error','Id could not be obtained');
                return back();
            }

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION :'.$exception);
        }
    }

    public function update(PageUpdateRequest $request, $id)
    {
        $id=(int)$id;
        try{
            $page=$this->pageRepository->findById($id);
            if($page){
                $page->fill($request->all())->save();
                session()->flash('success','Updated successfully');
                return redirect(route('page.index'));
            }else{

                session()->flash('error','No record with given id');
                return back();
            }
        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION:'.$exception);
            return back();
        }

    }

    public function destroy($id)
    {
        $id=(int)$id;
        try{
            $value = $this->pageRepository->findById($id);
            if($value){
                $value->delete();
                session()->flash('success','Successfully deleted!');
                return back();
            }else{
                session()->flash('error','Could not be deleted!');
                return back();
            }

        }catch (\Exception $e){
            $exception=$e->getMessage();
            session()->flash('error','EXCEPTION'.$exception);
            return back();

        }
    }



    public function addPage(){
        return view('backend.newPage.add');
    }
}
