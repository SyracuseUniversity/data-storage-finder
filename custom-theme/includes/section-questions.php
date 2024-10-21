<hr>
<div class="row">
    <div class="col-md-3 scrollable-column" id="questionnaireContainer">
        <h6 class="section-title mt-4 mb-4">Describe your data</h6>
        <p class="questions-info">
            Answer these questions to help identify data storage services that are suitable for your needs. Checking
            these boxes will change the list of available services.
            If you are uncertain how to answer, leave the question blank to maximize your resulting options.
        </p>
        <button class="btn btn-secondary btn-clear-filters mb-4" id="clearAllButtonStorageQuestionaire">Clear
            Answers</button>
        <?php
        $filePath = __DIR__ . '/data/storage-questions.json';
        // Read the JSON file
        $json_data = file_get_contents($filePath);

        // Decode the JSON data
        $data = json_decode($json_data, true);

        // Check if the JSON was successfully decoded
        if ($data === null) {
            die('Error decoding JSON');
        }

        // Loop through the sections
        foreach ($data['sections'] as $section) {
            echo "<div class='section-item mb-4'>";
            echo "<h6 class='question-text'>{$section['id']}. {$section['question']} <i class='bi bi-info-circle'></i></h6>";

            // Loop through the options
            foreach ($section['options'] as $option) {
                echo "
                <div class='form-check mb-2'>
                    <input class='form-check-input' type='checkbox' value='' id='{$option['id']}'>
                    <label class='form-check-label' for='{$option['id']}'>
                        {$option['label']}
                    </label>
                </div>
                ";
            }

            echo "</div>";
        }
        ?>
    </div>
    <div class="col-md-9">
        <h6 class="section-title mt-4 mb-4">Select data storage services you would like to compare.</h6>
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary mb-4 me-2" id="selectAllButtonStorageSolution">Select All</button>
            <button class="btn btn-secondary mb-4" id="clearAllButtonStorageSolutions">Clear Selections</button>
        </div>
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4" id="storageSolutionsContainer">
            <?php
            $filePath = __DIR__ . '/data/storage-services.json';
            // Read the JSON file
            $json_data = file_get_contents($filePath);

            // Decode the JSON data
            $data = json_decode($json_data, true);

            // Check if the JSON was successfully decoded
            if ($data === null) {
                die('Error decoding JSON');
            }

            // Loop through the services
            foreach ($data['services'] as $index => $service) {
                $id = 'service-' . $index;
                echo "
                    <div class='col'>
                        <div class='card service-card' onclick='selectCard(this)'>
                            <div>
                                <h5 class='card-title'>{$service['title']}</h5>
                                <p class='card-text'>{$service['description']}</p>
                            </div>
                        </div>
                    </div>
                    ";
            }
            ?>
        </div>
    </div>
</div>