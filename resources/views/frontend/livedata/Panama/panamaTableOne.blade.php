    {{-- Result Table --}}
    @if ($role=='import')
        <section class="container-fluid bg-bluish">
        <div class="pdt-2 pdb-5">
            <div class="">
                <table class="table box-shadow-md table-reponsive">
                    <thead>
                        <tr>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Date</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">HS Code</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Product Description</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Origin Country</h4>
                            </th>
                            <th class="table-primary">
                               <h4 class="fw-bolder">Custom Name</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">QTY.</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Unit</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Weight</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Importer Name</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $Dresult = $result;
                        // dd($Dresult);
                        $iteration = 0;
                    @endphp
                    @if(isset($Dresult) && $Dresult->count() > 0)
                        @foreach ($Dresult as $Dresult)
                                {{-- @dd($searchDetails1) --}}
                            @php
                                $iteration++;
                                $res_hs_code = $Dresult->HS_CODE;
                                // dd($res_hs_code);
                                $country = $Dresult->ORIGIN_COUNTRY;
                                $country= str_ireplace(" ","-",$country);
                                $unloading_port  = $Dresult->UNLOADING_PORT;
                                $args = $args??[];
                                // Hs code Url
                                $arg = $arg??[];
                                
                                //dd($filterby1,$filterby,$args,$searchDetails1,$arg,$filterdata1,$filterdata);
                                    //dd($filterby,$filterby1,$args);
                                $searchDetailsParts = !empty($searchDetails1)?explode(',', $searchDetails1):explode(',', $base_search);
                                $all_numeric = true;
                                
                                foreach ($searchDetailsParts as $part) {
                                    if (!is_numeric($part)) {
                                        $all_numeric = false;
                                        break;
                                    }
                                }
                                // dd($all_numeric);
                                if ($all_numeric) {                              
                                    # code...                                       
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    if(count($args)== 5){
                                        // dd($args,$filterby,$filterdata,$hs_code);
                                        if($filterby=='hs_code'){
                                            $hs_code_url = route('hs-code', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                            $country_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                            $port_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port ?? 'null']);
                                        }else if($filterby == 'country'){
                                            $hs_code_url = route('hs-code', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                            $country_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                            //Port Url
                                            $port_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                        } else if($filterby == 'unloading_port'){
                                            //Hs Code Url
                                            $hs_code_url = route('hs-code', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                            //Coutry Url
                                            $country_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                            //Port Url
                                            $port_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                        }
                                    }
                                    else if(count($args)==7){                                    
                                            if($filterby1=='hs_code'){
                                                $hs_code_url =  route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                                $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                $port_url = route('searchfilterone', ['type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                            }else if($filterby1=='unloading_port'){
                                                //dd('In this Group');
                                                $hs_code_url =  route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                                $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                                $port_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                            }else if($filterby1=='country'){
                                            // dd($filterby,$filterby1,$args,$filterdata);
                                            $hs_code_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $country]);
                                            $country_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $country, 'filterdata1' => $unloading_port]);
                                            }
                                    }
                                    else if(count($args)==9){
                                    
                                            if($filterby1 == 'country'){
                                            
                                                //dd('In Country Args',$args,$filterby1,$filterby,$filterdata,$filterdata1,$search,$filterby1);
                                                //Hs Code URl
                                                $hs_code_url =  route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => $filterby1,'filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $filterdata1??'null']);
                                                
                                                //Country Url
                                                $country_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                
                                                //Port Url
                                                $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                
                                            }else if($filterby1 == 'hs_code'){
                                                $base_search = $search;
                                                $port_url = route('filter-two', [
                                                    'country'=>$search_country,
                                                    'type' => $type, 
                                                    'role' => $role,
                                                    'search' => $base_search,
                                                    'searchDetails1' => $searchDetails1, 
                                                    'filterby2' => 'unloading_port',
                                                    'filterby' => $filterby,
                                                    'filter' => $filterdata,
                                                    'filterby1' => $filterby1,
                                                    'filterdata' => $filterdata1,
                                                    'filterdata1' => $unloading_port ?? 'Default'
                                                ]);

                                            }else if($filterby1 == 'unloading_port'){
                                            
                                                $base_search = $search;
                                                    //dd($search,$filterby,$filterby1,$args);
                                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                    //Hs code Url
                                                    $hs_code_url =  route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);
                                                
                                                    //Country Url
                                                    $country_url =  route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$searchDetails1, 'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);
                                                
                                                //Port Url 
                                                    $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            }
                                        }
                                        else if(count($arg)==9){
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            
                                        if($filterby2 == 'hs_code'){
                                            //Hs_code
                                            $hs_code_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                            //Country Url
                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                            //Port Url
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        }else if($filterby2 == 'country'){
                                            //dd($filterby,$filterby1,$arg,$filterby2,$search,$searchDetails1);
                                            //$hs_code_url = route('search-filter-two', ['type' => $type, 'role' => $role,'search'=> $filterby,'searchDetails1'=>$res_hs_code, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                            $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $filterdata1??'default']);
                                            
                                            }else if($filterby2 == 'unloading_port'){
                                            //Hs_code
                                            $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            //Country url
                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            //Port Url                                                           //Port Url 
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            
                                            }
                                        } else if(count($arg)==11){
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            //dd($filterby,$filterby1,$arg,$filterby2);
                                        if($filterby2 == 'hs_code'){
                                            //Hs_code
                                            $hs_code_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                            //Country Url
                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                            //Port Url
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        }else if($filterby2 == 'country'){
                                            $hs_code_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            
                                            }else if($filterby2 == 'unloading_port'){
                                            //Hs_code
                                            $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            //Country url
                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            //Port Url                                                           //Port Url 
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                            
                                            }
                                        }
                                    else{
                                            $country_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                        }
                                    // $country_url = route('search-filter', ['type' => $type, 'role' => $role,'searchDetails' => $hscode, 'filterby' => 'country', 'filterdata' => $country]);
                                }else{
                                    //dd('IN Else Block',$filterby2,$filterby,$filterby1,$args,$arg,$filterdata);
                                    if(count($args)==7){
                                        if($filterby1=='unloading_port'){
                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                            $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'null']);
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port??"null"]);
                                        
                                        }else if($filterby1=='country'){
                                        //Hs_code Url
                                            $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $filterdata1??'null']);
                                        //Port Url
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                        //Country Url
                                            $country_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                        
                                        }else if($filterby1=='hs_code'){
                                        //dd('In this Block');
                                        $hs_code_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'hs_code','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $filterdata1]);
                                        $country_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'base_search'=>$searchDetails1, 'filterby1' => 'country','filterby'=>$filterby1,'filterdata'=>$filterdata1,'filterdata1' => $country??'null']);
                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                        }
                                    }
                                    else if(count($args)==9){                     
                                        if($filterby1 == 'country'){
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            $filterdata = str_ireplace(" ", "-", $filterdata);
                                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                            //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                            //Hs Code URl
                                            if($filterby=='hs_code'){
                                            $hs_code_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' =>  $res_hs_code??"null", 'filterdata1' => $country]);
                                            $port_url =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                            }else{
                                            $hs_code_url =  route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                            }
                                            
                                            //Country Url
                                            $country_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                            
                                            //Port Url
                                            //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                            
                                            
                                        }else if($filterby1 == 'hs_code'){
                                            $base_search = $search;
                                            $port_url = route('filter-two', [
                                                'country'=>$search_country,
                                                'type' => $type, 
                                                'role' => $role,
                                                'search' => $base_search,
                                                'searchDetails1' => $searchDetails1, 
                                                'filterby2' => 'unloading_port',
                                                'filterby' => $filterby,
                                                'filter' => $filterdata,
                                                'filterby1' => $filterby1,
                                                'filterdata' => $filterdata1,
                                                'filterdata1' => $unloading_port ?? 'Default'
                                            ]);

                                        }else if($filterby1 == 'unloading_port'){
                                            //dd($filterby1,$filterdata1,$filterby,$filterdata,$searchDetails1,$search,$args);
                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            $filterdata = str_ireplace(" ", "-", $filterdata);
                                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                            //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                            //Hs Code URl
                                            if($filterby=='hs_code'){
                                            //Hs_code Url
                                            $hs_code_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'Default']);
                                            //Port Url
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                            //Country Url
                                            $country_url =  route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                            }else{
                                            $hs_code_url =  route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                            $country_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                            }
                                            
                                            //Port Url
                                            //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                        }
                                    }
                                    else if(count($arg)==9){
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                        
                                        if($filterby2 == 'country'){
                                        $hs_code_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                        $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                        //Port Url
                                        $port_url =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                        }else if($filterby2 == 'unloading_port'){
                                    
                                            $base_search = $search;
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                //Hs code Url
                                                $hs_code_url =   route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                //dd($type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                                //Country Url
                                                $country_url  = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                            
                                            //Port Url 
                                                $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                
                                        //$country_url = route('searchfiltertwo', ['type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        }
                                    }else if(count($arg)==11){
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                            // dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                        if($filterby2 == 'hs_code'){
                                            //Hs_code
                                            $hs_code_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                            //Country Url
                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->ORIGIN_COUNTRY]);
                                            //Port Url
                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                        }else if($filterby2 == 'country'){
                                        //HS_code Url
                                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                            //Hs_code
                                            //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                            
                                            $hs_code_url  = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                            //Country url
                                            $country_url  =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                            //Port Url                                                           
                                            $port_url  =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                            
                                            
                                        }else if($filterby2 == 'unloading_port'){
                                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                            //Hs_code
                                            //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                            
                                            $hs_code_url  = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                            //Country url
                                            $country_url  =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                            //Port Url                                                           
                                            $port_url  =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                            
                                            }
                                        }
                                    else{
                                            $country_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                        }                                       
                                }

                            @endphp
                            <tr>
                                <td class="fw-bolder text-center text-gray">
                                    {{$Dresult->DATE}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    <a href="{{ $hs_code_url }}" class="font-medium text-blue-600 hover:underline">
                                        {{-- {{ $Dresult->HS_CODE }} --}}
                                        @foreach (explode(',', $Dresult->HS_CODE) as $code)
                                            <div>{{ $code }}</div>
                                        @endforeach
                                    </a>
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    {{$Dresult->PRODUCT_DESCRIPTION}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    <a href="{{ $country_url }}" class="font-medium text-blue-600 hover:underline">
                                            {{$Dresult->ORIGIN_COUNTRY}}
                                    </a>
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    <a href="{{ $port_url }}" class="font-medium text-blue-600 hover:underline">
                                        {{$Dresult->UNLOADING_PORT}}
                                    </a>
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    {{$Dresult->QUANTITY}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    {{$Dresult->MEASURE_UNIT}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    {{$Dresult->US_FOB}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    <a>
                                        Importer Name
                                    </a> 
                                </td>
                            </tr>
                            @if ($iteration==10)
                                @break
                            @endif
                        @endforeach                       
                        @else
                            <tbody>
                                <tr>
                                    Data NOt found
                                </tr>
                            </tbody> 
                        @endif
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link text-gray" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link text-gray" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-gray" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-gray" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link text-gray" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>    
    @else
        <section class="container-fluid bg-bluish">
        <div class="pdt-2 pdb-5">
            <div class="">
                <table class="table box-shadow-md table-reponsive">
                    <thead>
                        <tr>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Date</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">HS Code</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Product Description</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Origin Country</h4>
                            </th>
                            <th class="table-primary">
                               <h4 class="fw-bolder">Custom Name</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">QTY.</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Unit</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Value($)</h4>
                            </th>
                            <th class="table-primary">
                                <h4 class="fw-bolder">Importer Name</h4>
                            </th>
                        </tr>
                    </thead>
                            <tbody>
                                @php
                                $Dresult = $result;
                                // dd($Dresult);
                                $iteration = 0;
                            @endphp
                            @if(isset($Dresult) && $Dresult->count() > 0)
                                @foreach ($Dresult as $Dresult)
                                    {{-- @dd($searchDetails1) --}}
                                        @php
                                            $iteration++;
                                            $res_hs_code = $Dresult->HS_CODE;
                                            // dd($res_hs_code);
                                            $country = $Dresult->DESTINATION_COUNTRY;
                                            $country= str_ireplace(" ","-",$country);
                                            $unloading_port  = $Dresult->UNLOADING_PORT;
                                            $args = $args??[];
                                            // Hs code Url
                                            $arg = $arg??[];
                                            
                                            //dd($filterby1,$filterby,$args,$searchDetails1,$arg,$filterdata1,$filterdata);
                                                //dd($filterby,$filterby1,$args);
                                            $searchDetailsParts = !empty($searchDetails1)?explode(',', $searchDetails1):explode(',', $base_search);
                                            $all_numeric = true;
                                            
                                            foreach ($searchDetailsParts as $part) {
                                                if (!is_numeric($part)) {
                                                    $all_numeric = false;
                                                    break;
                                                }
                                            }
                                            // dd($all_numeric);
                                            if ($all_numeric) {                              
                                                # code...                                       
                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                if(count($args)== 5){
                                                    // dd($args,$filterby,$filterdata,$hs_code);
                                                    if($filterby=='hs_code'){
                                                        $hs_code_url = route('hs-code', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                                        $country_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                        $port_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port ?? 'null']);
                                                    }else if($filterby == 'country'){
                                                        $hs_code_url = route('hs-code', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                                        $country_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                        //Port Url
                                                        $port_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                    } else if($filterby == 'unloading_port'){
                                                        //Hs Code Url
                                                        $hs_code_url = route('hs-code', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                                        //Coutry Url
                                                        $country_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                        //Port Url
                                                        $port_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$base_search,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                    }
                                                }
                                                else if(count($args)==7){                                    
                                                        if($filterby1=='hs_code'){
                                                            $hs_code_url =  route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                            $port_url = route('searchfilterone', ['type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                                        }else if($filterby1=='unloading_port'){
                                                            //dd('In this Group');
                                                            $hs_code_url =  route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $unloading_port]);
                                                            $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                            $port_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $unloading_port]);
                                                        }else if($filterby1=='country'){
                                                        // dd($filterby,$filterby1,$args,$filterdata);
                                                        $hs_code_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$res_hs_code,'filterdata1' => $country]);
                                                        $country_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $country, 'filterdata1' => $unloading_port]);
                                                        }
                                                }
                                                else if(count($args)==9){
                                                
                                                        if($filterby1 == 'country'){
                                                        
                                                            //dd('In Country Args',$args,$filterby1,$filterby,$filterdata,$filterdata1,$search,$filterby1);
                                                            //Hs Code URl
                                                            $hs_code_url =  route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => $filterby1,'filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $filterdata1??'null']);
                                                            
                                                            //Country Url
                                                            $country_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                            
                                                            //Port Url
                                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                            
                                                        }else if($filterby1 == 'hs_code'){
                                                            $base_search = $search;
                                                            $port_url = route('filter-two', [
                                                                'country'=>$search_country,
                                                                'type' => $type, 
                                                                'role' => $role,
                                                                'search' => $base_search,
                                                                'searchDetails1' => $searchDetails1, 
                                                                'filterby2' => 'unloading_port',
                                                                'filterby' => $filterby,
                                                                'filter' => $filterdata,
                                                                'filterby1' => $filterby1,
                                                                'filterdata' => $filterdata1,
                                                                'filterdata1' => $unloading_port ?? 'Default'
                                                            ]);
        
                                                        }else if($filterby1 == 'unloading_port'){
                                                        
                                                            $base_search = $search;
                                                                //dd($search,$filterby,$filterby1,$args);
                                                                $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                                //Hs code Url
                                                                $hs_code_url =  route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$res_hs_code??'null', 'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);
                                                            
                                                                //Country Url
                                                                $country_url =  route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'base_search'=>$searchDetails1, 'filterby1' => 'unloading_port','filterby'=>$filterby,'filterdata'=>$filterdata,'filterdata1' => $unloading_port??'null']);
                                                            
                                                            //Port Url 
                                                                $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                        }
                                                    }
                                                    else if(count($arg)==9){
                                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                        
                                                    if($filterby2 == 'hs_code'){
                                                        //Hs_code
                                                        $hs_code_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                        //Country Url
                                                        $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                        //Port Url
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    }else if($filterby2 == 'country'){
                                                        //dd($filterby,$filterby1,$arg,$filterby2,$search,$searchDetails1);
                                                        //$hs_code_url = route('search-filter-two', ['type' => $type, 'role' => $role,'search'=> $filterby,'searchDetails1'=>$res_hs_code, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                        $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                        $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $filterdata1??'default']);
                                                        
                                                        }else if($filterby2 == 'unloading_port'){
                                                        //Hs_code
                                                        $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                        //Country url
                                                        $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                        //Port Url                                                           //Port Url 
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                        
                                                        }
                                                    } else if(count($arg)==11){
                                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                        //dd($filterby,$filterby1,$arg,$filterby2);
                                                    if($filterby2 == 'hs_code'){
                                                        //Hs_code
                                                        $hs_code_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                        //Country Url
                                                        $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                        //Port Url
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    }else if($filterby2 == 'country'){
                                                        $hs_code_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                        $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                        
                                                        }else if($filterby2 == 'unloading_port'){
                                                        //Hs_code
                                                        $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                        //Country url
                                                        $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                        //Port Url                                                           //Port Url 
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                        
                                                        }
                                                    }
                                                else{
                                                        $country_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                    }
                                                // $country_url = route('search-filter', ['type' => $type, 'role' => $role,'searchDetails' => $hscode, 'filterby' => 'country', 'filterdata' => $country]);
                                            }else{
                                                //dd('IN Else Block',$filterby2,$filterby,$filterby1,$args,$arg,$filterdata);
                                                if(count($args)==7){
                                                    if($filterby1=='unloading_port'){
                                                        $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                        $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'null']);
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port??"null"]);
                                                    
                                                    }else if($filterby1=='country'){
                                                    //Hs_code Url
                                                        $hs_code_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role, 'filterby2' => $filterby1,'filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>'hs_code','filterdata' => $res_hs_code??"null", 'filterdata1' => $filterdata1??'null']);
                                                    //Port Url
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                                    //Country Url
                                                        $country_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'country','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $country]);
                                                    
                                                    }else if($filterby1=='hs_code'){
                                                    //dd('In this Block');
                                                    $hs_code_url = route('searchfilterone', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby1' => 'hs_code','filterby'=>$filterby,'filterdata'=>$searfilterdata,'filterdata1' => $filterdata1]);
                                                    $country_url = route('search-filter-one', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'base_search'=>$searchDetails1, 'filterby1' => 'country','filterby'=>$filterby1,'filterdata'=>$filterdata1,'filterdata1' => $country??'null']);
                                                    $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $unloading_port]);
                                                    }
                                                }
                                                else if(count($args)==9){                     
                                                    if($filterby1 == 'country'){
                                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                        $filterdata = str_ireplace(" ", "-", $filterdata);
                                                        $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                        //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                                        //Hs Code URl
                                                        if($filterby=='hs_code'){
                                                        $hs_code_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' =>  $res_hs_code??"null", 'filterdata1' => $country]);
                                                        $port_url =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                                        }else{
                                                        $hs_code_url =  route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                        }
                                                        
                                                        //Country Url
                                                        $country_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                        
                                                        //Port Url
                                                        //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                                        
                                                        
                                                    }else if($filterby1 == 'hs_code'){
                                                        $base_search = $search;
                                                        $port_url = route('filter-two', [
                                                            'country'=>$search_country,
                                                            'type' => $type, 
                                                            'role' => $role,
                                                            'search' => $base_search,
                                                            'searchDetails1' => $searchDetails1, 
                                                            'filterby2' => 'unloading_port',
                                                            'filterby' => $filterby,
                                                            'filter' => $filterdata,
                                                            'filterby1' => $filterby1,
                                                            'filterdata' => $filterdata1,
                                                            'filterdata1' => $unloading_port ?? 'Default'
                                                        ]);
        
                                                    }else if($filterby1 == 'unloading_port'){
                                                        //dd($filterby1,$filterdata1,$filterby,$filterdata,$searchDetails1,$search,$args);
                                                        $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                        $filterdata = str_ireplace(" ", "-", $filterdata);
                                                        $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                        //dd('In Country Args',$args,'search',$search,'searchDetails1',$searchDetails1,'filterby1',$filterby1,'filterby',$filterby,'filter',$filterdata,'filterdata', $filterdata1);
                                                        //Hs Code URl
                                                        if($filterby=='hs_code'){
                                                        //Hs_code Url
                                                        $hs_code_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $res_hs_code??"null", 'filterdata1' => $unloading_port??'Default']);
                                                        //Port Url
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                                        //Country Url
                                                        $country_url =  route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                                        }else{
                                                        $hs_code_url =  route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby1,'filterby'=>'hs_code','filter'=>$res_hs_code,'filterby1'=>$filterby,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                                        $country_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $filterdata1]);
                                                        }
                                                        
                                                        //Port Url
                                                        //$port_url =route('search-filter-two', ['type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                                    }
                                                }
                                                else if(count($arg)==9){
                                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                    
                                                    if($filterby2 == 'country'){
                                                    $hs_code_url =  route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby1,'filterby'=>$search,'filter'=>$searchDetails1,'filterby1'=>$filterby,'filterdata' => $filterdata, 'filterdata1' => $country]);
                                                    $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                    //Port Url
                                                    $port_url =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1,'filterdata1' => $unloading_port??'Default']);
                                                    }else if($filterby2 == 'unloading_port'){
                                                
                                                        $base_search = $search;
                                                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                            //Hs code Url
                                                            $hs_code_url =   route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                            //dd($type, $role,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                                            //Country Url
                                                            $country_url  = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$filterby,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby1,'filter'=>$filterdata,'filterby1'=>$filterby2,'filterdata' => $filterdata1,'filterdata1' => $country??'Default']);
                                                        
                                                        //Port Url 
                                                            $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                            
                                                    //$country_url = route('searchfiltertwo', ['type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    }
                                                }else if(count($arg)==11){
                                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                                        // dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                                    if($filterby2 == 'hs_code'){
                                                        //Hs_code
                                                        $hs_code_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                        //Country Url
                                                        $country_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata, 'filterdata1' => $Dresult->DESTINATION_COUNTRY]);
                                                        //Port Url
                                                        $port_url = route('searchfiltertwo', ['country'=>$search_country,'type' => $type, 'role' => $role,'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$searchDetails1,'filterby1'=>$filterby1,'filterdata' => $filterdata ,'filterdata1' => $unloading_port??'default']);
                                                    }else if($filterby2 == 'country'){
                                                    //HS_code Url
                                                            $filterdata = str_ireplace(" ", "-", $filterdata);
                                                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                        //Hs_code
                                                        //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                                        
                                                        $hs_code_url  = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                        //Country url
                                                        $country_url  =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                        //Port Url                                                           
                                                        $port_url  =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => $filterby2,'filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                        
                                                        
                                                    }else if($filterby2 == 'unloading_port'){
                                                            $filterdata = str_ireplace(" ", "-", $filterdata);
                                                            $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                                                        //Hs_code
                                                        //dd($type, $role,$search,$searchDetails1,$filterby, $filter, $filterby1, $filterdata, $filterby2, $filterdata1);
                                                        
                                                        $hs_code_url  = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$res_hs_code,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                        //Country url
                                                        $country_url  =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                        //Port Url                                                           
                                                        $port_url  =route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'unloading_port','filterby'=>$filterby,'filter'=>$filter,'filterby1'=>$filterby1,'filterdata' => $filterdata,'filterdata1' => $filterdata1??'Default']);
                                                        
                                                        }
                                                    }
                                                else{
                                                        $country_url = route('search-filter-two', ['country'=>$search_country,'type' => $type, 'role' => $role,'search'=>$search,'searchDetails1'=>$searchDetails1, 'filterby2' => 'country','filterby'=>$filterby,'filter'=>$filterdata,'filterby1'=>$filterby1,'filterdata' => $filterdata1, 'filterdata1' => $country??"null"]);
                                                    }                                       
                                            }
        
                                        @endphp
                                        <tr class="bg-white border-b hover:bg-gray-50">
                                            <td class="w-4 p-4 font-medium text-gray-900 align-top">
                                                <p>{{date('F j, Y', strtotime($Dresult->DATE))  }}</p>
                                            </td>
                                            <th scope="row" class="px-6 py-4 align-top">
                                                <p class="font-medium text-blue-600 hover:underline">
                                                    <a href="{{ $hs_code_url }}" class="font-medium text-blue-600 hover:underline">
                                                        {{ $Dresult->HS_CODE ?? 'null' }}
                                                    </a>
                                                </p>
                                            </th>
                                            <td class="px-6 py-4 font-medium text-gray-900 align-top">
                                                <p>{{$Dresult->PRODUCT_DESCRIPTION }}</p>
                                            </td>
                                            <td class="px-6 py-4 align-top">
                                                <p class="font-medium text-blue-600 hover:underline">
                                                    <a href="{{ $country_url }}" class="font-medium text-blue-600 hover:underline">
                                                        {{ $Dresult->DESTINATION_COUNTRY }}
                                                    </a>                                                 
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 align-top">
                                                <p class="font-medium text-blue-600 hover:underline">
                                                    <a href="{{ $port_url }}" class="font-medium text-blue-600 hover:underline">
                                                        {{ $Dresult->UNLOADING_PORT }}
                                                    </a>   
                                                
                                                </p>
                                            </td>
                                            <td class="px-6 py-4 font-medium text-gray-900 align-top">
                                                <p>{{ $Dresult->QUANTITY }}</p>
                                            </td>
                                            <td class="px-6 py-4 font-medium text-gray-900 align-top">
                                                <p>{{$Dresult->MEASURE_UNIT}}</p>
                                            </td>
                                            <td class="px-6 py-4 font-medium text-gray-900 align-top">
                                                <p> {{$Dresult->US_FOB}}</p>
                                            </td>
                                            <td class="px-6 py-4 font-medium align-top">
                                                <p data-modal-target="crud-modal-1" data-modal-toggle="crud-modal-1" class="font-medium text-blue-600 hover:underline transition-all">
                                                    Importer Name
                                                </p>
                                            </td>
                                        </tr>
                                        @if ($iteration==10)
                                            @break
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link text-gray" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link text-gray" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-gray" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-gray" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link text-gray" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section> 
    @endif