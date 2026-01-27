<x-layouts.app title="Dashboard">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm transition-all hover:shadow-md">
            <div class="flex items-center gap-4 mb-4">
                <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-xl text-blue-600 dark:text-blue-400">
                    <i data-lucide="users" class="w-6 h-6"></i>
                </div>
                <div class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Enrollees</div>
            </div>
            <div class="text-3xl font-serif font-bold text-slate-900 dark:text-white">{{ $enrolleeCount }}</div>
        </div>

        <div class="p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm transition-all hover:shadow-md">
            <div class="flex items-center gap-4 mb-4">
                <div class="p-3 bg-amber-50 dark:bg-amber-900/20 rounded-xl text-amber-600 dark:text-amber-400">
                    <i data-lucide="clock" class="w-6 h-6"></i>
                </div>
                <div class="text-slate-500 dark:text-slate-400 text-sm font-medium">Pending Enrollees</div>
            </div>
            <div class="text-3xl font-serif font-bold {{ $pendingEnrolleeCount > 0 ? 'text-amber-500' : 'text-slate-900 dark:text-white' }}">
                {{ $pendingEnrolleeCount }}
            </div>
        </div>

        <div class="p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm transition-all hover:shadow-md">
            <div class="flex items-center gap-4 mb-4">
                <div class="p-3 bg-emerald-50 dark:bg-emerald-900/20 rounded-xl text-emerald-600 dark:text-emerald-400">
                    <i data-lucide="check-circle" class="w-6 h-6"></i>
                </div>
                <div class="text-slate-500 dark:text-slate-400 text-sm font-medium">Active Full Access</div>
            </div>
            <div class="text-3xl font-serif font-bold text-slate-900 dark:text-white">
                {{ $fullAccessWithActiveEnrolleeCount }}
            </div>
        </div>
    </div>

    <div 
        x-data="enrollmentChart()"
        class="p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-100 dark:border-slate-800 shadow-sm mb-8"
    >
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Enrollment Analytics</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400">Track enrollee growth over time</p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-3 w-full md:w-auto">
                
                <select 
                    x-model="viewMode"
                    @change="updateChart()"
                    class="px-4 py-2 bg-slate-50 dark:bg-slate-800 border-none rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 focus:ring-2 focus:ring-blue-500 cursor-pointer w-full sm:w-auto"
                >
                    <option value="monthly">Monthly View</option>
                    <option value="yearly">Yearly (All Time)</option>
                </select>

                <select 
                    x-model="selectedYear"
                    @change="updateChart()"
                    :disabled="viewMode === 'yearly'"
                    class="px-4 py-2 bg-slate-50 dark:bg-slate-800 border-none rounded-xl text-sm font-medium text-slate-600 dark:text-slate-300 focus:ring-2 focus:ring-blue-500 cursor-pointer w-full sm:w-auto disabled:opacity-50 disabled:cursor-not-allowed"
                >
                    <template x-for="year in availableYears">
                        <option :value="year" x-text="year"></option>
                    </template>
                </select>

            </div>
        </div>

        <div id="enrollmentChart" class="w-full h-80"></div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('enrollmentChart', () => ({
                viewMode: 'monthly', // 'monthly' or 'yearly'
                selectedYear: "{{ date('Y') }}", 
                chart: null,
                
                // Data passed from Controller
                monthlyData: @json($monthlyDataByYear),
                allTimeData: @json($chartDataAllTime),
                availableYears: @json($availableYears),

                init() {
                    let initialData = this.getCurrentData();
                    let options = this.getOptions(initialData);
                    
                    this.chart = new ApexCharts(document.querySelector("#enrollmentChart"), options);
                    this.chart.render();
                },

                getCurrentData() {
                    if (this.viewMode === 'yearly') {
                        return this.allTimeData;
                    }
                    // Return the specific year's monthly data
                    return this.monthlyData[this.selectedYear];
                },

                updateChart() {
                    let data = this.getCurrentData();
                    
                    this.chart.updateOptions({
                        xaxis: {
                            categories: data.labels
                        }
                    });

                    this.chart.updateSeries([{
                        name: 'Enrollees',
                        data: data.data
                    }]);
                },

                getOptions(data) {
                    return {
                        series: [{
                            name: 'Enrollees',
                            data: data.data
                        }],
                        chart: {
                            type: 'bar',
                            height: 320,
                            fontFamily: 'inherit',
                            toolbar: { show: false },
                            animations: {
                                enabled: true,
                                easing: 'easeinout',
                                speed: 800
                            }
                        },
                        colors: ['#3b82f6'],
                        plotOptions: {
                            bar: {
                                borderRadius: 6,
                                columnWidth: '40%',
                            }
                        },
                        dataLabels: { enabled: false },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: data.labels,
                            axisBorder: { show: false },
                            axisTicks: { show: false },
                            labels: {
                                style: { colors: '#64748b', fontSize: '12px' }
                            }
                        },
                        yaxis: {
                            labels: {
                                style: { colors: '#64748b', fontSize: '12px' }
                            }
                        },
                        grid: {
                            borderColor: '#f1f5f9',
                            strokeDashArray: 4,
                            yaxis: { lines: { show: true } }
                        },
                        tooltip: {
                            theme: 'dark',
                            y: {
                                formatter: function (val) {
                                    return val + " Enrollees"
                                }
                            }
                        }
                    };
                }
            }));
        });
    </script>
    @endpush

</x-layouts.app>