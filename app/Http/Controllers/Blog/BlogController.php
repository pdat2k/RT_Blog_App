<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Interfaces\BlogInterface;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $blogService;

    public function __construct(BlogInterface $blogService)
    {
        $this->blogService = $blogService;
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        try {
            $categoryId = $request->get('category_id');
            $search = $request->get('search');
            $data = $this->blogService->list($categoryId, $search);

            return view('layouts.home', [
                'categories' => $data['categories'],
                'blogs' => $data['blogs'],
                'search' => $search,
                'category_id' => $categoryId
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->blogService->category();
        return view('layouts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        return $this->blogService->create($request);
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
            $data = $this->blogService->detail($id);
            $this->authorize('view', $data['blog']);

            return view('layouts.detail', [
                'id' => $id,
                'blog' => $data['blog'],
                'related' => $data['related'],
                'comments' => $data['comments'],
            ]);
        } catch (Exception $e) {
            abort(404);
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
        $blog = $this->blogService->findBlog($id);
        $categories = $this->blogService->category();

        return $blog->user_id === Auth::user()->id
            ? view('layouts.edit', compact('blog', 'categories'))
            : abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $id)
    {
        $this->blogService->updateBlog($request, $id);
        return redirect()->route('user.detail', ['blog' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->blogService->delete($id);
        return redirect()->route('user.home');
    }
}
