<hr>
<div class="flex-container questions-template-container">
    <div class="flex-grid">
        <div class="flex-grid-item-4-md scrollable-column" id="questionnaireContainer">
            <h6 class="section-title margin-top-4 margin-bottom-4">Describe your data</h6>
            <p class="questions-info text-blue">
                Answer these questions to help identify data storage services that are suitable for your needs. Checking
                these boxes will change the list of available services.
            </p>
            <button class="questions-button-secondary btn-clear-filters margin-bottom-4"
                id="clearAllButtonStorageQuestionaire">Clear
                Answers</button>
            <?php
            $filePath = __DIR__ . '/data/storage-questions.json';
            $json_data = file_get_contents($filePath);
            $data = json_decode($json_data, true);
            if ($data === null) {
                die('Error decoding JSON');
            }

            echo "<ol id='question-list'>";

            foreach ($data['sections'] as $section) {
                echo "<li class='section-item text-orange-dark margin-bottom-4'> 
                        {$section['question']} 
                        <span class='info-icon' tabindex='0' role='button' aria-label='More information' 
                            onclick='displayToolTipInfo(\"{$section['id']}tooltip\")' 
                            onkeydown='if(event.key === \"Enter\" || event.key === \" \") displayToolTipInfo(\"{$section['id']}tooltip\")'>&#8505;
                        </span>";

                echo "<div class='tooltip-info tooltip-hidden' id='{$section['id']}tooltip' role='tooltip' aria-hidden='true'>
                        <p class='tooltip-helper-text'>{$section['helper_info']}</p>
                    </div>";

                $radioClass = ($section['id'] == 1 || $section['id'] == 2) ? 'radio-like' : '';

                foreach ($section['options'] as $option) {
                    echo "<div class='form-check margin-bottom-2 text-blue {$radioClass}'>
                            <input class='form-check-input data-option' type='checkbox' value='{$option['id']}' id='{$option['id']}'
                                tabindex='0'
                                " . ($radioClass ? "onclick=\"deselectOtherCheckboxes(this)\"" : "") . ">
                            <label class='form-check-label' for='{$option['id']}'>
                                {$option['label']}
                            </label>
                        </div>";
                }

                if ($section['id'] == 2) {
                    echo "<div class='sub-question' id='sub-question' style='display:none;'>
                            <h4 class='text-orange-dark'>Do you need a DOI?</h4>
                            <div class='form-check margin-bottom-2 text-blue radio-like'>
                                <input class='form-check-input data-option' type='checkbox' value='DOIYes' id='DOIYes' 
                                    tabindex='0' onclick='deselectOtherCheckboxesSubQuestion(this)'>
                                <label class='form-check-label' for='DOIYes'>Yes</label>
                            </div>
                        </div>";
                }

                if ($section['id'] == 5) {
                    echo "<div style='display: flex; align-items: center; position: relative;' id='log-slider-container'>
                            <span class='log-slider-label' style='margin-right: 10px;'> ≤ 1GB</span>
                            <input id='log-slider' type='range' min='0' max='4' step='any' value='0' 
                                oninput='updateValue()' aria-label='Select storage size from 1GB to 10TB' 
                                tabindex='0' style='flex: 1; margin: 0 10px;'/>
                            <span class='log-slider-label' style='margin-left: 10px;'> ≥ 10TB</span>
                        </div>
                        <div class='value-log-slider'>
                            <label for='slider-value'>Value:</label>
                            <input type='text' id='slider-value' value='1 GB' oninput='updateSlider()' tabindex='0'/>
                        </div>
                        <div class='tooltip-error tooltip-error-hidden margin-top-3'>
                            <p class='tooltip-helper-text' id='input-slider-error'></p>
                        </div>";
                }
                echo "</li>";
            }
            echo "</ol>";
            ?>
        </div>
        <div class="flex-grid-item-8-md">
            <h6 class="section-title margin-bottom-3 margin-top-3">Select data storage services you would like to
                compare.</h6>
            <div class="flex margin-bottom-3 buttons-container">
                <button class="questions-button-primary" id="selectAllButtonStorageSolution"
                    aria-label="Select all storage solutions">Select All</button>
                <button class="questions-button-secondary" id="clearAllButtonStorageSolutions"
                    aria-label="Clear all selected storage solutions">Clear Selections</button>
            </div>
            <div class="flex-container padding-bottom-3" id="storageSolutionsContainer">
                <div class='flex-grid'>
                    <?php
                    $filePath = __DIR__ . '/data/storage-services.json';
                    $json_data = file_get_contents($filePath);
                    $data = json_decode($json_data, true);

                    if ($data === null) {
                        die('Error decoding JSON');
                    }

                    foreach ($data['services'] as $index => $service) {
                        $id = 'service-' . $index;
                        $data_options = implode(',', $service['options']);
                        $service_json = json_encode($service);
                        echo "<div class='flex-grid-item-3-lg flex-grid-item-4-md flex-grid-item-6-sm padding-top-2 padding-bottom-2'>
                                <div class='card service-card' storage-qualified='true' is-selected='false' condition-qualified='true' 
                                    id='{$service['Title']}' data-options='$data_options' storage-limit='{$service['storageLimit']}'
                                    tabindex='0' role='button' aria-label='Select service: {$service['Title']}'
                                    onclick='selectionCard(this, {$service_json})'
                                    onkeydown='if(event.key === \"Enter\" || event.key === \" \") selectionCard(this, {$service_json})'>
                                    <div>
                                        <h5 class='card-title text-orange-dark'>{$service['Title']}</h5>
                                        <p class='card-text'>{$service['Intro']}</p>
                                    </div>
                                </div>
                            </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>