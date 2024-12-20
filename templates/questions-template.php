<hr>
<div class="flex-container questions-template-container">
    <div class="flex-grid">
        <div class="flex-grid-item-4-md scrollable-column" id="questionnaireContainer">
            <h6 class="section-title margin-top-4 margin-bottom-4">Describe your data</h6>
            <p class="questions-info text-blue">
                Answer these questions to help identify data storage services that are suitable for your needs. Checking
                these boxes will change the list of available services.
                If you are uncertain how to answer, leave the question blank to maximize your resulting options.
            </p>
            <button class="questions-button-secondary btn-clear-filters margin-bottom-4"
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

            foreach ($data['sections'] as $section) {
                echo "<div class='section-item margin-bottom-4'>";
                echo "<h4 class='text-orange'>{$section['id']}. {$section['question']} <i class='bi bi-info-circle'></i></h4>";

                // Determine if this section needs radio-like behavior
                $radioClass = $section['id'] == 1 ? 'radio-like' : '';

                // Loop through the options
                foreach ($section['options'] as $option) {
                    echo "
                    <div class='form-check margin-bottom-2 text-blue {$radioClass}'>
                        <input class='form-check-input data-option' type='checkbox' value='{$option['id']}' id='{$option['id']}'
                            " . ($radioClass ? "onclick=\"deselectOtherCheckboxes(this)" : "") .
                        ($radioClass && $option['id'] == 'generalPublic' ? "; handleGeneralPublic(this)" : "") .
                        ($radioClass ? "\"" : "") . ">
                        <label class='form-check-label' for='{$option['id']}'>
                            {$option['label']}
                        </label>
                    </div>";
                }

                if ($section['id'] == 2) {
                    echo "
                    <div class='sub-question' id='sub-question' style='display:none;' id='sub-{$option['id']}'>
                        <h4 class='text-orange'>Do you need a DOI ?</h4>
                        <div class='form-check margin-bottom-2 text-blue radio-like'>
                            <input class='form-check-input data-option' type='checkbox' value='Yes' id='Yes' onclick=deselectOtherCheckboxesSubQuestion(this)>
                            <label class='form-check-label' for='Yes'>
                                Yes
                            </label>
                        </div>
                        <div class='form-check margin-bottom-2 text-blue radio-like'>
                            <input class='form-check-input data-option' type='checkbox' value='No' id='No' onclick=deselectOtherCheckboxesSubQuestion(this)>
                            <label class='form-check-label' for='No'>
                                No
                            </label>
                        </div>
                    </div>
                    ";
                }

                if ($section['id'] == 5) {
                    echo "
                    <div style='display: flex; align-items: center; position: relative;'>
                        <span class='log-slider-label' style='margin-right: 10px;'>1GB</span>
                        <input
                            id='log-slider'
                            type='range'
                            min='0'
                            max='4'
                            step='0.01'
                            value='0'
                            oninput='updateValue()'
                            style='flex: 1; margin: 0 10px;'
                        />
                        <span class='log-slider-label' style='margin-left: 10px;'>10TB</span>
                    </div>
                    <div class='value-log-slider'>
                        <label for='slider-value'> Value </label> : <span class='log-slider-label' id='slider-value'>1 GB</span>
                    </div>";
                }

                echo "</div>";
            }
            ?>
        </div>
        <div class="flex-grid-item-8-md">
            <h6 class="section-title margin-bottom-3 margin-top-3">Select data storage services you would like to
                compare.</h6>
            <div class="flex margin-bottom-3 flex-justify-end buttons-container">
                <button class="questions-button-primary margin-right-2" id="selectAllButtonStorageSolution">Select
                    All</button>
                <button class="questions-button-secondary" id="clearAllButtonStorageSolutions">Clear
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
                        <div class='card service-card' data-selected='false' id='{$service['Title']}' data-options='$data_options' storage-limit='{$service['storageLimit']}' onclick='selectionCard(this, {$service_json})'>
                            <div>
                                <h5 class='card-title text-orange'>{$service['Title']}</h5>
                                <p class='card-text'>{$service['Intro']}</p>
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