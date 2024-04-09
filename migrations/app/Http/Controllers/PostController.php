<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Soluzione 1
        // GET /posts --> index()
        /* $sql = 'SELECT * FROM posts';
        if($request->has('id')) {
            $sql .= ' WHERE id = ' . $request->get('id');
            $res = DB::select($sql);
            $obj = array_pop($res);
            return view('postdetail', ['post' => $obj]);
        } else {
            $res = DB::select($sql);
            return view('posts', ['posts' => $res]);
        } */

        //Soluzione 2

        /* $querybuilder = DB::table('posts');

        if($request->has('id')) {
            $querybuilder->where('id', '=', $request->get('id'));
        } */

        // Soluzione 3

        $querybuilder = Post::orderBy('id');

        if($request->has('id')) {
            $querybuilder->where('id', '=', $request->get('id'));
        }

        return view('posts', ['posts' => $querybuilder->get()]);

        // return 'PostController / method: index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('createpost', ['users' => User::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  return 'PostController / method: store';

        // Soluzione 1

        /* $sql = 'INSERT INTO posts (title, description, post_thumbnail, user_id, created_at)
                VALUES (:title, :description, :post_thumbnail, :user_id, :created_at)';

        $data = $request->only(['title', 'description']);

        $data['post_thumbnail'] = 'https://picsum.photos/id/'.fake()->randomNumber(2).'/200/300';
        $data['user_id'] = User::get()->random()->id;
        $data['created_at'] = Carbon::now();

        $res = DB::update($sql, $data);

        // return $res ? 'Post created' : 'Creation Failed';
        return redirect()->action([PostController::class, 'index']); */

        $data = $request->only(['title', 'description']);
        $data['post_thumbnail'] = 'https://picsum.photos/id/'.fake()->randomNumber(2).'/200/300';
        $data['user_id'] = User::get()->random()->id;
        $data['created_at'] = Carbon::now();

        // Soluzione 2

        /* $querybuilder = DB::table('posts');
        $querybuilder->insert($data); */

        // Soluzione 3

        Post::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //

        // return 'PostController / method: show';

        // return view('postdetail', ['post' => $post]);
        // in alternativa alla vista, posso ritornare direttamente un'API
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // return 'PostController / method: edit';

        return view('editpost', ['post' => $post]);
    }

    public function updatePost(Request $request, Post $post)
    {
        // Soluzione 1

        /* $sql = 'UPDATE posts SET title = :title, description = :description, updated_at = :updated_at
                WHERE id = :id';
 */
        $data = $request->only(['title', 'description', 'id']);
        $data['updated_at'] = Carbon::now();

        // $res = DB::update($sql, $data);

        // Soluzione 2

        // $querybuilder = DB::table('posts')->where('id', "=", $request->get('id'))->update($data);

        // Soluzione 3



        return redirect()->action([PostController::class, 'index']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Per adesso, lo ignoro perché non sto facendo chiamate AJAX

        $data = $request->only(['title', 'description', 'id']);
        $data['updated_at'] = Carbon::now();

        $querybuilder = $post->update($data);

        return $querybuilder ? 'Post Aggiornato' : 'Modifica fallita';

        // return 'PostController / method: update';
    }

    public function destroyPost(int $id)
    {
        //

        /* $sql = 'DELETE FROM posts WHERE id = :id';

        $res = DB::delete($sql, ['id' => $id]); */

        $querybuilder = DB::table('posts')->delete($id);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Per adesso, lo ignoro perché non sto facendo chiamate AJAX

        $querybuilder = $post->delete();

        return $querybuilder ? 'Post Cancellato' : 'Cancellazione fallita';

        //return 'PostController / method: destroy';
    }
}
