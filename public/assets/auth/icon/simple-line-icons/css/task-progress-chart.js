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
                type: 'bar',
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
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
});
