<style>
    .tree-view {
        list-style-type: none;
        padding-left: 20px;
    }
    .tree-view li {
        margin: 5px 0;
        cursor: pointer;
    }
    .toggle {
        display: none;
    }
</style>

@if ($role =='import')
    <section class="container-fluid bg-bluish">
        <div class="pdt-2 pdb-5">
            <table class="table" style="table-layout: fixed;">
                <thead>
                    <tr>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Date</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">HS Code</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Product Description</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Origin Country</h4>
                        </th>
                        <th class="table-primary p-3">
                        <h4 class="fw-semibold text-start">Unloading Port</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">QTY.</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Unit</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Weight</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Importer Name</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $Dresult = $result;
                        $iteration = 0;
                    @endphp
                            
                    @if(isset($Dresult) && $Dresult->count() > 0)
                        @foreach ($Dresult as $Dresult)
                            @php
                                $iteration++;
                                $res_hs_code = $Dresult->HS_CODE;
                                $origin_country = $Dresult->ORIGIN_COUNTRY;
                                $unloading_port  = $Dresult->UNLOADING_PORT;
                                //dd('In this Group',$country);
                                // Hs code Url
                                if ($hs_code) {
                                    # code...
                                    $hs_code_url = route('hs-code', ['country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code]);
                                } else {
                                    # code...
                                    $hs_code_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);
                                }
                                // Country URl
                                if ($hs_code) {
                                    # code...
                                    $country_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
                                } else {
                                    # code...
                                    $country = str_ireplace(" ", "-", $country);
                                    $country_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'country', 'filterdata' => $origin_country??"null"]);
                                }
                                // Port Url
                                if ($hs_code) {
                                    # code...
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    $port_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'unloading_port', 'filterdata' => $unloading_port]);
                                } else {
                                    # code...
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    $port_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'unloading_port', 'filterdata' => $unloading_port]);
                                }
                            @endphp
                            <tr>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->DATE}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    <a href="{{ $hs_code_url }}">
                                        {{-- {{ $result->HS_CODE }} --}}
                                        @foreach (explode(',', $Dresult->HS_CODE) as $code)
                                            <div>{{ $code }}</div>
                                        @endforeach
                                    </a>
                                </td>
                                <td class="fw-normal line-clamp-3 text-gray p-3">
                                    <p class="line-clamp-7">
                                        {{$Dresult->PRODUCT_DESCRIPTION}}
                                    </p>
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    <a href="{{ $country_url }}">
                                        {{$Dresult->ORIGIN_COUNTRY}}
                                    </a>
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    <a href="{{ $port_url }}">
                                        {{$Dresult->UNLOADING_PORT}}
                                    </a>
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->QUANTITY}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->UNIT}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->WEIGHT}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    <a>
                                        Importer Name
                                    </a> 
                                </td>
                            </tr>
                            @if($iteration == 10)
                                @break
                            @endif
                        @endforeach
                    @else
                        <tr>
                            Data Not found
                        </tr>
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
        {{-- filter --}}
        <section class="container-fluid bg-bluish">
            <div class="container pdt-2 pdb-2">
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="filter-card">
                            <div class="container mt-5">
                                <h2>HS Code Tree View</h2>
                                <ul class="tree-view">
                                    <li>
                                        <span class="toggle-btn">+</span> {{$hs_code}}
                                        <ul class="toggle">
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($result as $SearchResult)
                                                <li>
                                                    {{ $SearchResult->HS_CODE }}
                                                </li>
                                                @if (++$i >= 10)
                                                    @break
                                                @endif
                                            @endforeach                                        
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="toggle-btn">+</span> 02 - Vegetables
                                        <ul class="toggle">
                                            <li>0201 - Potatoes</li>
                                            <li>0202 - Tomatoes</li>
                                            <li>
                                                <span class="toggle-btn">+</span> 0203 - Onions
                                                <ul class="toggle">
                                                    <li>0203.01 - Fresh</li>
                                                    <li>0203.02 - Dried</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
@elseif ($role == 'export')
    <section class="container-fluid bg-bluish">
        <div class="pdt-2 pdb-5">
            <table class="table" style="table-layout: fixed;">
                <thead>
                    <tr>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Date</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">HS Code</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Product Description</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Destination Country</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Loading Port</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">QTY.</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Unit</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Value($)</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Expoter Name</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $Dresult = $exportresult;
                        $iteration = 0;
                    @endphp
                    {{-- @dd($exportresult) --}}
                    @if(isset($Dresult) && $Dresult->count() > 0)
                        @foreach ($Dresult as $Dresult)
                            @php
                                $iteration++;
                                $res_hs_code = $Dresult->HS_CODE;
                                $destination_country = $Dresult->DESTINATION_COUNTRY;
                                $unloading_port  = $Dresult->UNLOADING_PORT;
                                
                                // Hs code Url
                                if ($hs_code) {
                                    # code...
                                    $hs_code_url = route('hs-code', ['country'=>$country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);
                                } else {
                                    # code...
                                    $hs_code_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??"null"]);
                                }
                                // Country URl
                                if ($hs_code) {
                                    # code...
                                    $country_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'country', 'filterdata' => $destination_country??"null"]);
                                } else {
                                    # code...
                                    $country = str_ireplace(" ", "-", $country);
                                    $country_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'country', 'filterdata' => $destination_country??"null"]);
                                }
                                // Port Url
                                if ($hs_code) {
                                    # code...
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    $port_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'unloading_port', 'filterdata' => $unloading_port??"Null"]);
                                } else {
                                    # code...
                                    $unloading_port = str_ireplace(" ", "-", $unloading_port);
                                    $port_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'unloading_port', 'filterdata' => $unloading_port??'null']);
                                }
                            @endphp
                            <tr>
                                <td class="fw-normal text-gray p-3">
                                    {{date('F j, Y', strtotime($Dresult->DATE))  }}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    <a href="{{ $hs_code_url }}" class="font-medium text-blue-600 hover:underline">
                                        {{-- {{ $result->HS_CODE }} --}}
                                        @foreach (explode(',', $Dresult->HS_CODE) as $code)
                                            <div>{{ $code }}</div>
                                        @endforeach
                                    </a>
                                </td>
                                <td class="fw-normaltext-gray p-3">
                                    <p class="line-clamp-7">
                                        {{$Dresult->PRODUCT_DESCRIPTION}}
                                    </p>
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    <a href="{{ $country_url }}" class="font-medium text-blue-600 hover:underline">
                                        {{$Dresult->DESTINATION_COUNTRY}}
                                    </a>
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    <a href="{{ $port_url }}" class="font-medium text-blue-600 hover:underline">
                                        {{$Dresult->UNLOADING_PORT}}
                                    </a>
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->QUANTITY_SUBITEM}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->COMMERCIAL_UNIT}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->TOTAL_US_FOB}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    <a>Exporter Name</a>
                                </td>
                            </tr>
                            @if ($iteration==10)
                               @break
                            @endif
                    @endforeach
                    @else
                        <tr>
                            Data Not found
                        </tr>
                    @endif
                </tbody>
            </table>

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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-btn').click(function() {
            $(this).siblings('ul').toggle(); // Toggle the nested ul
            $(this).text($(this).text() === '+' ? '-' : '+'); // Change the toggle text
        });
    });
</script>