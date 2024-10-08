@if ($type == 'data')
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
                        {{-- HS CODE --}}
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="filter-card">
                                <div class="head">
                                    <h2 class="fs-4 mb-0" style="font-weight: 300;">
                                        HS Code
                                    </h2>
                                </div>
                                <div class="filter-list tree-view">
                                    <ul>
                                        @php
                                            $Fresult = $result;
                                            $iteration = 0;

                                            // Grouping the data by the first 2, 6, and 8 digits
                                            $groupedData = [];

                                            // Initialize URL variables
                                            $hs_code_url = '';
                                            $country_url = '';
                                            $port_url = '';

                                            // Loop through each result to create URLs and group HS codes
                                            foreach ($Fresult as $item) {
                                                $hsCode = $item->HS_CODE;
                                                $origin_country = $item->ORIGIN_COUNTRY;
                                                $unloading_port = $item->UNLOADING_PORT;

                                                // Hs code Url
                                                if ($hs_code) {
                                                    $hs_code_url = route('hs-code', ['country'=> $country,'type' => $type, 'role' => $role,'filterby' => 'hs_code', 'filterdata' => $hsCode]);
                                                } else {
                                                    $hs_code_url = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $hsCode??"null"]);
                                                }

                                                // Grouping the data by the first 2, 6, and 8 digits
                                                $twoDigit = substr($hsCode, 0, 2);
                                                $sixDigit = substr($hsCode, 0, 6);
                                                $eightDigit = $hsCode;

                                                // Organizing the data into a nested array structure
                                                if (!isset($groupedData[$twoDigit])) {
                                                    $groupedData[$twoDigit] = [];
                                                }
                                                if (!isset($groupedData[$twoDigit][$sixDigit])) {
                                                    $groupedData[$twoDigit][$sixDigit] = [];
                                                }
                                                $groupedData[$twoDigit][$sixDigit][] = $eightDigit;
                                            }

                                            // Sort the grouped data based on the count of six-digit groups in descending order
                                            arsort($groupedData); // Sort by two-digit counts in descending order

                                            // Sort each six-digit group by their counts in descending order
                                            foreach ($groupedData as $twoDigit => &$sixDigitGroup) {
                                                arsort($sixDigitGroup); // Sort six-digit groups in descending order based on their counts
                                            }
                                        @endphp

                                        @if(isset($groupedData) && count($groupedData) > 0)
                                            @foreach ($groupedData as $twoDigit => $sixDigitGroup)
                                                <!-- First level: 2-digit HS code -->
                                                <li class="mb-2">
                                                    <a href="{{ $hs_code_url }}" class="fs-5 tree-toggle collapsed" style="font-weight: 400;">
                                                        {{ $twoDigit }} ({{ count($sixDigitGroup) }})
                                                        <hr style="margin: 8px;">
                                                    </a>
                                                    <ul class="nested mb-3">
                                                        <!-- Second level: 6-digit HS codes -->
                                                        @foreach ($sixDigitGroup as $sixDigit => $eightDigitGroup)
                                                            <li>
                                                                @php
                                                                    // Create the URL for the six-digit code
                                                                    $sixDigitUrl = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $sixDigit]);
                                                                @endphp
                                                                <a href="{{ $sixDigitUrl }}" class="fs-5 tree-toggle collapsed" style="font-weight: 400;">
                                                                    {{ $sixDigit }} ({{ count($eightDigitGroup) }})
                                                                </a>
                                                                <ul class="nested" style="padding-left: 30px;margin-top: 8px;">
                                                                    <!-- Third level: 8-digit HS codes -->
                                                                    @php
                                                                        $displayedEightDigits = []; // Array to keep track of displayed HS codes
                                                                    @endphp
                                                                    @foreach ($eightDigitGroup as $eightDigit)
                                                                        @if (!in_array($eightDigit, $displayedEightDigits))
                                                                            @php
                                                                                // Create the URL for the eight-digit code
                                                                                $eightDigitUrl = route('search-filter', ['country'=>$country,'type' => $type, 'role' => $role,'search'=>$search,'base_search' => $base_desc, 'filterby' => 'hs_code', 'filterdata' => $eightDigit]);
                                                                            @endphp
                                                                            <li class="fs-5 mb-2" style="font-weight: 400;">
                                                                                <a href="{{ $eightDigitUrl }}" class="text-hover">
                                                                                    {{ $eightDigit }}
                                                                                </a>
                                                                            </li>
                                                                            @php
                                                                                $displayedEightDigits[] = $eightDigit; // Add HS code to displayed array
                                                                            @endphp
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>No HS codes found.</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Origin Country --}}
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="filter-card">
                                <div class="head">
                                    <h2 class="fs-4 mb-0" style="font-weight: 300;">
                                        Origin Country
                                    </h2>
                                </div>
                                <div class="filter-list tree-view">
                                    <ul>
                                        @php
                                            $Fresult = $result;
                                            $iteration = 0;

                                            // Initialize an array to hold unique origin countries
                                            $uniqueCountries = [];

                                            // Loop through each result to collect unique origin countries
                                            foreach ($Fresult as $item) {
                                                $origin_country = $item->ORIGIN_COUNTRY;

                                                // Only add unique countries
                                                if (!in_array($origin_country, $uniqueCountries)) {
                                                    $uniqueCountries[] = $origin_country;
                                                }
                                            }
                                        @endphp

                                        @if(isset($uniqueCountries) && count($uniqueCountries) > 0)
                                            @foreach ($uniqueCountries as $country)
                                                @php
                                                    // Ensure that both $country and $origin_country are handled separately and not overwritten
                                                    $formatted_country = str_ireplace(" ", "-", $country); // For $country variable

                                                    // Country URL logic
                                                    if ($hs_code) {
                                                        // Generate URL when $hs_code is present
                                                        $country_url = route('search-filter', [
                                                            'country' => $formatted_country ?? "Null",
                                                            'type' => $type,
                                                            'role' => $role,
                                                            'search' => $search,
                                                            'base_search' => $base_hs_code,
                                                            'filterby' => 'country',
                                                            'filterdata' => $origin_country ?? "null"
                                                        ]);
                                                    } else {
                                                        // Generate URL when $hs_code is not present
                                                        $country_url = route('search-filter', [
                                                            'country' => $formatted_country ?? "Null",
                                                            'type' => $type,
                                                            'role' => $role,
                                                            'search' => $search,
                                                            'base_search' => $base_desc,
                                                            'filterby' => 'country',
                                                            'filterdata' => $origin_country ?? "null"
                                                        ]);
                                                    }
                                                @endphp

                                                <li class="mb-2">
                                                    <a href="{{ $country_url }}" class="fs-5" style="font-weight: 400;">
                                                        {{ $country }}
                                                        <hr style="margin: 8px;">
                                                    </a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>No origin countries found.</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- Unloading Port --}}
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="filter-card">
                                <div class="head">
                                    <h2 class="fs-4 mb-0" style="font-weight: 300;">
                                        Unloading Port
                                    </h2>
                                </div>
                                <div class="filter-list tree-view">
                                    <ul>
                                        @php
                                            $Fresult = $result;
                                            $iteration = 0;

                                            // Initialize an array to hold unique unloading ports
                                            $uniquePorts = [];

                                            // Loop through each result to collect unique unloading ports
                                            foreach ($Fresult as $item) {
                                                $unloading_port = $item->UNLOADING_PORT;

                                                // Only add unique unloading ports
                                                if (!in_array($unloading_port, $uniquePorts)) {
                                                    $uniquePorts[] = $unloading_port;
                                                }
                                            }
                                        @endphp

                                        @if(isset($uniquePorts) && count($uniquePorts) > 0)
                                            @foreach ($uniquePorts as $unloading_port)
                                                @php
                                                    // Replace spaces with dashes for the URL
                                                    $formatted_port = str_ireplace(" ", "-", $unloading_port);

                                                    // Generate the URL for the unloading port
                                                    if ($hs_code) {
                                                        // Generate URL when $hs_code is present
                                                        $port_url = route('search-filter', [
                                                            'country' => $country ?? "Null",
                                                            'type' => $type,
                                                            'role' => $role,
                                                            'search' => $search,
                                                            'base_search' => $base_hs_code,
                                                            'filterby' => 'unloading_port',
                                                            'filterdata' => $formatted_port ?? "null"
                                                        ]);
                                                    } else {
                                                        // Generate URL when $hs_code is not present
                                                        $port_url = route('search-filter', [
                                                            'country' => $country ?? "Null",
                                                            'type' => $type,
                                                            'role' => $role,
                                                            'search' => $search,
                                                            'base_search' => $base_desc,
                                                            'filterby' => 'unloading_port',
                                                            'filterdata' => $formatted_port ?? "null"
                                                        ]);
                                                    }
                                                @endphp

                                                <li class="mb-2">
                                                    <a href="{{ $port_url }}" class="fs-5" style="font-weight: 400;">
                                                        {{ $unloading_port }}
                                                        <hr style="margin: 8px;">
                                                    </a>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>No unloading ports found.</li>
                                        @endif
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
                                <h4 class="fw-semibold text-start">Expoter Name</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $Dresult = $exportresult;
                            $iteration = 0;
                        @endphp

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
                                        {{$Dresult->QUANTITY}}
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->UNIT}}
                                    </td>
                                    <td class="fw-normal text-gray p-3">
                                        {{$Dresult->WEIGHT}}
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
@elseif ($type == 'company')
    <section class="bg-bluish">
        <div class="container-fluid">
            <div class="container pdt-2 pdb-5">
                <div class="row">
                    <div class="col-sm-1 col-md-2 col-lg-3">
                        <div class="company-card">
                            <a href="/" class="text-hover fs-5 fw-500">
                                Test Name
                            </a>
                            <p class="fs-4 fw-400">
                                Test Name
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
