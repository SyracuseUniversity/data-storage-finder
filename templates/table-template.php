<div class="flex-container" style="display: none;" id="detailsTableBanner">
    <h6 class="section-title margin-top-4 margin-bottom-4">Compare services that match your
        selected criteria</h6>
</div>

<div class="flex-container">
    <div class="table-container" id="table-con" style="display: none;">
        <table class="table" style="display: none;" id="detailsTable">
            <caption>Comparison of Data Storage Options</caption>
            <tbody>
                <tr id="Title">
                    <th scope="col">Title</th>
                </tr>
                <tr id="Description">
                    <th scope="col">Description</th>
                </tr>
                <tr id="Cost">
                    <th scope="col">Cost</th>
                </tr>
                <tr id="Example Use">
                    <th scope="col">Example Use</th>
                </tr>
                <tr id="Capacity">
                    <th scope="col">Capacity</th>
                </tr>
                <tr id="Access and Collaboration">
                    <th scope="col">Access and Collaboration
                    </th>
                </tr>
                <tr id="Data Allowed">
                    <th scope="col">Data Allowed</th>
                </tr>
                <tr id="Durability">
                    <th scope="col">Durability <span class="info-icon-table margin-left-2"
                            onclick="displayToolTipInfo('durability-info-text')">&#8505;</span>
                        <div class='tooltip-info tooltip-hidden  margin-top-3' id="durability-info-text">
                            <p class='tooltip-table-text'>
                                <b>High</b>: Features such as backups, snapshots and versioning can be configured within
                                the service.<br>
                                These services may also use redundant data centers to protect against data loss.<br>
                                <b>Medium</b>: Features protecting against data loss must be set up using external
                                services.
                            </p>
                        </div>
                    </th>
                </tr>
                <tr id="Availability">
                    <th scope="col">Availability <span class="info-icon-table margin-left-2"
                            onclick="displayToolTipInfo('availibity-info-text')">&#8505;</span>
                        <div class='tooltip-info tooltip-hidden  margin-top-3' id="availibity-info-text">
                            <p class='tooltip-table-text'>
                                <b>High</b>: Replication or other failover options can be configured within the service.
                                These options provide data availability through times of routine maintenance or
                                infrastructure down-time.<br>
                                <b>Medium</b>: Features providing high availability are not built in, but may be set up
                                using external services.
                            </p>
                        </div>
                    </th>
                </tr>
                <tr id="Technical Complexity">
                    <th scope="col">Technical Complexity</th>
                </tr>
                <tr id="Contact">
                    <th scope="col">Contact</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>