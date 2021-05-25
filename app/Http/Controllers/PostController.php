<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\PostEditRequest;
use App\Models\File;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', ['posts' => Post::with('author')->get()]);
    }

    public function create()
    {
        return view('create-post');
    }

    public function store(PostStoreRequest $request)
    {
        $files = null;

        $post = Post::query()->create(
            [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'user_id' => Auth::id(),
            ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . $image->getClientOriginalName();
                $filepath = $name;
                File::query()->create([
                    'image' => $name,
                    'fileable_id' => $post->id,
                    'fileable_type' => get_class($post),
                ]);
                Storage::disk('s3')->put($filepath, file_get_contents($image));
            }
        }


        return redirect()->route('posts.index')->with(['success' => 'Post successfully created']);

    }

    public function delete($id)
    {
        Post::query()->find($id)->delete();
        return redirect()->route('posts.index')->with(['success' => 'Post successfully deleted']);
    }

    public function edit(PostEditRequest $request, $id)
    {
        $post = Post::query()->with('files')->find($id);

        return view('edit-post', ['post' => $post]);
    }

    public function update(PostStoreRequest $request, $id)
    {
        $post = Post::query()->find($id);
        $post->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'user_id' => Auth::id(),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $name = time() . $image->getClientOriginalName();
                $filepath = $name;
                File::query()->create([
                    'image' => $name,
                    'fileable_id' => $post->id,
                    'fileable_type' => get_class($post),
                ]);
                Storage::disk('s3')->put($filepath, file_get_contents($image));
            }
        }

        return redirect()->route('posts.index')->with(['success' => 'Post successfully created']);
    }

    public function deleteFile($id)
    {
        File::query()->find($id)->delete();
        return redirect()->back();
    }
}
