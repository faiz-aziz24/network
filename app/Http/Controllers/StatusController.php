<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StatusController extends Controller
{

    public function store(StatusRequest $request)
    {
        $request->make($request->body);

        return redirect()->back();
    }

    public function edit($id)
    {
        return view('status.edit', [
            'status' => Status::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required|string',
        ]);

        $status = Status::findOrFail($id);

        $status->update([
            'body' => $request->body,
        ]);

        if ($status) {
            return redirect()
                ->route('timeline')
                ->with([
                    'success' => 'Status has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $status = Status::findOrFail($id);

        if ($status->delete()) {
            return redirect()
                ->route('timeline')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
