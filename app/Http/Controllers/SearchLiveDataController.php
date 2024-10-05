<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Exception;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;

class SearchLiveDataController extends Controller
{
    // Import Sample Data
    function import() {
        $columns = Schema::getColumnListing('IMP_AMERICA_BL_SEA');
        $query = DB::table('IMP_AMERICA_BL_SEA')
        ->select('*')
        ->limit(1);
        foreach ($columns as $column) {
            $query->whereNotNull($column)
            ->where($column, '!=', 'N/A');
        }
        $result = $query->get();
        // dd($result);
        return view(
<<<<<<< HEAD
            'frontend.importdata',
=======
            'frontend.importdata', 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            [
                'results' => $result
            ]
        );
    }
    // Export Smaple Data
    function export() {
           $columns = Schema::getColumnListing('EXP_AMERICA_BL_SEA');
            $query = DB::table('EXP_AMERICA_BL_SEA')
            ->select('*')
            ->limit(1);
            foreach ($columns as $column) {
                $query->whereNotNull($column)
                ->where($column, '!=', 'N/A');
            }
            $result = $query->get();
<<<<<<< HEAD

           return view(
                'frontend.exportdata',
=======
            
           return view(
                'frontend.exportdata', 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                [
                    'results' => $result
                ]
            );
    }
    // Search Live Data Route handeling
    function handleForm(Request $request) {
        $type = $request->input('type');
        $role = $request->input('role');
        $base_desc = str_replace(' ','-',$request->input('description'));
        $search_country = $request->input('country');
        $description = $base_desc ?: '-';
        $hs_code = $request->input('hs_code') ?: '-';
<<<<<<< HEAD
        //dd($type);
=======
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        // dd($search_country);
         if ($type === 'data'){
                if ($hs_code === '-') {
                    $url = route('search.data', ['search_country'=>$search_country,'type' => $type, 'role' => $role, 'description' => $description]);
                } else {
                    $url = route('search.data', ['search_country'=>$search_country,'type' => $type, 'role' => $role, 'description' => $description, 'hs_code' => $hs_code]);
                }
          } elseif ($type === 'company') {
<<<<<<< HEAD
                // dd($search_country, $type);
                if ($hs_code === '-') {
                    $url = route('search.company', ['type' => $type, 'role' => $role, 'description' => $description, 'country' => $search_country]);
                } else {
                    $url = route('search.company', ['type' => $type, 'role' => $role, 'description' => $description, 'hs_code' => $hs_code, 'country' => $search_country]);
=======
              
                if ($hs_code === '-') {
                    $url = route('search.company', ['search_country'=>$search_country,'type' => $type, 'role' => $role, 'description' => $description]);
                } else {
                    $url = route('search.company', ['search_country'=>$search_country,'type' => $type, 'role' => $role, 'description' => $description, 'hs_code' => $hs_code]);
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                }
          } else {
              abort(404);
          }
        return redirect($url);
<<<<<<< HEAD

    }

    private function table($search_country, $type)
    {
        $secondDbConnection = 'mysql2'; // The name of your second database connection

        // dd($search_country, $type);
=======
        
    }
    private function table($search_country, $type)
    {
        $secondDbConnection = 'mysql2'; // The name of your second database connection
        
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        if ($search_country == 'US') {
            if ($type == 'import') {
                return DB::connection($secondDbConnection)->table('IMP_AMERICA_BL_SEA');
            } elseif ($type == 'export') {
                return DB::connection($secondDbConnection)->table('EXP_AMERICA_BL_SEA');
            }
<<<<<<< HEAD
        }elseif($search_country == 'Austria') {
=======
        }elseif($search_country == 'Austria'){
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            if ($type == 'import') {
                return DB::connection($secondDbConnection)->table('austria');
            } elseif ($type == 'export') {
                return DB::connection($secondDbConnection)->table('austria');
            }
        }elseif ($search_country == 'Ecuador') {
<<<<<<< HEAD
            # code...
=======
            # code...           
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            if ($type == 'import') {
                # code...
                return redirect()->back()->with('message','Currently not found');
            } elseif($type == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('ECUADOR_Export');
            }
<<<<<<< HEAD

        } elseif ($search_country == 'Argentina') {
            # code...
            if ($type == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('argentina_export');
=======
            
        }elseif ($search_country == 'Argentina') {
            # code...           
            if ($type == 'import') {
                # code...
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            } elseif($type == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('argentina_export');
            }
<<<<<<< HEAD
        }

=======
            
        }elseif ($search_country == 'Panama') {
            # code...           
            if ($type == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Panama_import');
            } elseif($type == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Panama_Export');
            }
            
        }elseif ($search_country == 'Chile') {
            # code...           
            if ($type == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Chile_import');
            } elseif($type == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Chile_Export');
            }
            
        }elseif ($search_country == 'Paraguay') {
            # code...           
            if ($type == 'import') {
                # code...
                return DB::connection($secondDbConnection)->table('Paraguay_Import');
            } elseif($type == 'export') {
                # code...
                return DB::connection($secondDbConnection)->table('Paraguay_Export');
            }
            
        }
        
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        return null; // Return null if no table is matched
    }

   // Search live data
    public function search($search_country, $type, $role, $description = null, $hs_code = null)
    {
        $description = str_replace('-', ' ', $description);
        $hs_code = $hs_code ? $hs_code : null; // Ensure $hs_code is null if not provided

<<<<<<< HEAD
        //dd($search_country);
=======
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        // Get the appropriate table based on country and role
        $table = $this->table($search_country, $role);
        if (!$table) {
            return redirect()->back()->with('error', 'Invalid search country or role.');
        }

<<<<<<< HEAD
        //dd($table);
=======
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        // Perform data search
        if ($type === 'data') {
            $result = $this->searchData($table, $description, $hs_code);
        } elseif ($type === 'company') {
<<<<<<< HEAD
            // dd('In company');
=======
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            $result = $this->searchCompany($table, $description, $hs_code);
        } else {
            return redirect()->back()->with('error', 'Invalid search type.');
        }

        if ($result->isEmpty()) {
            return redirect()->back()->with('error', 'No results found. Contact us for more details.');
        }
<<<<<<< HEAD

        // Structure the data for tree view
        // $groupedData = [];

        // foreach ($result as $result) {
        //     $twoDigitHS = substr($result->HS_CODE, 0, 2);
        //     $sixDigitHS = substr($result->HS_CODE, 0, 6);
        //     $eightDigitHS = $result->HS_CODE;

        //     // Create two-digit group
        //     if (!isset($groupedData[$twoDigitHS])) {
        //         $groupedData[$twoDigitHS] = [];
        //     }

        //     // Create six-digit group
        //     if (!isset($groupedData[$twoDigitHS][$sixDigitHS])) {
        //         $groupedData[$twoDigitHS][$sixDigitHS] = [];
        //     }

        //     // Add eight-digit code
        //     $groupedData[$twoDigitHS][$sixDigitHS][] = $eightDigitHS;
        // }

        //dd($result);
        return view('frontend.livedata.search', [
            'result' => $result,
            'country' => $search_country,
=======
    //    dd($result);
        return view('frontend.livedata.search', [
            'result' => $result,
             'country' => $search_country,
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            'mobile_result' => $result,
            'exportresult' => $result,
            'hs_code' => $hs_code,
            'desc' => $description,
            'base_desc' => $description,
            'base_hs_code' => $hs_code,
            'role' => $role,
            'type' => $type,
<<<<<<< HEAD
            //'groupedData' => $groupedData, Pass the structured data for filter hs code
=======
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        ]);
    }

    // Search 'data' type
    private function searchData($table, $description, $hs_code)
    {
<<<<<<< HEAD
        //dd($description);
=======
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        $query = $table->select('*')
            ->whereNotNull('HS_CODE')
            ->where(function ($q) use ($description, $hs_code) {
                if ($hs_code) {
                    $q->where('HS_CODE', 'like', $hs_code . '%')
                      ->whereRaw('LENGTH(HS_CODE) <= 12');
                }
                if ($description && $description !== ' ') {
                    $description = '"' . $description . '"'; // Wrap in quotes for exact matches
                    $q->where(function ($q) use ($description) {
                        $q->where('PRODUCT_DESCRIPTION', 'like', '%' . $description . '%')
                          ->orWhereRaw("MATCH(PRODUCT_DESCRIPTION) AGAINST(? IN BOOLEAN MODE)", [$description]);
                    });
                }
            })
            ->orderByRaw('LENGTH(HS_CODE), HS_CODE') // Sort by HS_CODE length first, then HS_CODE
            // ->limit(5000)
            ->get();
<<<<<<< HEAD
=======

>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        return $query;
    }

    // Search 'company' type
    private function searchCompany($table, $description, $hs_code)
    {
<<<<<<< HEAD
        //dd($description);
        $query = $table->select('*')
        ->whereNotNull('HS_CODE')
        ->where('US_IMPORTER_NAME', '!=', 'N/A')
        ->where(function ($q) use ($description, $hs_code) {
            if ($hs_code) {
                $q->where('HS_CODE', 'like', $hs_code . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12');
            }
            if ($description && $description !== ' ') {
                $description = '"' . $description . '"';
                $q->where(function ($q) use ($description) {
                    $q->where('PRODUCT_DESCRIPTION', 'like', '%' . $description . '%')
                        ->orWhereRaw("MATCH(PRODUCT_DESCRIPTION) AGAINST(? IN BOOLEAN MODE)", [$description]);
                });
            }
        })
        ->limit(12)
        ->get();

        return $query;
    }

=======
        $query = $table->select('*')
            ->whereNotNull('HS_CODE')
            ->where('US_IMPORTER_NAME', '!=', 'N/A')
            ->where(function ($q) use ($description, $hs_code) {
                if ($hs_code) {
                    $q->where('HS_CODE', 'like', $hs_code . '%')
                      ->whereRaw('LENGTH(HS_CODE) <= 12');
                }
                if ($description && $description !== ' ') {
                    $description = '"' . $description . '"';
                    $q->where(function ($q) use ($description) {
                        $q->where('PRODUCT_DESCRIPTION', 'like', '%' . $description . '%')
                          ->orWhereRaw("MATCH(PRODUCT_DESCRIPTION) AGAINST(? IN BOOLEAN MODE)", [$description]);
                    });
                }
            })
            ->limit(12)
            ->get();

        return $query;
    }
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
    // Search Filter
    public function searchFilter()
    {

        // Retrieve all arguments passed to the method
        $args = func_get_args();
        // dd($args);
        // Assign parameters based on the number of arguments
        if (count($args) == 5) {
            [$search_country,$type, $role, $filterby, $filterdata] = $args;
            // Get the appropriate table based on country and role
            $table = $this->table($search_country, $role);
            if (!$table) {
                return redirect()->back()->with('error', 'Invalid search country or role.');
            }
            $search = null;
            $base_search = null;
               if($role == 'import'){
                    if($filterby=='hs_code'){
                    $results =$table
                        ->select('*')
                        ->where('HS_CODE', 'like', $filterdata.'%') // Use 'like' operator for pattern matching
<<<<<<< HEAD
                        ->whereRaw('LENGTH(HS_CODE) <= 12')
                        ->whereNotNull('HS_CODE')
                        ->limit(10)
                        ->get();

=======
                        ->whereRaw('LENGTH(HS_CODE) <= 12') 
                        ->whereNotNull('HS_CODE')
                        ->limit(10)
                        ->get();
                        
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                    //dd($results, $filterdata);
                    }
               }else{
                    $hs_codedetails = $base_search;
                    if($filterby=='hs_code'){
                        $exportresults =$table
                            ->select('*')
                            ->where('HS_CODE', 'like', $filterdata .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->whereNotNull('HS_CODE')
                            ->limit(10)
                            ->get();
                        $results = $exportresults;
<<<<<<< HEAD
                    }

=======
                    } 
                  
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
               }
            if ($results->isEmpty()) {
                 return redirect()->back()->with('error', 'Searched Data Not Found For More Details Contact us.');
            }
            return view('frontend.livedata.searchfilter-one', [
                'search_country' => $search_country,
                'result' => $results,
                'exportresults' =>$results,
                'mobile_result' => $results,
                'desc' => $filterdata,
                'type' => $type,
                'role' => $role,
                'hscode' => $filterdata,
                'filterdata' => $filterdata,
                'base_search' => $filterdata,
<<<<<<< HEAD
=======
                'searchDetails1' => $filterdata,
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                'searfilterdata' => $filterdata,
                'searchfilterby' => $filterby,
                'search' => $filterby,
                'filterby' => $filterby,
                'args'=>$args,
            ]);
        } else if (count($args) == 7) {
            [$search_country,$type, $role, $search, $base_search, $filterby, $filterdata] = $args;
            // Get the appropriate table based on country and role
            $table = $this->table($search_country, $role);
            if (!$table) {
                return redirect()->back()->with('error', 'Invalid search country or role.');
            }
        }

        // Handle different filters based on the filterby parameter
        $filterdata = str_ireplace("-", " ", $filterdata);

        // Your existing logic for processing the filter
        if ($role == 'import') {
            $values = explode(',', $base_search);
            $all_numeric = true;
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            if ($all_numeric){
                $hs_codedetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':
<<<<<<< HEAD

                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
=======
                       
                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12') 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->where('HS_CODE',  $filterdata )
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
<<<<<<< HEAD

=======
                          
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        break;
                    case 'country':
                        //dd('this country Block');
                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
<<<<<<< HEAD
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
=======
                            ->whereRaw('LENGTH(HS_CODE) <= 12') 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->where('ORIGIN_COUNTRY', 'like', $filterdata . '%')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    case 'unloading_port':
<<<<<<< HEAD

                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
=======
                      
                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12') 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->where('UNLOADING_PORT', 'like', $filterdata . '%')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    default:
                        $results = collect();
                }
            } else {
<<<<<<< HEAD

=======
        
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                $descdetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':
                        $results = $table
                            ->select('*')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->where('HS_CODE', 'like', $filterdata . '%')
<<<<<<< HEAD
                             ->whereRaw('LENGTH(HS_CODE) <= 12')
=======
                             ->whereRaw('LENGTH(HS_CODE) <= 12') 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    case 'country':
<<<<<<< HEAD

=======
                    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        $results = $table
                            ->select('*')
                            ->where('ORIGIN_COUNTRY', 'like', $filterdata . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
<<<<<<< HEAD
                             ->whereRaw('LENGTH(HS_CODE) <= 12')
=======
                             ->whereRaw('LENGTH(HS_CODE) <= 12') 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    case 'unloading_port':
                        $results = $table
                            ->select('*')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->where('UNLOADING_PORT', 'like', $filterdata . '%')
<<<<<<< HEAD
                             ->whereRaw('LENGTH(HS_CODE) <= 12')
=======
                             ->whereRaw('LENGTH(HS_CODE) <= 12') 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        break;
                    default:
                        $results = collect();
                }
            }
            if ($results->isEmpty()) {
                 return redirect()->back()->with('error', 'Searched Data Not Found For More Details Contact us.');
            }
             return view('frontend.livedata.searchfilter', [
                'country' => $search_country,
                'result' => $results,
                'mobile_result' => $results,
                'desc' => $filterdata,
                'type' => $type,
                'role' => $role,
                'hscode' => $filterdata,
                'filterdata' => $filterdata,
                'base_search' => $base_search,
                'searfilterdata' => $filterdata,
                'searchfilterby' => $filterby,
                'search' => $search,
                'filterby' => $filterby,
                'args'=>$args,
            ]);
        } else {
            $values = explode(',', $base_search);
            $all_numeric = true;
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            if ($all_numeric){
                $hs_codedetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':
                        $exportresults = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $filterdata .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->orWhere('HS_CODE', '=', $hs_codedetails)
                            ->limit(10)
                            ->get();
<<<<<<< HEAD

=======
                            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        break;
                    case 'country':
                        $exportresults = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->limit(10)
                            ->get();
                        break;
                    case 'unloading_port':
                        $exportresults = $table
                            ->select('*')
                            ->where('UNLOADING_PORT', 'like', '%' . $filterdata . '%')
                            ->where('HS_CODE', 'like', '%' . $hs_codedetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->limit(10)
                            ->get();
                        break;
                    default:
                        $results = collect();
                }
            } else {
                $descdetails = $base_search;
                switch ($filterby) {
                    case 'hs_code':
<<<<<<< HEAD

                        $exportresults = $table

=======
                        
                        $exportresults = $table
                      
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->select('*')
                            ->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->limit(10)
                            ->get();
<<<<<<< HEAD

                        break;
                    case 'country':

=======
                      
                        break;
                    case 'country':
                        
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        $exportresults = $table
                            ->select('*')
                            ->where('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->limit(10)
                            ->get();
                        break;
                    case 'unloading_port':
                        $exportresults = $table
                            ->select('*')
                            ->where('UNLOADING_PORT', 'like', '%' . $filterdata . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $descdetails .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->limit(10)
                            ->get();
                        break;
                    default:
                        $exportresults = collect();
                }
            }
            if ($exportresults->isEmpty()) {
                 return redirect()->back()->with('error', 'Searched Data Not Found For More Details Contact us.');
            }
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
             return view('frontend.livedata.searchfilter', [
                'country' => $search_country,
                'exportresults' => $exportresults,
                'result' => $exportresults,
                'desc' => $filterdata,
                'type' => $type,
                'role' => $role,
                'hscode' => $filterdata,
                'filterdata' => $filterdata,
                'base_search' => $base_search,
                'searfilterdata' => $filterdata,
                'searchfilterby' => $filterby,
                'search' => $search,
                'filterby' => $filterby,
                'args'=>$args,
            ]);
        }

    }

    // Search Filter One
    public function searchFilter1() {
        // Handle different filters based on the filterby parameter
          $args = func_get_args();
        // dd($args);
          if(count($args)==7){
            [$search_country,$type, $role,$filterby, $filterdata,  $filterby1,$filterdata1] = $args;
            $table = $this->table($search_country, $role);
            if (!$table) {
                return redirect()->back()->with('error', 'Invalid search country or role.');
            }
            $filterdata1 = str_replace('-', ' ', $filterdata1);
            $filterdata = str_replace('-', ' ', $filterdata);
            $search = null;
            $base_search = null;
            //dd($type, $role,'Filterby',$filterby,'Filterdata', $filterdata,'Filterby1',  $filterby1,'Filterdata1',$filterdata1);
            if(is_numeric($filterdata)){
                if ($role=='import') {
                        if($filterby1 == 'hs_code'){
                                $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'LIKE',  $filterdata1 . '%')
                            ->where(function($query) use ($filterdata) {
                                $query->where('HS_CODE', 'like', $filterdata . '%')
                                        ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                                        ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            })
                            ->whereNotNull('HS_CODE')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
                            ->limit(10)
                            ->get();
                        }else if($filterby1 == 'country'){
                            $results = $table
                            ->select('*')
                            ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                            ->where('HS_CODE', 'LIKE', $filterdata . '%')
                            ->where(function($query) use ($filterdata) {
                                $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                        ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                                        ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            })
                            ->whereNotNull('HS_CODE')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
<<<<<<< HEAD
                            ->whereNotNull('US_IMPORTER_NAME')
=======
                            // ->whereNotNull('US_IMPORTER_NAME')
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->limit(10)
                            ->get();
                        }else{
                                $results = $table
                            ->select('*')
                            ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                            ->where('HS_CODE', 'LIKE', $filterdata .'%')
                            ->where(function($query) use ($filterdata) {
                                $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                        ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%');
                            })
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
                            ->whereNotNull('HS_CODE')
                            ->limit(10)
<<<<<<< HEAD
                            ->get();
=======
                            ->get(); 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        }

                    return view('frontend.livedata.searchfilter-one', [
                        'search_country' => $search_country,
                        'result' => $results,
                        'mobile_result' => $results,
                        'desc'   => $filterdata,
                        'type'   => $type,
                        'role'   => $role,
                        'hscode' => $filterdata,
                        'searfilterdata' => $filterdata,
                        'searchDetails1' => $filterdata,
                        'filterby' => $filterby,
                        'filterby1'=> $filterby1,
                        'filterdata' => $filterdata,
                        'filterdata1' => $filterdata1,
                        'args' => $args
<<<<<<< HEAD

=======
                        
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        ]);
                }else{
                        if($filterby1 == 'hs_code'){
                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $filterdata1 . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                            // ->where(function($query) use ($filterdata) {
                            //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            //               ->orWhere('DESTINATION_COUNTRY', $filterdata )
                            //               ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            //     })
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
                            ->whereNotNull('HS_CODE')
                            ->whereNotNull('US_EXPORTER_NAME')
                            ->limit(10)
                            ->get();
<<<<<<< HEAD

=======
                            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            // dd($results);
                        }else if($filterby1 == 'country'){

                            $results = $table
                            ->select('*')
                            ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                            ->where('HS_CODE', 'LIKE', $filterdata . '%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where(function($query) use ($filterdata) {
                                $query->where('HS_CODE', 'like',  $filterdata . '%')
<<<<<<< HEAD
                                        ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
=======
                                        ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                                        ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            })
                            ->whereNotNull('HS_CODE')
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
                            ->limit(10)
                            ->get();
                        }else{
                            // dd($type, $role,$filterby, $filterdata,  $filterby1,$filterdata1);
                                $results =$table
                            ->select('*')
                            ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                            ->where('HS_CODE', 'LIKE', $filterdata .'%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->where(function($query) use ($filterdata) {
                                $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
<<<<<<< HEAD
                                        ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%');
=======
                                        ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%');
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            })
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
                            ->whereNotNull('HS_CODE')
                            ->limit(10)
<<<<<<< HEAD
                            ->get();
=======
                            ->get(); 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        }

                    return view('frontend.livedata.searchfilter-one', [
                        'search_country' => $search_country,
                        'result' => $results,
                        'desc'   => $filterdata,
                        'type'   => $type,
                        'role'   => $role,
                        'hscode' => $filterdata,
                        'searfilterdata' => $filterdata,
                        'searchDetails1' => $filterdata,
                        'filterby' => $filterby,
                        'filterby1'=> $filterby1,
                        'filterdata' => $filterdata,
                        'filterdata1' => $filterdata1,
                        'args' => $args
                        ]);
                }
<<<<<<< HEAD
            }else{
                if ($role=='import') {

                        if($filterby1 == 'hs_code'){

=======
            }else{                        
                if ($role=='import') {
                        
                        if($filterby1 == 'hs_code'){
                            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                                $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                            // ->where(function($query) use ($filterdata) {
                            //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            //           ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            // })
                            ->whereNotNull('HS_CODE')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
                            ->whereNotNull('US_IMPORTER_NAME')
                            ->limit(10)
                            ->get();
                        }else if($filterby1 == 'country'){
<<<<<<< HEAD

=======
                                
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                                $results = $table
                                ->select('*')
                                ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                                ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                ->where(function($query) use ($filterdata) {
                                    $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                                            ;
                                })
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                ->whereNotNull('HS_CODE')
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                ->whereNotNull('US_IMPORTER_NAME')
                                ->limit(10)
                                ->get();
                        }else{
                                $results = $table
                            ->select('*')
                            ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                            ->where(function($query) use ($filterdata) {
                                $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                        ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            })
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->whereNotNull('HS_CODE')
                            ->limit(10)
<<<<<<< HEAD
                            ->get();
=======
                            ->get(); 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        }

                    return view('frontend.livedata.searchfilter-one', [
                        'search_country' => $search_country,
                        'result' => $results,
                        'mobile_result' => $results,
                        'desc'   => $filterdata,
                        'type'   => $type,
                        'role'   => $role,
                        'hscode' => $filterdata,
                        'searfilterdata' => $filterdata,
                        'searchDetails1' => $filterdata,
                        'filterby' => $filterby,
                        'filterby1'=> $filterby1,
                        'filterdata' => $filterdata,
                        'filterdata1' => $filterdata1,
                        'args' => $args
                        ]);
                }else{
                        if($filterby1 == 'hs_code'){
                        $results = $table
                            ->select('*')
                            ->where('HS_CODE', 'like', $filterdata1 . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                            // ->where(function($query) use ($filterdata) {
                            //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            //               ->orWhere('DESTINATION_COUNTRY', $filterdata )
                            //               ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            //     })
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
                            ->whereNotNull('HS_CODE')
                            // ->whereNotNull('US_EXPORTER_NAME')
                            ->limit(10)
                            ->get();
<<<<<<< HEAD

=======
                            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            // dd($results);
                        }else if($filterby1 == 'country'){

                                $results = $table
                                ->select('*')
                                ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                                ->whereRaw('LENGTH(HS_CODE) <= 12')
                                // ->where(function($query) use ($filterdata) {
                                //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                                //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                                //           ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                                // })
                                ->whereNotNull('HS_CODE')
                                ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                                ->orderBy('HS_CODE', 'asc')
                                ->limit(10)
                                ->get();
<<<<<<< HEAD

=======
                            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        }else{
                            // dd($type, $role,$filterby, $filterdata,  $filterby1,$filterdata1);
                                $results = $table
                            ->select('*')
                            ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                            ->where('PRODUCT_DESCRIPTION', 'like', '%' . $filterdata . '%')
                            ->whereRaw('LENGTH(HS_CODE) <= 12')
                            // ->where(function($query) use ($filterdata) {
                            //     $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            //           ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%');
                            // })
                            ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                            ->orderBy('HS_CODE', 'asc')
                            ->whereNotNull('HS_CODE')
                            ->limit(10)
                            ->get();
<<<<<<< HEAD

=======
                            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                        }

                    return view('frontend.livedata.searchfilter-one', [
                        'search_country' => $search_country,
                        'result' => $results,
                        'exportresult' => $results,
                        'desc'   => $filterdata,
                        'type'   => $type,
                        'role'   => $role,
                        'hscode' => $filterdata,
                        'searfilterdata' => $filterdata,
                        'searchDetails1' => $filterdata,
                        'filterby' => $filterby,
                        'filterby1'=> $filterby1,
                        'filterdata' => $filterdata,
                        'filterdata1' => $filterdata1,
                        'args' => $args
                        ]);
                }
            }
          }
          else if(count($args)==9){
              [$search_country,$type, $role,$search,$base_search,$filterby, $filterdata,  $filterby1,$filterdata1] = $args;
              $table = $this->table($search_country, $role);
              if (!$table) {
                  return redirect()->back()->with('error', 'Invalid search country or role.');
              }
          }
        // dd('Type',$type,'Role', $role,'Search Details1',$base_search,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
          $filterdata1 = str_replace('-', ' ', $filterdata1);
          $filterdata = str_replace('-', ' ', $filterdata);
          $base_search = str_replace('-', ' ', $base_search);
        //   dd($args,$args,$type, $role,'Search Details1',$base_search,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata,$filterby1);
        if ($role=='import') {
            # code...
            if (is_numeric($base_search)) {
                # code...
<<<<<<< HEAD
                if ($filterby1 == 'hs_code') {
=======
                if ($filterby1 == 'hs_code') {       
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                    $results = $table
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();
                    // dd('if BlockS',$results);
                } else if ($filterby1 == 'country') {
                    // dd('Search Deatails',$searchDetails,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
                    $results = $table
                    ->select('*')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE',  $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
<<<<<<< HEAD
                    ->whereNotNull('US_IMPORTER_NAME')
=======
                    // ->whereNotNull('US_IMPORTER_NAME')
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                    ->limit(10)
                    ->get();
                    // dd('Country Block',$results);
                } else if ($filterby1 == 'unloading_port'){
                    // dd('Search Deatails',$searchDetails,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE',  $base_search .'%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%');
                    })
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    ->whereNotNull('HS_CODE')
<<<<<<< HEAD
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();

=======
                    // ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();
                
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                } else {
                    # code...
                     $results = collect();
                }
            } else {
                # code...
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                if ($filterby1 == 'hs_code') {
                    $results = $table
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->Where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();

                    // dd('if BlockS');
                } else if ($filterby1 == 'country') {
                    // dd($type, $role,'Search Details1',$base_search,'Search Deatails',$searchDetails,'Filter data1', $filterdata1,'filterby', $filterby,'filterdata',$filterdata);
                    $results = $table
                    ->select('*')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($q) use ($base_search) {
                        $q->where('PRODUCT_DESCRIPTION', 'like', '%'. $base_search . '%')
                          ->orWhereRaw("MATCH(PRODUCT_DESCRIPTION) AGAINST(? IN BOOLEAN MODE)", [$base_search]);
                    })
                    ->where(function($query) use ($filterdata) {
<<<<<<< HEAD
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
=======
                        $query->where('HS_CODE', 'like',  $filterdata . '%')                          
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                              ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(1000)
                    ->get();

                     //dd('Country Block',$results);
                } else if ($filterby1 == 'unloading_port'){
                    //dd('Else Bloack in Unloading pOrt',$base_search,$filterdata,$filterdata1);
                    $filterdata1 = str_replace('-', ' ', $filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE',  $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->where(function($query) use ($filterdata) {
<<<<<<< HEAD
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
=======
                        $query->where('HS_CODE', 'like',  $filterdata . '%')                          
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(5000)
<<<<<<< HEAD
                    ->get();
=======
                    ->get(); 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                   // dd($results);
                } else {
                    # code...
                     $results = collect();
                }
            }
        } else {
            # code...
            // dd('In Export Bloc');
            $values = explode(',', $base_search);
            $all_numeric = true;
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            if ($all_numeric){
            //   dd('In numeric Bloc');
                # code...
                if ($filterby1 == 'hs_code') {
                    // dd('HS_CODE', $filterdata,'filterdata1',$filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata. '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata. '%')
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata. '%');
<<<<<<< HEAD
                    })
=======
                    }) 
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                // dd($results);
                } else if ($filterby1 == 'country') {
                    // dd('DESTINATION_COUNTRY',$filterdata1,'HS_CODE', $filterdata,);
                    $results = $table
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE', 'LIKE', $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('UNLOADING_PORT', 'like',  $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
<<<<<<< HEAD

=======
              
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                } else if ($filterby1 == 'unloading_port'){
                    // dd('UNLOADING_PORT',$filterdata1,'DESTINATION_COUNTRY',$filterdata,$base_search);
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('HS_CODE','like', $base_search.'%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('HS_CODE', 'like', $filterdata . '%')
                              ->orwhere('UNLOADING_PORT','like','%'. $filterdata. '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                //    dd($results);
                } else {
                    # code...
                     $results = collect();
                }
            } else {
<<<<<<< HEAD
                # code...
=======
                # code...  
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                // dd('UNLOADING_PORT',$filterdata1,'DESTINATION_COUNTRY',$filterdata,$base_search);
                if ($filterby1 == 'hs_code') {
                    // dd('$filterdata1',$filterdata1,'Base',$base_search,'filterdata',$filterdata);
                    $results = $table
                    ->select('*')
                    ->where('HS_CODE', 'like', $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', $filterdata )
                              ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                    // dd('if BlockS',$results);
                } else if ($filterby1 == 'country') {
                    // dd('Filterdata',$filterdata,'filterdata1',$filterdata1,$searchDetails);
                    $results = $table
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_Code', 'like', '%' . $filterdata . '%')
                              ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                              ->orWhere('Unloading_port', 'like', '%' . $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
<<<<<<< HEAD

=======
                
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                    // dd('Query Results', $results);
                } else if ($filterby1 == 'unloading_port'){
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'like', '%' . $base_search . '%')
                    ->where(function($query) use ($filterdata) {
<<<<<<< HEAD
                        $query->where('HS_Code', 'like', $filterdata . '%')
=======
                        $query->where('HS_Code', 'like', $filterdata . '%')                          
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%' . $filterdata . '%');
                            //   ->orWhere('PRODUCT_DESCRIPTION', 'like', '%' . $searchDetails1 . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->orderBy(DB::raw('LENGTH(HS_CODE)'), 'asc')  // Sort by the length of HS_CODE first
                    ->orderBy('HS_CODE', 'asc')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
<<<<<<< HEAD

=======
                   
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                } else {
                    # code...
                     $results = collect();
                }
            }
            // dd($filterby,$filterby1);
        }

        return view('frontend.livedata.searchfilter-one', [
            'search_country' => $search_country,
            'result' => $results,
            'mobile_result' => $results,
            'desc'   => $filterdata,
            'type'   => $type,
            'role'   => $role,
            'hscode' => $filterdata,
            'searchDetails1' => $base_search,
            'filterby' => $filterby,
            'filterby1'=> $filterby1,
            'filterdata' => $filterdata,
            'filterdata1' => $filterdata1,
            'args' => $args,
            'search' =>$search
         ]);
    }

    // Search Filter two
    public function searchFilter2() {
        // Check and debug input parameters
          $arg = func_get_args();
          //dd($arg);
          if(count($arg) == 9){
             [$search_country,$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1] = $arg;
             $searchDetails1=$filter;
             $table = $this->table($search_country, $role);
             if (!$table) {
                 return redirect()->back()->with('error', 'Invalid search country or role.');
             }
          }else if(count($arg) == 11){
             [$search_country,$type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1] = $arg;
             $table = $this->table($search_country, $role);
             if (!$table) {
                 return redirect()->back()->with('error', 'Invalid search country or role.');
             }
            }
        // dd('Type',$type,'Role', $role,$search,'Base Search',$searchDetails1,'Filter', $filter,'Filterby',$filterby,'Filterby1', $filterby1, 'Filterdata',$filterdata,'Filterby2', $filterby2,'Dilterdata1', $filterdata1);
          $filterdata1 = str_replace('-', ' ', $filterdata1);
          $filterdata = str_replace('-', ' ', $filterdata);
          $filter = str_replace('-', ' ', $filter);
        if ($role == 'import') {
            # code...
            $values = explode(',', $searchDetails1);
            $all_numeric = true;
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
<<<<<<< HEAD

            if ($all_numeric){
                # code...
                // dd('Numeric Bloc');

=======
            
            if ($all_numeric){
                # code...
                // dd('Numeric Bloc');
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                if ($filterby2 == 'hs_code') {
                    // dd('IN Numeric hs_code','SearchDetails', $filter, 'filterdata', $filterdata, 'filterby', $filterby, 'filterdata1', $filterdata1);

                    $results =  $table
                    ->select('*')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->limit(10)
<<<<<<< HEAD
                    ->get();
=======
                    ->get();  
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c

                    // dd('if BlockS');
                } else if ($filterby2 == 'country') {
                    // dd('IN Numeric Country','SearchDetails', $searchDetails, 'filterdata', $filterdata, 'filterby', $filterby, 'filterdata1', $filterdata1);
                    $results =  $table
                    ->select('*')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
<<<<<<< HEAD
                    ->get();

=======
                    ->get();   
                    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c

                    // dd('Country',$results);
                } else if ($filterby2 == 'unloading_port') {
                    // dd('IN Numeric UNLOADING_PORT','Filter',$filter,'filterdata', $filterdata, 'filterby', $filterby,'Filterby1', $filterby1,'Filterby2', $filterby2, 'filterdata1', $filterdata1);
                    $results =  $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
<<<<<<< HEAD
                    ->get();

=======
                    ->get();  
                
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                } else {
                    # code...
                    $results = collect();
                }
            } else {
                # code...
                //   dd('Type',$type,'Role', $role,'$searchDetails1',$searchDetails1,'Filter', $filter,'Filterby',$filterby,'Filterby1', $filterby1, 'Filterdata',$filterdata,'Filterby2', $filterby2,'Filterdata1', $filterdata1);
                if ($filterby2 == 'hs_code') {

                    $results =  $table
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
<<<<<<< HEAD
                    ->get();


=======
                    ->get(); 
        
                
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                } else if ($filterby2 == 'country') {
                    // dd('CoUNTRY BLOCK');
                // dd('Type',$type,'Role', $role,'searchDetails1',$searchDetails1,'Filter', $filter,'Filterby',$filterby,'Filterby1', $filterby1, 'Filterdata',$filterdata,'Filterby2', $filterby2,'Filterdata1', $filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('ORIGIN_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filter . '%')
                            ->orWhere('HS_CODE', 'like', $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
<<<<<<< HEAD
                    ->get();

=======
                    ->get(); 
                
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c

                } else if ($filterby2 == 'unloading_port') {

                    //dd('Base Search', $searchDetails1, 'Filter', $filter, 'Filterdata', $filterdata, 'Filterby', $filterby, 'Filterdata1', $filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('PRODUCT_DESCRIPTION', 'like', '%' . $filter . '%')
                            ->orWhere('HS_CODE', 'like',  $filter . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like',  $filterdata . '%')
                            ->orWhere('ORIGIN_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->limit(10)
<<<<<<< HEAD
                    ->get();

=======
                    ->get(); 
    
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                } else {
                    # code...
                    $results = collect();
                }
            }
        } else {
            # code...
            // dd('In Export Block',$filterby,$filterby2);
            $values = explode(',', $searchDetails1);
            $all_numeric = true;
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            foreach ($values as $value) {
                if (!is_numeric($value)) {
                    $all_numeric = false;
                    break;
                }
            }
<<<<<<< HEAD

            if ($all_numeric){
                # code...
=======
            
            if ($all_numeric){
                # code...  
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                // dd("In Numeric block",'filterby',$filterby,'filterby2',$filterby2);
                if($filterby2 == 'hs_code'){
                    //dd("In Hs_Code",$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                    $results = $table
                        ->select('*')
                        // ->where('UNLOADING_PORT', 'LIKE', '%' . $searchDetails . '%')
                        // ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata . '%')
                        ->where('HS_CODE', 'LIKE',  $filterdata1 . '%')
                        ->where(function($query) use ($filter) {
                            $query->where('HS_CODE', 'like',  $filter . '%')
                                ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                                ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                        })
                        ->where(function($query) use ($filterdata) {
                            $query->where('HS_CODE', 'like',  $filterdata . '%')
                                ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                                ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                        })
                        ->whereRaw('LENGTH(HS_CODE) <= 12')
                        ->whereNotNull('HS_CODE')
                        // ->whereNotNull('US_EXPORTER_NAME')
                        ->limit(10)
                        ->get();
                    // dd('Export last hs_code');
                }else if($filterby2=="country"){
                    //  dd("In Country",$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                }else if($filterby2=="unloading_port"){
                    // dd("In Port",$type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                    #Unloading_Port
                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE',  $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                    // dd($results->toSql(),$results->getBindings());
                    // dd($results);
                }
<<<<<<< HEAD

=======
                
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
            } else {
                # code...
                // dd('In description Block');
                if ($filterby2 == 'hs_code') {
                    # code...
                    //dd($arg,'PRODUCT_DESCRIPTION', $searchDetails1,'DESTINATION_COUNTRY', $filterdata,'HS_CODE', $filterdata1 );
<<<<<<< HEAD

=======
                
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                    $results = $table
                    ->select('*')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where('HS_CODE', 'LIKE', '%' . $filterdata1 . '%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
<<<<<<< HEAD

=======
                
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
                } elseif($filterby2 == 'country') {
                    # code...
                    //dd('PRODUCT_sDESCRIPTION', $searchDetails1,'UNLOADING_PORT', 'DESTINATION_COUNTRY',$filterdata1,$filter,$filterdata1);
                    $results = $table
                    ->select('*')
                    ->where('DESTINATION_COUNTRY', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_IMPORTER_NAME')
                    ->limit(10)
                    ->get();
                    // dd('Export last country non numeric',$results);
                } elseif ($filterby2 == 'unloading_port') {
<<<<<<< HEAD
                    # code...
=======
                    # code...     
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c

                    $results = $table
                    ->select('*')
                    ->where('UNLOADING_PORT', 'LIKE', '%' . $filterdata1 . '%')
                    ->where('PRODUCT_DESCRIPTION', 'LIKE','%'.$searchDetails1 .'%')
                    ->where(function($query) use ($filter) {
                        $query->where('HS_CODE', 'like', '%' . $filter . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filter . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filter . '%');
                    })
                    ->where(function($query) use ($filterdata) {
                        $query->where('HS_CODE', 'like', '%' . $filterdata . '%')
                            ->orWhere('DESTINATION_COUNTRY', 'like', '%' . $filterdata . '%')
                            ->orWhere('UNLOADING_PORT', 'like', '%'. $filterdata . '%');
                    })
                    ->whereRaw('LENGTH(HS_CODE) <= 12')
                    ->whereNotNull('HS_CODE')
                    // ->whereNotNull('US_EXPORTER_NAME')
                    ->limit(10)
                    ->get();
                }
            }
<<<<<<< HEAD

=======
            
>>>>>>> 04a096cefd956ed8d5f5a9841a8da4ad0a300d9c
        }
        // dd($search);
        // Return the view with results
        return view('frontend.livedata.searchfilter-one', [
            'search_country' => $search_country,
            'result' => $results,
            'mobile_result' => $results,
            'desc' => $filterdata,
            'type' => $type,
            'role' => $role,
            'hscode' => $filterdata,
            'searchDetails1' => $searchDetails1,
            'filterby'=>$filterby,
            'filterby1'=>$filterby1,
            'filterdata' => $filterdata,
            'filterby2' => $filterby2,
            'filterdata1' => $filterdata1,
             'arg' => $arg,
             'filter'=>$filter,
             'search' => count($arg) == 11 ? $search : 'default_search_value'
        ]);
    }
}
