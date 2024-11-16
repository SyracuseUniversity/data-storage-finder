<div class="flex-container">
    <div class="flex-grid">
        <div class="flex-grid-item-3-md scrollable-column" id="questionnaireContainer">
            <h6 class="section-title margin-top-4 margin-bottom-4">Describe your data</h6>
            <p class="questions-info text-blue">
                Answer these questions to help identify data storage services that are suitable for your needs. Checking
                these boxes will change the list of available services.
                If you are uncertain how to answer, leave the question blank to maximize your resulting options.
            </p>
            <button class="btn btn-secondary btn-clear-filters margin-bottom-4"
                id="clearAllButtonStorageQuestionaire">Clear
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
                echo "<div class='section-item margin-bottom-4'>";
                echo "<h6 class='question-text text-orange'>{$section['id']}. {$section['question']} <i class='bi bi-info-circle'></i></h6>";

                // Loop through the options
                foreach ($section['options'] as $option) {
                    echo "
                <div class='form-check margin-bottom-2 text-blue'>
                    <input class='form-check-input data-option' type='checkbox' value='{$option['id']}' id='{$option['id']}'>
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
        <div class="flex-grid-item-9-md">
            <h6 class="section-title margin-bottom-3 margin-top-3">Select data storage services you would like to
                compare.</h6>
            <div class="flex margin-bottom-3 flex-justify-end buttons-container">
                <button class="btn btn-primary margin-right-2" id="selectAllButtonStorageSolution">Select
                    All</button>
                <button class="btn btn-secondary" id="clearAllButtonStorageSolutions">Clear
                    Selections</button>
            </div>
            <div class="flex-container padding-bottom-3" id="storageSolutionsContainer">
                <div class='flex-grid'>
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
                        $data_options = implode(',', $service['options']);
                        $service_json = json_encode($service);
                        echo "
                    <div class='flex-grid-item-3-md padding-top-2 padding-bottom-2'>
                        <div class='card service-card' data-selected='false' id='{$service['Title']}' data-options='$data_options' onclick='selectionCard(this, {$service_json})'>
                            <div>
                                <h5 class='card-title text-orange'>{$service['Title']}</h5>
                                <p class='card-text'>{$service['Description']}</p>
                            </div>
                        </div>
                    </div>
                    ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>