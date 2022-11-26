<?php

function fa($icon)
{
    echo '<i class="fa ' . $icon . '"></i>';
}

function mandatory()
{
    echo '<span class="bk-field bk-field--mandatory">*</i>';
}

function tip($message)
{
    echo '<span class="bk-field bk-field--tip">' . $message .'</span>';
}

function is_active($route, $class)
{
    echo Route::currentRouteNamed($route) ? $class : '';
}

function status($param)
{
    echo $param == 0
        ? '<strong class="text-info">' . __('_action.pending') .'</strong>'
        : '<strong class="text-success">' . __('_action.completed') .'</strong>';
}
