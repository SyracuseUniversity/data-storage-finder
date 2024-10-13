<hr>
<div class="row">
    <div class="col-md-4 scrollable-column">
        <h6 class="section-title mt-4 mb-4">Describe your data</h6>
        <p class="questions-info">
            Answer these questions to help identify data storage services that are suitable for your needs. Checking
            these boxes will change the list of available services.
            If you are uncertain how to answer, leave the question blank to maximize your resulting options.
        </p>
        <button class="btn btn-secondary btn-clear-filters mb-4">Clear Answers</button>
        <!-- Section 1 -->
        <div class="section-item mb-4">
            <h6 class="question-text">1. Do you need backups, snapshots or replication of your data? <i
                    class="bi bi-info-circle"></i></h6>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="backupCopies">
                <label class="form-check-label" for="backupCopies">
                    I need one or more backup/snapshot copies of the data, and need to be able to restore data from
                    previous points in time (high durability).
                </label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="replicateCopies">
                <label class="form-check-label" for="replicateCopies">
                    I need to have replicate copies of the data to minimize downtime (high availability).
                </label>
            </div>
        </div>

        <!-- Section 2 -->
        <div class="section-item mb-4">
            <h6 class="question-text">2. Do you need backups, snapshots or replication of your data? <i
                    class="bi bi-info-circle"></i></h6>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="backupCopies">
                <label class="form-check-label" for="backupCopies">
                    I need one or more backup/snapshot copies of the data, and need to be able to restore data from
                    previous points in time (high durability).
                </label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="replicateCopies">
                <label class="form-check-label" for="replicateCopies">
                    I need to have replicate copies of the data to minimize downtime (high availability).
                </label>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="section-item mb-4">
            <h6 class="question-text">3. How much data do you have and how fast will it grow? <i
                    class="bi bi-info-circle"></i></h6>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="dataLessThan1TB">
                <label class="form-check-label" for="dataLessThan1TB">
                    Unlikely to exceed 1TB in 2 years.
                </label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="dataMoreThan1TB">
                <label class="form-check-label" for="dataMoreThan1TB">
                    Greater than 1TB or likely to exceed in 2 years.
                </label>
            </div>
        </div>

        <!-- Section 4 -->
        <div class="section-item mb-4">
            <h6 class="question-text">4. Do you have special performance needs? <i class="bi bi-info-circle"></i></h6>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="moreThan1000Files">
                <label class="form-check-label" for="moreThan1000Files">
                    I am likely to have more than 1,000 files in a single directory within two years.
                </label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" value="" id="highTransactionRates">
                <label class="form-check-label" for="highTransactionRates">
                    My data interactions demand high transaction or transfer rates.
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Right side will remain empty for now -->
    </div>
</div>