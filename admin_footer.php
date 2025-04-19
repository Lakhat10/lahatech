</main>
</div>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Toggle sidebar
document.getElementById('sidebarToggle').addEventListener('click', function() {
    document.querySelector('.admin-sidebar').classList.toggle('d-none');
});

// Marquer toutes les notifications comme lues
document.querySelectorAll('.mark-as-read').forEach(btn => {
    btn.addEventListener('click', function() {
        fetch('admin_mark_read.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({id: this.dataset.id})
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                this.closest('tr').classList.remove('table-primary');
            }
        });
    });
});
</script>
</body>
</html>