var submenu = "submenu";
function create_chatroom_menu(){
    document.getElementById("submenu").className ="box my-0 submenu_close";
    setTimeout(() => {
        document.getElementById("submenu").className ="dsbl";
        document.getElementById("new_menu").className ="box has-background-info my-0 submenu_open";
    }, 250);
    submenu = "new_menu";
}
function join_chatroom_menu(){
    document.getElementById("submenu").className ="box my-0 submenu_close";
    setTimeout(() => {
        document.getElementById("submenu").className ="dsbl";
        document.getElementById("join_menu").className ="box has-background-success my-0 submenu_open";
    }, 250);
    submenu = "join_menu";
}
function cancel_new(){
    document.getElementById("new_menu").className ="box has-background-info my-0 submenu_close";
    setTimeout(() => {
        document.getElementById("new_menu").className ="dsbl";
        document.getElementById("submenu").className ="box my-0 submenu_open";
    }, 250);
    submenu = "submenu";
}
function cancel_join(){
    document.getElementById("join_menu").className ="box has-background-success my-0 submenu_close";
    setTimeout(() => {
        document.getElementById("join_menu").className ="dsbl";
        document.getElementById("submenu").className ="box my-0 submenu_open";
    }, 250);
    submenu = "submenu";
}

var menu = true;
function tambah(){
    if(menu){
        document.getElementById("tambah_text").innerHTML = "Close";
        document.getElementById("tambah").className = "button is-warning is-fullwidth";
        document.getElementById("menu").className = "menu_open";

        document.getElementById("join_menu").className ="dsbl";
        document.getElementById("new_menu").className ="dsbl";
        document.getElementById("submenu").className ="box my-0 submenu_open";

        submenu = "submenu";
    }
    else {
        document.getElementById("tambah_text").innerHTML = "Add Chatroom";
        document.getElementById("tambah").className = "button is-info is-fullwidth";
        document.getElementById("menu").className = "menu_closed";

        document.getElementById(submenu).className = "submenu_close"
        setTimeout(() => {
            document.getElementById("menu").className = "dsbl";
        }, 250);
    }

    menu = !menu;
}