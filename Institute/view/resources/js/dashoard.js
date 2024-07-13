const trendingChart = document.getElementById("trendingchart");
const stuDemoChart = document.getElementById("studemochart");
let dynColor = "";

// Dark Mode & Light Mode
$(document).ready(function(){

    const modeChange = $("#modechanges");
    const savedMode = localStorage.getItem("isDark");
    console.log(savedMode);

    function updateMode() {
        const isDark = $("html").hasClass('dark');
        const mode = isDark ? "true" : "false";
        const labelColor = isDark ? "#ffffff" : "#000000";
        // console.log(labelColor);
        dynColor = labelColor;
        console.log(dynColor);

        localStorage.setItem("isDark", mode);
        localStorage.setItem("labelColor", labelColor);

        isDark ? $(modeChange).attr("name", "moon-outline") : $(modeChange).attr("name", "sunny-outline");
    }

    if (savedMode === "true") {
        $("html").addClass("dark"); 
        console.log("dark mode");
        $(modeChange).attr("name", "moon-outline");
        updateMode();
    } else {
        $("html").removeClass("dark");
        console.log("light mode");
        $(modeChange).attr("name", "sunny-outline");
        updateMode();
    }

    updateMode();

    modeChange.on('click', function() {
        $("html").toggleClass("dark");
        updateMode();
    });

});


new Chart(trendingChart, {
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
                            color : localStorage.getItem("labelColor")
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
new Chart(stuDemoChart, {
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





