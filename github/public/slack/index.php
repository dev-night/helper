<?php

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('https://join.slack.com/t/dev-night/shared_invite/enQtNDU4NjIxMDg3MjQ4LTdlMTliZGRjMGYyOWIxN2E3Y2E4MmQwNmFhZTlmOWEyMjRhYzUyZjJmNWQ1NzM0OGUzZjBkZDJkNTdiMGZjMWI', false);
