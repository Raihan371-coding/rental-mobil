<script>
    (function() {
        const storageKey = 'theme';
        const root = document.documentElement;
        const storedTheme = localStorage.getItem(storageKey);
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isDark = storedTheme === 'dark' || (storedTheme === null && prefersDark);

        if (isDark) {
            root.classList.add('dark');
        }

        const setToggleState = () => {
            const buttons = document.querySelectorAll('[data-theme-toggle]');
            const isDarkMode = root.classList.contains('dark');

            buttons.forEach((button) => {
                const sunIcon = button.querySelector('[data-theme-icon-sun]');
                const moonIcon = button.querySelector('[data-theme-icon-moon]');
                const label = button.querySelector('[data-theme-toggle-label]');

                if (moonIcon) {
                    moonIcon.classList.toggle('hidden', isDarkMode);
                }

                if (sunIcon) {
                    sunIcon.classList.toggle('hidden', !isDarkMode);
                }

                if (label) {
                    label.textContent = isDarkMode ? 'Mode Terang' : 'Mode Gelap';
                }
            });
        };

        window.toggleTheme = () => {
            const dark = root.classList.toggle('dark');
            localStorage.setItem(storageKey, dark ? 'dark' : 'light');
            setToggleState();
        };

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', setToggleState);
        } else {
            setToggleState();
        }
    })();
</script>
