<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('frontend.link')
    <title>Filter Search - US Import Data</title>
</head>
<body>
     @include('frontend.header')

    <section class="container-fluid padding-tb bg-green">
        <div class="text-content text-center">
            {{-------Heading--------}}
            <div class="px-5 mb-12">
                
                @php
                    $args = $args ?? [];
                    $arg = $arg ?? [];
                    // dd($filterby,$filterby1,$args,$searchDetails1,$arg);
                    $searchDetailsParts = explode(',', $searchDetails1);
                    $all_numeric = true;
        
                    foreach ($searchDetailsParts as $part) {
                        if (!is_numeric($part)) {
                            $all_numeric = false;
                            break;
                        }
                    }
                @endphp
              
                @if ($all_numeric)
                    @php
                        $filterdata = str_ireplace("-", " ", $filterdata);
                        $filterdata1 = str_ireplace("-", " ", $filterdata1);
                        
                    @endphp
        
                    @if (count($args) == 7)
                   
                        @if ($filterby1 == 'hs_code')
                            {{-- Handle hs_code logic --}}
                        @elseif ($filterby1 == 'unloading_port')
                            @if($filterby == 'hs_code')
                                 @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data at port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{ $role }}s Data at port {{$filterdata1}} by the hs code {{$searchDetails1}} and understand what commodities USA {{ $role }}s at port {{$filterdata1}} under this HS Code
                                    </p>
                                 @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data at port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{ $role }}s Data at port {{$filterdata1}} by the hs code {{$searchDetails1}} and understand what commodities USA {{ $role }}s at port {{$filterdata1}} under this HS Code
                                    </p>
                                 @endif
                            @elseif($filterby=='country')
                                <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At Port {{$filterdata1}}</title>
                                <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At Port {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                            @endif
                        @elseif ($filterby1 == 'country')
                            @if($filterby == 'hs_code')
                                 @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data from {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{ $role }}s Data from {{$filterdata1}} by the hs code {{$searchDetails1}} and understand what commodities USA {{ $role }}s from {{$filterdata1}} under this HS Code
                                    </p>
                                 @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data to {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{ $role }}s Data to {{$filterdata1}} by the hs code {{$searchDetails1}} and understand what commodities USA {{ $role }}s to {{$filterdata1}} under this HS Code
                                    </p>
                                 @endif
                            @elseif($filterby=='unloading_port')
                                <title> USA HS Code {{$filterdata}} {{$role}} data from {{$filterdata1}} </title>
                                <meta name="description" content="USA {{$role}}s data under the HS code {{$filterdata}} form {{$filterdata1}} .  Our bill of lading reports, which include hs code, date, b/l number, product description, loading and unloading ports, us {{$role}}er name, quantity, etc.">
                            @endif
                        @endif
                    @elseif (count($args) == 9)
                        @if ($filterby1 == 'country')
     
                           @if($filterby == 'unloading_port')
                                 @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data from {{$filterdata1}} At port {{$filterdata}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data from {{$filterdata1}} at port {{$filterdata}} and Understand what Commodities USA {{ $role }}s from {{$filterdata1}} at port {{$filterdata}} under this HS Code
                                    </p>
                                 @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data to {{$filterdata1}} At port {{$filterdata}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data to {{$filterdata1}} at port {{$filterdata}} and Understand what Commodities USA {{ $role }}s to {{$filterdata1}} At port {{$filterdata}} under this HS Code
                                    </p>
                                 @endif
                           @endif
                        @elseif ($filterby1 == 'hs_code')
                            @if($filterby == 'hs_code')
                                @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data from {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data from {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities USA {{ $role }}s from {{$filterdata}} at port {{$filterdata1}} under this HS Code
                                    </p>
                                @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data to {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data to {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities USA {{ $role }}s to {{$filterdata}} At port {{$filterdata1}} under this HS Code
                                    </p>
                                @endif
                            @elseif($filterby ==  'unloading_port')
                                 @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data from {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data from {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities USA {{ $role }}s from {{$filterdata}} at port {{$filterdata1}} under this HS Code
                                    </p>
                                 @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data to {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data to {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities USA {{ $role }}s to {{$filterdata}} At port {{$filterdata1}} under this HS Code
                                    </p>
                                 @endif
                            @endif
    
                        @elseif ($filterby1 == 'unloading_port')
                            @if($filterby == 'hs_code')
                            
                            @elseif($filterby ==  'country')
                                 @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data from {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data from {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities USA {{ $role }}s from {{$filterdata}} at port {{$filterdata1}} under this HS Code
                                    </p>
                                 @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data to {{$filterdata}} At port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data to {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities USA {{ $role }}s to {{$filterdata}} At port {{$filterdata1}} under this HS Code
                                    </p>
                                 @endif
                            @elseif($filterby == 'unloading_port')
                                <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At  {{$filterdata1}}</title>
                                <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At  {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                            @endif
                        @endif
                    @elseif (count($arg) == 9)                       
                        @if ($filterby2 == 'hs_code')
                             <title>US HS code {{$searchDetails1}}  {{$role}} Data from {{$filterdata}} At  {{$filterdata1}}</title>
                             <meta name="description" content="USA imports data under the HS code {{$searchDetails1}} form {{$filterdata}} At {{$filterdata1}} . Our US bill of lading data reports, which include HS code, date, b/l number, product description, loading and unloading ports, us importer name, quantity, etc.">
                        @elseif ($filterby2 == 'country')
                            @if($filterby1 == 'hs_code')
                                
                            @elseif($filterby1 == 'unloading_port')
                                @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data from {{$filterdata1}} At Port {{$filterdata}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data from {{$filterdata1}} at port {{$filterdata}} and Understand what Commodities USA imports from {{$filterdata1}} At port {{$filterdata}} under this HS Code
                                    </p>
                                @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                         US {{ $role }} Data to {{$filterdata1}} At Port {{$filterdata}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data to {{$filterdata1}} at port {{$filterdata}} and Understand what Commodities USA {{ $role }}s to {{$filterdata1}} At port {{$filterdata}} under this HS Code
                                    </p>
                                @endif
                             @endif
                        @elseif ($filterby2 == 'unloading_port')
                             @if($filterby1 == 'hs_code')
                                
                             @elseif($filterby1 == 'country')
                                @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{ $role }} Data from {{$filterdata}} At Port by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data from {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities USA imports from {{$filterdata}} At port {{$filterdata1}} under this HS Code
                                    </p>
                                @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                         US {{ $role }} Data to {{$filterdata}} At Port {{$filterdata1}} by the HS Code {{$searchDetails1}}
                                    </h1>
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search Live US {{ $role }}s Data to {{$filterdata}} at port {{$filterdata1}} and Understand what Commodities USA {{ $role }}s to {{$filterdata}} At port {{$filterdata1}} under this HS Code
                                    </p>
                                @endif
                             @endif
                        @endif
                    @elseif (count($arg) == 11)
                        @php
                            $unloading_port = str_ireplace(" ", "-", $unloading_port);
                        @endphp
                        @if ($filterby2 == 'hs_code')
                            {{-- Handle hs_code logic --}}
                        @elseif ($filterby2 == 'country')
                            {{-- Handle country logic --}}
                        @elseif ($filterby2 == 'unloading_port')
                            {{-- Handle unloading_port logic --}}
                        @endif
                    @else
                        {{-- Handle else logic --}}
                    @endif
                @else               
                    @if (count($args) == 7)
                        
                        @if($filterby1 == 'hs_code')
                            <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                             US {{ $searchDetails1 }} {{$role}} Data by the HS Code {{$filterdata1}}
                            </h1>
                            <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                Search live USA {{ $searchDetails1 }} {{$role}}s data By HS Code {{$filterdata1}} and understand USA {{ $searchDetails1 }} imports activities under this hs code
                            </p>
                        @elseif($filterby1 == 'country')
                            @if($role == 'import')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{ $searchDetails1 }} {{$role}} Data from {{$filterdata1}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                   Search live USA {{ $searchDetails1 }} {{$role}}s data from {{$filterdata1}}, understand USA {{ $searchDetails1 }} {{$role}}s activities from {{$filterdata1}}
                                </p>
                            @elseif($role == 'export')
                                 <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{ $searchDetails1 }} {{$role}} Data to {{$filterdata1}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                    Search live USA {{ $searchDetails1 }} {{$role}}s data to {{$filterdata1}}, understand USA {{ $searchDetails1 }} {{$role}}s activities to {{$filterdata1}}
                                </p>
                            @endif
                        @elseif($filterby1 == 'unloading_port')
                            @if($role == 'import')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{ $searchDetails1 }} {{$role}} Data at port {{$filterdata1}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                   Search live USA {{ $searchDetails1 }} {{$role}}s data at port {{$filterdata1}}, understand USA {{ $searchDetails1 }} {{$role}}s activities at port {{$filterdata1}}
                                </p>
                            @elseif($role == 'export')
                                 <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{ $searchDetails1 }} {{$role}} Data at port {{$filterdata1}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                    Search live USA {{ $searchDetails1 }} {{$role}}s data at port {{$filterdata1}}, understand USA {{ $searchDetails1 }} {{$role}}s activities at port {{$filterdata1}}
                                </p>
                            @endif
                        @endif
                    @elseif (count($args) == 9)
                        @if ($filterby1 == 'country')
                            @php
                          
                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                            @endphp
                            @if($filterby == 'hs_code')
                                @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{$searchDetails1}} {{ $role }} Data from {{$filterdata1}} by the HS Code {{$filterdata}}
                                    </h1> 
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{$searchDetails1}} {{ $role }}s data from {{$filterdata1}} By the HS Code {{$filterdata}} understand USA {{$searchDetails1}} {{ $role }}s activities from {{$filterdata1}} under this hs code
                                    </p>
                                @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{$searchDetails1}} {{ $role }} Data to {{$filterdata1}} by the HS Code {{$filterdata}}
                                    </h1> 
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{$searchDetails1}} {{ $role }}s data to {{$filterdata1}} By the HS Code {{$filterdata}} understand USA {{$searchDetails1}} {{ $role }}s activities to {{$filterdata1}} under this hs code
                                    </p>
                                @endif
                            @elseif($filterby == 'unloading_port')
                                 @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{$searchDetails1}} {{ $role }} Data from {{$filterdata1}} At port {{$filterdata}}
                                    </h1> 
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                       Search live USA {{$searchDetails1}} {{ $role }}s data from {{$filterdata1}} At port {{$filterdata}} understand USA {{$searchDetails1}} {{ $role }}s activities from {{$filterdata1}} At port {{$filterdata}}
                                    </p>
                                @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{$searchDetails1}} {{ $role }} Data to {{$filterdata1}} At port {{$filterdata}}
                                    </h1> 
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{$searchDetails1}} {{ $role }}s data to {{$filterdata1}} At port {{$filterdata}} understand USA {{$searchDetails1}} {{ $role }}s activities to {{$filterdata1}} At port {{$filterdata}}
                                    </p>
                                @endif
                            @endif
    
                        @elseif ($filterby1 == 'hs_code')
                            @php
                                $base_search = $search;
                            @endphp
                            @if($filterby == 'unloading_port')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{$searchDetails1}} {{ $role }} Data at port {{$filterdata1}} by the HS Code {{$filterdata}}
                                </h1> 
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                    Search live USA {{$searchDetails1}} {{ $role }}s data at port {{$filterdata1}} By the HS Code {{$filterdata}} understand USA {{$searchDetails1}} {{ $role }}s activities at port {{$filterdata1}} under this hs code
                                </p>
                            @elseif($filterby == 'country')
                                @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{$searchDetails1}} {{ $role }} Data from {{$filterdata1}} by the HS Code {{$filterdata}}
                                    </h1> 
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{$searchDetails1}} {{ $role }}s data from {{$filterdata1}} By the HS Code {{$filterdata}} understand USA {{$searchDetails1}} {{ $role }}s activities from {{$filterdata1}} under this hs code
                                    </p>
                                @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{$searchDetails1}} {{ $role }} Data to {{$filterdata1}} by the HS Code {{$filterdata}}
                                    </h1> 
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{$searchDetails1}} {{ $role }}s data to {{$filterdata1}} By the HS Code {{$filterdata}} understand USA {{$searchDetails1}} {{ $role }}s activities to {{$filterdata1}} under this hs code
                                    </p>
                                @endif
                            @endif
                        @elseif ($filterby1 == 'unloading_port')
                            @php
                                $base_search = $search;
                                //$unloading_port = str_ireplace(" ", "-", $unloading_port);
                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                            @endphp
                            @if($filterby=='hs_code')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{$searchDetails1}} {{ $role }} Data at port {{$filterdata1}} by the HS Code {{$filterdata}}
                                </h1> 
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                    Search live USA {{$searchDetails1}} {{ $role }}s data at port {{$filterdata1}} By the HS Code {{$filterdata}} understand USA {{$searchDetails1}} {{ $role }}s activities at port {{$filterdata1}} under this hs code
                                </p>
                            @elseif($filterby == 'country')
                                @if($role == 'import')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{$searchDetails1}} {{ $role }} Data from {{$filterdata}} At port {{$filterdata1}}
                                    </h1> 
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                       Search live USA {{$searchDetails1}} {{ $role }}s data from {{$filterdata}} At port {{$filterdata1}} understand USA {{$searchDetails1}} {{ $role }}s activities from {{$filterdata}} At port {{$filterdata1}}
                                    </p>
                                @elseif($role == 'export')
                                    <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                        US {{$searchDetails1}} {{ $role }} Data to {{$filterdata}} At port {{$filterdata1}}
                                    </h1> 
                                    <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                        Search live USA {{$searchDetails1}} {{ $role }}s data to {{$filterdata}} At port {{$filterdata1}} understand USA {{$searchDetails1}} {{ $role }}s activities to {{$filterdata}} At port {{$filterdata1}}
                                    </p>
                                @endif
                            @endif
    
                        @endif
                    @elseif (count($arg) == 9)
                        @if ($filterby2 == 'country')
                            {{-- Handle country logic --}}
                        @elseif ($filterby2 == 'unloading_port')
                            @php
                                $base_search = $search;
                                
                            @endphp
                        @endif
                    @elseif (count($arg) == 11)                    
                        @if ($filterby2 == 'hs_code')
                            @if($role == 'import')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{$searchDetails1}} {{ $role }} data from {{$filterdata}} at port {{$filterdata1}}   by the hs code {{$filter}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                   Search live USA {{$searchDetails1}} {{ $role }}s data from {{$filterdata}} by the hs code {{$filter}} At port {{$filterdata1}} understand USA {{ $searchDetails1 }} {{ $role }}s activities from {{$filterdata}} At port {{$filterdata1}} under this hs code
                                </p>
                            @elseif($role == 'export')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{$searchDetails1}} {{ $role }} data to {{$filterdata}} at port {{$filterdata1}}   by the hs code {{$filter}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                   Search live USA {{$searchDetails1}} {{ $role }}s data to {{$filterdata}} by the hs code {{$filter}} At port {{$filterdata1}} understand USA {{ $searchDetails1 }} {{ $role }}s activities to {{$filterdata}} At port {{$filterdata1}} under this hs code
                                </p>
                            @endif
                        @elseif ($filterby2 == 'country')
                        
                            @php
                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                            @endphp
                            
                            @if($role == 'import')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{$searchDetails1}} {{ $role }} data from {{$filterdata1}} at port {{$filterdata}}   by the hs code {{$filter}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                   Search live USA {{$searchDetails1}} {{ $role }}s data from {{$filterdata1}} by the hs code {{$filter}} At port {{$filterdata}} understand USA {{ $searchDetails1 }} {{ $role }}s activities from {{$filterdata1}} At port {{$filterdata}} under this hs code
                                </p>
                            @elseif($role == 'export')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{$searchDetails1}} {{ $role }} data to {{$filterdata1}} at port {{$filterdata}}   by the hs code {{$filter}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                   Search live USA {{$searchDetails1}} {{ $role }}s data to {{$filterdata1}} by the hs code {{$filter}} At port {{$filterdata}} understand USA {{ $searchDetails1 }} {{ $role }}s activities to {{$filterdata1}} At port {{$filterdata}} under this hs code
                                </p>
                            @endif

                        @elseif ($filterby2 == 'unloading_port')
                            @php
                                $filterdata = str_ireplace(" ", "-", $filterdata);
                                $filterdata1 = str_ireplace(" ", "-", $filterdata1);
                            @endphp
                            @if($role == 'import')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{$searchDetails1}} {{ $role }} data from {{$filterdata}} at port {{$filterdata1}}   by the hs code {{$filter}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                   Search live USA {{$searchDetails1}} {{ $role }}s data from {{$filterdata}} by the hs code {{$filter}} At port {{$filterdata1}} understand USA {{ $searchDetails1 }} {{ $role }}s activities from {{$filterdata}} At port {{$filterdata1}} under this hs code
                                </p>
                            @elseif($role == 'export')
                                <h1 class="mb-3 text-center text-white font-medium text-2xl lg:text-4xl uppercase" style="word-break:break-word;">
                                    US {{$searchDetails1}} {{ $role }} data to {{$filterdata}} at port {{$filterdata1}}   by the hs code {{$filter}}
                                </h1>
                                <p class="mb-3 text-center text-gray-200 font-normal text-md lg:text-lg" style="word-break:break-word;">
                                   Search live USA {{$searchDetails1}} {{ $role }}s data to {{$filterdata}} by the hs code {{$filter}} At port {{$filterdata1}} understand USA {{ $searchDetails1 }} {{ $role }}s activities to {{$filterdata}} At port {{$filterdata1}} under this hs code
                                </p>
                            @endif
                        @endif
                    @endif
                @endif

            </div>
        </div>
        <div class="container">
            <form method="POST" >
                @csrf
                <div class="mb-4 mt-4 flex justify-content-center align-items-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" name = "type">
                        <input name="type" type="radio" class="btn-check" value="data" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary type-btn" for="btnradio1">Data</label>
                      
                        <input name="type" type="radio" class="btn-check" value="company" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary type-btn" for="btnradio2">Company</label>
                    </div>
                </div>
                <div class="row bg-white" style="border-radius: 1rem;">
                    <div class="searchbox col-sm-2 col-md-2 col-lg-2"> 
                        <select class="form-control" style="border: 0px transparent !important;" name='country'>
                            <!--<option class="form-control" value="">Select Country</option> -->
                            <!--<option class="form-control" value="Asia">Asia</option> -->
                            <!--<option class="form-control" value="Bangladesh">Bangladesh</option>-->
                            <!--<option class="form-control" value="China">China</option>-->
                            <!--<option class="form-control" value="Egypt">Egypt</option>-->
                            <!--<option class="form-control" value="Indonesia">Indonesia</option>-->
                            <!--<option class="form-control" value="Iran">Iran</option>-->
                            <!--<option class="form-control" value="Iraq">Iraq</option>-->
                            <!--<option class="form-control" value="Japan">Japan</option>-->
                            <!--<option class="form-control" value="Kazakhstan">Kazakhstan</option>-->
                            <!--<option class="form-control" value="Kuwait">Kuwait</option>-->
                            <!--<option class="form-control" value="Malaysia">Malaysia</option>-->
                            <!--<option class="form-control" value="Pakistan">Pakistan</option>-->
                            <!--<option class="form-control" value="Philippines">Philippines</option>-->
                            <!--<option class="form-control" value="Qatar">Qatar</option>-->
                            <!--<option class="form-control" value="Saudi Arabia">Saudi Arabia</option>-->
                            <!--<option class="form-control" value="Singapore">Singapore</option>-->
                            <!--<option class="form-control" value="South Korea">South Korea</option>-->
                            <!--<option class="form-control" value="Sri Lanka">Sri Lanka</option>-->
                            <!--<option class="form-control" value="Taiwan">Taiwan</option>-->
                            <!--<option class="form-control" value="Thailand">Thailand</option>-->
                            <!--<option class="form-control" value="Turkey">Turkey</option>-->
                            <!--<option class="form-control" value="UAE">UAE</option>-->
                            <!--<option class="form-control" value="Ukraine">Ukraine</option>-->
                            <!--<option class="form-control" value="Uzbekistan">Uzbekistan</option>-->
                            <!--<option class="form-control" value="Vietnam">Vietnam</option> -->
                            <!--<option class="form-control" value="Africa">Africa</option> -->
                            <!--<option class="form-control" value="Botswana">Botswana</option>-->
                            <!--<option class="form-control" value="Cameroon">Cameroon</option>-->
                            <!--<option class="form-control" value="Central Africa">Central Africa</option>-->
                            <!--<option class="form-control" value="Chad">Chad</option>-->
                            <!--<option class="form-control" value="DR Congo">DR Congo</option>-->
                            <!--<option class="form-control" value="Ethiopia">Ethiopia</option>-->
                            <!--<option class="form-control" value="Ghana">Ghana</option>-->
                            <!--<option class="form-control" value="Ivory Coast">Ivory Coast</option>-->
                            <!--<option class="form-control" value="Kenya">Kenya</option>-->
                            <!--<option class="form-control" value="Lesotho">Lesotho</option>-->
                            <!--<option class="form-control" value="Liberia">Liberia</option>-->
                            <!--<option class="form-control" value="Malawi">Malawi</option>-->
                            <!--<option class="form-control" value="Namibia">Namibia</option>-->
                            <!--<option class="form-control" value="Niger">Niger</option>-->
                            <!--<option class="form-control" value="Nigeria">Nigeria</option>-->
                            <!--<option class="form-control" value="Sao Tome">Sao Tome</option>-->
                            <!--<option class="form-control" value="Senegal">Senegal</option>-->
                            <!--<option class="form-control" value="Sierra Leone">Sierra Leone</option>-->
                            <!--<option class="form-control" value="South Africa">South Africa</option>-->
                            <!--<option class="form-control" value="Tanzania">Tanzania</option>-->
                            <!--<option class="form-control" value="Togo">Togo</option>-->
                            <!--<option class="form-control" value="Uganda">Uganda</option>-->
                            <!--<option class="form-control" value="Zambia">Zambia</option>-->
                            <!--<option class="form-control" value="Zimbabwe">Zimbabwe</option> -->
                            <!--<option class="form-control" value="America">America</option> -->
                            <!--<option class="form-control" value="Canada">Canada</option>-->
                            <!--<option class="form-control" value="Costa Rica">Costa Rica</option>-->
                            <!--<option class="form-control" value="El Salvador">El Salvador</option>-->
                            <!--<option class="form-control" value="Guatemala">Guatemala</option>-->
                            <!--<option class="form-control" value="Honduras">Honduras</option>-->
                            <!--<option class="form-control" value="Mexico">Mexico</option>-->
                            <!--<option class="form-control" value="Panama">Panama</option>-->
                            <option class="form-control" value="US">US</option>
                            <!--<option class="form-control" value="Argentina">Argentina</option>-->
                            <!--<option class="form-control" value="Bolivia">Bolivia</option>-->
                            <!--<option class="form-control" value="Brazil">Brazil</option>-->
                            <!--<option class="form-control" value="Chile">Chile</option>-->
                            <!--<option class="form-control" value="Colombia">Colombia</option>-->
                            <!--<option class="form-control" value="Ecuador">Ecuador</option>-->
                            <!--<option class="form-control" value="Guyana">Guyana</option>-->
                            <!--<option class="form-control" value="Paraguay">Paraguay</option>-->
                            <!--<option class="form-control" value="Peru">Peru</option>-->
                            <!--<option class="form-control" value="Uruguay">Uruguay</option>-->
                            <!--<option class="form-control" value="Venezuela">Venezuela</option> -->
                            <!--<option class="form-control" value="Europe">Europe</option> -->
                            <!--<option class="form-control" value="Austria">Austria</option>-->
                            <!--<option class="form-control" value="Belgium">Belgium</option>-->
                            <!--<option class="form-control" value="Bulgaria">Bulgaria</option>-->
                            <!--<option class="form-control" value="Croatia">Croatia</option>-->
                            <!--<option class="form-control" value="Cyprus">Cyprus</option>-->
                            <!--<option class="form-control" value="Czech">Czech</option>-->
                            <!--<option class="form-control" value="Denmark">Denmark</option>-->
                            <!--<option class="form-control" value="Estonia">Estonia</option>-->
                            <!--<option class="form-control" value="Finland">Finland</option>-->
                            <!--<option class="form-control" value="France">France</option>-->
                            <!--<option class="form-control" value="Germany">Germany</option>-->
                            <!--<option class="form-control" value="Greece">Greece</option>-->
                            <!--<option class="form-control" value="Hungary">Hungary</option>-->
                            <!--<option class="form-control" value="Ireland">Ireland</option>-->
                            <!--<option class="form-control" value="Italy">Italy</option>-->
                            <!--<option class="form-control" value="Kazakhstan">Kazakhstan</option>-->
                            <!--<option class="form-control" value="Kosovo">Kosovo</option>-->
                            <!--<option class="form-control" value="Latvia">Latvia</option>-->
                            <!--<option class="form-control" value="Lithuania">Lithuania</option>-->
                            <!--<option class="form-control" value="Luxembourg">Luxembourg</option>-->
                            <!--<option class="form-control" value="Malta">Malta</option>-->
                            <!--<option class="form-control" value="Moldova">Moldova</option>-->
                            <!--<option class="form-control" value="Netherlands">Netherlands</option>-->
                            <!--<option class="form-control" value="Poland">Poland</option>-->
                            <!--<option class="form-control" value="Portugal">Portugal</option>-->
                            <!--<option class="form-control" value="Russia">Russia</option>-->
                            <!--<option class="form-control" value="Romania">Romania</option>-->
                            <!--<option class="form-control" value="Slovenia">Slovenia</option>-->
                            <!--<option class="form-control" value="Spain">Spain</option>-->
                            <!--<option class="form-control" value="Sweden">Sweden</option>-->
                            <!--<option class="form-control" value="Uk">UK</option>-->
                            <!--<option class="form-control" value="Ukraine">Ukraine</option>-->
                            <!--<option class="form-control" value="Uzbekistan">Uzbekistan</option> -->
                            <!--<option class="form-control" value="Oceania">Oceania</option> -->
                            <!--<option class="form-control" value="Australia">Australia</option>-->
                            <!--<option class="form-control" value="Fiji">Fiji</option>-->
                            <!--<option class="form-control" value="New Zealand">New Zealand</option>-->

                        </select> 
                    </div>
                    <div class="searchbox col-sm-2 col-md-2 col-lg-2"> 
                        <select class="form-control" style="border: 0px transparent !important;" name='role'>
                            <option class="form-control" value="">Import</option>
                            <option class="form-control" value="">Export</option>
                        </select> 
                    </div>
                    <div class="searchbox col-sm-3 col-md-3 col-lg-3"> 
                        <input type="text" placeholder="Description" name="desc" class="form-control"> 
                    </div>
                    <div class="searchbox col-sm-2 col-md-2 col-lg-2"> 
                        <input type="text" placeholder="HS Code" name="hs_code" class="form-control"> 
                    </div>
                    <div class="searchbox col-sm-3 col-md-3 col-lg-3"> 
                        <a class="ybtn ybtn-header-color" style="width: 100%;text-align: center;padding: 18px 0px 18px 0px;">
                            Search
                        </a> 
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- Result Table --}}
    @if($search_country == "US")
        @include('frontend.livedata.US.USTableone')  
    @elseif($search_country == 'Austria')
        @include('frontend.livedata.austriaTable')
    @elseif($search_country == 'Ecuador')
        @include('frontend.livedata.Ecuador.EcTableone')
    @endif

    @include('frontend.tab_inc')
    @include('frontend.footer')
    @include('frontend.script')
</body>
</html>