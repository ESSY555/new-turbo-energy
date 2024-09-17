
<div style="width: 600px; height:400px">
    <canvas id="taskProgressChart" width="100" height="50"></canvas>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    fetch('/completed-tasks/data')
        .then(response => response.json())
        .then(data => {
            const completedTasks = {
                daily: data.daily.length,
                weekly: data.weekly.length,
                monthly: data.monthly.length
            };

            const ctx = document.getElementById('taskProgressChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Daily', 'Weekly', 'Monthly'],
                    datasets: [{
                        label: 'Completed Tasks',
                        data: [
                            completedTasks.daily,
                            completedTasks.weekly,
                            completedTasks.monthly
                        ],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        hoverBackgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    tooltips: {
    callbacks: {
        label: function(tooltipItem, data) {
            const dataIndex = tooltipItem.index;
            const dataValue = data.datasets[0].data[dataIndex];
            const label = data.labels[dataIndex];
            const months = data.months ? data.months : [];
            const today = data.today ? data.today : '';
            const startOfWeek = data.startOfWeek ? data.startOfWeek : '';
            const startOfMonth = data.startOfMonth ? data.startOfMonth : '';

            let tooltipText = label + ': ' + dataValue;

            // Add day, week, or month name based on label
            if (label === 'Daily') {
                tooltipText += ' (' + today + ')';
            } else if (label === 'Weekly') {
                tooltipText += ' (' + startOfWeek + ')';
            } else if (label === 'Monthly') {
                const monthName = months[dataIndex] ? months[dataIndex] : '';
                tooltipText += ' (' + monthName + ')';
            }

            return tooltipText;
        }
    }
}

                }
            });
        });
});

</script>

