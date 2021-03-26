<?php

function alert_warning($info)
{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <strong>Warning: </strong></br> {$info}
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}


function alert_success($info)
{
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success: </strong></br> {$info}
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}


function alert_error($info)
{
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Error: </strong></br> {$info}
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}

