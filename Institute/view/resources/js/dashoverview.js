const trendingChart = document.getElementById("trendingchart");
const stuDemoChart = document.getElementById("studemochart");
const monthlyRevenue = document.getElementById('monthlyrevenuechart');


$(document).ready(function(){

    $('.modechanges').on("click",()=>{
        updateChartColors();
    });

    $('.changes').on('click', function() {
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

});


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
}

// Monthly Trending Chart
const trendingChartInstance = new Chart(trendingChart, {
    type: "bar",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
        datasets: [
            {
                label: "Monthly",
                data: [12, 19, 3, 5, 2, 3, 5, 10, 12, 4, 5, 10],
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

// Student Demographics by Age
const stuDemoChartInstance = new Chart(stuDemoChart, {
    type: "pie",
    data: {
        labels: [
            '45%-18-25 years',
            '30%-26-35 years',
            '15%-36-45 years',
            '10%-46+ years'
        ],  
        datasets: [{
            label: 'Student Demographics by Age',
            data: [45, 30, 15, 10],
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
                    label: function(context) {
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

// Monthly Revenue
const monthlyRevenueInstance = new Chart(monthlyRevenue, {
    type: "bar",
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
        datasets: [
            {
                label: "Monthly",
                data: [12, 19, 3, 5, 2, 3, 5, 10, 12, 4, 5, 10],
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