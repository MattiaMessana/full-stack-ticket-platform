<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Operator;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with(['category', 'operator'])->paginate(10);
        return view('admin.tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $operators = Operator::all();
        return view('admin.tickets.create', compact('categories', 'operators'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'operator_id' => 'required|exists:operators,id',
            'status' => 'required|in:open,in_progress,closed',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Ticket creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket eliminato con successo.');
    }


    //cambuo stato del ticket 
    public function updateStatus(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:open,in_progress,closed',
        ]);

        $ticket->update(['status' => $request->status]);

        return redirect()->route('tickets.index')->with('success', 'Stato del ticket aggiornato con successo.');
    }
}
