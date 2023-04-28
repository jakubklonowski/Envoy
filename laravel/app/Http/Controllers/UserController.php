<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // returns user index view
    public function index(Request $request) {
        $login = session('login');
        
        return view('user.index', ['login' => $login, 'options' => false]);
    }

    // returns searchbar & results
    public function search(Request $request) {
        if ($request->isMethod('post')) {
            $results = array();

            // search
            if ($request->query !== null) {
                $results = $this->searchByAllFields($request->query);
            }

            // cast empty results to empty array
            if ($results === null) {
                $results = array();
            }

            return view('user.search', ['results' => $results]);
        }

        return view('user.search', ['results' => null]);
    }

    // search by all qualities
    private function searchByAllFields(string $query) {
        return DB::table('travel_destinations')
                        ->where('destination', 'like', ucfirst($query))
                        ->orWhere('country', 'like', ucfirst($query))
                        ->orWhere('continent', 'like', ucfirst($query))
                        ->orWhere('description', 'like', ucfirst($query))
                        ->get();
    }

    // returns add travel form & adds travels
    public function store(Request $request) {
        if ($request->isMethod('post')) {
            $login = session('login');
            $dest = $request->dest;
            $date = $request->date;
            $active = $request->active;

            $result = DB::table('users')->where('login', $login)->first();
            $user_id = $result->id;

            DB::table('user_travels')->insert([
                'user_id' => $user_id,
                'user_dest' => $dest,
                'date' => $date,
                'active' => $active
            ]);

            return redirect('/user/travels');
        }
        else {
            $destinations = DB::table('travel_destinations')->get();

            return view('user.store', ['destinations' => $destinations]);
        }
    }

    // returns my travels list
    public function travels() {
        $login = session('login');
        $results = DB::table('user_travels')
                            ->join('users', 'user_travels.user_id', '=', 'users.id')
                            ->join('travel_destinations', 'user_travels.user_dest', '=', 'travel_destinations.id')
                            ->select('user_travels.id', 'travel_destinations.destination', 'user_travels.date', 'travel_destinations.country', 'travel_destinations.continent')
                            ->where('users.login', $login)
                            ->get();
        
        return view('user.mytravels', ['travels' => $results]);
    }

    // returns travel edit form & edits travel data
    public function edit(Request $request) {
        if ($request->isMethod('put')) {
            
        }
        else if ($request->isMethod('delete')) {
            
        }
        else {
            $travel_id = $request->id;

            $dest = DB::table('user_travels')->where($travel_id)->first();
            $date = DB::table('user_travels')->where($travel_id)->first();
            $active = DB::table('user_travels')->where($travel_id)->first();

            return view('user.store', []);
        }
    }
    
    // returns options view
    public function options() {
        return view('user.options');
    }
}
