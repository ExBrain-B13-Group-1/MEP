const trendingChart = document.getElementById("trendingchart");
const stuDemoChart = document.getElementById("studemochart");
const monthlyRevenue = document.getElementById('monthlyrevenuechart');
const monthlyCoinUsage = document.getElementById('monthlycoinusage');

const indicatorURL = `http://localhost/MEP/Institute/Controller/ChartIndicatroController.php`;

const popularClassURL = `http://localhost/MEP/Institute/Controller/PopularClassDashboardController.php`;

const topFiveInstructorURL = `http://localhost/MEP/Institute/Controller/TopFiveInstructorDashboardController.php`;

const recentEnrollmentsURL = `http://localhost/MEP/Institute/Controller/GetRecentEnrollmentsDashboardController.php`;

const todayUsageCoinHistoryURL = `http://localhost/MEP/Institute/Controller/TodayUsageCoinHistoryController.php`;


let trendingChartInstance;
let stuDemoChartInstance;
let monthlyRevenueInstance;
let coinUsageInstances;

$(document).ready(function () {
    fetchDataAndRenderCharts();

    $('.modechanges').on("click", () => {
        updateChartColors();
    });

    $('.changes').on('click', function () {
        $('.changes').removeClass("actives");
        $(this).addClass('actives');
        console.log($(this).text());
        const sections = {
            "Dashboard Overview": ".dashoverviews",
            "Finance Overview": ".finaoverviews"
        };

        const selectedText = $(this).text();
        const selectedSection = sections[selectedText];

        console.log(selectedText === "Dashboard Overview" ? "dash" : "fina");

        Object.values(sections).forEach(section => {
            if (section === selectedSection) {
                $(section).removeClass('hidden').addClass('block');
            } else {
                $(section).removeClass('block').addClass('hidden');
            }
        });
    });

    // Replace with your data source URL
    let jsonData = [];

    function fetchDataPopularClass() {
        $.ajax({
            url: popularClassURL,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                jsonData = data;
                // console.log(data);
                displayData();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    }

    function displayData() {
        const tableBody = $('#table-body'); // Replace with your table's body selector
        tableBody.empty();

        for (let i = 0; i < jsonData.length; i++) {
            const rowData = jsonData[i];
            // console.log(rowData);
            const row= `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                ${rowData.c_id}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                ${rowData.c_title}
                            </th>
                            <td class="px-6 py-4">
                                ${rowData.instructor_name}
                            </td>
                            <td class="px-6 py-4">
                                ${rowData.enrollment_count}
                            </td>
                            <td class="px-6 py-4">
                                ${addThousandSeparator(rowData.c_fee)}
                            </td>
                            <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                                <a href="http://localhost/MEP/Institute/Controller/ViewDetailsClassController.php?classid=${rowData.id}&status=${rowData.class_status}">View</a>
                            </td>
                        </tr>`;
            // Construct your table row HTML using rowData and append to tableBody
            tableBody.append(row);
        }
    }

    fetchDataPopularClass();

    // Replace with your data source URL
    let jsonDataInstructor = [];

    function fetchDataInstructor() {
        $.ajax({
            url: topFiveInstructorURL,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                jsonDataInstructor = data;
                // console.log(data);
                displayDataInstructor();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    }

    function displayDataInstructor() {
        const tableBody = $('#table-body-instructor'); // Replace with your table's body selector
        tableBody.empty();

        for (let i = 0; i < jsonDataInstructor.length; i++) {
            const rowData = jsonDataInstructor[i];
            let count = i+1;
            // console.log(rowData);
            const row= `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                ${count}.
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                ${rowData.instructor_name}
                            </th>
                            <td class="px-6 py-4">
                                ${rowData.gender}
                            </td>
                            <td class="px-6 py-4">
                                ${rowData.position}
                            </td>
                            <td class="px-6 py-4">
                                ${rowData.class_count}
                            </td>
                            <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                                <a href="http://localhost/MEP/Institute/Controller/ViewDetailsInstructorController.php?instructorid=${rowData.id}">View</a>
                            </td>
                        </tr>`;
            // Construct your table row HTML using rowData and append to tableBody
            tableBody.append(row);
        }
    }

    fetchDataInstructor();


    let jsonDataRecentEnrollments = [];

    function fetchDataRecentEnrollments() {
        $.ajax({
            url: recentEnrollmentsURL,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                jsonDataRecentEnrollments = data;
                displayDataRecentEnrollments();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    }

    function displayDataRecentEnrollments() {
        const tableBody = $('#table-body-recent-enrollments');
        tableBody.empty();

        for (let i = 0; i < jsonDataRecentEnrollments.length; i++) {
            const rowData = jsonDataRecentEnrollments[i];
            // console.log(rowData);
            const row= `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                ${rowData.create_date.split(' ')[0]}    
                            </td>
                            <td class="px-6 py-4">
                                ${rowData.name}
                            </td>
                            <td class="px-6 py-4">
                                ${rowData.c_title}
                            </td>
                            <td class="px-6 py-4">
                                ${rowData.coin_amt ? rowData.coin_amt : addThousandSeparator(rowData.cash_amt) }
                            </td>
                            <td class="px-6 py-4 ${rowData.coin_amt ? "text-blue-500" : "text-green-500"}">
                                ${rowData.coin_amt ? "Coin" : "Cash"}
                            </td>
                        </tr>`;
            tableBody.append(row);
        }
    }
    
    fetchDataRecentEnrollments();


    let jsonDataTodayUsageCoinHistory = [];

    function fetchDataTodayUsageCoinHistory() {
        $.ajax({
            url: todayUsageCoinHistoryURL,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                jsonDataTodayUsageCoinHistory = data;
                displayDataTodayUsageCoinHistory();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching data:', status, error);
            }
        });
    }

    function displayDataTodayUsageCoinHistory() {
        const tableBody = $('#today-coin-usage');
        tableBody.empty();

        for (let i = 0; i < jsonDataTodayUsageCoinHistory.length; i++) {
            const rowData = jsonDataTodayUsageCoinHistory[i];
            // console.log(rowData);
            const row= `<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                ${i+1}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                ${rowData.c_title}
                            </th>
                            <td class="px-6 py-4">
                                ${rowData.coin_amount}
                            </td>
                            <td class="px-6 py-4">
                                ${addThousandSeparator(rowData.c_fee)}
                            </td>
                            <td class="px-6 py-4 underline text-blue-700 cursor-pointer">
                                <a href="http://localhost/MEP/Institute/Controller/ViewDetailsClassController.php?classid=${rowData.class_id}">View</a>
                            </td>
                        </tr>`;
            tableBody.append(row);
        }
    }
    
    fetchDataTodayUsageCoinHistory();

});

function addThousandSeparator(value) {
    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function fetchDataAndRenderCharts() {
    $.ajax({
        url: indicatorURL,
        method: 'GET',
        success: function (response) {
            const datas = JSON.parse(response);
            console.log(datas);
            let trendingData = new Array(12).fill(0);
            let revenueData = new Array(12).fill(0);
            let coinUsageData = new Array(12).fill(0);
            datas['monthlyEnrollments'].forEach(entry => {
                const monthIndex = entry['month'] - 1;
                trendingData[monthIndex] = entry['total_enrollment'];
            });
            renderTrendingChart(trendingData);
            renderStuDemoChart(datas['studentDemographics']);
            datas['monthlyIncome'].forEach(entry => {
                const monthIndex = entry['month'] - 1;
                revenueData[monthIndex] = entry['total_income'];
            });
            renderMonthlyRevenueChart(revenueData);
            datas['monthlyCoinUsage'].forEach(entry => {
                const monthIndex = entry['month'] - 1;
                coinUsageData[monthIndex] = entry['total_coin'];
            });
            renderMonthlyCoinUsage(coinUsageData);
        },
        error: function (error) {
            console.error('Error fetching chart data:', error);
        }
    });
}


function updateChartColors() {
    const labelColor = localStorage.getItem("labelColor");
    trendingChartInstance.options.plugins.legend.labels.color = labelColor;
    trendingChartInstance.options.plugins.title.color = labelColor;
    trendingChartInstance.options.scales.x.ticks.color = labelColor;
    trendingChartInstance.options.scales.y.ticks.color = labelColor;
    trendingChartInstance.update();

    stuDemoChartInstance.options.plugins.legend.labels.color = labelColor;
    stuDemoChartInstance.update();

    monthlyRevenueInstance.options.plugins.legend.labels.color = labelColor;
    monthlyRevenueInstance.options.plugins.title.color = labelColor;
    monthlyRevenueInstance.options.scales.x.ticks.color = labelColor;
    monthlyRevenueInstance.options.scales.y.ticks.color = labelColor;
    monthlyRevenueInstance.update();

    coinUsageInstances.options.plugins.legend.labels.color = labelColor;
    coinUsageInstances.options.plugins.title.color = labelColor;
    coinUsageInstances.options.scales.x.ticks.color = labelColor;
    coinUsageInstances.options.scales.y.ticks.color = labelColor;
    coinUsageInstances.update();
}

// Monthly Trending Chart
function renderTrendingChart(data) {
    trendingChartInstance = new Chart(trendingChart, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Monthly",
                    data: data,
                    backgroundColor: "#1a56db",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: localStorage.getItem("labelColor")
                    }
                },
                title: {
                    display: true,
                    text: 'Monthly Enrollment Trends',
                    color: localStorage.getItem("labelColor")
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: localStorage.getItem("labelColor")
                    }
                },
                y: {
                    ticks: {
                        color: localStorage.getItem("labelColor")
                    }
                }
            }
        },
    });
}


