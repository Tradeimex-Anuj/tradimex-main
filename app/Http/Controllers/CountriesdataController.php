<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
class CountriesdataController extends Controller
{
    //
    // function countrydata() {
    //     try {
    //         $countrydata = DB::table('import')
    //         -> select('country','country_code','Datatype')
    //         -> union(DB::table('export')->select('country','country_code','Datatype'))
    //         -> get();
    //         try {
    //             // Fetch the title, summary, and image_big columns from the posts table
    //             $recentPosts = DB::table('posts')->select('title', 'summary', 'image_big')
    //                 ->orderByDesc('created_at')->take(4)->get();
    
    //             // Return the data to your view or do whatever you want with it
    //             // return view('frontend.index', compact('recentPosts'));
    //         } catch (QueryException $e) {
    //             // Handle database query exception
    //             // Log the error, redirect, or display a custom error message
    //             return back()->withError('Error fetching recent posts: ' . $e->getMessage())->withInput();
    //         }
    //         return view('frontend.index', ['countrydata' => $countrydata,'recentPosts'=>$recentPosts]);
    //     } catch (\Exception $e) {
    //         // Log the error
    //         Log::error('Error in countrydata method: ' . $e->getMessage());
    //     }

    // }
    function countrydata() {
        try {
            // Fetch country data from 'import' and 'export' tables
            $countrydata = DB::table('import')
                ->select('country', 'country_code', 'Datatype')
                ->union(DB::table('export')->select('country', 'country_code', 'Datatype'))
                ->get();
       
            // Fetch recent posts from 'posts' table
            $recentPosts = DB::table('posts')
                ->select('title','title_slug', 'summary', 'image_big')
                ->orderByDesc('created_at')
                ->take(6)
                ->get();
            // dd(' recentPosts', $recentPosts);
            // Return the data to your view
            return view('frontend.index', compact('countrydata', 'recentPosts'));
        } catch (QueryException $e) {
            // Handle database query exception
            Log::error('Error fetching data: ' . $e->getMessage());
            return back()->withError('Error fetching data: ' . $e->getMessage())->withInput();
        } catch (\Exception $e) {
            // Log any other exceptions
            Log::error('Error in countrydata method: ' . $e->getMessage());
            return back()->withError('Error: ' . $e->getMessage())->withInput();
        }
    }
    function customsdata() {
        try {
            $countrydata = DB::table('import')
            -> select('country','country_code','Datatype')
            -> union(DB::table('export')->select('country','country_code','Datatype'))
            -> get();

            return view('frontend.customs-data', ['countrydata' => $countrydata]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in countrydata method: ' . $e->getMessage());
        }
    }
    function globaltradedata() {
        try {
            $countrydata = DB::table('import')
            -> select('country','country_code','Datatype')
            -> union(DB::table('export')->select('country','country_code','Datatype'))
            -> get();

            return view('frontend.global-trade-data', ['countrydata' => $countrydata]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in countrydata method: ' . $e->getMessage());
        }

    }
    function statisticaldata() {
        try {
            $countrydata = DB::table('import')
            -> select('country','country_code','Datatype')
            -> union(DB::table('export')->select('country','country_code','Datatype'))
            -> get();

            return view('frontend.statistical-data', ['countrydata' => $countrydata]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in countrydata method: ' . $e->getMessage());
        }
    }
    // Bl-Data
    function blreport() {
        try {
            $countrydata = DB::table('import')
            -> select('country','country_code','Datatype')
            -> union(DB::table('export')->select('country','country_code','Datatype'))
            -> get();

            return view('frontend.bl-data', ['countrydata' => $countrydata]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in countrydata method: ' . $e->getMessage());
        }
      
    }
    function countryalldata($country, $Datatype) {
        try {

            $countrydata = DB::table('import')
            -> select('*')
            -> where('country'     , $country)
            -> where('Datatype'    , $Datatype)
            -> union(
                DB::table('export')
            -> select('*')
            -> where('country'     , $country)
            -> where('Datatype'    , $Datatype)   
            )
            ->get();

            $countryname = DB::table('import')
            -> select('country','country_code')
            -> union(DB::table('export')->select('country','country_code'))
            -> get();
            
            $continentData = DB::select('select * from continent');
            return view('frontend.countries', ['countrydata' => $countrydata,'continentData' => $continentData , 'countryname' => $countryname]);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error in countrydata method: ' . $e->getMessage());
        }
    }
}
