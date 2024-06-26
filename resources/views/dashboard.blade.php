@extends('layout.main')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h2>Dasboard</h2>
            {{-- html --}}
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

            <figure class="highcharts-figure">
                <div id="container"></div>
                <p class="highcharts-description">
                   Ini adalah sebuah grafik mahasiswa yang menampilkan banyak nya mahasiswa yang ada di program studi.

                    Program studi sendiri adalah tempat atau sesuatu instansi yang berisikan mahasiswa didalamnya.  
                </p>
            </figure>

            {{-- CSS --}}
            <style>
                .highcharts-figure,
                .highcharts-data-table table {
                    min-width: 310px;
                    max-width: 800px;
                    margin: 1em auto;
                }

                #container {
                    height: 400px;
                }

                .highcharts-data-table table {
                    font-family: Verdana, sans-serif;
                    border-collapse: collapse;
                    border: 1px solid #ebebeb;
                    margin: 10px auto;
                    text-align: center;
                    width: 100%;
                    max-width: 500px;
                }

                .highcharts-data-table caption {
                    padding: 1em 0;
                    font-size: 1.2em;
                    color: #555;
                }

                .highcharts-data-table th {
                    font-weight: 600;
                    padding: 0.5em;
                }

                .highcharts-data-table td,
                .highcharts-data-table th,
                .highcharts-data-table caption {
                    padding: 0.5em;
                }

                .highcharts-data-table thead tr,
                .highcharts-data-table tr:nth-child(even) {
                    background: #f8f8f8;
                }

                .highcharts-data-table tr:hover {
                    background: #f1f7ff;
                }
            </style>

            {{-- javascript --}}
            <script>
                Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Corn vs wheat estimated production for 2020',
                    align: 'left'
                },
                subtitle: {
                    text:
                        'Source: <a target="_blank" ' +
                        'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>',
                    align: 'left'
                },
                xAxis: {
                    categories: [
                        @foreach($mahasiswaprodi as $item)
                            ' {{ $item->nama}} ',
                        @endforeach
                    ],
                    crosshair: true,
                    accessibility: {
                        description: 'Countries'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '1000 metric tons (MT)'
                    }
                },
                tooltip: {
                    valueSuffix: ' (1000 MT)'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [ //jumlah grafik
                    {
                        name: 'Mahasiswa',
                        data: [
                            @foreach($mahasiswaprodi as $item)
                             {{ $item->jumlah }},
                            @endforeach
                        ]
                    }
                    // {
                    //     name: 'Wheat',
                    //     data: [51086, 136000, 5500, 141000, 107180, 77000]
                    // }
                ]
                });

            </script>
        </div>  
    </div>
@endsection
