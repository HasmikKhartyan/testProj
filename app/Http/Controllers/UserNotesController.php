<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

use App\User;

use Auth;


use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Auth\Guard;
class UserNotesController extends Controller
{
    protected $currentUser;

    use DispatchesJobs, ValidatesRequests;

    public function __construct(Guard $auth)
    {
        $this->currentUser = $auth->user();
    }
    public function index(User $user,Guard $auth)
    {
        $userNotes = User::find($user->id)->notes;
        return $userNotes;
    }
    public function store(Request $request,User $user)
    {

        $validator = \Validator::make($request->all(),
            [
                'user_id' => 'required',
                'title' => 'required|max:50',
                'note' => 'required|max:1000'
            ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 400);
        }else {
            $note = Note::create($request->all());

            return response()->json($note, 201);
        }
    }

    public function delete(User $user,Note $note)
    {
        User::find($user->id)->notes()->where('id', '=', $note->id)->delete();

        return response()->json(null, 204);
    }

    public function update(Request $request,User $user, Note $note)
    {

        $validator = \Validator::make($request->all(),
            [
                'title' => 'required|max:50',
                'note' => 'required|max:1000'
            ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()],400);
        }else{
            $note->update($request->all());
            return response()->json($note, 200);
        }

    }
}
