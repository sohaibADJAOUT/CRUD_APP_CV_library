<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cv;

use Auth;

use App\Http\Requests\cvRequest;

class CvController extends Controller
{   
    public function __construct(){

        $this->middleware('auth');
    }

	//lister les cvs
    public function index(){
        //afficher tous les Cvs->
        //$listcv = Cv::all();
        //$listcv = Cv::where('user_id', Auth::user()->id)->get();
        //ou la ligne suivsante , l'affichag et pateil !
        $listcv = Auth::user()->cvs;
        return view('cv.index',['cvs' => $listcv]);

    }

    //afficher le formulaire de création d'un cv
    public function create(){
    	return view('cv.create');
    }

    //enregister un cv
    public function store(cvRequest $request){
    	$cv = new Cv();
    	$cv->titre = $request->input('titre');
    	$cv->presentation = $request->input('presentation');
        $cv->user_id = Auth::user()->id;

    	$cv->save();
        session()->flash('success','le cv à été bien emregistrer.');
        return redirect('cvs');

    }

    //récupérer un cv puis le mettre dans un formulaire 
    public function edit($id){
        $cv = Cv::find($id);
        return view('cv.edit',['cv' => $cv]);
    	
    }

    //modifier un cv 
    public function update(cvRequest $request, $id){
        $cv = Cv::find($id);
        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');

        $cv->save();

        return redirect('cvs');

    }

    //supprimer un cv
    public function destroy(Request $Request, $id){
        $cv = Cv::find($id);
        $cv->delete();

        return redirect('cvs');
    }
}
