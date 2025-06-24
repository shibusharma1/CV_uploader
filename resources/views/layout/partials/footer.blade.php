<!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="logo">
                        <i class="fas fa-file-contract"></i>
                        <h3>CVUploader</h3>
                    </div>
                    <p>The professional platform for CV management and job application optimization.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">How It Works</a></li>
                        {{-- <li><a href="#">Pricing</a></li> --}}
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Resources</h3>
                    <ul class="footer-links">
                        {{-- <li><a href="#">CV Templates</a></li> --}}
                        <li><a href="#">Career Advice</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-envelope"></i> support@cvuploader.com</li>
                        <li><i class="fas fa-phone"></i> +977 98XXXXXXXX</li>
                        <li><i class="fas fa-map-marker-alt"></i> Biratnagar</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; {{ date('Y') }} CVUploader. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/footer.js') }}"></script>
</body>
</html>