<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: {
            url: "<?= site_url("jadwal_kerja/kalender_json") ?>"
        },
    });
    calendar.render();
});
</script>
<div id='calendar'></div>