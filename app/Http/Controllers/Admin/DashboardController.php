<?php

    namespace App\Http\Controllers\Admin;
    
    use App\Http\Controllers\Controller;
    use App\Models\Sheep;
    use Illuminate\Http\Request;
    
    class DashboardController extends Controller {
        
        public function index() {
            
            $jumlahDomba = Sheep::count();
            $jumlahDombaJantan = Sheep::where('sheep_gender', 'Jantan')->count();
            $jumlahDombaBetina = Sheep::where('sheep_gender', 'Betina')->count();
    
        
            return view('pages.dashboard', compact('jumlahDomba', 'jumlahDombaJantan', 'jumlahDombaBetina'));
        }
    }