<div class="wrap">
    <h1>Malcolm! Settings</h1>

    <form class="form-horizontal" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="malcolm_id">
                            Instance ID
                        </label>
                    </th>
                    <td>
                        <input id="malcolm_id" name="malcolm_id" placeholder="e.g. xxxxxxxxxx" type="text" value="<?php echo form_val(array_get($options, 'id')) ?>" class="regular-text">
                        <p class="description">Enter your Instance ID - e.g. if the URL when viewing your Dashboard is "https://my.malcolm.app/instances/xxxxxxxxxx/dashboard" then your Instance ID is "xxxxxxxxxx".</p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="submit">
            <input type="hidden" name="option_page" value="malcolm">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
        </p>
    </form>
</div>