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

        return view('base', compact('schedules'));
    }
    
    public function cita(string $id): Response
    {
        return response()->view('cita', [
            'schedule' => Schedule::findOrFail($id),
        ]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $schedule = Schedule::findOrFail($id);
            $data = request()->validate([
            'email' => 'required|email',
            'client' => 'required|string|min:3',
            'phone' => 'required|string|min:5',
            ]);

        $update = $request->update($data);

        if($update) {
            session()->flash('notif.success', 'Se acaba de enviar un correo para validar el turno');
            return redirect()->route('base');
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
