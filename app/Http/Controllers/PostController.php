<?php

namespace Opencycle\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Opencycle\Group;
use Opencycle\Http\Requests\Posts\ReplyPostRequest;
use Opencycle\Notifications\PostReply;
use Opencycle\Post;
use Opencycle\Events\PostCreated;
use Opencycle\Http\Requests\Posts\CreatePostRequest;
use Opencycle\Http\Requests\Posts\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Post::class, null, [
            'except' => ['create', 'store'],
        ]);
    }

    /**
     * Get the map of resource methods to ability names.
     *
     * @return array
     */
    protected function resourceAbilityMap()
    {
        return array_merge(parent::resourceAbilityMap(), [
            'replyCreate' => 'reply',
            'replyStore' => 'reply'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the logged in users posts.
     *
     * @return \Illuminate\View\View
     */
    public function user()
    {
        $user = Auth::user();
        $posts = $user->posts()->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $groups = Auth::user()->groups()->get();

        return view('posts.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post($request->except('group'));

        $post->user()->associate($request->user());
        $post->group()->associate(Group::find($request->group));

        $post->save();

        event(new PostCreated($post));

        return redirect()->route('posts.show', $post)->with('success', 'Created new post');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post)
    {
        $group = $post->group;
        $region = $post->group->region;
        $country = $post->group->region->country;

        return view('posts.show', compact('post', 'group', 'region', 'country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());

        return redirect()->route('posts.show', $post)->with('success', 'Edited post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back()->with('success', 'Deleted post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function replyCreate(Post $post)
    {
        return view('posts.reply', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Post $post
     * @param ReplyPostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replyStore(Post $post, ReplyPostRequest $request)
    {
        $post->user->notify(new PostReply($post, $request->message));

        return redirect()->route('posts.show', $post)->with('success', 'Post reply sent');
    }
}
