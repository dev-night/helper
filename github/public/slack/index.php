<?php

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('https://join.slack.com/t/dev-night/shared_invite/enQtNDU4NDE2NzY3NTc1LWE0MjQzZGFmMGQ5Zjk4MTMwMjk4Nzg0ODk5MDJkZGQ3Y2IxN2Q4MTVjNWNkYjM2ZWJkNjdkNjExY2Q2ODFmYjc', false);
