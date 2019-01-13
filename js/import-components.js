window.onload = function () {


    var linkNavbar = document.querySelector('#navbar-import');
    var contentNavbar = linkNavbar.import.querySelector('#navbar-import');
    var navbarPlaceholder = document.querySelector('#navbar-placeholder');
    navbarPlaceholder.appendChild(document.importNode(contentNavbar, true));

    var linkSidebar = document.querySelector('#sidebar-import');
    var contentSidebar = linkSidebar.import.querySelector('#sidebar-import');
    var sidebarPlaceholder = document.querySelector('#sidebar-placeholder');
    sidebarPlaceholder.appendChild(document.importNode(contentSidebar, true));
}