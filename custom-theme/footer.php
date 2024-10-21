<?php wp_footer(); ?>

<div class="container mt-4 py-4">
    <div class="row">
        <div class="col-md-12">
            <h4 class="about-header">About the Data Finder Solution</h4>
        </div>
        <div class="col-md-12">
            <p class="about-description font-size-16px-md">This tool was developed taking inspiration from Cornell
                University Research
                Data Management Service
                Group and Cornell Information Technologies Custom Development Group (2018). Finder Module. Drupal 8/9.
                Available
                <a href="https://github.com/CU-CommunityApps/CD-finder" class="info-container-links">here</a>
            </p>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row text-center text-md-start">
            <!-- Logo and University Info -->
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/syracuse-logo.png"
                        alt="Syracuse University Logo" style="max-height: 50px;" class="footer-logo img-fluid">
                    <span>Syracuse University</span>
                </div>
            </div>

            <!-- Helpful Links -->
            <div class="col-md-4 mb-4 mb-md-0">
                <h5>Helpful Links</h5>
                <div class="footer-links">
                    <a href="https://github.com/SyracuseUniversity/data-storage-finder">Github Repository</a>
                    <a href="#">Brand Resources</a>
                    <a href="#">Gitlab Developer Documentation</a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>

</html>