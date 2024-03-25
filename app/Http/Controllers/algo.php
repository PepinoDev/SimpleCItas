<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Schedule;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    public function base():View
    {    
        $schedules = Schedule::all();
        // $schedules = Schedule::latest()
        // ->where('status', true)
        // ->orderBy('updated_at', 'desc')
        // ->get();
        // ->paginate(3);

        // $note = new Note();
        // $notes = $note->where('status', true)->get();

        // $notes = Note::where('status', true)
        
        
        return view('base', compact('schedules'));
    }
    
    // public function cita(Request $req)
    // {
    //     $schedule = Schedule::find($req->id);
    //     return view('cita')->with("schedule",$schedule);
    // }

    public function cita(string $id): Response
    {
        return response()->view('cita', [
            'schedule' => Schedule::findOrFail($id),
        ]);
    }

    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $post = Post::findOrFail($id);
        $validated = $request->validated();

        if ($request->hasFile('featured_image')) {
            // delete image
            Storage::disk('public')->delete($post->featured_image);

            $filePath = Storage::disk('public')->put('images/posts/featured-images', request()->file('featured_image'), 'public');
            $validated['featured_image'] = $filePath;
        }

        $update = $post->update($validated);

        if($update) {
            session()->flash('notif.success', 'Post updated successfully!');
            return redirect()->route('posts.index');
        }

        return abort(500);
    }


    // public function correo(Request $request)
    // {
    //     $data = request()->validate([
    //         'email' => 'required|email',
    //         'name' => 'required|string|min:3',
    //         'message' => 'required|string|min:5',
    //     ]);

    //     // Mail::to('info@artway.com.ar')->send(new ContactForm(($request->all())));
    //     // Mail::to($request()->select)->send(new ContactForm(request()->data));
    //     Mail::to($request['select'])->send(new ContactForm($request->all()));


    //     return redirect()->route('base')->with('info', 'Gracias por el mensaje');

    // }
}
