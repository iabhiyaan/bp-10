<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:' . permissionConstant()::FOLDERS['view-folders'])->only('index');
        $this->middleware('permission:' . permissionConstant()::FOLDERS['alter-folders'])->only('edit', 'update');
        $this->middleware('permission:' . permissionConstant()::FOLDERS['delete-folders'])->only('destroy');
    }

    public function index()
    {
        return view('admin.folder.list', ['details' => []]);
    }

    public function store(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $this->authorize('create', Folder::class);

        return view('admin.folder.create', ['data' => []]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit()
    {
    }

    public function update(Request $request)
    {
    }

    public function destroy()
    {
    }
}
