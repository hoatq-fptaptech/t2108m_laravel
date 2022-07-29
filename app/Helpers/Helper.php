<?php
// khai bao cac ham helper
function is_admin(){
    if(!\Illuminate\Support\Facades\Auth::check())
        return false;
    if(\Illuminate\Support\Facades\Auth::user()->is_admin)
        return true;
    return false;
}

function is_staff(){

}

function url_after_login(){
    if(is_admin()){
        return "/admin/student/list";
    }
    return "/";
}
