<?php wp_footer(); ?>

<div class="container mt-4 py-4">
    <div class="row">
        <div class="col-md-12">
            <p class="about-header">About the Data Finder Solution</p>
        </div>
        <div class="col-md-12">
            <p class="about-description">This tool was developed taking inspiration from Cornell University Research
                Data Management Service
                Group and Cornell Information Technologies Custom Development Group (2018). Finder Module. Drupal 8/9.
                Available
                <a href="https://github.com/CU-CommunityApps/CD-finder" class="info-container-links">here</a>
            </p>
        </div>
    </div>
</div>

<footer class="bg-dark text-white py-4">
    <div class="container footer-text">
        <div class="row">
            <div class="col-md-6">
                <!-- Syracuse University Logo -->
                <a href="https://www.syracuse.edu" class="navbar-brand text-white">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/syracuse-logo.png"
                        alt="Syracuse University" class="img-fluid" style="max-height: 50px;">
                    Syracuse University
                </a>
            </div>
            <div class="col-md-6 text-right">
                <!-- Links Section -->
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Accessibility</a></li>
                    <li><a href="#" class="text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-white">University Libraries</a></li>
                    <li><a href="#" class="text-white">Syracuse Data Archives</a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>

</body>

</html>