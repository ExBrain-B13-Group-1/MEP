
function updateChartColors() {
    const labelColor = localStorage.getItem("labelColor");
    console.log(labelColor);
    monthlyRevenueInstance.options.plugins.legend.labels.color = labelColor;
    monthlyRevenueInstance.options.plugins.title.color = labelColor;
    monthlyRevenueInstance.options.scales.x.ticks.color = labelColor;
    monthlyRevenueInstance.options.scales.y.ticks.color = labelColor;
    monthlyRevenueInstance.update();
}

const monthlyRevenueInstance = new Chart(getChart, {
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