// Student Demographics by Age
function renderStuDemoChart(data) {

    let agegroup = [];
    let percentage = [];

    // console.log(data);
    data.forEach(element => {
        agegroup.push(element['age_group']);
        percentage.push(element['percentage']);
    });

    // console.log(agegroup);
    // console.log(percentage);

    stuDemoChartInstance = new Chart(stuDemoChart, {
        type: "pie",
        data: {
            labels: agegroup,
            datasets: [{
                label: 'Student Demographics by Age',
                data: percentage,
                backgroundColor: [
                    '#3f0c7d',
                    '#650c7d',
                    '#065473',
                    'rgb(75, 255, 75)'
                ],
                hoverOffset: 4
            }],
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    align: 'center',
                    labels: {
                        color: localStorage.getItem("labelColor")
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ' + context.raw + '%';
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
}


// Monthly Revenue
function renderMonthlyRevenueChart(data) {
    monthlyRevenueInstance = new Chart(monthlyRevenue, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Monthly",
                    data: data,
                    backgroundColor: "#1a56db",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: localStorage.getItem("labelColor")
                    }
                },
                title: {
                    display: true,
                    text: 'Monthly Income Trends',
                    color: localStorage.getItem("labelColor")
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: localStorage.getItem("labelColor")
                    }
                },
                y: {
                    ticks: {
                        color: localStorage.getItem("labelColor")
                    }
                }
            }
        },
    });
}


// Monthly Coin Usage
function renderMonthlyCoinUsage(data) {
    coinUsageInstances = new Chart(monthlyCoinUsage, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [
                {
                    label: "Monthly",
                    data: data,
                    backgroundColor: "#1a56db",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: localStorage.getItem("labelColor")
                    }
                },
                title: {
                    display: true,
                    text: 'Monthly Coin Usages',
                    color: localStorage.getItem("labelColor")
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: localStorage.getItem("labelColor")
                    }
                },
                y: {
                    ticks: {
                        color: localStorage.getItem("labelColor")
                    }
                }
            }
        },
    });
}
