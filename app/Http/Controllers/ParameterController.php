<?php


namespace App\Http\Controllers;


use App\Models\Param;
use App\Models\User;
use OSN\Framework\Core\Controller;
use OSN\Framework\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $params = Param::all();
        return view('parameter.index', compact('params'));
    }

    /**
     * Show a specific resource.
     *
     * @return mixed
     */
    public function view($id)
    {
        $data = Param::find($id);
        $data || abort(404);
        return $data;
    }

    /**
     * Show a form for creating new resource.
     *
     * @return mixed
     */
    public function create()
    {
        return view('parameter.create');
    }

    /**
     * Create a new resource.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => ['required', 'min:5']
        ], true);

        return Param::create([
            'content' => $request->content,
            'user_id' => 1
        ]);
    }

    /**
     * Show a form for updating a resource.
     *
     * @return mixed
     */
    public function edit($id)
    {
        $param = Param::find($id);
        $param || abort(404);
        return view('parameter.edit', compact('param'));
    }

    /**
     * Update a specific resource.
     *
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => ['required', 'min:5']
        ], true);

        $param = Param::find($id);
        $param || abort(404);

        $param->content = $request->content;
        $param->patch()->execute();

        return $param;
    }

    /**
     * Delete a specific resource.
     *
     * @return mixed
     */
    public function delete($id)
    {
        $param = Param::find($id);
        $param || abort(404);

        return Param::destroy($id);
    }

    public function test($int1, $int2, $slug)
    {
        dd($int1, $int2, $slug);
    }
}
