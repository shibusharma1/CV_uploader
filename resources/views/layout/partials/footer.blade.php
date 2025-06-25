<div class="footer-container">
    <footer>
      <div class="footer-content-container">
        <p class="footer-text-sm">
          &copy; <span id="currentYear"></span> बिराटनगर महानगरपालिका (Biratnagar Metropolitan City).
        </p>
        <p class="footer-text-sm mt-1">
        Biratnagar, Koshi Province, Nepal
        </p>
        <p class="footer-text-xs mt-1 text-gray-300">
          All rights reserved.
        </p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        // Get the current year dynamically and insert it into the span
        document.addEventListener('DOMContentLoaded', () => {
            const currentYearSpan = document.getElementById('currentYear');
            if (currentYearSpan) {
                currentYearSpan.textContent = new Date().getFullYear();
            }
        });
    </script>
</div>