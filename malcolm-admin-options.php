<div class="wrap">
    <h1>Malcolm! Settings</h1>
    <form class="form-horizontal" method="post">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="malcolm_url">
                            Instance landing page
                        </label>
                    </th>
                    <td>
                        <input id="malcolm_url" name="malcolm_url" placeholder="e.g. https://support.example.com" type="text" value="<?php echo form_val(array_get($options, 'url')) ?>" class="regular-text">
                        <p class="description">The full URL of your instance landing page.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="malcolm_border">
                            Border width
                        </label>
                    </th>
                    <td>
                        <input id="malcolm_border" name="malcolm_border" placeholder="e.g. 0" type="number" value="<?php echo form_val(array_get($options, 'border')) ?>" class="regular-text">
                        <p class="description">The default border width around embed.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="malcolm_height">
                            Default height
                        </label>
                    </th>
                    <td>
                        <input id="malcolm_height" name="malcolm_height" placeholder="e.g. 600px" type="text" value="<?php echo form_val(array_get($options, 'height')) ?>" class="regular-text">
                        <p class="description">The default height of your embed.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="malcolm_width">
                            Default width
                        </label>
                    </th>
                    <td>
                        <input id="malcolm_width" name="malcolm_width" placeholder="e.g. 100%" type="text" value="<?php echo form_val(array_get($options, 'width')) ?>" class="regular-text">
                        <p class="description">The default width of your embed.</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Show header
                    </th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span>
                                    Show header
                                </span>
                            </legend>
                            <label for="malcolm_header">
                                <input id="malcolm_header" name="malcolm_header" type="checkbox" class="regular-text" <?php if (array_get($options, 'header')): ?>checked<?php endif; ?>>
                                Yes, show the header
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Show promos
                    </th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span>
                                    Show promos
                                </span>
                            </legend>
                            <label for="malcolm_promos">
                                <input id="malcolm_promos" name="malcolm_promos" type="checkbox" class="regular-text" <?php if (array_get($options, 'promos')): ?>checked<?php endif; ?>>
                                Yes, show the promos
                            </label>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Show footer
                    </th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text">
                                <span>
                                    Show footer
                                </span>
                            </legend>
                            <label for="malcolm_footer">
                                <input id="malcolm_footer" name="malcolm_footer" type="checkbox" class="regular-text" <?php if (array_get($options, 'footer')): ?>checked<?php endif; ?>>
                                Yes, show the footer
                            </label>
                        </fieldset>
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