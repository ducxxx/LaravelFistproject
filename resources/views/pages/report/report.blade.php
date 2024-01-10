@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Report</a></span></li>
@endsection
@section("title")
    <title>Report</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div style="display: flex; align-items: center; justify-content: center;">
            <div style="display: flex; padding: 30px; background: rgb(255, 255, 255); border-radius: 10px;
             box-shadow: rgba(0, 0, 0, 0.12) 0px 5px 5px;">
                <canvas id="bar-chart-custom-tooltip"></canvas>
                <script>
                    // Bar chart with custom tooltip
                    const dataBarCustomTooltip = {
                        type: 'bar',
                        data: {
                            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            datasets: [
                                {
                                    label: 'Traffic',
                                    data: [30, 15, 62, 65, 61, 65, 40],
                                },
                            ],
                        },
                    };

                    const optionsBarCustomTooltip = {
                        options: {
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function (context) {
                                            let label = context.dataset.label || '';
                                            label = `${label}: ${context.formattedValue} users`;
                                            return label;
                                        },
                                    },
                                },
                            },
                        },
                    };

                    new mdb.Chart(
                        document.getElementById('bar-chart-custom-tooltip'),
                        dataBarCustomTooltip,
                        optionsBarCustomTooltip);

                </script>
            </div>
        </div>
    </main>
@endsection
