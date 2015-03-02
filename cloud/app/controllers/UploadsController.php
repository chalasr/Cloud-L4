<?php

define('DS', DIRECTORY_SEPARATOR);

class UploadsController extends BaseController {

    public function __construct(){
        $this->beforeFilter('auth');
    }

    public function index(){
        $size =  round(Upload::getAllSize(Auth::user()->id));
        return View::make('upload.basic', compact('size'));
    }

    public function upload(){
        $files = Input::file('file');
        $uploadPath = public_path('uploads'.DS.strtolower(md5(Auth::User()->id)));
        $filename = $files->getClientOriginalName();
        $path = $uploadPath.DS.$filename;
        $mime = $files->getClientMimeType();
        $sizeKo = $files->getClientSize();
        $miofilesize = Upload::mio($sizeKo);
        $sizeFolder =  Upload::getAllSize(Auth::user()->id);

        if($sizeFolder + $miofilesize > 50)
            throw new Exception('Votre espace de stockage est plein !');

        if(file_exists(public_path('uploads'.DS.strtolower(md5(Auth::User()->id)).DS.$filename))){
            throw new Exception('Ce fichier a deja ete uploade !');
        }
        $files->move($uploadPath, $filename);
        //$extension = $files->getClientOriginalExtension();
        //$validator = Validator::make(Input::all(), File::$rules);
        $file = new Upload;
        $file->name = $filename;
        $file->user_id = Auth::user()->id;
        $file->type = $mime;
        $file->path = $path;
        $file->size = $miofilesize;
        $file->save();

        $file->totalSize = round(Upload::getAllSize(Auth::user()->id));
        return $file;
    }

    public function getRename($id){
        $upload = Upload::findOrFail($id);
        if($upload->user_id != Auth::user()->id && Auth::user()->role_id != 2){
            return Redirect::to('myuploads')->with('message', 'Ce fichier n\'est pas votre propriété, vous ne pouvez donc pas le modifier !');
        }
        return View::make('upload.rename', compact("upload"));
    }

    public function postRename($id){
        $upload = Upload::findOrFail($id);
        $datas = Input::only('name');
        if($upload->user_id != Auth::user()->id && Auth::user()->role_id != 2){
            return Redirect::to('myuploads')->with('message', 'Ce fichier n\'est pas le votre, vous ne pouvez donc pas le modifier !');
        }
        if(file_exists(public_path('uploads'.DS.strtolower(md5(Auth::User()->id))))){
            File::move(public_path('uploads'.DS.strtolower(md5(Auth::User()->id)).DS.$upload->name), public_path('uploads'.DS.strtolower(md5(Auth::User()->id)).DS.$datas['name']));
        }
        $upload->update($datas);
        return Redirect::to('myuploads')->with('message', 'Le fichier a bien été renommé !');

    }

    public function getDelete($id){
        $upload = Upload::findOrFail($id);
        if($upload->user_id != Auth::user()->id && Auth::user()->role_id != 2){
            return Redirect::to('myuploads')->with('message', 'Ce fichier n\'est pas votre propriété, vous ne pouvez donc pas le partager !');
        }
        if(file_exists(public_path('uploads'.DS.strtolower(md5(Auth::User()->id))))){
            File::delete(public_path('uploads'.DS.strtolower(md5(Auth::User()->id)).DS.$upload->name));
        }
        Upload::destroy($id);
        return Redirect::to('myuploads')->with('message', 'Le fichier a bien été supprimé');
    }

    public function download($id){
        $upload = Upload::findOrFail($id);
        if(!$upload->isShare() && Auth::user()->role_id != 2)
            return Redirect::to('/')->with('message', "Vous n'êtes pas autorisé a télécharger ce fichier.");
        if(file_exists(public_path('uploads'.DS.strtolower(md5(Auth::User()->id)).DS.$upload->name)))
            return Response::download(public_path('uploads'.DS.strtolower(md5(Auth::User()->id)).DS.$upload->name));
        else{
            return Redirect::to('/')->with('message', "Le fichier n'existe plus.");
        }
    }

    public function getShare($id){
        $upload = Upload::findOrFail($id);
        if($upload->user_id != Auth::user()->id && Auth::user()->role_id != 2){
            return Redirect::to('myuploads')->with('message', 'Ce fichier n\'est pas votre propriété, vous ne pouvez donc pas le partager !');
        }
        return View::make('upload.share', compact("upload"));
    }

    public function postShare($id){
        $upload = Upload::findOrFail($id);
        $datas = Input::only('status');
        if($upload->user_id != Auth::user()->id && Auth::user()->role_id != 2){
            return Redirect::to('myuploads')->with('message', 'Ce fichier n\'est pas le votre, vous ne pouvez donc pas le partager !');
        }
        $upload->update($datas);
        return Redirect::to('share/'.$upload->id)->with('message', 'Le fichier a bien été partagé !');

    }
}