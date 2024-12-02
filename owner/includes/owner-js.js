const sidebar = document.getElementById('sidebar');
        const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
        const overlay = document.getElementById('overlay');

        toggleSidebarBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            overlay.classList.toggle('show', !sidebar.classList.contains('collapsed'));
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('collapsed');
            overlay.classList.remove('show');
        });

        const handleResize = () => {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('collapsed');
                overlay.classList.remove('show');
            } else {
                sidebar.classList.add('collapsed');
                overlay.classList.remove('show');
            }
        };

        window.addEventListener('resize', handleResize);
        handleResize();