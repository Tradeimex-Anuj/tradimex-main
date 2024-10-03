@if ($role=='import')
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
                            <h4 class="fw-semibold text-start">QTY.</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Unit</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Weight</h4>
                        </th>
                        <th class="table-primary p-3">
                            <h4 class="fw-semibold text-start">Value In USD</h4>
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
                        {{-- @dd($Dresult)  --}}
                            @php
                                $iteration++;
                                $res_hs_code = $Dresult->HS_CODE;
                                $origin_country = $Dresult->ORIGIN_DESTINATION_COUNTRY;

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
                                    $country_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'origin_country', 'filterdata' => $origin_country??"null"]);
                                } else {
                                    # code...
                                    $country = str_ireplace(" ", "-", $country);
                                    $country_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'origin_country', 'filterdata' => $origin_country??"null"]);
                                }
                            @endphp
                            <tr>
                                <td class="fw-normal text-gray p-3">{{$Dresult->MONTH_YEAR}}</td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->HS_CODE}}
                                </td>
                                <td class="fw-normal text-gray line-clamp-7">
                                    <p>
                                        {{$Dresult->PRODUCT_DESCRIPTION}}
                                    </p>
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->ORIGIN_DESTINATION_COUNTRY}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->SUPPLEMENTARY_QTY}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->SUPPLEMENTARY_UNIT}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->QTY_IN_KG}}
                                </td>
                                <td class="fw-normal text-gray p-3">
                                    {{$Dresult->VALUE_IN_USD}}
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
                            <h4 class="fw-bolder">Unloading Port</h4>
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
                            <h4 class="fw-bolder">Expoter Name</h4>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $result = $result;
                        $iteration = 0;
                    @endphp
                    @if(isset($result) && $result->count() > 0)
                        @foreach ($result as $result)
                            @php
                                $iteration++;
                                $res_hs_code = $result->HS_CODE;
                                $country = $result->DESTINATION_COUNTRY;
                                $unloading_port  = $result->UNLOADING_PORT;
                                // Hs code Url
                                if ($hs_code) {
                                    # code...
                                    $hs_code_url = route('hs-code', ['type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $res_hs_code??'null']);
                                } else {
                                    # code...
                                    $hs_code_url = route('search-filter', ['type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $res_hs_code??'null']);
                                }
                                // Country URl
                                if ($hs_code) {
                                    # code...
                                        $country = str_ireplace(" ", "-", $country??'null');
                                    $country_url = route('search-filter', ['type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'country', 'filterdata' => $country??'null']);
                                } else {
                                    # code...
                                        $country = str_ireplace(" ", "-", $country??'null');
                                    $country_url = route('search-filter', ['type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'country', 'filterdata' => $country??'null']);
                                }
                                // Port Url
                                if ($hs_code) {
                                    # code...
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port??'null');
                                    $port_url = route('search-filter', ['type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_hs_code, 'filterby' => 'unloading_port', 'filterdata' => $unloading_port??'null']);
                                } else {
                                    # code...
                                        $unloading_port = str_ireplace(" ", "-", $unloading_port??'null');
                                    $port_url = route('search-filter', ['type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'unloading_port', 'filterdata' => $unloading_port??'null']);
                                }
                            @endphp
                            <tr>
                                <td class="fw-bolder text-center text-gray">
                                    {{$result->DATE}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    <a href="{{ $hs_code_url }}" class="font-medium text-blue-600 hover:underline">
                                        {{-- {{ $result->HS_CODE }} --}}
                                        @foreach (explode(',', $result->HS_CODE) as $code)
                                            <div>{{ $code }}</div>
                                        @endforeach
                                    </a>
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    {{$result->PRODUCT_DESCRIPTION}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    <a href="{{ $country_url }}" class="font-medium text-blue-600 hover:underline">
                                            {{$result->DESTINATION_COUNTRY}}
                                    </a>
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    <a href="{{ $port_url }}" class="font-medium text-blue-600 hover:underline">
                                        {{$result->UNLOADING_PORT}}
                                    </a>
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    {{$result->QUANTITY}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    {{$result->UNIT}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    {{$result->WEIGHT}}
                                </td>
                                <td class="fw-bolder text-center text-gray">
                                    {{$result->US_EXPORTER_NAME}}
                                </td>
                            </tr>
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