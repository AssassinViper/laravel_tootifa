<?php


namespace App\Http\Controllers\API\Admin;
use App\Http\Controllers\API\BaseController;
use App\Includes\Constant;
use App\Models\Category;
use App\Models\Course;
use App\Models\LevelOneGroup;
use App\Models\LevelThreeGroup;
use App\Models\LevelTwoGroup;
use App\Models\Tag;
use App\Models\Tenant;
use App\Models\UProfile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TagsController extends BaseController
{
    public function createTag(Request $request){
        $title = $request->input("title");

        // check title
        if(Tag::where('title', $title)->exists())
            return $this->sendResponse(Constant::$REPETITIVE_TITLE, null);

        $tag = new Tag();
        $tag->title = $title;
        $tag->save();

        return $this->sendResponse(Constant::$SUCCESS,  ['tag_id' => $tag->id]);
    }

    public function editTag(Request $request){
        $title = $request->input("title");
        $tag = Tag::find($request->input("id"));

        // check title
        if($tag->title != $title && Tag::where('title', $title)->exists())
            return $this->sendResponse(Constant::$REPETITIVE_TITLE, null);

        $tag->title = $title;
        $tag->save();

        return $this->sendResponse(Constant::$SUCCESS, null);
    }

    public function deleteTag(Request $request){
        $tag = Tag::find($request->input("id"));
        $force_delete = $request->input("force_delete");

        if(!$force_delete && ($tag->courses->count() > 0 || $tag->posts->count() > 0))
            return $this->sendResponse(Constant::$RELATED_ENTITIES, null);

        $tag->courses()->detach();
        $tag->posts()->detach();

        $tag->delete();

        return $this->sendResponse(Constant::$SUCCESS, null);
    }

    public function fetchTags(Request $request){
        $tags = Tag::all()->map(function ($tag){
            return [
                'id' => $tag->id,
                'title' => $tag->title
            ];
        });

        return $this->sendResponse(Constant::$SUCCESS, $tags);
    }
}
